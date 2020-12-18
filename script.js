

let buttons = document.getElementsByClassName("addFilho");

for(var index in buttons){
  let button = buttons[index];

button.addEventListener("click", function(event){
  let currentButton = event.target;
  let parent = currentButton.parentNode;
  let inputFilho = parent.querySelector(".inputFilho");

  var filho = prompt("Digite o nome do filho: ");

   if (filho == null || filho == ""){
       alert("Nome do filho não pode estar vazio");
       event.preventDefault();
     } else {
       inputFilho.value = filho;
   }
});
}
