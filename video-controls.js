var miVideo = document.getElementById("miVideo");

function playPause() { 
    if (miVideo.paused) {
        miVideo.play(); 
        document.getElementById("playPauseIcon").classList.remove("fa-play");
        document.getElementById("playPauseIcon").classList.add("fa-pause");
    } else {
        miVideo.pause(); 
        document.getElementById("playPauseIcon").classList.remove("fa-pause");
        document.getElementById("playPauseIcon").classList.add("fa-play");
    }
}


function toggleMute() {
    var video = document.getElementById("miVideo");
    var muteIcon = document.getElementById("muteIcon");

    video.muted = !video.muted;

    muteIcon.style.opacity = video.muted ? "0.3" : "1"; // Cambia la opacidad según el estado del mute
}

function subirVolumen() {
    var video = document.getElementById("miVideo");
    if (video.volume < 1) video.volume += 0.1;
}

function bajarVolumen() {
    var video = document.getElementById("miVideo");
    if (video.volume > 0) video.volume -= 0.1;
}

