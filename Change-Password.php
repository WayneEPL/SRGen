<?php
  include('_core/init.php'); 
  protected_page();
  $title = "Change Password";
  include('_include/header.php'); 
  if(empty($_POST)==false){
  $required_fields = array('current_password','password','password_again');
  foreach($_POST as $key=> $value){
    if(empty($value) && in_array($key, $required_fields) == true){
      $errors[]="Fields marked in asterisk are required";
      break 1;
    }
  }
  if(md5($_POST['current_password'])== $user_data['password']){   // check the current passwoed
      if(trim($_POST['password'])!== trim($_POST['password_again'])){ // check for password match
        $errors[]="The new password entered is does not match";
      }else if(strlen($_POST['password']) < 6 ){                 // check for password length 
        $errors[]="your new password must be atleast 6 characters ";
      }else if($_POST['current_password']== trim($_POST['password'])){ // check if new password is same as the old one
      $errors[]="your new password is same as the old one ";
      }
    }else{
      $errors[]="The current password entered is incorrect";
    } 
  }

  if(empty($errors)== true && empty($_POST) == false){
    change_password($session_user_id,$_POST['password']);
    reset_flags($session_user_id,"change");
    header('Location:Change-Password.php?changed');
    exit();
  }

  if(isset($_GET['force']) && empty($_GET['force'])){
    $errors[] = "You Must change password to proceed.";
  }
?>
  <div class="col-6 col-sm-6 col-lg-4">
    <form class="" role="form" method="post">
      <h2>Password Change</h2>
      <p>Please type in your current password and the new password to change</p>
    <?php 
      if(isset($_GET['changed']) && empty($_GET['changed'])){
        echo '<div class="alert alert-success"> Password Changed ..!</div>';
      }
      if(empty($errors) == false):
        output_errors($errors);
      endif;
    ?>
      <label for="password">Current Password</label>
      <input type="password" class="form-control" name="current_password" placeholder="Current Password" required autofocus>
      <br/>
      <label for="password">New Password</label>
      <input type="password" class="form-control" name="password" placeholder="New Password" required>
      <br/>
      <label for="password">New Password Again</label>
      <input type="password" class="form-control" name="password_again" placeholder="New Password" required>
      <br/>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Change Password</button>
    </form>
  </div>
<?php include('_include/footer.php'); ?>