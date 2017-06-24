<?php
// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

$routes = array(
                "/" => "home",
                "/contact" => "contact",
                "/crew-search" => "crew-search",
                "/dashboard" => "dashboard",
                "/documentation" => "documentation",
                "/entry-list" => "entry-list",
                "/gallery" => "gallery",
                "/links" => "links",
                "/login" => "login",
                "/media" => "media",
                "/results" => "results",
                "/schedule" => "schedule",
                "/sponsors" => "sponsors"
              );

if(isset($routes[$request_uri[0]])) {
  require_once('./app/view/'.$routes[$request_uri[0]].'.php');
} else {
  header('HTTP/1.0 404 Not Found');
  require_once('./app/view/404.php');
}
