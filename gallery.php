<?php
  session_start();
  include('admin/vendor/inc/config.php');
  //include('vendor/inc/checklogin.php');
  //check_login();
  //$aid=$_SESSION['a_id'];
?>
<!DOCTYPE html>
<html lang="en">

<!--Head-->
<?php include("vendor/inc/head.php");?>
<!--End Head-->


<body>

  <!-- Navigation -->
  <?php include("vendor/inc/nav.php");?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Our Gallery
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Gallery</li>
    </ol>
    
    <!-- Project One -->
    <div class="row">
  <div class="col-md-12">
    <div class="row">
      <?php
      $ret = "SELECT * FROM tms_vehicle ORDER BY RAND() LIMIT 10";
      $stmt = $mysqli->prepare($ret);
      $stmt->execute();
      $res = $stmt->get_result();
      $cnt = 1;
      while ($row = $res->fetch_object()) {
        ?>
        <div class="col-md-4 mb-2">
          <div class="card">
            <img src="vendor/img/<?php echo $row->v_dpic; ?>" class="card-img-top" alt="..." style="height: 200px; object-fit:contain">
            <div class="card-body d-flex flex-column">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><?php echo $row->v_category; ?></h5>
                <span class="badge badge-success">Available</span>
              </div>
              <p class="card-text flex-grow-1">Vehicle Description</p>
              <div class="category-item">
                <ul class="list-group list-group-horizontal flex-grow-1">
                  <li class="list-group-item width=200px"><h5>Category</h5></li>
                  <li class="list-group-item flex-fill"><?php echo $row->v_name; ?></li>
                </ul>
                <ul class="list-group list-group-horizontal">
                  <li class="list-group-item width=200px"><h5>Capacity</h5></li>
                  <li class="list-group-item flex-fill"><?php echo $row->v_pass_no; ?>&nbsp;passengers</li>
                </ul>
                <ul class="list-group list-group-horizontal">
                  <li class="list-group-item flex-fill"><?php echo $row->v_price;?>&nbsp;per_day</li>
                  <li class="list-group-item flex-fill"><?php echo $row->v_reg_no; ?></li>
                </ul>
              </div>
              <a class="btn btn-success" href="usr/">Hire Vehicle
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
        <?php
        // Check if the current card is the third card in a row
        if ($cnt % 3 == 0) {
          echo '</div><div class="row">'; // Close the previous row and start a new row
        }
        $cnt++;
      }
      ?>
    </div>
  </div>
</div>
</div>
<!-- /.row -->
<hr>



</body>
<?php include("vendor/inc/footer.php");?>

  <!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</html>
