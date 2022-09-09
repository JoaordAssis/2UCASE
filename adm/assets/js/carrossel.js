// const glide = require("@glidejs/glide");

let carrosselContainer = document.querySelector(".carrossel-container-box");

let glideCarrossel = new Glide(carrosselContainer, {
    type: 'carousel',
    startAt: 0,
    perView: 1
});

glideCarrossel.mount();