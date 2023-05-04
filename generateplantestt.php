<!DOCTYPE html> 
<html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

check_login();

require_once('partials/_head.php');
?>


<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-6">
              Assuming the room is Empty 
            </div>
                <div class="col-md-8"><label>Unit of Measure is in (sqm)</label>
                <input type="text" class="form-control" id="live_search_order" autocomplete="off" 
                placeholder="Input a numerical value">
                </div>
              </div>
            </div>
          </div>
      </div>

</body>

<div id="searchresultorder"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">    
    $(document).ready(function(){
        $("#live_search_order").keyup(function(){
            var input = $(this).val();
            //alert(input);
            
            if(input !=""){
                $.ajax({
                    url:"resultdata.php",
                    method:"POST",
                    data:{input:input},
                    
                    success:function(data){
                        $("#searchresultorder").html(data).show();
                        $("#searchresultorder").css("display","block");
                    }
                });
            }else{
                $("#searchresultorder").css("display","block").show();
                }
        });
    });

</script>
    </body>
    </html> 
