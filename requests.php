<?php
include 'navbar.php';

if (isset($_POST['send'])){
    
  $farmerid=$_POST['farmerid'];
  $ferticategory=$_POST['fertilizerid'];
  $landscale=$_POST['landscale'];
  $order_date=$_POST['order_date'];
  $fertiquantity=$_POST['fertiquantity'];
  $fertilizerunit=$_POST['fertilizerunit'];
  $district=$_POST['district'];
  $sector=$_POST['sector'];
  $cell=$_POST['cell'];
  $village=$_POST['village'];

  $sql=mysqli_query($conn,"INSERT INTO requests(
      farmer_id ,
      ferticategory,
      landscale,
      order_date,
      fertiquantity,
      fertilizerunit,
      district,
      sector,
      cell,
      village,
      user_id) VALUES (
          '$farmerid',
          '$ferticategory',
          '$landscale',
          '$order_date',
          '$fertiquantity',
          '$fertilizerunit',
          '$district',
          '$sector',
          '$cell',
          '$village',
          '$admin_id')");

      if ($sql) {
          $successmessage .='Request Sent';  
      }
      else {
          $errormessage .='Request Sent failed!'.$conn->error;     
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
              <li class="breadcrumb-item"><a href="requests.php">Add Request</a></li>
              <li class="breadcrumb-item active" aria-current="page">Fertilizers</li>
            </ol>
          </div>

          <div class="row">
          <div class="col-sm-12">
									<h5 class="mt-4"></h5>
									<hr>
									<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Add Request</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">All Request</a>
										</li>
									</ul>
									<div class="tab-content" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
										   <form action="" method="POST" enctype="multipart/form-data">
                                                    
                                           <?php
                                                            if ( isset($successmessage)) {
                                                                echo '
                                                                                
                                                                    <div class="card-body">
                                                                    <ul class="list-group">
                                                                    <li class="list-group-item list-group-item-success">'.$successmessage.'</li>
                                                                    </ul>
                                                                    </div>
                                                                ';
                                                            }
                                                            ?>
                                                            <?php
                                                            if ( isset($errormessage)) {
                                                            echo '
                                                            <div class="card-body">
                                                            <ul class="list-group">
                                                            <li class="list-group-item list-group-item-success">'.$errormessage.'</li>
                                                            </ul>
                                                            </div>
                                                            ';
                                                            }
                                                            ?>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Farmer Names</label>
													<div class="col-sm-10">
                                      <select name="farmerid" class="form-control form-control-normal">
                                              <?php
                                                    $quer=mysqli_query($conn,"SELECT * FROM farmers WHERE user_id=$admin_id");
                                                      while ($row=mysqli_fetch_array($quer)){
                                               ?>
                                                <option value="<?php echo $row['farmer_id'] ; ?>"><?php echo $row['farmer_names'] ; ?></option>
                                                  <?php
                                                    }
                                                  ?>
                                       </select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Fertilizer Category</label>
													<div class="col-sm-10">
                                                <select name="fertilizerid" class="form-control form-control-normal">
                                              <?php
                                                    $quer=mysqli_query($conn,"SELECT * FROM fertilizer ");
                                                      while ($row=mysqli_fetch_array($quer)){
                                               ?>
                                                <option value="<?php echo $row['ferti_type'] ; ?>"><?php echo $row['ferti_type'] ; ?></option>
                                                  <?php
                                                    }
                                                  ?>
                                               </select>
													</div>
												</div>
                        <div class="form-group row">
												<label class="col-sm-2 col-form-label">Order Date</label>
													<div class="col-sm-5">
                          <input type="date" name="order_date" class="form-control form-control-normal"
														placeholder="">
													</div>
													<div class="col-sm-5">
                            <input type="text" name="landscale" class="form-control form-control-normal"
														placeholder="Land Scale">
													</div>
												</div>
                        
                        <!-- <div class="form-group row">
													<label class="col-sm-2 col-form-label">Land Scale</label>
													<div class="col-sm-5">
														<input type="text" name="fertiquantity" class="form-control form-control-normal"
														placeholder="hectales">
													</div>
													<div class="col-sm-5">
                          <label class="col-sm-2 col-form-label">Order Date</label>
													<div class="col-sm-5">
														<input type="date" name="order_date" class="form-control form-control-normal"
														placeholder="">
													</div>
													</div>
												</div> -->

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Fertilizer Quantity</label>
													<div class="col-sm-5">
														<input type="number" name="fertiquantity" class="form-control form-control-normal"
														placeholder="1">
													</div>
													<div class="col-sm-5">
                                    <select name="fertilizerunit" class="form-control form-control-normal">
                                            <option value="kg">kg (kilogram)</option>
                                            <option value="tone">tones</option>
                                            <option value="package">Package</option>
                                      </select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">District</label>
													<div class="col-sm-5">
                          <select name="district" class="form-control form-control-normal">
                            <option value="Gasabo">Gasabo</option>
                            <option value="Kicukiro">Kicukiro</option>
                            <option value="Nyarugenge">Nyarugenge</option>
                            <option value="Burera">Burera</option>
                            <option value="Gakenke">Gakenke</option>
                            <option value="Gicumbi">Gicumbi</option>
                            <option value="Rulindo">Rulindo</option>
                            <option value="Musanze">Musanze</option>
                            <option value="Kamonyi">Kamonyi</option>
                            <option value="Muhanga">Muhanga</option>
                            <option value="Ruhango">Ruhango</option>
                            <option value="Nyanza">Nyanza</option>
                            <option value="Huye">Huye</option>
                            <option value="Gisagara">Gisagara</option>
                            <option value="Nyaruguru">Nyaruguru</option>
                            <option value="Nyamagabe">Nyamagabe</option>
                            <option value="Bugesera">Bugesera</option>
                            <option value="Gatsibo">Gatsibo</option>
                            <option value="Kayonza">Kayonza</option>
                            <option value="Nyagatare">Nyagatare</option>
                            <option value="Ngoma">Ngoma</option>
                            <option value="Rwamagana">Rwamagana</option>
                            <option value="Kirehe">Kirehe</option>
                            <option value="Karongi">Karongi</option>
                            <option value="Ngororero">Ngororero</option>
                            <option value="Nyabihu">Nyabihu</option>
                            <option value="Nyamasheke">Nyamasheke</option>
                            <option value="Rubavu">Rubavu</option>
                            <option value="Rusizi">Rusizi</option>
                            <option value="Rutsiro">Rutsiro</option>
                            </select>
													</div>
													<div class="col-sm-5">
                          <input type="text" name="sector" class="form-control form-control-normal"
														placeholder="Sector">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Cell</label>
													<div class="col-sm-5">
														<input type="text" name="cell" class="form-control form-control-normal"
														placeholder="">
													</div>
													<div class="col-sm-5">
                          <input type="text" name="village" class="form-control form-control-normal"
														placeholder="village">
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-12">
														<input type="submit" name="send" value="Send Request"
														class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
													</div>
												</div>
												
											</form>
										</div>
										<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
                                       $productid=$row['farmer_id'];
                                       $quertwo=mysqli_query($conn,"SELECT * FROM farmers WHERE farmer_id=$farmerid");
                                       $rowtwo=mysqli_fetch_array($quertwo);
                                       echo  $rowtwo['farmer_names'] ;
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