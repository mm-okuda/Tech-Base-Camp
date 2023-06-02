<?php
  session_start();
  
  //セッションが残っていればページ遷移
  if(isset($_SESSION["logged_in"])){
    header("Location: index.php");
  }
  
  //IDとパスワードどちらも入力されているか判定
  if(empty($_POST) === false){
    if(empty($_POST["user_id"]) === false && empty($_POST["password"]) === false){
      require_once "db_connection.php";

      try{
        $stmt = $dbh->prepare("SELECT id, password FROM users WHERE name = ?");
        $stmt->execute([$_POST["user_id"]]);
        $correct_user = $stmt->fetch();

        //セッションにIDとログインしたらtrueを残す
        if(md5($_POST["password"]) === $correct_user["password"]){
          $_SESSION["login_id"] = $correct_user["id"];
          $_SESSION["logged_in"] = true;

          $dbh = null;
          header("Location: index.php");
          exit();
        }else{
          $SESSION["logged_in"] = false;
          echo "IDまたはパスワードが正しくありません";
        }
      }catch(PDOException $e){
        echo $e->getMessage();
        exit();
      }
      $dbh = null;
    }else{
      echo "IDとパスワードを入力してください";
    }
  }


  
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログインページ</title>
</head>
<body>
  <form action="login.php" method="post">
    ユーザーID<input type="text" name="user_id" value=""><br>
    パスワード<input type="text" name="password" value=""><br>
    <input type="submit" name="submit" value="認証">
  </form>
    
</body>
</html>