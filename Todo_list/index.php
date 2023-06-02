<?php
  session_start();

  if(isset($_SESSION["logged_in"]) == false || $_SESSION["logged_in"] != true){
    header("Location: login.php");
  }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My Todo List</title>
</head>
<body>
    <h1>My Todo List</h1>
    <p>新しいTodoを追加</p>
    <form action="add_task.php" method="post">
        件名<br>
        <input type="text" name="title" value=""><br>
        詳細<br>
        <textarea name="detail" rows="4"></textarea><br>
        <input type="submit" name="add" value="追加する"><br>
    </form>

    <table>
        <thead>
            <tr>
              <th>件名</th>
              <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "db_connection.php";

            $SQL = "SELECT * FROM tasks";
            $stmt = $dbh->prepare($SQL);
            $stmt->execute();

            while($task = $stmt->fetch()){
              //ユーザーが入力した内容なので悪意ある内容を無害化する
              $task["title"] = htmlentities($task["title"], ENT_QUOTES, "UTF-8");
              $task["detail"] = htmlentities($task["detail"], ENT_QUOTES, "UTF-8");

              echo
              "<tr>
                <td>";
                    echo $task['title'];
                echo 
                "</td>
                <td>";
                    echo $task['detail'];
                echo
                "</td>
                <td>";
                ?>
                    <form action="done_task.php" method="post">
                        <button type="submit" name="done_id" value=<?php echo $task["id"];?>>完了</button>
                    </form>
                <?php
                echo
                "</td>
                <td>";
                ?>
                    <form action="delete_task.php" method="post">
                        <button type="submit" name="delete_id" value=<?php echo $task["id"];?>>削除</button>
                    </form>
                <?php
                echo
                "</td>
                <td>";
                ?>
                    <form action="update_task.php" method="post">
                        <button type="submit" name="update_id" value=<?php echo $task["id"];?>>編集</button>
                    </form>
                <?php
                echo
                "</td>
              </tr>";
            }
            ?>

        </tbody>
    </table>
    
</body>
<footer>
    <a href="logout.php"><button>ログアウト</button></a>
</footer>
</html>