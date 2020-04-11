<?php
/**
 * Posto atvaizdavimas pagal id skaityti toliau
 *
 *
 *
 */


require_once  __DIR__ . '/../layout/function.php';
require_once  __DIR__ . '/../routes.php';


$id = $_GET['id'];



$posts= getPostById($id);

include(__DIR__ . '/../layout/views/postview.phtml');