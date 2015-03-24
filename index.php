<?php
  include('_core/init.php'); 
  
  if(loggedin()== true){
    $title = "Dashboard";
    include('_include/header.php'); 
    include('_include/dashboard.php');
  }else{
    $title = "Please Login";
    include('_include/header.php');
    include('_include/login-form.php'); 
  }
?>

<?php include('_include/footer.php'); ?>