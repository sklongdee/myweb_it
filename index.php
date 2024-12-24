<?php
  session_start();
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav style="background-color: #597445;" class="navbar navbar-expand-lg" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">IT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?id=major">ข้อมูลหลักสูตร</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ข้อมูลนักศึกษา
          </a>
          <ul class="dropdown-menu">
            <?php
                include "conn.php";
                $sql_class = "SELECT * FROM class";
                $result_class = $conn->query($sql_class);
                if ($result_class->num_rows > 0) {
                while($row_class = $result_class->fetch_assoc()) {
                    echo '
                <li><a class="dropdown-item" href="?id=student&class='.$row_class["class_id"].'">'.$row_class["class_name"].'</a></li>
                    ';
                }
                } else {
                echo "0 results";
                }
            ?>

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="?id=student">ทั้งหมด</a></li>
          </ul>
        </li>
      </ul>
      <?php
        if(!empty($_SESSION["user_name"])){
      ?>
      <button type="button" class="btn btn-primary" onclick="location.href='admin'">
        Login by <?=$_SESSION["user_name"]?>
      </button>
      <?php
        }else{
      ?>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
        Login
      </button>
      <?php
        }
      ?>
    </div>
  </div>
</nav>
<?php
  if(isset($_SESSION["error"])){$s_error=$_SESSION["error"];}else{$s_error="";}
  if($s_error=="login_fail"){
?>
<div class="alert alert-danger" role="alert">
  !username หรือ password ไม่ถูกต้อง
</div>
<?php
  $_SESSION["error"]="";
  }
?>

<?php
    if(isset($_GET["id"]))$id=$_GET["id"];else $id="";
    if($id=="major"){
        include "major.php";
    }elseif($id=="student"){
        include "student.php";
    }else {
        include "main.php";
    }
?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<!-- Modal login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModal">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="verify.php" method="POST">
        <div class="mb-3">
          <label for="user_name" class="form-label">Username</label>
          <input type="text" class="form-control" name="user_name" id="user_name" aria-describedby="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="action_post" value="login" class="btn btn-primary">Login</button>
      </form>
      </div>
    </div>
  </div>
</div>

