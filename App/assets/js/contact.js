class contactAnimation{
    accordionFunction() {
        let acc = document.getElementsByClassName("accordion");
        let i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function () {
            this.classList.toggle("active");

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
}

let accordion = new contactAnimation();

accordion.accordionFunction();
accordion.accordionAnimation();


//Máscaras de input

const masks = {
    phone(value) {
        return value
            .replace(/\D/g, "")
            .replace(/^(\d{2})(\d)/g, "($1) $2")
            .replace(/(\d)(\d{4})$/,"$1-$2");
    }
};

document.querySelectorAll("input").forEach(($input) => {
    const field = $input.dataset.js;
    $input.addEventListener(
        "input",
        (e) => {
            e.target.value = masks[field](e.target.value);
        },
        false
    );
});



//Troca de perguntas

let allButtons = document.querySelectorAll(".question-buttons button");

allButtons.forEach((element) => {
    element.addEventListener('click', () => {

        element.style.backgroundColor = '#fb745d';
    });
});