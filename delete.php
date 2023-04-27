<?php
include '../connection.php';

if (isset($_GET['delrequest'])){
    $delrequest=$_GET['delrequest'];
    $del_quer=mysqli_query($conn,"DELETE FROM requests WHERE request_id='$delrequest' ");  
    if ($del_quer) {
        echo '
        <script type="text/javascript">alert(" Delete, Successfully!")</script>
        
        ';
        header("location:requests.php");
    }
    else {
        echo '
        <script type="text/javascript">alert("Request not Deleted,!")</script>
        
        ';
        header("location:requests.php");
    }
}
if (isset($_GET['delfarmer'])){
    $delfarmer=$_GET['delfarmer'];
    $del_quer=mysqli_query($conn,"DELETE FROM farmers WHERE farmer_id='$delfarmer' ");  
    if ($del_quer) {
        echo '
        <script type="text/javascript">alert(" Delete, Successfully!")</script>
        
        ';
        header("location:addfarmer.php");
    }
    else {
        echo '
        <script type="text/javascript">alert("Farmer not Deleted,!")</script>
        
        ';
        header("location:addfarmer.php");
    }
}

?>