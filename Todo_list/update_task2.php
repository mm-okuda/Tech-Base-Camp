<?php

  session_start();

  if(isset($_POST)){
  require_once "db_connection.php";

  $stmt = $dbh->prepare("UPDATE tasks SET title = ?, detail = ? WHERE id = ? AND user_id = ?");

  $stmt->execute([$_POST["title"], $_POST["detail"], $_POST["id"], $_SESSION["login_id"]]);

  header("Location: index.php");
  }else{
    echo "編集できませんでした。";
  }
?>