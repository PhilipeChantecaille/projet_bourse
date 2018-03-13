<?php

namespace Controllers;
use Models\Users;
use Models\Actions;


class IndexController extends Controller{

function editProfile(){
  global $blade;
  if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $user = Users::getInstance()->get($id);
    echo $blade->render('profile' , ['user' => $user]);
  }else{
    redirect('/');
  }
}

function saveProfile(){
  global $blade;

  $id = $_POST['id'];
  $user = Users::getInstance()->get($id);

  if(sha1($_POST['password_old']) == $user['password'] && sha1($_POST['password_new']) != $user['password'] && $_POST['password_new'] == $_POST['password_verif']){
    $datas = ['email' => $_POST['email'] , 'password' => sha1($_POST['password_new'])];
    Users::getInstance()->edit($id , $datas);
    IndexController::envoieMail();
    session_destroy();
    redirect('/');
  }
}

function backofficeIndex(){
    global $blade;

    $listUsers = Users::getInstance()->getAll();

     echo $blade->render(
        'bo',
        ['users'=>$listUsers]
      );
}


function connectedPage(){
  global $blade;
  $actions=Actions::getInstance()->getAll();
  if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $user = Users::getInstance()->get($id);
    echo $blade->render(
        'stats',
        ['actions'=>$actions, 'user' => $user]
      );
  }

}

function deconnectedPage(){
  $_SESSION['login']='';
  $_SESSION['password']='';
  session_destroy();
  redirect('/');
}

function backofficeDelete(){
  $id = $_POST['id'];
  Users::getInstance()->delete( $id );
  redirect('/bo');

}

function backofficeUpgrade(){
   $id = $_POST['id'];
   Users::getInstance()->edit($id, ['role'=>'admin']);
   redirect('/bo');
}
function backofficeDeactivaded(){
   $id = $_POST['id'];
   Users::getInstance()->edit($id, ['active'=>'1']);
   redirect('/bo');
}
function backofficeReactivaded(){
   $id = $_POST['id'];
   Users::getInstance()->edit($id, ['active'=>'0']);
   redirect('/bo');
}
function backofficeDowngrade(){
  $id = $_POST['id'];
  Users::getInstance()->edit($id, ['role'=>'user']);
  redirect('/bo');
  }

function envoieMail(){
  if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $_POST['email'])){
              $passage_ligne = "\r\n";
            }

            else
            {
              $passage_ligne = "\n";

            }
  $boundary = "-----=".md5(rand());
            //Création header pour mail
  $header = "From: noreply@tradeheaven.com".$passage_ligne;
  $header .= "MIME-Version: 1.0".$passage_ligne;
  $header .= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

              // On retourne le mot de passe généré aléatoirement

  mail($_POST['email'], 'Mot de passe - Trade Heaven', 'Votre mot de passe a bien été modifié.', $header);
}

}
