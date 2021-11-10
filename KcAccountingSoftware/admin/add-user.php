<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['adduser'])) {
  	$name = $_POST['name'];
  	$email = $_POST['email'];
  	$username = $_POST['username'];
  	$password = sha1($_POST['password']);



  	$query = "INSERT INTO `users`(`name`, `email`, `username`, `password`) VALUES ('$name', '$email', '$username', '$password');";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">User Inserted!</p>';

  		
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">User Not Inserted, please input right informations!</p>';
  		 		var_dump($query);
  	}
  }
?>
<body style="min-height: 539px;">
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add User<small class="text-warning"></small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add User</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">User Insert Alert</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
	</div>
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="" style="width: 825px;">
		<div class="form-group">
		    <label for="name">User Full Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?= isset($name)? $name: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="email">Email</label>
		    <input name="email" type="text" value="<?= isset($email)? $email: '' ; ?>" class="form-control" id="email" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="username">Username</label>
		    <input name="username" type="text" value="<?= isset($username)? $username: '' ; ?>" class="form-control" id="address" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="password">Password</label>
		    <input name="password" type="Password" class="form-control" id="password" value="<?= isset($password)? $password: '' ; ?>" required="">
	  	</div>
<!-- ///////////////////////////////////////////////////end/////////////////////////////////////////////////////////// -->
	  	<div class="form-group text-center">
		    <input name="adduser" value="Add User" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>
</body>