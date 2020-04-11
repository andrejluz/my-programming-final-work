<?php

require_once __DIR__ . '/../../layout/function.php';
require_once __DIR__. '/../../routes.php';

if (isset($_POST['submit']))
{
    $posts = getPost();
    $post = [
        'postTitle' => $_POST['postTitle'],
        'postMessage' => $_POST['postMessage'],
        'postCategory' => $_POST['postCategory'],
        'id' => $posts[count($posts) - 1]['id'] + 1
    ];
    $posts[] = $post;
    savePost($posts);
    redirect('?page=home');
}
render(__DIR__ . '/views/form.phtml', ['action' => '?page=admin/addpost']);