<?php 
//check if user has login;
session_start();
require_once 'inc/Connection.php';

if((isset($_COOKIE['adminuser']) && isset($_COOKIE['password']))||(isset($_SESSION['adminuser'])&&isset($_SESSION['password'])))
{
$id="";
  $status="";
  if(isset($_COOKIE['userid']))
  {
    $id=$_COOKIE['userid'];
    
  }
  else{
    $id=$_SESSION['userid'];
  
    
  }	
 
  $result=mysqli_query($con," SELECT * FROM acc_admin WHERE id=".$id);
  $userprofile=mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>reported_casefiles...</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">	
		<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'rel='stylesheet'>
        <link rel="shortcut icon" href="infinitiv.ico">  


    </head>

	

    <body>
       
	   
	    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="dashboard.php">Icheck <img src="images/icheck5.jpg" style="width:60px;height:30px;" alt="icheck"  class="img-circle"></a>
						
                    <div class="nav-collapse collapse navbar-inverse-collapse">

                      <ul class="nav nav-icons">
                            <li class="active"><a href="generate_reports.php"><i class="icon-envelope"></i></a></li>
                            <li><a href="bodaOperatorsAccounts.php"><i class="icon-eye-open"></i></a></li>
                            <li><a href="dashboard.php"><i class="icon-bar-chart"></i></a></li>
                        </ul>
						
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
						
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Accounts
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="bodaOperatorsAccounts.php">Boda Operators' Accounts</a></li>
									 <li class="divider"></li>
                                    <li><a href="#">Boda Clients' Accounts</a></li>

                                </ul>
                            </li>
                            <li><a href="#">Support Team </a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
								<li><a href="#"><h5 style=color:#04C5E6><b>Welcome  <?php echo $userprofile['Name'];?></b></h5></a></li>
                                    <li><a href="#">Profiles</a></li>                                   
                                    <li><a href="#">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                   
                </div>
            </div>
            
        </div>
		
		
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
				
                    
					
					
                    <div class="span9">
                        <div class="content" style="width:146%">
                            
                            <div class="module-head">
                                    <h3>
                                        Reported Case File Records</h3>
                                </div>
								
                         <div class="module-option clearfix">
                                    <div class="pull-left">
                                        <div class="btn-group">
                                            <button class="btn">
                                                Settings</button>
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
											   <li><a href="dashboard.php"><i class="menu-icon icon-dashboard" ></i>Dash board</a></li>  
                                                <li><a href="newbodaOperatorAcc.php"><i class="icon-user" ></i>Add new user</a></li>
												
												<li><a href="file_print_reportedcase_files.php"><i class="menu-icon icon-file" ></i>Export pdf</a></li>
                                                
                                               
                                            </ul>
                                        </div>
                                    </div>
								
                                    <script>
									function myFunction() {
									    location.reload();
									}
									</script>
									                                    
							    <div class="pull-right">
                                        <button onclick="myFunction()" class="btn btn-light">Refresh Page</>
                                    </div>
                                </div>
						               
								 <table cellpadding="0" cellspacing="0" border="1" class="datatable-1 table table-bordered table-hover display" width="100%">
								 
								   <thead>
								    <br>
                                    <tr class="success">
									     <th>#AOBNU.</th>
                                        <th>Date of crime</th>
                                        <th>CrimeNature</th>
										<th>PerpetratorName</th>
										<th>CrimeStatus</th>
										<th>Victims</th>
										<th>Description</th>
										<th>ReportedBy</th>
										<th>ReporterlId</th>
										<th>CrimeLoc</th>
										<th>PerpetratorDesc</th>
										<th>Case Status</th>
										<th>Action</th>
                                 
                                    </tr>
                                </thead>
								  
								   <tbody> 
								   <?php include('dbcon.php'); ?>
								 <?php $user_query=mysql_query("select * from crimereporting")or die(mysql_error());
								  while($row=mysql_fetch_array($user_query)){
								  
								  $id=$row['id']; ?>
								  <tr class="del<?php echo $id ?> success">
								   <td><?php echo $row['AOBNumber']; ?></td>
								  
								  <td><?php echo $row['Date']; ?></td>
								  <td><?php echo $row['CrimeNature']; ?></td>
								  <td><?php echo $row['ParpetratorName']; ?></td>
								  <td><?php echo $row['CrimeStatus']; ?></td>
								  <td><?php echo $row['Victims']; ?></td>
								  <td><?php echo $row['CrimeDescription']; ?></td>
								  <td><?php echo $row['Fullnames_clientvictim']; ?></td>
								  <td><?php echo $row['National_id']; ?></td>
								  <td><?php echo $row['CrimeLocation']; ?></td>
								  <td><?php echo $row['ParpetratorDescription']; ?></td>
								  
								   <td> <span class="label label-sm label-info"><?php echo $row['CaseStatus']; ?></span></td>
								
								   <td>
								 <a href="update_reortcasefile.php?id=<?php echo $row['AOBNumber'];?>" button class="btn btn-xs btn-success" title="edit user"><i class="icon-edit" ></i></a>
							      
									</td>
								  
								  </tr>
								  
								  
								  	<?php 
								  }
								  ?>
								  </tbody>
								  </table>
								  
								  
								  
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        
		
		
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
	    <script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		
        <script src="scripts/common.js" type="text/javascript"></script>
		
		
      
	  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});




</script>
	  
	  
	  
    </body>
</html>
<?php
}
else{
     header("Location:index.php");       
}
?>