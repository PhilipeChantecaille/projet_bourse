<?php

namespace Controllers;
use Models\Users;


class IndexController extends Controller{

function editProfile(){
  global $blade;

  $id = $_SESSION['id'];
  $user = Users::getInstance()->get($id);
  echo $blade->render('profile' , ['user' => $user]);
}

function saveProfile(){
  global $blade;

  $id = $_POST['id'];
  $user = Users::getInstance()->get($id);

  if(sha1($_POST['password_old']) == $user['password'] && sha1($_POST['password_new']) != $user['password'] && $_POST['password_new'] == $_POST['password_verif']){
    $datas = ['email' => $_POST['email'] , 'password' => sha1($_POST['password_new'])];
    Users::getInstance()->edit($id , $datas);
    redirect('/stats');
  }else{
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

<<<<<<< HEAD
function connectedPage(){
  global $blade;


     echo $blade->render(
        'stats',
        []
      );
}

function deconnectedPage(){
  $_SESSION['login']='';
  $_SESSION['password']='';
  session_destroy();
=======
}

function backofficeDelete(){
  $id = $_POST['id'];
  Users::getInstance()->delete( $id );
    redirect('/bo');
>>>>>>> 37b17b86ffd68a44bc76378bb39a5f7d1a36798c

  redirect('/');
}

/*

function backofficeUpgrade(){
   $id = $_POST['id'];
   Users::getInstance()->edit($id, ['role'=>'admin']);
   redirect('/bo');

}


<<<<<<< HEAD
=======
}
>>>>>>> 37b17b86ffd68a44bc76378bb39a5f7d1a36798c
