<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addClient'])) {
  	$name = $_POST['name'];
  	$roll = $_POST['roll'];
  	$address = $_POST['address'];
  	$pcontact = $_POST['pcontact'];
  	$class = $_POST['class'];
  	$clientemail =$_POST['clientemail'];
  	  $gstnumber =$_POST['gstnumber'];
  	  $qstnumber =$_POST['qstnumber'];
  	  $neqnumber =$_POST['neqnumber'];
  	  $dasfed =$_POST['dasfed'];
  	  $daspro =$_POST['daspro'];
  	  $dasfedcyc =$_POST['dasfedcyc'];
  	  $dasprocyc =$_POST['dasprocyc'];
  	  $yearend =$_POST['yearend'];

  	$query = "INSERT INTO `client_info`(`name`, `roll`, `class`, `city`, `pcontact`,`clientemail`,`gstnumber`,`qstnumber`,`neqnumber`,`dasfed`,`daspro`,`dasfedcyc`,`dasprocyc`,`yearend`) VALUES ('$name', '$roll', '$class', '$address', '$pcontact','$clientemail','$gstnumber','$qstnumber','$neqnumber','$dasfed','$daspro','$dasfedcyc','$dasprocyc','$yearend');";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Client Inserted!</p>';

  		
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Client Not Inserted, please input right informations!</p>';
  		 		var_dump($query);
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Client<small class="text-warning"></small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Client</li>
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
	<form enctype="multipart/form-data" method="POST" action="" style="width: 825px;">
		<div class="form-group">
		    <label for="name">Client Full Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?= isset($name)? $name: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="roll">Company Name</label>
		    <input name="roll" type="text" value="<?= isset($roll)? $roll: '' ; ?>" class="form-control" id="roll" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="address">Address</label>
		    <input name="address" type="text" value="<?= isset($address)? $address: '' ; ?>" class="form-control" id="address" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="pcontact">Phone Number</label>
		    <input name="pcontact" type="text" class="form-control" id="pcontact" value="<?= isset($pcontact)? $pcontact: '' ; ?>" placeholder="(514)-..." required="">
	  	</div>

	  	<div class="form-group">
		    <label for="clientemail">Email</label>
		    <input name="clientemail" type="text" value="<?= isset($clientemail)? $clientemail: '' ; ?>" class="form-control" id="clientemail" required="">
	  	</div>


	  	<div class="form-group">
		    <label for="gstnumber">GST #</label>
		    <input name="gstnumber" type="text" value="<?= isset($gstnumber)? $gstnumber: '' ; ?>" class="form-control" id="gstnumber" required="">
	  	</div>
	  		  	<div class="form-group">
		    <label for="qstnumber">QST #</label>
		    <input name="qstnumber" type="text" value="<?= isset($qstnumber)? $qstnumber: '' ; ?>" class="form-control" id="qstnumber" required="">
	  	</div>
	  		  	<div class="form-group">
		    <label for="neqnumber">NEQ #</label>
		    <input name="neqnumber" type="text" value="<?= isset($neqnumber)? $neqnumber: '' ; ?>" class="form-control" id="neqnumber" required="">
	  	</div>
	  		  	<div class="form-group">
		    <label for="dasfed">DAS FED</label>
		    <input name="dasfed" type="text" value="<?= isset($dasfed)? $dasfed: '' ; ?>" class="form-control" id="dasfed" required="">
	  	</div>
	   <div class="form-group">
		    <label for="daspro">DAS PRO</label>
		    <input name="daspro" type="text" value="<?= isset($daspro)? $daspro: '' ; ?>" class="form-control" id="daspro" required="">
	  	</div>


	  	<div class="form-group">
		    <label for="class">Gst/Qst)</label>
		    <select name="class" class="form-control" id="class" required="">
		    	<option>Select</option>
		    	<option value="Monthly">Monthly</option>
		    	<option value="Quarterly">Quarterly</option>
		    	<option value="Anually">Semi-Anually</option>
		    	<option value="Anually">Anually</option>
		    </select>
	  	</div>

	  	<div class="form-group">
		    <label for="dasfedcyc">DAS FED Cycle</label>
		    <select name="dasfedcyc" class="form-control" id="dasfedcyc" required="">
		    	<option>Select</option>
		    	<option value="Monthly">Monthly</option>
		    	<option value="Quarterly">Quarterly</option>
		    	<option value="Semi-Anually">Semi-Anually</option>
		    	<option value="Anually">Anually</option>
		    </select>
	  	</div>

	  	<div class="form-group">
		    <label for="dasprocyc">DAS PRO Cycle</label>
		    <select name="dasprocyc" class="form-control" id="dasprocyc" required="">
		    	<option>Select</option>
		    	<option value="Monthly">Monthly</option>
		    	<option value="Quarterly">Quarterly</option>
		    	<option value="Semi-Anually">Semi-Anually</option>
		    	<option value="Anually">Anually</option>
		    </select>
	  	</div>

	  	<div class="form-group">
		    <label for="yearend">Year End</label>
		    <input name="yearend" type="date" value="<?= isset($yearend)? $yearend: '' ; ?>" class="form-control" id="yearend" required="">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="addClient" value="Add Client" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>
