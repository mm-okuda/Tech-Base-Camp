<?php
  $dsn = "mysql:host=localhost; dbname=php_todoapp; charset=utf8";
  $user = "testuser";
  $pass = "testpass";

  try{
      $dbh = new PDO($dsn, $user, $pass);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if($dbh == null){

      }
      else{
        echo "接続成功！";
      }
  }catch(PDOException $e){
    die("PDO Error:" . $e->getMessage());
  }

