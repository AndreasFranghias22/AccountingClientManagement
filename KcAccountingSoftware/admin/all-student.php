<?php 
    $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
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



<h1 class="text-primary"><i class="fas fa-users"></i>  All Clients List<small class="text-warning"></small></h1>
<nav  aria-label="breadcrumb" style="width: 100%">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">All Clients</li>
  </ol>
</nav>
<?php if(isset($_GET['delete']) || isset($_GET['edit'])) {?>
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
        if (isset($_GET['delete'])) {
          if ($_GET['delete']=='success') {
            echo "<p style='color: green; font-weight: bold;'>Client Deleted Successfully!</p>";
          }  
        }
        if (isset($_GET['delete'])) {
          if ($_GET['delete']=='error') {
            echo "<p style='color: red'; font-weight: bold;>Client Not Deleted!</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='success') {
            echo "<p style='color: green; font-weight: bold; '>Client Edited Successfully!</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='error') {
            echo "<p style='color: red; font-weight: bold;'>Client Not Edited!</p>";
          }  
        }
      ?>
    </div>
  </div>
    <?php } ?>
<table class="table  table-striped table-hover table-bordered" id="data" style="margin-left: -200px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Company Name</th>
      <th scope="col">City</th> 
      <th scope="col">Contact</th>
      <th scope="col">Client Email</th>
      <th scope="col">GST#</th>
      <th scope="col">QST#</th>
      <th scope="col">NEQ#</th>
      <th scope="col">DAS FED</th>
      <th scope="col">DAS PRO</th>
      <th scope="col">Gst/Qst</th>
      <th scope="col">DAS FED Cycle</th>
      <th scope="col">DAS PRO Cycle</th>
      <th scope="col">Year End</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php 
      $query=mysqli_query($db_con,'SELECT * FROM `student_info` ORDER BY `student_info`.`datetime` DESC;');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo 
         '<td>'.$i.
         '<td>'.ucwords($result['name']).'</td>
          <td>'.$result['roll'].'</td>
          <td>'.ucwords($result['city']).'</td>
          <td>'.$result['pcontact'].'</td>
          <td>'.ucwords($result['clientemail']).'</td>
          <td>'.$result['gstnumber'].'</td>
          <td>'.ucwords($result['qstnumber']).'</td>
          <td>'.ucwords($result['neqnumber']).'</td>
          <td>'.ucwords($result['dasfed']).'</td>
          <td>'.$result['daspro'].'</td>
          <td>'.$result['class'].'</td>
          <td>'.ucwords($result['dasfedcyc']).'</td>
          <td>'.$result['dasprocyc'].'</td>
          <td>'.ucwords($result['yearend']).'</td>

          <td style="display: flex;">
            <a class="btn btn-xs btn-warning" href="index.php?page=editstudent&id='.base64_encode($result['id']).'">
              <i class="fa fa-edit"></i></a>

             &nbsp; <a class="btn btn-xs btn-danger" onclick="javascript:confirmationDelete($(this));return false;" href="index.php?page=delete&id='.base64_encode($result['id']).'">
             <i class="fas fa-trash-alt"></i></a>
          </td>';?>
      </tr>  
     <?php $i++;} ?>
    
  </tbody>
</table>
<script type="text/javascript">
  function confirmationDelete(anchor){
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>