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
?>
<div class="row student" >
  <div class="col-sm-4">
     <div class="card text-white bg-warning mb-3">
      <div class="card-header">
        <div class="row">
          <?php $usernameshow = $_SESSION['user_login']; $userspro = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$usernameshow';"); $userrow=mysqli_fetch_array($userspro); ?>
          <div class="col-sm-6">
            <img class="showimg" src="images/<?php echo $userrow['photo']; ?>">
            <div style="font-size: 20px"><?php echo ucwords($userrow['name']); ?></div>
          </div>
          <div class="col-sm-6">
            
            <div class="clearfix"></div>
            <div class="float-sm-right">Welcome!</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
        <a href="index.php?page=user-profile">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Your Profile</p>
          </div>
          <div class="col-sm-4">
            <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>  
</div>

<h1 class="text-primary"><i class="fas fa-users"></i>Generate Payroll<small class="text-warning"></small></h1>
<nav  aria-label="breadcrumb" style="width: 100%">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Generate Payroll</li>
  </ol>
</nav>

<table class="table  table-striped table-hover table-bordered" id="" style="margin-left: -285px;">

  <thead class="thead-dark">
    <tr> 
      <th scope="col">Employee ID</th>
      <th scope="col">Company ID</th>
      <th scope="col">First Name</th> 
      <th scope="col">Last Name</th>
      <th scope="col">City</th>
      <th scope="col">Postal Code</th>
      <th scope="col">Phone Number</th>
      <th scope="col">E-mail</th>
      <th scope="col">S.I.N</th>
      <th scope="col">JobTitle</th>
      <th scope="col">Salary</th>
      <th scope="col">Hours</th>
      <th scope="col">GST%</th>
      <th scope="col">QST$</th>
      <th scope="col">Insurance</th>
      <th scope="col">Total Pay</th>
    </tr>
  </thead>

  <tbody>
    <?php 
      $query=mysqli_query($db_con,'SELECT * FROM `employees` WHERE `companyid` = '.$id.';');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo 
        
         '<th>'.ucwords($result['id']).'</th>
          <th>'.$result['companyid'].'</th>
          <td>'.ucwords($result['fname']).'</td>
          <td>'.$result['lname'].'</td>
          <td>'.ucwords($result['city']).'</td>
          <td>'.$result['postalcode'].'</td>
          <td>'.ucwords($result['ephonenum']).'</td>
          <td>'.ucwords($result['employeeemail']).'</td>
          <td>'.ucwords($result['sin']).'</td>
          <td>'.$result['position'].'</td>
          <td> <input name="salary" type="text" class="form-control" id="salary" value="'.ucwords($result['salary']).'"></td>
          <td> <input name="hours" type="text" class="form-control" id="hours" value="'.ucwords($result['hours']).'"></td>
          <td> <input name="gst" type="text" class="form-control" id="gst" value="'.ucwords($result['gst']).'"></td>
          <td> <input name="qst" type="text" class="form-control" id="qst" value="'.ucwords($result['qst']).'"></td>
          <td> <input name="qst" type="text" class="form-control" id="qst" value="'.ucwords($result['insurance']).'"></td>
          <td style="display: flex;">
		    <input style="width:150px;" name="totalpay" type="text" class="form-control" id="totalpay" placeholder="0000.00$" required="">
          </td>';?>
      </tr>  
     <?php $i++;} ?>   	  	
  </tbody>
</table>
	  	<div class="form-group text-center">
		    <input name="createPayroll" value="Create Payroll" type="submit" class="btn btn-danger">
	  	</div>

<script type="text/javascript">
  function confirmationDelete(anchor){
   var conf = confirm('Are you sure want Create Payroll?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>