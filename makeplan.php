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
              <h3>Customize your Layout: 5x5 Dimension</h3>
            </div>
            <div class = "container">
            <div id = "form-container">
              <div class="row">
                  <div id = "scroll-box" style = "margin-left:-100px">
                     <div class="col-4"> <b> ITEMS: </b>
                       <div class="drag-element-source drag-element">
                          <div class="rect" style = "margin-bottom: 110px; margin-left: 0px"><img src="assets/img/items/cubicle.png" draggable="false"/></div>
                       </div>
                
                        <div class="drag-element-source drag-element">
                          <div class="rect"><img src="assets/img/items/U-shaped_cubicle.png" draggable="false"/></div>
                        </div>

                        <div class="drag-element-source drag-element">
                          <div class="rect" style = "margin-top: 110px; margin-left: 11px"><img src="assets/img/items/L-table.png" draggable="false"/></div>
                        </div>

                        <div class="drag-element-source drag-element">
                          <div class="rect" style = "margin-top: 70px; margin-left: -3px"><img src="assets/img/items/U-table.png" draggable="false"/></div>
                        </div>

                        <div class="drag-element-source drag-element">
                          <div class="rect" style = "margin-top: 80px"><img src="assets/img/items/office_table_chair.png" draggable="false"/></div>
                        </div>

                        <div class="drag-element-source drag-element">
                          <div class="rect" style = "margin-top: 100px; margin-left: 8px"><img src="assets/img/items/office_chair.png" draggable="false"/></div>
                        </div>

                        <div class="drag-element-source drag-element">
                          <div class="rect" style = "margin-left: 15px"><img src="assets/img/items/door.png" draggable="false"/></div>
                        </div>

                        <div class="drag-element-source drag-element">
                          <div class="rect"><img src="assets/img/items/computer.png" draggable="false"/></div>
                        </div>

                      </div> 
                  </div>
                  <div class="col-6" id = "plane-container">
                    <div>
                      <p>5x5</p>
                    </div>
                  </div> 
                  <div class ="col-2">
                  <div class="dropzone element-trash" style = "text-align:center; font-size:smaller"><b>DROP TO DELETE</b></div> 
                </div>
              </div>
              </div>
            </div>
            <hr>
            <div class="form-row text-center">
              <div class="col-md-12" style = "margin-bottom:15px">
                <input type="submit" name="generate" value="Print" class="btn btn-success" value="">
              </div>
            </div>
            <input type="hidden" name="input" value="<?php echo $input; ?>">
          </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  </body>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
<script>
  function validateForm() {
    let lengthInput = document.getElementById("length");
    let widthInput = document.getElementById("width");
    let lengthError = document.getElementById("lengthError");
    let widthError = document.getElementById("widthError");
    let length = lengthInput.value;
    let width = widthInput.value;
    let netInstitution = document.getElementById("net_institution").value;
    let netErgo = document.getElementById("net_ergo").value;
    let netInstitutionError = document.getElementById("netInstitutionError");
    let netErgoError = document.getElementById("netErgoError");

    if (isNaN(length)) {
      lengthError.innerHTML = " *Length must be a number.";
      lengthInput.focus();
      return false;
    } else {
      lengthError.innerHTML = "";
    }

    if (isNaN(width)) {
      widthError.innerHTML = " *Width must be a number.";
      widthInput.focus();
      return false;
    } else {
      widthError.innerHTML = "";
    }

    if (netInstitution === "") {
      netInstitutionError.innerHTML = " *Please select a net institution.";
      return false;
    } else {
      netInstitutionError.innerHTML = "";
    }

    return true;
  }
</script>
        <script src="http://cdn.jsdelivr.net/interact.js/1.2.4/interact.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="makeplanscript.js"></script>
        <link rel="stylesheet" href="makeplanstyle.css">
</html>