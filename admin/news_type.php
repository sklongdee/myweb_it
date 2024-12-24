<h1>ประเภทข่าว</h1>
<p><a href="?id=add_news_type" class="btn btn-success">เพิ่มประเภทข่าว</a></p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ประเภท</th>
      <th scope="col">จัดการ</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "../conn.php";
    $sql_news_type = "SELECT * FROM news_type";
      $result_news = $conn->query($sql_news_type);
      $count=1;
      if ($result_news->num_rows > 0) {
      while($row_news = $result_news->fetch_assoc()) {
    ?>
    <tr>
      <th scope="row"><?=$count++?></th>
      <td><?=$row_news["type_name"]?></td>
      <td>
        <a href="?id=update_news_type&t_id=<?=$row_news["type_id"]?>">
            <i class="fas fa-edit" style="color:orange;"></i>
        </a> 
        <a onclick="return confirm('ยืนยันการลบข้อมูลข่าวสาร')" href="./verify.php?action_get=delete_news_type&t_id=<?=$row_news["type_id"]?>">
            <i class="fas fa-trash-alt" style="color:red;"></i>
        </a> 
      </td>
    </tr>
    <?php
    }
    } 
    ?>
  </tbody>
</table>