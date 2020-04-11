<?php

$category = $_GET['postCategory'];


$posts = getPostByICategory($category);


include (__DIR__ . '/../layout/views/postByCategory.phtml');