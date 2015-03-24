  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Welcome !</h1>
    <p>This is the user area for Srgen.</p>
    <p>
    <!--  <a class="btn btn-lg btn-primary" href="" role="button">View / Add News</a> <a class="btn btn-lg btn-primary" href="" role="button">View / Add Gallery</a> -->
      <table class="table">
      	<thead>
      		<tr>
      			<td>SL No</td>
      			<td>Name</td>
      			<td>Request</td>
      		</tr>
      	</thead>
      	<tbody>
      	<form action="Make-Request.php" method="post">
      <?php
      	$query = "SELECT * FROM forms where 1";
      	$result = mysql_query($query);
      	$i =1;
      	while($data = mysql_fetch_assoc($result)){
      		echo "<tr>";
      		echo "<td>".$i."</td>";
      		echo "<td>".$data['FORM_NAME']."</td>";
      		echo "<td><button class=\"btn btn-lg btn-primary\" value=\"".$data['ID']."\" name=\"form\">Request</button></td>";
      		$i++;
      		echo "</tr>";
      	}
      ?>
      	</form>
      	</tbody>
      </table>
    </p>
    <h3>Your Request</h3>
    <p>
      <table class="table">
        <thead>
          <tr>
            <td>SL No</td>
            <td>Name</td>
            <td>Download</td>
          </tr>
        </thead>
        <tbody>
        <form action="Make-Request.php" method="post">
      <?php
        $query = "SELECT * FROM requests where stu_id = $session_user_id";
        $result = mysql_query($query);
        $i =1;
        while($data = mysql_fetch_assoc($result)){
          echo "<tr>";
          echo "<td>".$i."</td>";
          echo "<td>".$data['form_identifyer']."</td>";
          if($data['status'] == 0)
            echo "<td><a class=\"btn btn-lg btn-primary\" >Pending</a></td>";
          elseif($data['status'] == 1)
            echo "<td><a class=\"btn btn-lg btn-warning\" >Processing</a></td>";
          else
           echo "<td><a class=\"btn btn-lg btn-success\" href=\"".$data['filename']."\" name=\"form\">Download</a></td>";
          $i++;
          echo "</tr>";
        }
      ?>
        </form>
        </tbody>
      </table>
    </p>
  </div>
