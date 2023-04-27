<?php
include 'navbar.php';

if (isset($_POST['add'])){
    
    $farmer_id=$_POST['farmer_id'];
    $farmer_names=$_POST['farmer_names'];
    $land_scale=$_POST['land_scale'];
    $district=$_POST['district'];
    $sector=$_POST['sector'];
    $cell=$_POST['cell'];
    $villages=$_POST['villages'];

    $sql=mysqli_query($conn,"INSERT INTO farmers(
        farmer_id ,
        farmer_names,
        land_scale,
        district,
        sector,
        cell,
        villages,
        user_id) VALUES (
            '$farmer_id',
            '$farmer_names',
            '$land_scale',
            '$district',
            '$sector',
            '$cell',
            '$villages',
            '$admin_id')");

        if ($sql) {
            $successmessage .='Farmers add, Successfully';  
        }
        else {
            $errormessage .='Add Farmer failed!'.$conn->error;     
        } 
}   

?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $admin_firstname;?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../signout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="addfarmer.php">All Farmer</a></li>
              <li class="breadcrumb-item active" aria-current="page">Fertilizers</li>
            </ol>
          </div>

          <div class="row">
          <div class="col-sm-12">
									<h5 class="mt-4" style="font-style: elephant; font-weight: bold;">Farmers</h5>
									<hr>
								                    <div class="table-responsive">
                                       <table id="zero_config" class="table  table-bordered no-wrap">
                                            <thead>
												<tr>
													<th>#</th>
													<th>Farmer Name</th>
													<th>Fertilizer Category</th>
													<th>Land Scale</th>
													<th>Fertilizer Quantity</th>
													<th>Fertilizer Unit</th>
													<th>District</th>
													<th>Sector</th>
													<th>Cell</th>
                          <th>Village</th>
													<th>Delete</th>
													<th>Update</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$quer=mysqli_query($conn,"SELECT * FROM requests WHERE user_id=$admin_id");
												while ($row=mysqli_fetch_array($quer)){
												?>
												<tr>
													<td><?php echo $row['request_id'] ; ?></td>
                                                    <td><?php
                                                    $farmerid=$row['farmer_id'];
                                                    $quertwo=mysqli_query($conn,"SELECT * FROM farmers WHERE farmer_id=$farmerid");
                                                    $rowtwo=mysqli_fetch_array($quertwo);
                                                    echo  $rowtwo['farmer_id'].':'.$rowtwo['farmer_names'] ;
                                                    ?></td>
													<td><?php echo $row['ferticategory'] ; ?></td>
													<td><?php echo $row['landscale'] ; ?></td>
													<td><?php echo $row['fertiquantity'] ; ?></td>
													<td><?php echo $row['fertilizerunit'] ; ?></td>
													<td><?php echo $row['district'] ; ?></td>
													<td><?php echo $row['sector'] ; ?></td>
													<td><?php echo $row['cell'] ; ?></td>
                                                    <td><?php echo $row['village'] ; ?></td>
													<td><a class="btn btn-danger"  href="delete.php?delrequest=<?php echo $row['request_id']; ?> " onclick="return confirm('are you sure! you want to delete')" id="red">Delete</a></td>
													<td><a class="btn btn-primary"  href="requestupdate.php?updaterequest=<?php echo $row['request_id']; ?>"  id="red">Update</a></td>
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
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright  developed by
              <b>Elie</b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>