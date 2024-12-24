<h1>เพิ่มข้อมูลข่าวสาร</h1>
<form action="verify.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="news_title">หัวข้อข่าว</label>
    <input type="text" class="form-control" id="news_title" name="news_title">
  </div>
  <div class="form-group">
    <label for="news_detail">รายละเอียดข่าวสาร</label>
    <textarea class="form-control" id="news_detail" name="news_detail"rows="3"></textarea>
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
                <option value="'.$row_news_type["type_id"].'">'.$row_news_type["type_name"].'</option>
                ';
            }
        }
        ?>
      
    </select>
  </div>
  <div class="form-group">
  <label for="news_img">อัพโหลดรูปภาพ</label>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="news_img" name="news_img">
    <label class="custom-file-label" for="news_img">Choose file</label>
  </div>
  </div>
  
  <button type="submit" class="btn btn-primary" name="action_post" value="add_news">เพิ่มข้อมูลข่าวสาร</button>
</form>