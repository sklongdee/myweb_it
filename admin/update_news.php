<h1>แก้ไขข้อมูลข่าวสาร</h1>
<?php
    $n_id = $_GET["n_id"];
    include "../conn.php";
    $sql_news = "SELECT * FROM news 
        INNER JOIN news_type 
        ON news.news_type=news_type.type_id
        WHERE news.news_id=$n_id";
    $result_news = $conn->query($sql_news);
    $count=1;
    if ($result_news->num_rows > 0) {
    while($row_news = $result_news->fetch_assoc()) {
?>
<form action="verify.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="news_title">หัวข้อข่าว</label>
    <input type="text" value="<?=$row_news["news_title"]?>" class="form-control" id="news_title" name="news_title">
  </div>
  <div class="form-group">
    <label for="news_detail">รายละเอียดข่าวสาร</label>
    <textarea class="form-control" id="news_detail" name="news_detail"rows="3"><?=$row_news["news_detail"]?></textarea>
  </div>
  <div class="form-group">
    <label for="news_type">ประเภทข่าว</label>
    <select class="form-control" id="news_type" name="news_type">
        <?php
        include "../conn.php";
        $sql_news_type = "SELECT * FROM news_type";
        $result_news_type = $conn->query($sql_news_type);
        if ($result_news_type->num_rows > 0) {
            while($row_news_type = $result_news_type->fetch_assoc()) {
                echo '
                <option value="'.$row_news_type["type_id"].'"';
                if($row_news["news_type"]==$row_news_type["type_id"]){echo "selected";}
                echo '>'.$row_news_type["type_name"].'</option>
                ';
            }
        }
        ?>
      
    </select>
  </div>
  <div class="form-group">
  <label for="news_img_o">รูปภาพ</label><br>
    <img id="news_img_o" src="../upload/<?=$row_news["news_img"]?>" style="width:600px;">
  </div>
  <div class="form-group">
  <label for="news_img">อัพโหลดรูปภาพ</label>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="news_img" name="news_img">
    <label class="custom-file-label" for="news_img">Choose file</label>
  </div>
  </div>
  <input type="text" hidden value="<?=$row_news["news_id"]?>" id="n_id" name="n_id">
  <button 
    onclick="return confirm('ยืนยันการแก้ไขข้อมูลข่าว')"
    type="submit" class="btn btn-primary" name="action_post" value="update_news">
    แก้ไขข้อมูลข่าวสาร
  </button>
</form>
<?php
    }
}
?>