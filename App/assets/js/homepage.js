
// Variaveis

let carrosselPrincipal = document.querySelector(".carrossel-container-box");
let carrosselProd = document.querySelector(".prod-container-box");
let carrossel3Like = document.querySelector(".prod-container-box-like");
let carrossel4Sell = document.querySelector(".prod-container-box-sell");

// Primeiro carrosel Banners

let carrosselBanner = new Glide(carrosselPrincipal, {
  type: "carousel",
  autoplay: 5000,
  startAt: 0,
  perView: 1,
});
    
carrosselBanner.mount();

// Segundo carrosel Produtos

let carrosselProdFirst = new Glide(carrosselProd, {
  type: "carousel",
  startAt: 0,
  perView: 4,
  autoplay: 1500,
  gap: 2,
  breakpoints: {
    800: {
      perView: 3,
    },
    600: {
      perView: 2,
    },
    500: {
      perView: 1,
    },
  },
});

carrosselProdFirst.mount();

// Terceiro carrosel Produtos mais curtidos

let carrosselProdLikes =  new Glide(carrossel3Like, {
  type: "carousel",
  startAt: 0,
  perView: 4,
  autoplay: 1500,
  gap: 2,
  breakpoints: {
    800: {
      perView: 3,
    },
    600: {
      perView: 2,
    },
    500: {
      perView: 1,
    },
  },
});

carrosselProdLikes.mount();





// Quarto carrosel Produtos mais vendidos

let carrosselProdSell = new Glide(carrossel4Sell, {
  type: "carousel",
  startAt: 0,
  perView: 4,
  autoplay: 1500,
  gap: 2,
  breakpoints: {
    800: {
      perView: 3,
    },
    600: {
      perView: 2,
    },
    500: {
      perView: 1,
    },
  },
});

carrosselProdSell.mount();


