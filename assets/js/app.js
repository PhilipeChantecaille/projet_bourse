
$(document).ready( function() {
  $('.navbar-toggler').click(function() {

     $(".navbar-toggler>i").toggleClass("fa-times");
     $(".navbar-toggler>i").toggleClass("fa-bars");

  });




  $('.tuile>a, .wrapper a').click(function(){

    console.log(this);
    $('.carousel').carousel($(this).data("slide-to"));
  });




  // Oui c'est indigeste, mais c'est pour faire correspondre les trois endroits de la page où les ID devraient commencer à 1 au lieu de 0 pour être en correspondance avec la bdd
  let n=$('.p-4>a').length;
  for(var i=1 ; i<=n ; i++){
    $('.tuile:nth-child('+i+')>a,.p-4>a:nth-child('+i+')').data("slide-to", i-1);
     console.log($('.tuile:nth-child('+i+')>a').data("slide-to"));
  };
});


var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    var cloche = this.children[0];
    if (content.style.display === "block") {
      content.style.display = "none";
      cloche.classList.replace("fa-bell-o","fa-bell");
    } else {
      content.style.display = "block";
      cloche.classList.replace("fa-bell","fa-bell-o");
    }
  });
}

function fonctionDescendreInscription(){
  document.getElementsById("connexion").style.display="none";
  document.getElementsById("inscription").style.display="flex";
}
function fonctionDescendreConnexion(){
  document.getElementsById("connexion").style.display="flex";
  document.getElementsById("inscription").style.display="none";
}
