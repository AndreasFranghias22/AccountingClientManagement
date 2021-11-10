<?php 
    $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }    
    $id = base64_decode($_GET['id']);
  
  if (isset($_POST['updatestudent'])) {
  	$name = $_POST['name'];
  	$roll = $_POST['roll'];
  	$address = $_POST['address'];
  	$pcontact = $_POST['pcontact'];
  	$class = $_POST['class'];
  	$clientemail = $_POST['clientemail'];
  	$gstnumber = $_POST['gstnumber'];
  	$qstnumber = $_POST['qstnumber'];
  	$neqnumber = $_POST['neqnumber'];
  	$dasfed = $_POST['dasfed'];
  	$daspro = $_POST['daspro'];
  	$dasfedcyc = $_POST['dasfedcyc'];
  	$dasprocyc = $_POST['dasprocyc'];
  	$yearend = $_POST['yearend'];

  	
  	$query = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$address',`pcontact`='$pcontact',`clientemail`='$clientemail',`gstnumber`='$gstnumber',`qstnumber`='$qstnumber',`neqnumber`='$neqnumber',`dasfed`='$dasfed',`daspro`='$daspro',`dasfedcyc`='$dasfedcyc',`dasprocyc`='$dasprocyc',`yearend`='$yearend' WHERE `id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Student Updated!</p>';
  		header('Location: index.php?page=all-student&edit=success');
  	}else{
  		header('Location: index.php?page=all-student&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>Edit Client Informations!<small class="text-warning"></small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-student">All Student </a></li>
     <li class="breadcrumb-item active" aria-current="page">Edit Client</li>
  </ol>
</nav>

<?php
		if (isset($id)) {
			$query = "SELECT `id`, `name`, `roll`, `class`, `city`, `pcontact`,`clientemail`,`gstnumber`,`qstnumber`,`neqnumber`,`dasfed`,`daspro`,`dasfedcyc`,`dasprocyc`,`yearend` ,`datetime` FROM `student_info` WHERE `id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);

		}
	 ?>
<div class="row">

<div class="col-sm-6">
<button><a href="xls/gst_qst_template.xls" download="<?php echo $row['roll']."-GstQst.xls";?>" >GST/QST</a></button>
<button><a href="xls/das_template.xls" download="<?php echo $row['roll']."-Das.xls";?>" >DAS</a></button>

<?php echo 
		'<td style="display: flex;">
		<button><a href="index.php?page=create-payroll&id='.base64_encode($row['id']).'">Timesheet</a></button>';
?>

    <?php 
      $query=mysqli_query($db_con,'SELECT * FROM `student_info` ORDER BY `student_info`.`datetime` DESC;');
      $i=1;
      $result = mysqli_fetch_array($query) ;
;?>
      </tr>      
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Client Full Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="roll">Company Name</label>
		    <input name="roll" type="text" class="form-control" id="roll" value="<?php echo $row['roll']; ?>" required="">
	  	</div>

	  	<div class="form-group">
		    <label for="address">Address</label>
		    <input name="address" type="text" class="form-control" id="address" value="<?php echo $row['city']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="pcontact">Phone Number</label>
		    <input name="pcontact" type="text" class="form-control" id="pcontact" value="<?php echo $row['pcontact']; ?>" placeholder="5147........" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="clientemail">Client Email</label>
		    <input name="clientemail" type="text" class="form-control" id="clientemail" value="<?php echo $row['clientemail']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="gstnumber">GST Number</label>
		    <input name="gstnumber" type="text" class="form-control" id="gstnumber" value="<?php echo $row['gstnumber']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="qstnumber">QST Number</label>
		    <input name="qstnumber" type="text" class="form-control" id="qstnumber" value="<?php echo $row['qstnumber']; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="neqnumber">NEQ Number</label>
		    <input name="neqnumber" type="text" class="form-control" id="neqnumber" value="<?php echo $row['neqnumber']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="dasfed">DAS Fed</label>
		    <input name="dasfed" type="text" class="form-control" id="dasfed" value="<?php echo $row['dasfed']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="daspro">DAS Pro</label>
		    <input name="daspro" type="text" class="form-control" id="daspro" value="<?php echo $row['daspro']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="dasfedcyc">DAS Fed Cycle</label>
		    <select name="dasfedcyc" class="form-control" id="dasfedcyc" required="" value="<?php echo $row['dasfedcyc']; ?>"
		    	><option>Select</option>
		    	<option value="Monthly" <?= $row['dasfedcyc']=='Monthly'? 'selected':'' ?>>Monthly</option>
		    	<option value="Quarterly" <?= $row['dasfedcyc']=='Quarterly'? 'selected':'' ?>>Quarterly</option>
		    	<option value="Semi-Anually" <?= $row['dasfedcyc']=='Semi-Anually'? 'selected':'' ?>>Semi-Anually</option>
		    	<option value="Anually" <?= $row['dasfedcyc']=='Anually'? 'selected':'' ?>>Anually</option>
		    </select>
	  	</div>
	  	<div class="form-group">
		    <label for="dasprocyc">DAS Pro Cycle</label>
		    <select name="dasprocyc" class="form-control" id="dasprocyc" required="" value="<?php echo $row['dasprocyc']; ?>"
		    ><option>Select</option>
		    	<option value="Monthly" <?= $row['dasprocyc']=='Monthly'? 'selected':'' ?>>Monthly</option>
		    	<option value="Quarterly" <?= $row['dasprocyc']=='Quarterly'? 'selected':'' ?>>Quarterly</option>
		    	<option value="Semi-Anually" <?= $row['dasprocyc']=='Semi-Anually'? 'selected':'' ?>>Semi-Anually</option>
		    	<option value="Anually" <?= $row['dasprocyc']=='Anually'? 'selected':'' ?>>Anually</option>
		    </select>
	  	</div>
	  	<div class="form-group">
		    <label for="yearend">Year End</label>
		    <input name="yearend" type="date" class="form-control" id="yearend" value="<?php echo $row['yearend']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="class">Gdt/Qst Cycle</label>
		    <select name="class" class="form-control" id="class" required="" value="<?php echo $row['class']; ?>">
		    	<option>Select</option>
		    	<option value="Monthly" <?= $row['class']=='Monthly'? 'selected':'' ?>>Monthly</option>
		    	<option value="Quarterly" <?= $row['class']=='Quarterly'? 'selected':'' ?>>Quarterly</option>
		    	<option value="Semi-Anually" <?= $row['class']=='Semi-Anually'? 'selected':'' ?>>Semi-Anually</option>
		    	<option value="Anually" <?= $row['class']=='Anually'? 'selected':'' ?>>Anually</option>
		    </select>
	  	</div>
	  	<div class="form-group text-center">
		    <input name="updatestudent" value="Edit Client" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>