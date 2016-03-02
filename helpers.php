<?php
  function url($url) {
    global $base_url;
    return $base_url . $url;
  }

  function view($route) {
    $args = func_get_args();
    if (isset($args[1])) {
      foreach ($args[1] as $key => $value) {
        $$key = $value;
      }  
    }

    ob_start();
    require_once($route);
    $result = ob_get_contents();
    ob_end_clean();

    return $result;
  }