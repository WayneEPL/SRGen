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
      <input type="text" class="form-control" name="name" value="<?php echo $user_data['name'] ; ?>" required autofocus>
      <br/>
      <label for="last_name">Address</label>
      <input type="text" class="form-control" name="address" value="<?php echo $user_data['address'] ; ?>" required autofocus>
      <br/>
      <label for="email">E-Mail *</label>
      <input type="text" class="form-control" disabled value="<?php echo $user_data['email'] ; ?>" required autofocus>
      <br/>
    <br/>
      <label for="last_name">Registration Number</label>
    <input type="number" class="form-control" name="register_no" placeholder="Registration Number" <?php if(isset($user_data['register_no'])) echo 'value="'.$user_data['register_no'].'""';; ?>  required>
    <br/>
      <label for="last_name">Admission No</label>
    <input type="number" class="form-control" name="admission_no" placeholder="Admission Number" <?php if(isset($user_data['admission_no'])) echo 'value="'.$user_data['admission_no'].'""';; ?>  required>
     <br/>
      <label for="last_name">Co ordinator</label><input type="text" class="form-control" name="co_ordinator" placeholder="Staff Co Ordinator" <?php if(isset($user_data['co_ordinator'])) echo 'value="'.$user_data['co_ordinator'].'""';; ?>  required>
    <br/>
      <label for="last_name">Head of Division</label><input type="text" class="form-control" name="head_of_division" placeholder="Head of Division" <?php if(isset($user_data['head_of_division'])) echo 'value="'.$user_data['head_of_division'].'""';; ?>  required>
    <br/>
      <label for="last_name">Hostel</label><input type="text" class="form-control" name="hostel" placeholder="Hostel" <?php if(isset($user_data['hostel'])) echo 'value="'.$user_data['hostel'].'""';; ?>  required>
    <br/>
      <label for="last_name">Branch</label><input type="text" class="form-control" name="branch" placeholder="branch" <?php if(isset($user_data['branch'])) echo 'value="'.$user_data['branch'].'""';; ?>  required>
<br/>
      <label for="last_name">Date Of Birth</label>
    <input type="text" class="form-control" name="dob" placeholder="Date Of birth dd-mm-yyyy" <?php if(isset($user_data['doa'])) echo 'value="'.date("d-M-Y".strtotime($user_data['dob'])).'""';; ?>  required>
   <br/>
      <label for="last_name">Admission Date</label> <input type="text" class="form-control" name="doa" placeholder="Admission Date dd-mm-yyyy" <?php if(isset($user_data['doa'])) echo 'value="'.date("d-M-Y".strtotime($user_data['doa'])).'""';; ?>  required>
    <br/>
      <label for="last_name">Religion</label><input type="text" class="form-control" name="religion" placeholder="religion" <?php if(isset($user_data['religion'])) echo 'value="'.$user_data['religion'].'""';; ?>  required>
    <br/>
      <label for="last_name">Cast</label><input type="text" class="form-control" name="cast" placeholder="cast" <?php if(isset($user_data['cast'])) echo 'value="'.$user_data['cast'].'""';; ?>  required>
    <br/>
      <label for="last_name">Phone</label><input type="text" class="form-control" name="phone" placeholder="Phone" <?php if(isset($user_data['phone'])) echo 'value="'.$user_data['phone'].'""';; ?>  required>
    <label>Admission Type</label> 
    <select name="admission_type" class="form-control">
    <?php 
      echo "<option value=\"".$user_data['admission_type']."\">".$user_data['admission_type']."</option>";
    ?>
    <option value="Payment">Payment</option>
    <option value="Free">Free</option>
    </select>
    <br/>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
    </form>
  </div>