<form class="form-signin" role="form" method="post" action="">
  <h2 class="form-signin-heading">Register</h2>
<?php 
	if(empty($errors) == false):
		output_errors($errors);
	endif;
?>
  <input type="email" class="form-control" name="email" placeholder="E Mail" <?php if(isset($_POST['email'])) echo 'value="'.$_POST['email'].'""';; ?>  required>  <input type="password" class="form-control" name="password" placeholder="Password" required>
  <input type="text" class="form-control" name="name" placeholder="Full Name" <?php if(isset($_POST['name'])) echo 'value="'.$_POST['name'].'""';; ?>  required>
  <input type="number" class="form-control" name="register_no" placeholder="Registration Number" <?php if(isset($_POST['register_no'])) echo 'value="'.$_POST['register_no'].'""';; ?>  required>
  <input type="number" class="form-control" name="admission_no" placeholder="Admission Number" <?php if(isset($_POST['admission_no'])) echo 'value="'.$_POST['admission_no'].'""';; ?>  required>
  <input type="text" class="form-control" name="address" placeholder="Address" <?php if(isset($_POST['address'])) echo 'value="'.$_POST['address'].'""';; ?>  required>
  <input type="text" class="form-control" name="co_ordinator" placeholder="Staff Co Ordinator" <?php if(isset($_POST['co_ordinator'])) echo 'value="'.$_POST['co_ordinator'].'""';; ?>  required>
  <input type="text" class="form-control" name="head_of_division" placeholder="Head of Division" <?php if(isset($_POST['head_of_division'])) echo 'value="'.$_POST['head_of_division'].'""';; ?>  required>
  <input type="text" class="form-control" name="hostel" placeholder="Hostel" <?php if(isset($_POST['hostel'])) echo 'value="'.$_POST['hostel'].'""';; ?>  required>
  <label>Branch</label>
  <select name="branch" class="form-control">
  	<option value="CS">Computer Science</option>
  </select>

  <input type="text" class="form-control" name="dob" placeholder="Date Of birth dd-mm-yyyy" <?php if(isset($_POST['doa'])) echo 'value="'.$_POST['dob'].'""';; ?>  required>
  <input type="text" class="form-control" name="doa" placeholder="Admission Date dd-mm-yyyy" <?php if(isset($_POST['doa'])) echo 'value="'.$_POST['doa'].'""';; ?>  required>
  <input type="text" class="form-control" name="religion" placeholder="religion" <?php if(isset($_POST['religion'])) echo 'value="'.$_POST['religion'].'""';; ?>  required>
  <input type="text" class="form-control" name="cast" placeholder="cast" <?php if(isset($_POST['cast'])) echo 'value="'.$_POST['cast'].'""';; ?>  required>
  <input type="text" class="form-control" name="phone" placeholder="Phone" <?php if(isset($_POST['phone'])) echo 'value="'.$_POST['phone'].'""';; ?>  required>
  <label>Admission Type</label>	
  <select name="admission_type" class="form-control">
  	<option value="Payment">Payment</option>
  	<option value="Free">Free</option>
  </select>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
</form>