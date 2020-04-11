<?php

function render($view, $data = [])
{
    extract($data);
    include $view;
}

function redirect($url)
{
    header('Location:'.$url);
    exit;
}


function getPost()
{
    $postString = file_get_contents(__DIR__ . '/../post.json');
    $posts = json_decode($postString, true);

    return $posts;
}

function savePost($post)
{
    $str = json_encode($post);
    file_put_contents(__DIR__ . '/../post.json', $str);
}


function deletePosts($id)
{
    $posts = getPost();
    foreach($posts as $key => $post) {
        if ($post['id'] == $id) {
            unset($posts[$key]);
        }
    }

    savePost($posts);
}

function getPostById($id)
{
    $posts = getPost();
    foreach($posts as $post) {
        if ($post['id'] == $id) {
            return $post;
        }
    }

    return [];
}

function updatePost($id, $post)
{
    $posts = getPost();

    foreach($posts as $key => $oldPosts) {
        if ($oldPosts['id'] == $id) {
            $posts[$key] = $post;
            break;
        }
    }

    savePost($posts);
}

function getUser()
{
   $userString = file_get_contents(__DIR__ . '/../user.json');
    $user = json_decode($userString, true);

    return $user;
}

function login($input)
{

    $users = getUser();

  if (isset($input)) {
      if ($input['username'] == $users['username'] && $input['password'] == $users['password']) {
            $_SESSION['admin'] = true;
          return $_SESSION['admin'];
      } else {

          return false;
      }

  }

}

function isLoggedIn()
{
    if (!isset($_SESSION['admin'])) {
        return false;
    }

    $users = getUser();

       if (isset($_SESSION['admin']))
        {
             return ucfirst($users['username']);
        }

}

function logout()
{
       session_destroy();

}

function postCut($posts) {

    $taskas = strpos($posts,'.');
    $simboliuKiekis =strlen($posts);
    $sakinys = substr($posts,0,150);


    return $sakinys . '...';

}

function getPostByICategory($category)
{
    $posts = getPost();
    foreach($posts as $post) {
        if ($post['postCategory'] == $category) {
            return $post;
        }
    }

    return [];
}
