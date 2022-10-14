class NavBarActive{


    ativarBarraNavegacao() {
        let botaoMobile = document.getElementById("menu-button");
        let menuMobile = document.getElementById("nav-mobile");

        botaoMobile.addEventListener('click', () => {
            menuMobile.classList.toggle('active');
        });
    }
}

let navbar = new NavBarActive();
navbar.ativarBarraNavegacao();

let containerSubmenu = document.querySelectorAll("#submenu-container-call");

function dropdownSubMenu(index){
    containerSubmenu[index].classList.toggle('active');
}