class Payment {
  accordionFunction() {
    let acc = document.getElementsByClassName("accordion");
    let i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        let panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  }

  accordionAnimation() {
    let acc = document.getElementsByClassName("accordion");
    let i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        let panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    }
  }

  modalVerMais(){
    let modalCOntainer = document.getElementById("modal-container");
    let modalContainerMobile = document.getElementById("modal-container-mobile");

    if (window.innerWidth >= 1120){
      modalCOntainer.style.display = 'flex';
      modalContainerMobile.style.display = 'none';
    }

    if (window.innerWidth <= 1120){
      modalCOntainer.style.display = 'none';
      modalContainerMobile.style.display = 'flex';
    }
  }

  closeModal(){
    let modalCOntainer = document.getElementById("modal-container");
    let modalContainerMobile = document.getElementById("modal-container-mobile");

    modalContainerMobile.style.display = 'none';
    modalCOntainer.style.display = 'none';

  }
}

const masks = {
  cpf(value) {
    return value
      .replace(/\D/g, "")
      .replace(/(\d{2})(\d)/, "$1.$2")
      .replace(/(\d{3})(\d)/, "$1.$2")
      .replace(/(\d{3})(\d)/, "$1-$2")
      .replace(
        /(\d{2}).(\d)(\d{2}).(\d)(\d{2})-(\d)(\d)/,
        "$1$2.$3$4.$5$6-$7"
      )
      .replace(/(-\d{2})\d+?$/, "$1");
  },
  month(value){
    return value
        .replace(/\D/g, "")
        .replace(/(\d{2})(\d{4})/, "$1/$2")
  },

  number(value){
    return value
        .replace(/\D/g, "");
  }
};

document.querySelectorAll('input').forEach(($input) => {
  const field = $input.dataset.js;
  $input.addEventListener('input', (e) => {
    e.target.value = masks[field](e.target.value);
  }, false);
});

let payment = new Payment();


payment.accordionFunction();

payment.accordionAnimation();