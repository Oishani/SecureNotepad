<?php
  session_start();
  if(array_key_exists("id", $_COOKIE) && $_COOKIE ['id']) {
    $_SESSION["id"] = $_COOKIE["id"];
  }
  if (array_key_exists("id", $_SESSION)) {
    include("connection.php");

          $query = "SELECT note FROM `np` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
          $row = mysqli_fetch_array(mysqli_query($link, $query));

          $notepadContent = $row['note'];

        } else {

            header("Location: index.php");

        }

    	include("header.php");

    ?>
    <nav class="navbar navbar-light bg-faded navbar-fixed-top">


      <a class="navbar-brand" href="#">Secure Notepad</a>

        <div class="pull-xs-right">
          <a href ='index.php?logout=1'>
            <button class="btn btn-outline-success" type="submit">Logout</button></a>
        </div>

    </nav>



        <div class="container-fluid" id="containerloggedinpage">

            <textarea id="note" class="form-control"><?php echo $notepadContent; ?></textarea>
        </div>
    <?php

        include("footer.php");
    ?>
