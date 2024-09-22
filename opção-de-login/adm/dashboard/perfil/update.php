<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link href="css/dashboard.css" rel="stylesheet">
	</head>
<body>


<?php


if(isset($_POST['submit']))
	{
			include("../../conexões/header.php");
			include('../../conexões/db.php');
			include("../../conexões/protect.php");
			
			$clientname=$_POST['name'];
			$clientemail=$_POST['email'];
			$phoneno=$_POST['phone_no'];
			$dob=$_POST['dob'];
			$bg=$_POST['bg'];
			$address=$_POST['address'];
			$age=$_POST['age'];
			$sex=$_POST['sex'];

			echo $id=$_SESSION['id'];

		
		$sql = "UPDATE `loginc` SET clientname='$clientname', clientemail='$clientemail', phoneno='$phoneno', dob='$dob', bloodgroup='$bg' , address='$address', age='$age', sex='$sex' WHERE clientid = $id;";
		$execute1 = mysqli_query($con,$sql);
		if($execute1)
		{
			?>
			<script>
			alert("Atualizado com sucesso");
			window.open('../dashboard.php','_SELF');
			</script>
			<?php
			
			
		}
		else
		{
			?>
			<script>
		
			alert("Digite a informação do jeito certo");
			</script>
			
			<?php
		}
		
		
		
		
		
		$sql = "SELECT * FROM `loginc` WHERE `clientid`= $id;";
		$execute1 = mysqli_query($con,$sql);
		if($execute1)
		{
			$data = mysqli_fetch_assoc($execute1);
			?><pre><?php
			print_r($data);
			?>
			</pre><?php
			$clientname=$data['clientname'];
			$clientemail=$data['clientemail'];
			$phoneno=$data['phoneno'];
			$dob=$data['dob'];
			$bg=$data['bg'];
			$age=$data['age'];
			$sex=$data['sex'];
}

		
		
	}

?>