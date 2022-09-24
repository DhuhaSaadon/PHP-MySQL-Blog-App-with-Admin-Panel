<?php
 require '../partials/header.php';

 // check login status
  if(!$_SESSION['user-id']){
    header('location: ' . ROOT_URL . 'signin.php');
    die();
  }

