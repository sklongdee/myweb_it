<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">ข้อมูลนักศึกษาทั้งหมด</h1>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">รหัสนักศึกษา</th>
      <th scope="col">ชื่อ-นามสกุล</th>
      <th scope="col">ชั้นปี</th>
      <th scope="col">เบอร์โทร</th>
      <th scope="col">จัดการ</th>
    </tr>
  </thead>
  <tbody>

  <?php
    include "../conn.php";
    $sql = "SELECT * FROM student INNER JOIN 
            class ON student.std_class = class.class_id";
    $result = $conn->query($sql);
    $count=1;
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  ?>
    <tr>
      <th scope="row"><?=$count++?></th>
      <td><?=$row["std_id"]?></td>
      <td><?=$row["std_prefix"].$row["std_name"]?></td>
      <td><?=$row["class_name"]?></td>
      <td><?=$row["std_phone"]?></td>
      <td>
        <a href="?id=update_student&s_id=<?=$row["id"]?>">
        <i class="fas fa-edit" style="color:orange;"></i>
        </a> 
        <a onclick="return confirm('ยืนยันการลบข้อมูลของ <?=$row['std_prefix'].$row['std_name']?>')" href="./verify.php?action_get=delete&s_id=<?=$row["id"]?>">
            <i class="fas fa-trash-alt" style="color:red;"></i>
        </a> 
      </td>
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

<a href="?id=add_student" class="btn btn-success">เพิ่มข้อมูลนักศึกษา</a>
