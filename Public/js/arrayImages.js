

    //Faire générer des inputs lors d'un clique sur button
    function myFunction() {

        let buttonAddInput = document.querySelector('.buttonAdd');

        buttonAddInput.addEventListener('click', function() {

            var li = document.createElement("li");
            var newInput = document.createElement("input");
            newInput.setAttribute('class', 'form-control input-size');
            newInput.setAttribute("name", "images[]");
            newInput.style.marginBottom = '5px';
            newInput.style.marginRight = '3px';
            newInput.setAttribute('type', 'url');
            li.appendChild(newInput);

            document.getElementById("myList").appendChild(li);
            var buttonRemoveInput = document.createElement("span");
            buttonRemoveInput.style.borderRadius = '50%';
            buttonRemoveInput.style.width = '30px';
            buttonRemoveInput.style.height = '30px';
            buttonRemoveInput.textContent = " - ";
            li.appendChild(buttonRemoveInput);

            buttonRemoveInput.addEventListener('click', function() {
                li.removeChild(newInput);
                li.removeChild(buttonRemoveInput);
            });
        });
    }
    myFunction();