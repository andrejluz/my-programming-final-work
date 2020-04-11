<?php



require_once __DIR__ . '/../../layout/function.php';
require_once __DIR__ . '/../../routes.php';


    $id = $_GET['id'];

    deletePosts($id);

    redirect('?page=home');





