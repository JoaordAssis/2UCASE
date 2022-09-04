/* Media Queries INFORMAÇÕES DO PRODUTO*/

@media (max-width: 480px) {

    .container-img-produto #image-principal {
        width: 250px;
    }

    .carousel-imgprod img {
        width: 80px;
    }
}

@media (max-width: 400px) {

    .container-img-produto #image-principal {
        width: 250px;
    }
    /* CARROSSEL SEM OS CONTROLES */
    .carousel-imgprod {
        display: none;
    }

    .container-produto .box-produto-info{
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 1rem;
    }

    .box-value-stars{
        display: flex;
        flex-direction: column;
        gap: .5rem;
    }

    .select-option-prod{
        display: flex;
        flex-direction: column;
    }

    .select-option-prod select{
        width: 100%;
    }
}

@media (max-width: 350px) {

    .select-option-prod select {
        width: 80%;
    }

    #btn-carrinho{
        width: 80%;
    }

    .cep-container {
        display: flex;
        flex-direction: column;
        max-width: 100%;
        gap: 1rem;
    }

    .cep-container input {
        padding: 1rem;
        border: 1px solid var(--cor-principal);
        border-radius: 15px;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
        border-right: 1px solid var(--cor-principal);
    }

    .cep-container #principal-button {
        padding: .8rem;
        text-transform: capitalize;
        font-weight: 400;
        border-radius: 0;
        width: 100%;
    }

}

/* Media Queries CARROSSEL DE PRODUTO, INFORMAÇÕES DO PRODUTO, BENEFICIOS DO PRODUTO*/

@media (max-width: 1500px) {
    .homepage-prod-carrossel {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 80vw;
        gap: 5rem;
    }
}

@media (max-width: 1200px) {
    .container-about-prod{
        width: 80vw;
    }

    .container-image-about img{
        width: 300px;
    }

    .produto-box img {
        width: 200px;
    }

    .produto-box h4 {
        font-weight: bold;
        max-width: 150px;
        text-align: center;
    }

    .homepage-beneficios {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
        width: 80vw;
    }
}

@media (max-width: 800px) {
    .container-about-prod {
        width: 100vw;
        padding: 1rem;
    }

    .box-about{
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .container-image-about img {
        width: 400px;
    }

    .homepage-prod-carrossel {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 90vw;
        gap: 5rem;
    }
}

@media (max-width: 500px) {
    .box-about {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .box-about p{
        max-width: 40rem;
        width: 100%;
    }

    .container-image-about img {
        width: 300px;
    }


    .homepage-prod-carrossel {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100vw;
        gap: 5rem;
    }
}

@media (max-width: 350px) {
    .box-about p {
        max-width: 30rem;
        width: 100%;
    }

    .container-image-about img {
        display: none;
    }

    .produto-box img {
        width: 150px;
    }

    .homepage-prod-carrossel .glide__arrow {
        display: none;
    }
}