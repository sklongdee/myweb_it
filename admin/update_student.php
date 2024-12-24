<?php
$s_id = $_GET["s_id"];
include_once "../conn.php";
$sql_std = "SELECT * FROM student WHERE id=$s_id";
$result_std = $conn->query($sql_std);
if ($result_std->num_rows > 0) {
  while($row_std = $result_std->fetch_assoc()) {
?>

<h1>แก้ไขข้อมูลนักศึกษา</h1>
<br>
<form action="verify.php" method="POST">
  <div class="form-group">
    <label for="std_id">รหัสนักศึกษา</label>
    <input type="text" readonly value="<?=$row_std["std_id"]?>" class="form-control" id="std_id" name="std_id">
  </div>
  <div class="form-group">
    <label for="std_prefix">คำนำหน้า</label>
    <select class="form-control" id="std_prefix" name="std_prefix">
      <option value="นาย" <?php if($row_std["std_prefix"]=="นาย"){echo "selected";}?>>นาย</option>
      <option value="นางสาว" <?php if($row_std["std_prefix"]=="นางสาว"){echo "selected";}?>>นางสาว</option>
      <option value="นาง" <?php if($row_std["std_prefix"]=="นาง"){echo "selected";}?>>นาง</option>
    </select>
  </div>

  <div class="form-group">
    <label for="std_name">ชื้อ-นามสกุล</label>
    <input type="text" value="<?=$row_std["std_name"]?>" class="form-control" id="std_name" name="std_name">
  </div>
  <div class="form-group">
    <label for="std_class">ชั้นปี</label>
    <select class="form-control" id="std_class" name="std_class">
    <?php
        $sql_class = "SELECT * FROM class";
        $result_class = $conn->query($sql_class);
        if ($result_class->num_rows > 0) {
        while($row_class = $result_class->fetch_assoc()) {
            echo '
            <option value="'.$row_class["class_id"].'"';
            if($row_std["std_class"]==$row_class["class_id"]){echo "selected";}
            echo '>'.$row_class["class_name"].'</option>
            ';
        }
        } else {
        echo "0 results";
        }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="std_phone">เบอร์โทร</label>
    <input type="text" value="<?=$row_std["std_phone"]?>" class="form-control" id="std_phone" name="std_phone">
  </div>
  <input hidden type="text" value="<?=$row_std["id"]?>" id="s_id" name="s_id">
  <button onclick="return confirm('ยืนยันการแก้ไขข้อมูลของ <?=$row_std['std_prefix'].$row_std['std_name']?>')" type="submit" name="action_post" value="update_student" class="btn btn-primary">แก้ไขข้อมูลนักศึกษา</button>
</form>
<?php
  }
} else {
  echo "0 results";
}


?>
