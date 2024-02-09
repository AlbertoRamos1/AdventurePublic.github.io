// Inicializar el escenario (stage) y la capa (layer)
const stage = new Konva.Stage({
    container: 'game-container-rafa',
    width: 800,
    height: 600
});

const layer = new Konva.Layer();
stage.add(layer);

// Inicializar puntuación y vidas
let puntuacion = 0;
let vidas = 5; //Número total de intentos
let cola, burro;

// Coordenadas del lugar correcto para la cola
const lugarCorrecto = { x: 571, y: 355 };
const desplazamientoRelativoX=121; // Desplazamiento en X desde la esquina superior izquierda del burro hasta el lugar correcto
const desplazamientoRelativoY=55; // Desplazamiento en Y desde la esquina superior izquierda del burro hasta el lugar correcto
const rangoAceptable = 20; // Rango de tolerancia

let rectanguloNegro, grupoFinJuego, textoFinJuego, textoPuntuacionFinal, intentos, textoIntento;
let grupoMarcador, textoMarcador, grupoPantallaInicio, botonInicio;

// Cargar y mostrar la imagen de fondo
const fondoObj = new Image();
fondoObj.onload = function () {
    const fondo = new Konva.Image({
        x: 0,
        y: 0,
        image: fondoObj,
        width: stage.width(),
        height: stage.height()
    });

    layer.add(fondo);
    cargarBurro(); // Cargar el burro después de que el fondo esté listo
};
fondoObj.src = '/assets/img/FondoRafa.png'; // Imagen de fondo

// Función para cargar y mostrar la imagen del burro
function cargarBurro() {
    const imageObj = new Image();
    imageObj.onload = function () {
        burro = new Konva.Image({
            x: 450,
            y: 300,
            image: imageObj,
            width: 200,
            height: 200
        });

        layer.add(burro);
        //Solo cuando esté cargado el burro, cargaremos el resto
        cargarRectanguloNegro();
        cargarCola();
        crearPantallaInicio();
        cargarIntentos();
        crearMarcador();

    };
    imageObj.src = '/assets/img/Burrito.png'; // URL de la imagen del burro
}

// Función para cargar y mostrar la imagen de la cola
function cargarCola() {
    const colaObj = new Image();
    colaObj.onload = function () {
        cola = new Konva.Image({
            x: 5,
            y: 35,
            image: colaObj,
            width: 80,
            height: 80,
            draggable: false // Hace que la cola no sea arrastrable al principio
        });

        // Cambiar el cursor a una mano cuando pasa por encima de la cola
        cola.on('mouseover', function () {
            stage.container().style.cursor = 'grab';
        });

        // Cambiar el cursor a su estado original cuando el cursor no está sobre el objeto
        cola.on('mouseout', function () {
            stage.container().style.cursor = 'default';
        });

        // Evento para mostrar el rectángulo negro al comenzar a arrastrar
        cola.on('dragstart', function () {
            stage.container().style.cursor = 'grabbing';
            rectanguloNegro.visible(true);
            layer.draw();
        });

        // Evento para calcular la puntuación y las vidas al soltar la cola
        cola.on('dragend', function () {
            stage.container().style.cursor = 'default';
            cola.draggable(false); // Deshabilitar arrastrar la cola
            rectanguloNegro.visible(false);
            calcularPuntuacion();
        });

        //Eventos táctiles

        cola.on('touchstart', function () {
            rectanguloNegro.visible(true);
            layer.draw();
        });

        cola.on('touchend', function () {
            cola.draggable(false); // Deshabilitar arrastrar la cola
            rectanguloNegro.visible(false);
            calcularPuntuacion();
        });



        layer.add(cola);
        layer.draw();
    };
    colaObj.src = '/assets/img/Cola.png'; // URL de la imagen de la cola
}

// Crear y agregar el texto para mostrar el número del intento
function cargarIntentos() {
    intentos = 1;
    textoIntento = new Konva.Text({
        x: stage.width() / 2,
        y: 10,
        text: 'Intento ' + intentos,
        fontSize: 40,
        fontFamily: 'Montserrat, sans-serif',
        fill: 'black',
        align: 'center'
    });
    textoIntento.offsetX(textoIntento.width() / 2); // Centrar el texto horizontalmente
    layer.add(textoIntento);
    layer.draw();
}

// Agregar el rectángulo negro sobre el burro y el fondo, pero debajo de la cola
function cargarRectanguloNegro() {
    rectanguloNegro = new Konva.Rect({
        x: 0,
        y: 0,
        width: stage.width(),
        height: stage.height(),
        fill: 'black',
        visible: false
    });
    layer.add(rectanguloNegro);
}

function crearMarcador() {
    grupoMarcador = new Konva.Group({
        x: stage.width() - 180,
        y: 10
    });

    const rectanguloMarcador = new Konva.Rect({
        width: 170,
        height: 60,
        fill: 'white',
        stroke: 'black',
        strokeWidth: 1,
        cornerRadius: 10
    });

    textoMarcador = new Konva.Text({
        x: 10,
        y: 20,
        text: 'Puntuación: 0',
        fontSize: 20,
        fontFamily: 'Montserrat, sans-serif',
        fill: 'black',
    });

    // Agregar rectángulo y texto al grupo
    grupoMarcador.add(rectanguloMarcador);
    grupoMarcador.add(textoMarcador);

    // Agregar el grupo al layer
    layer.add(grupoMarcador);
}

function calcularPuntuacion() {
    // Calcular la distancia desde el punto correcto
    const distancia = Math.sqrt(
        Math.pow(cola.x() - lugarCorrecto.x, 2) + 
        Math.pow(cola.y() - lugarCorrecto.y, 2)
    );

    // Asignar puntuación basada en la distancia
    if (distancia <= rangoAceptable) {
        puntuacion += 10; // Puntuación máxima si está muy cerca
    } else if (distancia <= rangoAceptable * 2) {
        puntuacion += 5; // Puntuación reducida si está un poco lejos
    }

    // Actualizar el marcador con la puntuación del intento actual
    textoMarcador.text('Puntuación: ' + puntuacion);

    // Reducir una vida por cada intento
    vidas--;

    // Comprobar si el jugador se quedó sin vidas
    if (vidas <= 0) {
        // Finalizar el juego si el jugador no tiene más vidas
        finDeJuego();
        textoFinJuego.text('Juego terminado');
        textoPuntuacionFinal.text(`Has obtenido: ${puntuacion} puntos`);
        grupoFinJuego.moveToTop();
        grupoFinJuego.visible(true);
    } else {
        // Bloquear la cola para que no se pueda mover hasta el siguiente intento
        cola.draggable(false);

        // Establecer un temporizador para reiniciar el intento después de un tiempo
        setTimeout(function () {
            // Reiniciar la posición de la cola y habilitar su arrastre
            cola.position({ x: 5, y: 35 });
            cola.draggable(true);

            // Incrementar el número de intentos
            intentos++;
            textoIntento.text('Intento ' + intentos);

            // Mover el burro a una nueva posición aleatoria
            moverBurroAleatoriamente();

            // Redibujar la capa para actualizar los cambios
            layer.draw();
        }, 1000); // Esperar 1 segundo antes de permitir el siguiente intento
    }

    // Redibujar la capa para reflejar los cambios inmediatos
    layer.batchDraw();
}


// Función para cambiar la posición del burro de manera aleatoria
function moverBurroAleatoriamente() {
    // Definir los límites dentro de los cuales el burro puede moverse
    const minX = 0; // Límite mínimo en el eje X
    const maxX = 600; // Límite máximo en el eje X
    const minY = 200; // Límite mínimo en el eje Y
    const maxY = 400; // Límite máximo en el eje Y

    // Generar posiciones aleatorias dentro de los límites
    const nuevaX = Math.random() * (maxX - minX) + minX;
    const nuevaY = Math.random() * (maxY - minY) + minY;

    // Actualizar la posición del burro
    burro.position({ x: nuevaX, y: nuevaY });

    //Ajustar la nueva posicion del lugar correcto de la cola
    actualizarLugarCorrecto();

    // Redibujar la capa para reflejar el cambio
    layer.draw();
}

// Función para actualizar el lugar correcto para la cola basado en la nueva posición del burro
function actualizarLugarCorrecto(nuevaX, nuevaY) {
    lugarCorrecto.x = burro.x() + desplazamientoRelativoX;
    lugarCorrecto.y = burro.y() + desplazamientoRelativoY;
    console.log(lugarCorrecto.x, lugarCorrecto.y);
}

function finDeJuego() {
    // Crear el grupo para el fin del juego
    grupoFinJuego = new Konva.Group({
        x: stage.width() / 2,
        y: stage.height() / 2 - 100,
        visible: false
    });
    layer.add(grupoFinJuego);

    // Crear y agregar el rectángulo blanco al grupo
    const rectanguloBlanco = new Konva.Rect({
        x: -150,
        y: 0,
        width: 300,
        height: 200,
        fill: 'white',
        //stroke: 'black',
        cornerRadius: [10, 10, 10, 10],
        strokeWidth: 2
    });
    grupoFinJuego.add(rectanguloBlanco);

    // Crear y agregar el texto de juego terminado al grupo
    textoFinJuego = new Konva.Text({
        x: -150,
        y: 20,
        width: 300,
        text: '',
        fontSize: 24,
        fontFamily: 'Montserrat, sans-serif',
        fontStyle: 'bold',
        fill: 'black',
        align: 'center'
    });
    grupoFinJuego.add(textoFinJuego);

    textoPuntuacionFinal = new Konva.Text({
        x: -150,
        y: 50, // Ajustar la posición y para que esté debajo de "Juego terminado"
        width: 300,
        text: '',
        fontSize: 20,
        fontFamily: 'Montserrat, sans-serif',
        fill: 'black',
        align: 'center'
    });
    grupoFinJuego.add(textoPuntuacionFinal);

    // Función para reiniciar el juego
    function reiniciarJuego() {
        puntuacion = 0;
        vidas = 5;
        intentos = 1; // Restablecer también el contador de intentos
        textoIntento.text('Intento ' + intentos); // Actualizar el texto de intento
        textoMarcador.text('Puntuación: ' + puntuacion); //Reiniciamos también el marcador
        grupoMarcador.visible(true);
        cola.position({ x: 5, y: 35 });
        burro.position({x : 450, y : 300});
        cola.draggable(true);
        grupoFinJuego.visible(false);
        layer.draw();
    }

    // Crear y agregar un botón de reinicio al grupo
    const botonReinicio = new Konva.Rect({
        x: -50, // Centrado respecto al grupo
        y: 120,
        width: 100,
        height: 40,
        fill: 'green',
        cornerRadius: [10, 10, 10, 10,],
        strokeWidth: 2,
        listening: true // Asegurarse de que el botón esté escuchando eventos
    });
    grupoFinJuego.add(botonReinicio);

    // Crear y agregar el texto del botón de reinicio al grupo
    const textoBotonReinicio = new Konva.Text({
        x: -50,
        y: 130,
        width: 100,
        text: 'Reiniciar',
        fontSize: 16,
        fontFamily: 'Montserrat, sans-serif',
        fill: 'white',
        align: 'center',
        listening: true // Asegurarse de que el texto esté escuchando eventos
    });
    grupoFinJuego.add(textoBotonReinicio);

    //Eventos del botón de reinicio 
    botonReinicio.on('click', function () {
        reiniciarJuego();
    });

    textoBotonReinicio.on('click', function () {
        reiniciarJuego();
    });

    //Eventos táctiles
    botonReinicio.on('touchstart', function () {
        reiniciarJuego();
    });

    textoBotonReinicio.on('touchstart', function () {
        reiniciarJuego();
    });

    botonReinicio.on('mouseover', function () {
        stage.container().style.cursor = 'pointer';
    });

    botonReinicio.on('mouseout', function () {
        stage.container().style.cursor = 'default';
    });

    textoBotonReinicio.on('mouseover', function () {
        stage.container().style.cursor = 'pointer';
    });

    textoBotonReinicio.on('mouseout', function () {
        stage.container().style.cursor = 'default';
    });
}

// Función para crear la pantalla de inicio
function crearPantallaInicio() {
    grupoPantallaInicio = new Konva.Group({
        x: stage.width() / 2 - 150,
        y: stage.height() / 2 - 100,
        visible: true
    });

    const rectanguloInicio = new Konva.Rect({
        width: 300,
        height: 200,
        fill: 'white',
        //stroke: 'black',
        strokeWidth: 2,
        cornerRadius: 10
    });

    const textoInicio = new Konva.Text({
        x: 0,
        y: 20,
        width: 300,
        text: 'Bienvenido al Juego\n"Pon la cola al Burro"',
        fontSize: 24,
        fontFamily: 'Montserrat, sans-serif',
        fontStyle: 'bold',
        fill: 'black',
        align: 'center'
    });

    const textoInicio2 = new Konva.Text({
        x: 0,
        y: 90,
        width: 300,
        text: 'Arrastra la cola hasta su lugar y consigue la mayor puntuación posible en 5 intentos',
        fontSize: 16,
        fontFamily: 'Montserrat, sans-serif',
        fill: 'black',
        align: 'center'
    });

    botonInicio = new Konva.Rect({
        x: 100,
        y: 140,
        width: 100,
        height: 40,
        fill: 'green',
        cornerRadius: 10,
        strokeWidth: 2,
        listening: true
    });

    const textoBotonInicio = new Konva.Text({
        x: 100,
        y: 150,
        width: 100,
        text: 'Comenzar',
        fontSize: 16,
        fontFamily: 'Montserrat, sans-serif',
        fill: 'white',
        align: 'center'
    });

    grupoPantallaInicio.add(rectanguloInicio, textoInicio, textoInicio2, botonInicio, textoBotonInicio);
    layer.add(grupoPantallaInicio);

    //Eventos del botón inicio del juego
    botonInicio.on('click', function () {
        iniciarJuego();
    });

    textoBotonInicio.on('click', function () {
        iniciarJuego();
    });

    //Eventos táctiles
    botonInicio.on('touchstart', function () {
        iniciarJuego();
    });

    textoBotonInicio.on('touchstart', function () {
        iniciarJuego();
    });



    botonInicio.on('mouseover', function () {
        stage.container().style.cursor = 'pointer';
    });

    botonInicio.on('mouseout', function () {
        stage.container().style.cursor = 'default';
    });

    textoBotonInicio.on('mouseover', function () {
        stage.container().style.cursor = 'pointer';
    });

    textoBotonInicio.on('mouseout', function () {
        stage.container().style.cursor = 'default';
    });

    
    // Función para iniciar el juego
    function iniciarJuego() {
        grupoPantallaInicio.visible(false);
        cola.draggable(true);
    }
}

function ajustarLienzo() {
    const anchoMaximo = 800;  // Ancho máximo para el lienzo
    const altoMaximo = 600;   // Alto máximo para el lienzo

    const anchoVentana = window.innerWidth;
    const altoVentana = window.innerHeight;

    // Comprobar si el tamaño de la ventana es menor que el tamaño máximo del lienzo
    if (anchoVentana < anchoMaximo || altoVentana < altoMaximo) {
        // Calcular la nueva escala manteniendo la relación de aspecto
        const escala = Math.min(anchoVentana / anchoMaximo, altoVentana / altoMaximo);

        stage.width(anchoMaximo * escala);
        stage.height(altoMaximo * escala);

        // Actualizar la escala de todos los elementos del lienzo
        layer.scale({ x: escala, y: escala });
    } else {
        // En pantallas más grandes, usar el tamaño y escala originales
        stage.width(anchoMaximo);
        stage.height(altoMaximo);
        layer.scale({ x: 1, y: 1 });
    }

    layer.draw();
}

// Llamar a ajustarLienzo cuando la página se carga y cuando se redimensiona la ventana
window.addEventListener('load', ajustarLienzo);
window.addEventListener('resize', ajustarLienzo);
