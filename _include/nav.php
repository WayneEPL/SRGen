<!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">SRGEN Control Panel</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
		<li><a href="Settings.php">Details</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown <?php if(strcmp($current_page,"Change-Password.php") == 0 || strcmp($current_page,"Settings.php") == 0) echo "active"; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hi <?php echo $user_data['name'] ?> ! <span class="caret"></span></a>
                <ul class="dropdown-menu navbar-right" role="menu">
                  <li <?php if(strcmp($current_page,"Settings.php") == 0) echo 'class="active"'; ?>><a href="Settings.php">Setings</a></li>
                  <li <?php if(strcmp($current_page,"Change-Password.php") == 0) echo 'class="active"'; ?> ><a href="Change-Password.php">Change Passwords</a></li>
                  <li><a href="Logout.php">Log out</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
