const cepInput = document.getElementById('cep');

const showData = (result) => {
    for (const campo in result) {
        if (document.querySelector('#' + campo)) {
            document.querySelector("#" + campo).value = result[campo];
        }
    }
    
};

cepInput.addEventListener('blur', (e) => {
    let search = cepInput.value;
    const url = `https://viacep.com.br/ws/${search}/json`;
    // console.log(url);
    const options = {
        method: 'GET',
        mode: 'cors',
        cache: 'default'
    };

    fetch(url, options)
        .then(response => {
            response.json()
                .then(data => showData(data));
        })
        .catch(e => console.log('Deu Erro: ' + e.message));

});


//Máscaras de input

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
    },

    cep(value){
        return value
            .replace(/\D/g, "")
            .replace(/(\d{5})(\d)/, "$1-$2")
            .replace(/(-\d{3})\d+?$/, "$1");
    }


};

document.querySelectorAll('input').forEach(($input) => {
    const field = $input.dataset.js;
    $input.addEventListener('input', (e) => {
        e.target.value = masks[field](e.target.value);
    }, false);
});