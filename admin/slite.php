<h1>จัดการภาพสไลท์</h1>
<p><a href="?id=add_slite" class="btn btn-success">เพิ่มภาพสไลท์</a></p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">รูปภาพ</th>
      <th scope="col">ชื่อรูปภาพ</th>
      <th scope="col">สถานะ</th>
      <th scope="col">จัดการ</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include_once "../conn.php";
    $sql = "SELECT * FROM slite_show";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count=1;
        while($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <th scope="row"><?=$count++?></th>
      <td><img style="width:100px;" src="../img/<?=$row["slite_img"]?>"></td>
      <td><?=$row["slite_name"]?></td>
      <td>
        <?php
            if($row["slite_status"]==1){
                echo '
                <a href="verify.php?action_get=status_slite&id='.$row["slite_id"].'&status='.$row["slite_status"].'">
                <i class="fas fa-toggle-on" style="color:green;font-size: 30px;"></i>
                </a>
                ';
            }else{
                echo '
                <a href="verify.php?action_get=status_slite&id='.$row["slite_id"].'&status='.$row["slite_status"].'">
                <i class="fas fa-toggle-off" style="color:gray;font-size: 30px;"></i>
                </a>
                ';
            }
        ?>

      </td>
      <td>
        <a onclick="return confirm('ยืนยันการลบภาพสไลท์')" href="verify.php?action_get=delete_slite&s_id=<?=$row["slite_id"]?>&s_name=<?=$row["slite_img"]?>">
        <i class="fas fa-trash-alt" style="color:red;font-size: 25px;"></i>
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