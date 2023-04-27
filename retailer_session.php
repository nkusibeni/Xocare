<?php
 
  include'../connection.php';
  
  
  session_start();
    
  $admin_id=$_SESSION['userid'];
  $admin_firstname=$_SESSION['userfirstname'];
  $admin_lastname=$_SESSION['userlastname'];
  $admin_email=$_SESSION['useremail'];
  $admin_phone=$_SESSION['userphone'];
  $admin_password=$_SESSION['userpassword'];
  $admin_role=$_SESSION['userrole'];
 
  if ($admin_email=='' || $admin_role!="retailer") {
    header("location:../signout.php");
  }

  ?>