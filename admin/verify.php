<?php
if(isset($_POST["action_post"]))$action_post=$_POST["action_post"];else $action_post="";
if(isset($_GET["action_get"]))$action_get=$_GET["action_get"];else $action_get="";

//กรณีรับค่าแบบ POST
if($action_post=="add_student"){
    $std_id = $_POST["std_id"];
    $std_prefix = $_POST["std_prefix"];
    $std_name = $_POST["std_name"];
    $std_class = $_POST["std_class"];
    $std_phone = $_POST["std_phone"];
    include_once "../conn.php";
    $sql = "INSERT INTO student (std_id, std_prefix, std_name, std_class, std_phone)
    VALUES ('$std_id','$std_prefix','$std_name','$std_class','$std_phone')";
    if ($conn->query($sql) === TRUE) {
        header('Location: ./?id=student');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}elseif($action_post=="update_student"){
    $s_id = $_POST["s_id"];
    $std_prefix = $_POST["std_prefix"];
    $std_name = $_POST["std_name"];
    $std_class = $_POST["std_class"];
    $std_phone = $_POST["std_phone"];
    include_once "../conn.php";
    $sql = "UPDATE student SET 
        std_prefix='$std_prefix',
        std_name='$std_name',
        std_class='$std_class',
        std_phone='$std_phone'
        WHERE id=$s_id";

    if ($conn->query($sql) === TRUE) {
        header('Location: ./?id=student');
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}elseif($action_post=="add_news"){
    $news_title = $_POST["news_title"];
    $news_detail = $_POST["news_detail"];
    $news_type = $_POST["news_type"];

    $target_dir = "../upload/";
    date_default_timezone_set('Asia/Bangkok');
    $numrand = (mt_rand());
    $date = date("Ymd");
    $new_name = $date.$numrand;
    $target_file = $target_dir . $new_name.basename($_FILES["news_img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["news_img"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["news_img"]["size"] > 1500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["news_img"]["tmp_name"], $target_file)) {
        $news_img = $new_name.basename( $_FILES["news_img"]["name"]);
        echo $news_img;
        include_once "../conn.php";
        $sql = "INSERT INTO news (news_title, news_detail, news_img, news_type, news_user_id, news_status)
        VALUES ('$news_title','$news_detail','$news_img','$news_type','1','1')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ./?id=news');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
}elseif($action_post=="update_news"){
    $news_title = $_POST["news_title"];
    $news_detail = $_POST["news_detail"];
    $news_type = $_POST["news_type"];
    $n_id = $_POST["n_id"];
    if(empty($_FILES["news_img"]["name"])){
        //กรณีไม่มีการแก้ไขภาพข่าว
        include_once "../conn.php";
        $sql = "UPDATE news SET 
        news_title='$news_title', 
        news_detail='$news_detail',
        news_type='$news_type'
        WHERE news_id=$n_id";
        if ($conn->query($sql) === TRUE) {
            header('Location: ./?id=news');
        } else {
        echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }else{
        //กรณีอัพภาพข่าวใหม่
        $target_dir = "../upload/";
        date_default_timezone_set('Asia/Bangkok');
        $numrand = (mt_rand());
        $date = date("Ymd");
        $new_name = $date.$numrand;
        $target_file = $target_dir . $new_name.basename($_FILES["news_img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["news_img"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["news_img"]["size"] > 1500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["news_img"]["tmp_name"], $target_file)) {
            $news_img = $new_name.basename( $_FILES["news_img"]["name"]);
            include_once "../conn.php";
            $sql = "UPDATE news SET 
            news_title='$news_title', 
            news_detail='$news_detail',
            news_type='$news_type',
            news_img='$news_img'
            WHERE news_id=$n_id";
            if ($conn->query($sql) === TRUE) {
                header('Location: ./?id=news');
            } else {
            echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }
    }
}elseif($action_post=="add_slite"){
    $slite_name = $_POST["slite_name"];
    $target_dir = "../img/";
    date_default_timezone_set('Asia/Bangkok');
    $numrand = (mt_rand());
    $date = date("Ymd");
    $new_name = $date.$numrand;
    $target_file = $target_dir . $new_name.basename($_FILES["slite_img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["slite_img"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["slite_img"]["size"] > 1500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["slite_img"]["tmp_name"], $target_file)) {
        $slite_img = $new_name.basename( $_FILES["slite_img"]["name"]);
        include_once "../conn.php";
        $sql = "INSERT INTO slite_show (slite_name, slite_img, slite_status)
        VALUES ('$slite_name','$slite_img','1')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ./?id=slite');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
}elseif($action_post=="add_news_type"){
    $news_type = $_POST["news_type"];
    include_once "../conn.php";
    $sql = "INSERT INTO news_type (type_name,type_status)
    VALUES ('$news_type','1')";
    if ($conn->query($sql) === TRUE) {
        header('Location: ./?id=news_type');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}elseif($action_post=="update_news_type"){
    $type_name = $_POST["type_name"];
    $t_id = $_POST["t_id"];
    if(empty($_FILES["news_img"]["name"])){
        //กรณีไม่มีการแก้ไขภาพข่าว
        include_once "../conn.php";
        $sql = "UPDATE news_type SET 
        type_name='$type_name'
        WHERE type_id=$t_id";
        if ($conn->query($sql) === TRUE) {
            header('Location: ./?id=news_type');
        } else {
        echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
}

//กรณีรับค่าแบบ GET
if($action_get=="delete"){
    $s_id = $_GET["s_id"];
    include_once "../conn.php";
    $sql = "DELETE FROM student WHERE id=$s_id";
    if ($conn->query($sql) === TRUE) {
        header('Location: ./?id=student');
    } else {
    echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}elseif($action_get=="delete_news"){
    $n_id = $_GET["n_id"];
    $n_name = $_GET["n_name"];
    include_once "../conn.php";
    $sql = "DELETE FROM news WHERE news_id=$n_id";
    if ($conn->query($sql) === TRUE) {
        $file="../upload/$n_name";
        if(unlink($file)){
        header('Location: ./?id=news');
        }
    } else {
    echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}elseif($action_get=="delete_slite"){
    $s_id = $_GET["s_id"];
    $s_name = $_GET["s_name"];
    include_once "../conn.php";
    $sql = "DELETE FROM slite_show WHERE slite_id=$s_id";
    if ($conn->query($sql) === TRUE) {
        $file="../img/$s_name";
        if(unlink($file)){
            header('Location: ./?id=slite');
        }
    } else {
    echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}elseif($_GET["action_get"]=="status_slite"){
    $slite_id = $_GET["id"];
    if($_GET["status"]==0){ $slite_status=1;
    }else{$slite_status=0;
    }
    include_once "../conn.php";
    $sql = "UPDATE slite_show SET slite_status='$slite_status' WHERE slite_id=$slite_id";
    if ($conn->query($sql) === TRUE) {
        header('Location: ./?id=slite');
    } else {
    echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}elseif($action_get=="delete_news_type"){
    include_once "../conn.php";
    $t_id = $_GET["t_id"];
    $sql = "DELETE FROM news_type WHERE type_id=$t_id";
    if ($conn->query($sql) === TRUE) {
        $sql_news_d = "SELECT * FROM news WHERE news_type='$t_id'";
        $result_news_d = $conn->query($sql_news_d);
        if ($result_news_d->num_rows > 0) {
            while($row_news_d = $result_news_d->fetch_assoc()) {
                $s_name=$row_news_d["news_img"];
                echo $s_name;
                $file="../upload/$s_name";
                if(unlink($file)){
                }
        $sql_news = "DELETE FROM news WHERE news_type=$t_id";
        if ($conn->query($sql_news) === TRUE) {
            header('Location: ./?id=news_type');
        }
    }
}
    } else {
    echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}
?>