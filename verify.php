<?php
if(isset($_POST["action_post"]))$action_post=$_POST["action_post"];else $action_post="";

if($action_post=="login"){
    session_start();
    $user_name=$_POST["user_name"];
    $user_password=$_POST["password"];
    include "conn.php";
    $sql = "SELECT * FROM user WHERE user_username='$user_name' and user_password='$user_password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION["user_id"]=$row["user_id"];
        $_SESSION["user_name"]=$row["user_name"];
        header('Location: admin');
    }
    } else {
        $_SESSION["error"]="login_fail";
        header('Location: ./');
    }
    $conn->close();
}
?>