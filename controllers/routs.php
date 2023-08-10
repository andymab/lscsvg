<?php

namespace controllers;

class Routs
{

  public function rout()
  {
    $url = isset($_GET['action']) ? $_GET['action'] : null;
   
    if ($url) {
      $url = rtrim($url, '/');
      $url = explode('/', $url);
    }

    if (!$url || empty($url[0])) {
      $controller = new index;
      return false;
      exit;
    }

    $file = 'controllers/' . $url[0] . '.php';

    if (file_exists($file)) {
      $class = "\controllers\\" . $url[0];
      $controller = new $class;
    } else {
      self::error("error/404", "Не найден контроллер -> " . $url[0]);
      return false;
    }

    switch (sizeof($url)) {
      case 1:
        $controller->index();
        break;
      case 2:
        if (method_exists($controller, $url[1])) {
          $controller->$url[1]();
        } else self::error("error/404", 'класс ' . $url[0] . " ищите метод -> " . $url[1]);
        break;
      case 3:
        if (!method_exists($controller, $url[1]))
          self::error("error/404", 'класс ' . $url[0] . " ищите метод -> " . $url[1]);
        else {
          $controller->$url[1]($url[2]);
        }
        break;
    }
  }

  public function error($page, $message)
  {
    $controller = new error;
    $controller->View->set_model(
      [
        'page' => $page,
        'message' => $message
      ]
    );
    $controller->index();
  }
}
