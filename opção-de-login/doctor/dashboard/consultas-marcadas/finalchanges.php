<?php 
include("../../conexões/protect.php");
include('../../conexões/db.php');
$clinicid = $_GET['value'];
$doctorid = $_SESSION['id'];
$appointmentid =$_SESSION['id'];
$client_id =$_SESSION['id'];
$date = date("Y-m-d");
if(isset($_GET['lab_select']))
{
	$qry = "INSERT INTO reports (appointmentid, doctorid, clientid, clinicid, date_of_request) VALUES ($appointmentid, $doctorid , $client_id, $clinicid, $date)";
}	
	$execute = mysqli_query($con, $qry);
	
	if($execute)
	{
		
	?>
	<script>alert("laboratory details updated successfully");
			window.open('appointment.php','_SELF');
	</script>
			
	<?php
	}
	else
	{
		echo "error";
	}

?>