let lista = { "pessoas": [
            {
               "nome": "Maria",
               "filhos": []
            },
            {
              "nome": "Marcelo",
              "filhos": []
            },
            {
              "nome": "Tiago",
              "filhos": []
            }]
          };

          


          $.getJSON("testJSON.json", function(data) {
            var myData = data.pessoas;
          });








let form = document.getElementById("form1");
let nome = document.getElementById('input-nome');
let incluir = document.getElementById('incluir');
let paragrafo = document.getElementById('item1');

    function incluirPessoa(event) {

        //event.preventDefault();
        let text = nome.value;
        let novaPessoa = { "nome": text, "filhos": []};
        lista.pessoas.push(novaPessoa);
        console.log(pessoas);
  }

form1.addEventListener("submit", incluirPessoa);

let pessoasJSON = JSON.stringify(lista);


lista.pessoas.forEach(function(pessoa){
   paragrafo.innerHTML += "<li>" + pessoa.nome + "</li>";
});

let textarea = document.getElementById('json-text');

textarea.innerHTML = pessoasJSON;
