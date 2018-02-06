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
    dump($_SESSION);
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


function connectedPage(){
  global $blade;
  $actions=Actions::getInstance()->getAll();

     echo $blade->render(
        'stats',
        ['actions'=>$actions]
      );
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

}
