<?php

session_start();

// print_r($_SESSION);
if (!($_SESSION['superAdminId'])) {
 header('location:../index.php');
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom-style.css">
    <link href="../fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <title>Railway</title>


    <style>
        body{
            /* background-color: antiquewhite; */
            background-color: #faebd7d6;
        }
    </style>
  </head>
  <body>


    