<?php
require_once __DIR__ . '/../../layout/function.php';
require_once __DIR__ . '/../../routes.php';

if (login($_POST) == true)
{
    if (isset($_SESSION['admin']))
    {
        $users = getUser();

       redirect('?page=home');
    }
}

if ($_POST['username'] == '' || $_POST['password'] == '') {

    redirect('?page=page/error');
    return false;

}



if (login($_POST) == false && !empty($_POST)) {

    redirect('?page=page/error');
    return false;

}








