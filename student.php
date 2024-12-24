<div class="container py-1">
<h1>ข้อมูลนักศึกษา</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">รหัสนักศึกษา</th>
      <th scope="col">ชื่อ-นามสกุล</th>
      <th scope="col">ชั้นปี</th>
      <th scope="col">เบอร์โทร</th>
    </tr>
  </thead>
  <tbody>
<?php
    if(isset($_GET["class"])){$class_id="WHERE student.std_class=".$_GET["class"];}
    else{$class_id="";}
    
    include_once "conn.php";
    $sql = "SELECT * FROM student INNER JOIN 
            class ON student.std_class = class.class_id 
            $class_id";
    $result = $conn->query($sql);
    $count=1;
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
    <tr>
      <th scope="row"><?=$count++?></th>
      <td><?=$row["std_id"]?></td>
      <td><?=$row["std_name"]?></td>
      <td><?=$row["class_name"]?></td>
      <td><?=$row["std_phone"]?></td>
    </tr>
<?php
    }
    } else {
    echo "0 results";
    }
    $conn->close();
?>
  </tbody>
</table>
</div>