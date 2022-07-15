import Glide from "@glidejs/glide";



let glideInst = new Glide(".glide", {
  type: "carousel",
  startAt: 0,
  perView: 1,
});

glideInst.mount();