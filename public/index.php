<?php

use php\Bootstrap\Application;
use php_framework\src\Http\Server;
use php_framework\src\Session\Session;

//use php_framework\src\Http\Server\Server;
require __DIR__. '/../bootstrap/app.php';
require __DIR__.'/../vendor/autoload.php';
Application::run();
Session::start();
Session::set('a','b');
//echo "<pre>" ;
//print_r(Server::all());
//echo "</pre>" ;

