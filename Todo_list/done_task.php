<?php
  session_start();
  
  if(isset($_POST["done_id"])){
    require_once("db_connection.php");

    $stmt = $dbh->prepare("UPDATE tasks SET done = 1 WHERE id = ?");
    $stmt->execute([$_POST["done_id"]]);

    header("Location: index.php");
  }else{
    echo "完了しませんでした。";
  }
?>