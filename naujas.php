<?php
$post = [
    'namas1',
    'namas2',
     'namas2',
    'namas2',
    'namas3',
    'namas3',
    'namas3',
];
$a = [];

for ($i = 0; $i < count($post); $i++)
{

            if ($post[$i] == $post[$i+1]) {

            $a = $post[$i];
    }

    var_dump($a);
}

