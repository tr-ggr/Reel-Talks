<?php
    include 'connect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
  </head>
  <body data-bs-theme="dark">
    <div class="header">
      <div class="header-logo"></div>
      <div class="header-buttons">
        <button
          class="Home"
          onClick='window.location.replace("index.php")'
          >
          HOME
        </button>

        <?php 
          echo (isset($_SESSION['userid'])) ? '<button class="Community" onClick="window.location.replace(\'homepage.php\')">COMMUNITY</button>' : '<button class="Community" onClick="window.location.replace(\'notloggedin.php\')">COMMUNITY</button>';
        ?>

        
        <button class="Contact Us">CONTACT US</button>
        <button class="About Us">ABOUT US</button>
      </div>
    </div>

    <!-- style="border-bottom: #76abae solid 5px; color: #fdfdfd" -->