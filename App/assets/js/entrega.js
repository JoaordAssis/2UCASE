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