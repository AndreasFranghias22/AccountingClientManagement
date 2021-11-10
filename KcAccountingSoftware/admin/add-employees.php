<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addemployee'])) {

	$companyid = $_POST['companyid'];
  	$fname = $_POST['fname'];
  	$lname = $_POST['lname'];
  	$city = $_POST['city'];
  	$postalcode = $_POST['postalcode'];
  	$ephonenum = $_POST['ephonenum'];
  	$sin =$_POST['sin'];
  	$position =$_POST['position'];
  	$salary =$_POST['salary'];
  	$hours =$_POST['hours'];
  	$gst =$_POST['gst'];
  	$qst =$_POST['qst'];
  	$insurance =$_POST['insurance'];
  	 
  	$query = "INSERT INTO `employees`(`companyid`,`fname`, `lname`, `city`, `postalcode`, `ephonenum`,`sin`,`position`,`salary`,`hours`,`gst`,`qst`,`insurance`) VALUES ('$companyid','$fname', '$lname', '$city', '$postalcode', '$ephonenum','$sin','$position','$salary','$hours','$gst','$qst','$insurance');";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Employee Inserted!</p>';

  		
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Employee Not Inserted, please input right informations!</p>';
  		 		var_dump($query);
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>Add Employee<small class="text-warning"></small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Client Insert Alert</strong>
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

		<?php 
      $query=mysqli_query($db_con,'SELECT * FROM `student_info` ORDER BY `student_info`.`datetime` DESC;');
      $i=1;
      $result = mysqli_fetch_array($query) ;
;?>
	<form enctype="multipart/form-data" method="POST" action="" style="width: 825px;">



	  	<div class="form-group">
		    <label for="companyid">Employer Name</label>
		    <select name="companyid" class="form-control" id="companyid" required="" value="Select">
		    <option>Select</option>

<?php 
      $query=mysqli_query($db_con,'SELECT * FROM `student_info` ORDER BY `student_info`.`datetime` DESC;');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
		<option value="<?php echo $result['id'];?>" <?= $result['roll']=='Monthly'? 'selected':'' ?>><?php echo $result['roll'];?></option>		
		    <?php 
  			$companyid = $result['id'];

		    $i++;} ?>
		    </select>
	  	</div>

		<div class="form-group">
		    <label for="fname">First Name</label>
		    <input name="fname" type="text" class="form-control" id="fname" value="<?= isset($fname)? $fname: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="lname">Last Name</label>
		    <input name="lname" type="text" value="<?= isset($lname)? $lname: '' ; ?>" class="form-control" id="lname" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="city">City</label>
		    <input name="city" type="text" value="<?= isset($city)? $city: '' ; ?>" class="form-control" id="city" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="postalcode">Postal Code</label>
		    <input name="postalcode" type="text" class="form-control" id="postalcode" value="<?= isset($postalcode)? $postalcode: '' ; ?>" placeholder="xxx-xxx" required="">
	  	</div>

	  	<div class="form-group">
		    <label for="ephonenum">Phone Number</label>
		    <input name="ephonenum" type="text" value="<?= isset($ephonenum)? $ephonenum: '' ; ?>" class="form-control" id="ephonenum" required="">
	  	</div>


	  	<div class="form-group">
		    <label for="employeeemail">Email</label>
		    <input name="employeeemail" type="text" value="<?= isset($employeeemail)? $employeeemail: '' ; ?>" class="form-control" id="employeeemail" required="">
	  	</div>
	  		  	<div class="form-group">
		    <label for="sin">S.I.N</label>
		    <input name="sin" type="text" value="<?= isset($sin)? $sin: '' ; ?>" class="form-control" id="sin" required="">
	  	</div>
	  		  	<div class="form-group">
		    <label for="position">Position Title</label>
		    <input name="position" type="text" value="<?= isset($position)? $position: '' ; ?>" class="form-control" id="position" required="">
	  	</div>
	  		  	<div class="form-group">
		    <label for="salary">Salary</label>
		    <input name="salary" type="text" value="<?= isset($salary)? $salary: '' ; ?>" class="form-control" id="salary" required="">
	  	</div>
	   <div class="form-group">
		    <label for="hours">Hours</label>
		    <input name="hours" type="text" value="<?= isset($hours)? $hours: '' ; ?>" class="form-control" id="hours" required="">
	  	</div>
	   <div class="form-group">
		    <label for="gst">Gst %</label>
		    <input name="gst" type="text" value="<?= isset($gst)? $gst: '' ; ?>" class="form-control" id="gst" required="">
	  	</div>
	   <div class="form-group">
		    <label for="qst">Qst %</label>
		    <input name="qst" type="text" value="<?= isset($qst)? $qst: '' ; ?>" class="form-control" id="qst" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="insurance">Insurance</label>
		    <input name="insurance" type="text" value="<?= isset($insurance)? $insurance: '' ; ?>" class="form-control" id="insurance" required="">
	  	</div>


	  	<div class="form-group text-center">
		    <input name="addemployee" value="Add Employee" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>
