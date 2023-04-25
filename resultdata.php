<?php
session_start();
include('config/config.php');
include('config/checklogin.php');


if (isset($_POST['input'])){
    $input = $_POST['input'];


    $ret = "SELECT * FROM  netlayout ORDER BY ABS(net_layout_area - $input)";
    $stmt = $mysqli->prepare($ret); 
    $stmt->execute();
    $res = $stmt->get_result();

    if (mysqli_num_rows($res) > 0){?>
        <div class="container-fluid mt--10">
      <div class="row">
        <div class="col">
          <div class="card shadow">
              <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                  <th scope="col">Network Image</th>
                  <th scope="col">Network Area (sqm)</th>
                  <th scope="col">Institution</th>
                  <th scope="col">Length (m)</th>
                  <th scope="col">Width (m)</th>
                  <th scope="col">Action</th>
                </tr> 
                </thead>
                <tbody>
                <?php
                            
                            $ret = "SELECT * FROM  netlayout ORDER BY ABS(net_layout_area - $input) LIMIT 5";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->execute();
                            $res = $stmt->get_result();
                                       
                            while ($row = mysqli_fetch_assoc($res)) {
            
                              $net_layout_id = $row['net_layout_id'];
                              $net_layout_area = $row['net_layout_area'];
                              $net_institution = $row['net_institution'];
                              $net_length = $row['net_length'];
                              $net_width = $row['net_width'];
                              $net_image = $row ['net_image'];
                        
                              ?>
                          <tr>
                              <td> <?php
                                  if ($net_image) {
                                    echo "<img src='assets/img/netlayout/$net_image' height='60' width='60 class='img-thumbnail'>";
                                  } else {
                                    echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                                  }
            
                                  ?></td>
                              <td><?php echo $net_layout_area; ?></td>
                              <td><?php echo $net_institution; ?></td>
                              <td><?php echo $net_length; ?></td>
                              <td><?php echo $net_width;?></td> 
                              <td>
                                
                                    <a href="display_info.php?=<?php echo $net_layout_id; ?>">
                                      <button class="btn btn-sm btn-primary">
                                        <i class="fas fa-user-edit"></i>
                                       View Details
                                      </button>
                                    </a>
                                  </td>
            
                          </tr>
                          <?php
                          }
                          ?>
            
                </tbody>
            </table>
            </div>
            
                 </div>
              </div>
           </div>
        </div>

    <?php
    }else{  
        $err = "No Data Found";
    }
  }
  require_once('partials/_head.php');
?>