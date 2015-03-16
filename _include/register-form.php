<form class="form-signin" role="form" method="post" action="">
  <h2 class="form-signin-heading">Register</h2>
<?php 
	if(empty($errors) == false):
		output_errors($errors);
	endif;
?>
  <input type="text" class="form-control" name="username" placeholder="User Name" required autofocus>
  <input type="password" class="form-control" name="password" placeholder="Password" required>
  <input type="text" class="form-control" name="name" placeholder="Full Name" required>
  <input type="email" class="form-control" name="email" placeholder="E Mail" required>
  <input type="number" class="form-control" name="register_no" placeholder="Registration Number" required>
  <input type="number" class="form-control" name="admission_no" placeholder="Admission Number" required>
  <input type="text" class="form-control" name="address" placeholder="Address" required>
  <input type="text" class="form-control" name="co_ordinator" placeholder="Staff Co Ordinator" required>
  <input type="text" class="form-control" name="head_of_division" placeholder="Head of Division" required>
  <input type="text" class="form-control" name="hostel" placeholder="Hostel" required>
  <label>Branch</label>
  <select name="branch" class="form-control">
  	<option value="CS">Computer Science</option>
  </select>

  <input type="text" class="form-control" name="dob" placeholder="Date Of birth dd-mm-yyyy" required>
  <input type="text" class="form-control" name="doa" placeholder="Admission Date dd-mm-yyyy" required>
  <input type="text" class="form-control" name="religion" placeholder="religion" required>
  <input type="text" class="form-control" name="cast" placeholder="cast" required>
  <input type="text" class="form-control" name="phone" placeholder="Phon" required>
  <label>Admission Type</label>	
  <select name="admission_type" class="form-control">
  	<option value="Payment">Payment</option>
  	<option value="Free">Free</option>
  </select>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>