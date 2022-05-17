<?php

// search routeing
// $router->map('GET', '/search', 'App\Controllers\SearchController@search', 'search');
$router->map('GET','/search' , 
'App\Controllers\SearchController@search' ,'search_product');
?>