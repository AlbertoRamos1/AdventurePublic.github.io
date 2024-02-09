-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2024 a las 16:19:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adventure`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `NoticiaId` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Cuerpo` text NOT NULL,
  `FechaPublicacion` datetime DEFAULT current_timestamp(),
  `Imagen` varchar(100) NOT NULL,
  `Imagen_posicion` varchar(50) NOT NULL,
  `Autor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`NoticiaId`, `Titulo`, `Cuerpo`, `FechaPublicacion`, `Imagen`, `Imagen_posicion`, `Autor`) VALUES
(1, 'Nuevo pantano habilitado para hacer kayak', 'https://saposyprincesas.elmundo.es/viajar-con-ninos/por-espana/kayak-interior-pantanos-lagos-rios/', '2024-01-15 10:14:25', '/assets/img/noticias1.png', 'izquierda', 'achaser@iesmarquesdecomares.org'),
(2, 'Desprendimientos en las zonas del sur', 'https://www.canalsur.es/noticias/andalucia/cadiz/desprendimientos-en-la-pena-de-arcos-de-la-frontera-alertan-a-la-ciudadania/1978421.html', '2024-01-19 12:35:04', '/assets/img/desprendimiento.jpg', 'derecha', 'rafagomez@iesmarquesdecomares.org'),
(3, 'Nuevas rutas de senderismo en la época de otoño', 'https://saposyprincesas.elmundo.es/actividades-ninos/mejores/rutas-para-hacer-senderismo-en-otono/', '2024-01-19 13:01:17', '/assets/img/nuevasrutas.jpg', 'izquierda', 'achaser@iesmarquesdecomares.org'),
(4, 'Mayor cantidad de zonas desbloqueadas en invierno', 'https://www.micebo.es/es/post/que-se-puede-pescar-en-invierno-trucos-y-tips', '2024-01-19 13:03:12', '/assets/img/variedadpesca.jpg', 'derecha', 'rafagomez@iesmarquesdecomares.org'),
(5, 'Actualizaciones en el material de escalada de Gimnasios andaluces', 'https://sportgarrido.com/', '2024-01-19 13:04:16', '/assets/img/materialescalada.jpg', 'izquierda', 'achaser@iesmarquesdecomares.org'),
(6, 'Alerta de lluvias en las zonas de senderismo cercanas.', 'https://www.accuweather.com/es/es/paradas/302210/hiking-weather/302210', '2024-01-19 13:06:26', '/assets/img/alertalluviassenderismo.jpg', 'derecha', 'rafagomez@iesmarquesdecomares.org');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Correo` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido1` varchar(100) DEFAULT NULL,
  `Apellido2` varchar(100) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Pais` varchar(100) DEFAULT NULL,
  `CP` varchar(20) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Correo`, `Pass`, `Nombre`, `Apellido1`, `Apellido2`, `FechaNacimiento`, `Pais`, `CP`, `Telefono`, `Rol`) VALUES
('achaser@iesmarquesdecomares.org', '1234', 'Antonio Jose', 'Chacon', 'Serrano', '2002-08-31', 'España', '14900', '697428314', 'Admin'),
('albertoramos@gmail.com', '$2y$10$7vMDmdhaCoDYfPpljm5X1OKVYrGOvFGEZ9owHrL8mtiZxhcn2RshS', 'Alberto', 'Ramos', '', '2004-07-23', 'it', '14960', '600616691', NULL),
('antoniohappy44@gmail.com', '$2y$10$XSbNB2UxHjzqRyqMKejhI.rL.zqpD6xdxhSqdUnFrKQQGQxHdm0dm', 'Antonio Jose', 'Chacon ', 'Serrano', '2002-08-02', 'es', '14900', '697428314', 'Admin'),
('hola@gmail.com', '$2y$10$c8W6P6PAIVypNE/.8Un/L.ZRAq05chkvyFFtBLoG0OPp.zRWtOlZK', 'j', 'j', '', '2024-01-31', 'de', '10000', '123456789', 'Usuario'),
('rafagomez@iesmarquesdecomares.org', '1234', 'Rafagg', 'Gomezff', 'Cruzff', '0000-00-00', 'es', '14965', '$$6000088', 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `ValoracionId` int(11) NOT NULL,
  `Usuario` varchar(255) DEFAULT NULL,
  `NoticiaId` int(11) DEFAULT NULL,
  `Puntuacion` int(11) DEFAULT NULL CHECK (`Puntuacion` between 1 and 5),
  `Comentario` text DEFAULT NULL,
  `FechaValoracion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`ValoracionId`, `Usuario`, `NoticiaId`, `Puntuacion`, `Comentario`, `FechaValoracion`) VALUES
(12, 'hola@gmail.com', 2, 5, '<p><strong>Menos mal que avisan!, <em>Antonio Fernandez</em></strong></p>', '02-02-2024'),
(13, 'antoniohappy44@gmail.com', 3, 4, '<p><u>Me ha venido genial de corazón,</u> <strong>Antonio..</strong></p>', '02-02-2024'),
(14, 'antoniohappy44@gmail.com', 5, 5, '<p><strong>ESO ES LO QUE HACE FALTA A DÍA DE HOY</strong></p>', '02-02-2024'),
(15, 'hola@gmail.com', 6, 3, '<p>Joe y yo que quería ir con mis chiquillos pasado mañana...</p>', '02-02-2024'),
(17, 'antoniohappy44@gmail.com', 1, 5, '<p>Información correspondiente a la realidad.</p>', NULL),
(18, 'albertoramos@gmail.com', 1, 3, '<p><u>Noticia de calidad,</u> <em>pero no lo haría ni loco jajaja</em></p>', '02-02-2024');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`NoticiaId`),
  ADD KEY `Autor` (`Autor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Correo`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`ValoracionId`),
  ADD KEY `Usuario` (`Usuario`),
  ADD KEY `NoticiaId` (`NoticiaId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `NoticiaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `ValoracionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`Autor`) REFERENCES `usuario` (`Correo`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Correo`),
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`NoticiaId`) REFERENCES `noticia` (`NoticiaId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
