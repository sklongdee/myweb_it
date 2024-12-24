<?php
include "conn.php";
$sql_slite = "SELECT * FROM slite_show WHERE slite_status=1";
$result_slite = $conn->query($sql_slite);
?>
<div class="container py-1">
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <?php
      $i=0;
      foreach($result_slite as $row_slite){
        $actives="";
        if($i == 0){
          $actives="active";
        }
    ?>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$i?>" class="<?=$actives?>" aria-current="true" aria-label="Slide 1"></button>
    <?php
      $i++;
      }
    ?>
  </div>
  <div class="carousel-inner">
    <?php
      $i=0;
      foreach($result_slite as $row_slite){
        $actives="";
        if($i == 0){
          $actives="active";
        }
    ?>
    <div class="carousel-item <?=$actives?>">
      <img src="img/<?=$row_slite["slite_img"]?>" class="d-block w-100" alt="...">
    </div>
    <?php
      $i++;
      }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>
<div class="container py-2">
<?php
  include "conn.php";
  $sql_news_type = "SELECT * FROM news_type";
  $result_news_type = $conn->query($sql_news_type);
  if ($result_news_type->num_rows > 0) {
    while($row_news_type = $result_news_type->fetch_assoc()) {
      $type_id = $row_news_type["type_id"];
?>
  <div class="card border-0" style="width: max;">
    <div class="card-header" style="background-color:#B1C29E">
      <h5><?=$row_news_type["type_name"]?></h5>
    </div>
    <ul class="list-group list-group-flush">
    <div class="row row-cols-1 row-cols-md-3 g-4 py-1">
      <?php
      $sql_news = "SELECT * FROM news WHERE news_type=$type_id";
      $result_news = $conn->query($sql_news);
      if ($result_news->num_rows > 0) {
      while($row_news = $result_news->fetch_assoc()) {
      ?>
      <div class="col">
        <div class="card h-100">
          <img src="upload/<?=$row_news["news_img"]?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?=$row_news["news_title"]?></h5>
          </div>
          <div class="card-footer">
            <small class="text-body-secondary"><?=$row_news["news_date"]?></small>
          </div>
        </div>
      </div>
      <?php
      }
      } 
      ?>
    </div> 
    </ul>
  </div>
<?php
}
} else {
  echo "0 results";
}
?>
</div>