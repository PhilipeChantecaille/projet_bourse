<?php
$route->addRoute( 'GET'  , '/' ,         'LoginController@loginPage' );

//Route backoffice
$route->addRoute( 'GET'   , '/bo' ,       'IndexController@backofficeIndex' );
$route->addRoute( 'POST'  , '/bo/delete' , 'IndexController@backofficeDelete' );
$route->addRoute( 'POST'  , '/bo/upgrade' , 'IndexController@backofficeUpgrade' );
$route->addRoute( 'POST'  , '/bo/deactivaded' , 'IndexController@backofficeDeactivaded' );



$route->addRoute( 'GET'  , '/profile' ,  'IndexController@editProfile' );
$route->addRoute( 'POST' , '/profile' ,  'IndexController@saveProfile' );
$route->addRoute( 'GET'  , '/stats' ,    'IndexController@connectedPage' );


$route->addRoute( 'POST'  , '/deco' ,    'IndexController@deconnectedPage' );
// $route->addRoute( 'POST' , '/deco' ,    'IndexController@deconnectedPage' );

// Route appelée quand on valide l'un des deux formulaires
$route->addRoute( 'POST' , '/login' , 'LoginController@login' );
$route->addRoute( 'POST' , '/signup', 'LoginController@signup' );
?>
