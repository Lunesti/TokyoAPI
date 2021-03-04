
    //Faire générer des inputs lors d'un clique sur button
    function myFunction() {

        let buttonAddInput = document.querySelector('.buttonAdd');

        buttonAddInput.addEventListener('click', function() {

            var node = document.createElement("li");
            var textnode = document.createElement("input");
            textnode.style.marginBottom = '5px';
            textnode.style.marginRight = '3px';
            textnode.setAttribute('type', 'url');
            node.appendChild(textnode);

            document.getElementById("myList").appendChild(node);
            var buttonRemoveInput = document.createElement("span");
            buttonRemoveInput.style.borderRadius = '50%';
            buttonRemoveInput.style.width = '30px';
            buttonRemoveInput.style.height = '30px';
            buttonRemoveInput.textContent = " - ";
            node.appendChild(buttonRemoveInput);

            buttonRemoveInput.addEventListener('click', function() {
                node.removeChild(textnode);
                node.removeChild(buttonRemoveInput);
            });
        });
    }

    myFunction();