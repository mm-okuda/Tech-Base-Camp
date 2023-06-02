<?php
  session_start();

  if(isset($_POST["update_id"])){
    require_once "db_connection.php";
    
    
  }
  
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>編集画面</title>
</head>
<body>
    <form action="update_task2.php" method="post">
        件名<br>
        <input type="text" name="title" value=""><br>
        詳細<br>
        <textarea name="detail" rows="4"></textarea><br>
        <input type="hidden" name="id" value=<?php echo $_POST["update_id"]?>>
        <input type="submit" name="update" value="送信">
    </form>
    
</body>
</html>