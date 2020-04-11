<?php
require_once __DIR__ . '/../layout/function.php';

//$posts = getPost();
$posts = [];

$allPosts = getPost();

if (isset($_GET['p'])){
    $page = $_GET['p'];
}else {
    $page = 1;
}

$int = 5;
$iki = $page * $int;
$nuo = $iki - $int;

for ($i = $nuo; $i < $iki; $i++) {
    if (isset($allPosts[$i])) {
        $posts[]= $allPosts[$i];
    }

}
$pages = ceil(count($allPosts) / $int);

include (__DIR__ .'/../layout/views/content.phtml');