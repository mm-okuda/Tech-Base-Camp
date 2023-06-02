<?php

  session_start();
  
  if(isset($_POST["delete_id"])){
  require_once "db_connection.php";

  $stmt = $dbh->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");

  $stmt->execute([$_POST["delete_id"], $_SESSION["login_id"]]);

  echo "削除されました。";

  header("Location:index.php");

  }else{
    echo "削除できませんでした。";
  }


  

  