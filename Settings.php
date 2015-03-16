<?php
  include('_core/init.php'); 
  protected_page();
  $title = "Update User Profile";
  include('_include/header.php'); 
  if(empty($_POST)==false){
    $required_fields = array('first_name','email');
    foreach($_POST as $key=> $value){
      if(empty($value) && in_array($key, $required_fields) == true){
        $errors[]="Fields marked in asterisk are required";
        break 1;
      }
    }
    if(empty($errors) == true){
      if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)=== false){
        $errors[]="Please enter a valid email address";
      }else if(email_exist($_POST['email'])==true && $user_data['email']!==$_POST['email']){
        $errors[]="Sorry the email is already in use";
      }
      
    }
  }
  if(empty($errors)== true && empty($_POST) == false){
    $update_data= array(
    'first_name'   => $_POST['first_name'],
    'last_name'    => $_POST['last_name'],
    'email'      => $_POST['email'],
    'dob'      => $_POST['dob'],                  
    'mod_user'     => $user_data['user_id'],
    'last_mod'       => date("Y-m-d  h:i:s")      
    );
    update_user($update_data,$_SESSION['user_id']);
    header('Location:Settings.php?changed');
    exit();
  }
?>
  <div class="col-6 col-sm-6 col-lg-4">
    <form class="" role="form" method="post">
      <h2>User Settings</h2>
      <p>Change Account Details</p>
    <?php 
      if(isset($_GET['changed']) && empty($_GET['changed'])){
        echo '<div class="alert alert-success"> Account Updated ..!</div>';
      }
      if(empty($errors) == false):
        output_errors($errors);
      endif;
    ?>
      <label for="first_name">First Name *</label>
      <input type="text" class="form-control" name="first_name" value="<?php echo $user_data['first_name'] ; ?>" required autofocus>
      <br/>
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" name="last_name" value="<?php echo $user_data['last_name'] ; ?>" required autofocus>
      <br/>
      <label for="email">E-Mail *</label>
      <input type="text" class="form-control" name="email" value="<?php echo $user_data['email'] ; ?>" required autofocus>
      <br/>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
    </form>
  </div>
<?php include('_include/footer.php'); ?>