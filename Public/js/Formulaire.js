
function checkEmail() {

  var email = document.getElementById('exampleInputEmail1');
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  /* La méthode test vérifie s'il y a une correspondance entre un texte et une expression rationnelle
  elle retourne true en cas de succès ou false dans le cas contraire*/
  if (!filter.test(email.value)) {
    alert('Veuillez entrer une adresse email correct !');
    return false;
  }
}














