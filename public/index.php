<?php

use php\Bootstrap\Application;
use php_framework\src\bootstrap\app;
use php_framework\src\Http\Request;
use php_framework\src\Http\Server;
use php_framework\src\Session\Session;

require __DIR__. '/../bootstrap/app.php';
require __DIR__.'/../vendor/autoload.php';
Session::start();
// echo Request::has('id',$_GET);
echo Request::set('id','4444');
echo Request::has('id',$_GET);

// echo Request::value('id');
// echo Request::getFullUrl();
// echo Request::get('id');
//  Request::handle();
//  echo Request::setBaseUrl();
//  Request::getUrl();
// $baseUrl = Request::getBaseUrl();
// echo $baseUrl; 
// echo Server::has('SERVER_SOFTWARE');
// echo '<pre>';
// print_r(Server::all());
// echo '</pre>';
// // Session::set('name','ahmed');
// Session::set('des','ahmedfsdd');
// echo '<pre>';
// print_r(Session::all());
// echo '</pre>';
// echo Session::destroy();
// unset($_SESSION['des']);
// echo Session::flash('des');
// echo Session::get('des');


// echo '<pre>';
// print_r( Session::all());
// echo '</pre>';
// // echo Session::get('name_!');
// echo Session::has('name');
// Application::run();