<?php
require_once('weatherapi/Router.php');
/**
 * Created by JetBrains PhpStorm.
 * User: liyajie1209
 * Date: 9/9/13
 * Time: 4:39 PM
 * To change this template use File | Settings | File Templates.
 */
$router = Router::getInstance(); // init router
$router->addRule('/books/:id/',array('controller' => 'books', 'action' => 'view')); // add simple rule
// add some more rules
$router->start(); // execute router