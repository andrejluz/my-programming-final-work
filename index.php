<?php
session_start();
require_once  __DIR__ . '/private/layout/function.php';
require_once  __DIR__ . '/private/routes.php';
render (__DIR__ .'/private/layout/views/header.phtml');
$controller = '';
if (isset($_GET['page'])) {
   $controller =isset($routes[$_GET['page']]) ? $routes[$_GET['page']] : '';
    if (!empty($controller) && file_exists($controller)) {

        require_once $controller;
    } else {
        redirect('?page=page/error');
    }
} else {
    redirect('?page=home');
}
render (__DIR__ .'/private/layout/views/footer.phtml');









