<h1>เพิ่มภาพสไลท์</h1>
<form action="verify.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="slite_name">ชื่อภาพสไลท์</label>
    <input type="text" class="form-control" name="slite_name" id="slite_name" aria-describedby="slite_name">
  </div>
  <div class="form-group">
    <label for="slite_img">ภาพสไลท์</label>
    <div class="custom-file mb-3">
        <input type="file" class="custom-file-input" name="slite_img" id="slite_img" required>
        <label class="custom-file-label" for="slite_img">Choose file...</label>
    </div>    
  </div>
  <button type="submit" name="action_post" value="add_slite" class="btn btn-primary">เพิ่มภาพสไลท์</button>
</form>