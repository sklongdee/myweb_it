<h1>ข้อมูลข่าวสาร</h1>
<p><a href="?id=add_news" class="btn btn-success">เพิ่มข้อมูลข่าวสาร</a></p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ภาพข่าว</th>
      <th scope="col">หัวข้อข่าว</th>
      <th scope="col">ประเภท</th>
      <th scope="col">จัดการ</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "../conn.php";
    $sql_news = "SELECT * FROM news INNER JOIN news_type ON news.news_type=news_type.type_id";
      $result_news = $conn->query($sql_news);
      $count=1;
      if ($result_news->num_rows > 0) {
      while($row_news = $result_news->fetch_assoc()) {
    ?>
    <tr>
      <th scope="row"><?=$count++?></th>
      <td><img src="../upload/<?=$row_news["news_img"]?>" style="width:80px;"></td>
      <td><?=$row_news["news_title"]?></td>
      <td><?=$row_news["type_name"]?></td>
      <td>
        <a href="?id=update_news&n_id=<?=$row_news["news_id"]?>">
            <i class="fas fa-edit" style="color:orange;"></i>
        </a> 
        <a onclick="return confirm('ยืนยันการลบข้อมูลข่าวสาร')" href="./verify.php?action_get=delete_news&n_id=<?=$row_news["news_id"]?>&n_name=<?=$row_news["news_img"]?>">
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