<?php
session_start();
  if(!(array_key_exists('type',$_SESSION)) || !isset($_SESSION['username']) || $_SESSION['type'] != '0') {
    session_destroy();
   header('Location: ../login');
  }
?>