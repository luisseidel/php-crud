<?php
    function url(){
        return sprintf(
          "%s://%s",
          isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
          $_SERVER['SERVER_NAME'],
        );
    }
      
    $url = url();
    
    if (isset($_GET['send']) && isset($_GET['username'])) {
        $params = "&username=" . $_GET['username'] . "&send=" . $_GET['send'];
        
        $url .= "/php-crud/?page=profile$params";
        header("Location: $url");
    }
?>