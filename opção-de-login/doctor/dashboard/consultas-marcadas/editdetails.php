<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Doctor Area</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
    
</head>

<body>
	
<?php

include('../../conexões/header.php');
include('../../conexões/conexao.php');
$_SESSION['appointmentid']=$_GET['id'];
$_SESSION['client_id']=$_GET['clientid'];
?>
<!--  --------------------------------------------showing date and time-=================--------------------       -->
<h1 class="text-center">Editar Consulta</h1>
<hr>
<br>
<br>

<h4 class="text-center">Detalhes antigos</h4>
</div>
<!-------------------------------displaying table==========================================-->
<div class='table-responsive'>
	<table class='table table-hover' >
	<thead>
	<tr>

	
		<th>Data</th>
		<th>Nome do paciente</th>
		<th>Horário</th>
		<th>Descrição</th>
		<th>Status</th>
		<th>Alergia</th>
		<th>Tipo sanguíneo</th>
		<th>Número celular</th>
		<th>Prescrição</th>
		<th>Necessidade de relatório</th>
	</tr>
	</thead>
<?php
include('../../conexões/db.php');
$id = $_GET['id'];
$_SESSION['appointmentid'] = $id ;
$client_id=$_GET['clientid'];
	$qry1 =  "SELECT * FROM `appointment` WHERE `appointmentid`=$id;";
	$ans1 = mysqli_query($con,$qry1);
	$qry2 =  "SELECT * FROM `loginc` WHERE `clientid`=$client_id;";
	$ans2 = mysqli_query($con,$qry2);
	if($ans1 && $ans2)
	{
			$data1 = mysqli_fetch_assoc($ans1);
			$data2 = mysqli_fetch_assoc($ans2);
			?><td><?php echo $data1['date'] ?></td><?php
			?><td><?php echo $_GET['name'] ?></td><?php
			?><td><?php echo $data1['timeslot'] ?></td><?php
			?><td><?php echo $data1['description'] ?></td><?php
			?><td><?php echo $data1['status'] ?></td><?php
			?><td><?php echo $allergy=$data2['allergy'] ?></td><?php
			?><td><?php echo $data2['bloodgroup'] ?></td><?php
			?><td><?php echo $data2['phoneno'] ?></td><?php
			?><td><?php echo $data1['prescription'] ?></td><?php
			?><td><?php echo $data1['report_need'] ?></td><?php
			
			
		
	}
?>
</table>
</div>

<hr>
<br>
<br>

<h4 class="text-center py-2" style="background-color: #79e3bd;">Escreva os novos detalhes abaixo</h4> 

<form action="updating.php" class=" form w-50 mx-auto my-5  " method="get" name="login">
	<div >
<!-- 		<form action="updating.php" action="get" class="form"> -->
	<div class="form-group" >
    <label>Alergia</label>
    <input type="text" class="form-control" name="allergy" placeholder="Enter allergies" value="<?php echo $allergy?>" required>
    </div>


	<div class="form-group" >
    <label>Prescrição</label>
    <input type="text" class="form-control" placeholder="Enter prescription" name="description" value="<?php echo $data1['prescription']?>" required>
    </div>

	<div class="form-group" >
    <label>Necessidade de relatório? </label>
	<input type="radio" name="report" value="yes" required>Sim &nbsp; &nbsp;<input type="radio" name="report" value="no">Não
    </div>

	<div class="form-group" >
    <label>Status do paciente</label>
    <input type="text" class="form-control" placeholder="Enter status" name="status" value="<?php echo $data1['status']?>" required>
    </div>

	<input type ="hidden" value="<?php echo $id ?>" name="id">
	<input type ="hidden" value="<?php echo $client_id ?>" name="clientid">

	<button type="submit" class="btn btn-dark" value="submit" name="submit">Enviar dados complementares</button>
</form>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                    crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
					crossorigin="anonymous"></script>

</body>