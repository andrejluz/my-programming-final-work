<?php
require_once __DIR__ . '/../../layout/function.php';
require_once __DIR__ . '/../../routes.php';




if (!isset($_GET['id']))

{
    redirect('?page=home');

}

$id = $_GET['id'];

$posts = getPostById($id);


if (!empty($_POST)) {

        $post = [
            'postTitle'     => $_POST['postTitle'],
            'postMessage'   => $_POST['postMessage'],
            'postCategory'  => $_POST['postCategory'],
            'id' => $id

    ];

    updatePost($id, $post);

    redirect('?page=home');
}

if (empty($posts)) {

    redirect('?page=home');
}

$postTitle = $posts['postTitle'];
$category = $posts['postCategory'];
$message = $posts['postMessage'];
$postid = $posts['id'];
$action = "?page=admin/updateposts&id=$postid";

include(__DIR__. '/../layout/views/form.phtml');

//render(__DIR__ . '/views/form.phtml', ['action' => "?page=admin/updateposts&id=$id"]);


