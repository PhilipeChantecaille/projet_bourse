<?php

namespace Controllers;
use Models\Base;
use Models\Users;



class LoginController extends Controller{

  public function loginPage(){
    if (isset($_SESSION['login'])){  //Lorsque l'utilisateur est deja connecté

      redirect('/stats'); // Accès à l'espace connecté
    }

    else { // Si pas connecté affichage de l'espace connexion
      global $blade;
      $logins = Users::getInstance()->getAll();
      if (!isset($_SESSION['error'])){
      $_SESSION['error'] = false; //si c'est vide, c'est faux
      }
      //dump($_SESSION['error']);die();
      echo $blade->render(
      'login', // appel de la view
      ['error' => $_SESSION['error']]
      );
    }
  }

  public function login(){

    $logins = Users::getInstance()->getAll();

    if(!empty($_POST['password']) AND !empty($_POST['login'])){ // Si champs pas vides
<<<<<<< HEAD
      
      $loginconnect = str_replace(' ', '-', $_POST['login']); // Recuppération login sans caractères spéciaux
      $loginconnect = preg_replace('#[^A-Za-z0-9]+#', '', $loginconnect);

=======

      $loginconnect = $_POST['login']; // Récupération des variables
>>>>>>> ca6d0083f3e4a944d9dcfdad8836c3c47d975e67
      $passwordconnect = sha1($_POST['password']); // Conversion en Sha1

          // dump($logins);
          // dump($passwordconnect);
          // dump($loginconnect);die;

      foreach ($logins as $login) {


        if ($login['pseudo'] == $loginconnect AND $login['password'] == $passwordconnect) {    // Si pseudo & mdp correct
          $_SESSION['login']=$login['pseudo'];
          $_SESSION['id']=$login['id'];
          redirect('/stats'); // acces aux stats
          break;
        }
      }
      $_POST=null; // Vider les champs & variables
      $loginconnect=null;
      $passwordconnect=null;
      $_SESSION['error'] = true;
      // Message erreur 'Pseudo ou mdp incorrects'

     redirect('/');
    }
    else{
      redirect('/');
        // Afficher message erreur 'Champs vides'
    }

}


  public function signup(){
    if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['emailverif']) AND $_POST['email'] == $_POST['emailverif']){ // Si champs pas vides

        // Définition de la taille du mot de passe aléatoire
        $longueur = 10;
        // On initialise la variable $mdp
        $mdp="";
        // Je définie les caractères possibles dans le mot de passe
        $caract = "AaBbCcDdEeFfGgHhIiJjKkLlMmNn#OoPpQqRrSsTtUuVvWwXxYyZz0123456789";
        // On cherche à obtenir le nombre de caractères dans la chaîne précédent et nous utiliserons plus tard
        $longueurMax = strlen($caract);
        // initialiser le compteur
        $i = 0;
        // ajouter un caractère aléatoire à $mdp jusqu'à ce que $longueur soit atteint
        while ($i < $longueur) {
        // prendre un caractère aléatoire
        $caractere = substr($caract, mt_rand(0, $longueurMax-1), 1);
                        $mdp= $mdp + $caractere;
                }
                // On retourne le mot de passe généré aléatoirement
                $datas = ['email' => $_POST['email'] , 'password' => sha1($mdp), 'pseudo' =>$_POST['pseudo']];
                Users::getInstance()->add($datas);
                mail($_POST['email'], 'Mot de passe - Trade Heaven', 'Votre mot de passe est :' . $mdp);
            }
            else{
             $err = true;
            }
          }

/*
  public function loginPage(){
    global $blade;
    if(isset($_SESSION['login'])){
    // s'il est bien login, index sinon redirigé pour se login

      $tilesList = Tile::getInstance()->getAll();
      echo $blade->render(
        'VUEAPPLI',
        [

        ]
      );

    }else{
      echo $blade->render(
        'VUEPRINCIPALE',
        [

        ]
      );
    }
  }*/
// }

}

