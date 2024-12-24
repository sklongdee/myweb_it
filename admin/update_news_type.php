<h1>แก้ไขประเภทข่าว</h1>
<?php
$t_id = $_GET["t_id"];
include "../conn.php";
$sql_news = "SELECT * FROM news_type 
    WHERE type_id=$t_id";
$result_news = $conn->query($sql_news);
$count=1;
if ($result_news->num_rows > 0) {
while($row_news = $result_news->fetch_assoc()) {
?>
<form action="verify.php" method="post">
  <div class="form-group">
    <label for="news_type">ชื่อประเภทข่าว</label>
    <input type="text" class="form-control" value="<?=$row_news["type_name"]?>" id="type_name" name="type_name">
  </div>

  <input hidden type="text" value="<?=$row_news["type_id"]?>"name="t_id">
  
  <button type="submit" class="btn btn-primary" name="action_post" value="update_news_type">แก้ไขประเภทข่าว</button>
</form>

<?php }}?>