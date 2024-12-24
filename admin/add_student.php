<h1>เพิ่มข้อมูลนักศึกษา</h1>
<form action="verify.php" method="POST">
  <div class="form-group">
    <label for="std_id">รหัสนักศึกษา</label>
    <input type="text" class="form-control" id="std_id" name="std_id">
  </div>
  <div class="form-group">
    <label for="std_prefix">คำนำหน้า</label>
    <select class="form-control" id="std_prefix" name="std_prefix">
      <option value="นาย">นาย</option>
      <option value="นางสาว">นางสาว</option>
      <option value="นาง">นาง</option>
    </select>
  </div>

  <div class="form-group">
    <label for="std_name">ชื้อ-นามสกุล</label>
    <input type="text" class="form-control" id="std_name" name="std_name">
  </div>
  <div class="form-group">
    <label for="std_class">ชั้นปี</label>
    <select class="form-control" id="std_class" name="std_class">
    <?php
        include "../conn.php";
        $sql_class = "SELECT * FROM class";
        $result_class = $conn->query($sql_class);

        if ($result_class->num_rows > 0) {
        // output data of each row
        while($row_class = $result_class->fetch_assoc()) {
            echo '
            <option value="'.$row_class["class_id"].'">'.$row_class["class_name"].'</option>
            ';
        }
        } else {
        echo "0 results";
        }
        $conn->close();
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="std_phone">เบอร์โทร</label>
    <input type="text" class="form-control" id="std_phone" name="std_phone">
  </div>
  <button onclick="return confirm('ยืนยันการเพิ่มข้อมูล')" type="submit" name="action_post" value="add_student" class="btn btn-primary">เพิ่มข้อมูลนักศึกษา</button>
</form>