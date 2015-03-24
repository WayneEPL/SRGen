<?php
  include('_core/init.php'); 
  protected_page();
  $title = "Update User Profile";
  include('_include/header.php'); 
  if(empty($_POST)==false){
    $required_fields = array('register_no','admission_no','address','co_ordinator','head_of_division','hostel','branch','dob','doa','religion','cast','phone','admission_type');
    foreach($_POST as $key=> $value){
      if(empty($value) && in_array($key, $required_fields) == true){
        $errors[]="Fields marked in asterisk are required $key";
        break 1;
      }
    }
    if(empty($errors) == true){
      
      
    }
  }
  if(empty($errors)== true && empty($_POST) == false){
    $update_data= array(
    'name'   => $_POST['name'],
    'register_no'   => $_POST['register_no'],
    'admission_no'    => $_POST['admission_no'],
    'address'       => $_POST['address'],
    'co_ordinator'    => $_POST['co_ordinator'],
    'head_of_division'  => $_POST['head_of_division'],
    'hostel'      => $_POST['hostel'],
    'branch'      => $_POST['branch'],
    'dob'       => $_POST['dob'],
    'doa'       => $_POST['doa'],
    'religion'      => $_POST['religion'],
    'cast'        => $_POST['cast'],
    'phone'       => $_POST['phone'],
    'admission_type'  => $_POST['admission_type'] ,                
    'mod_user'     => $user_data['user_id'] 
    );
    update_user($update_data,$_SESSION['user_id']);
    header('Location:Settings.php?changed');
    exit();
  }
  include('_include/settings-menu.php');
  include('_include/footer.php'); ?>