<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title> Doctor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>

	<div class="col-sm-2">
		<a href="../dashboard.php" class="btn btn-dark">Painel do Paciente</a>
	</div>
	<!--  --------------------------------------------showing date and time-=================--------------------       -->
	<h2 class="pt-3 pb-3 text-center">Escolha a clinica para o relatorio do paciente</h2>
	<hr style="border:2px solid; width:50%;	">
	<h4>Data : <?php echo date("d-m-Y"); ?><h4>

			<h4>Horário : <?php date_default_timezone_set('America/Sao_Paulo');
						$currentTime = date('h:i:s A', time());
						echo $currentTime;
						?></h4>
			<br>
			<hr style="border:2px solid;">
			<div class="container">
				<?php
				include('../../conexões/db.php');
				$allergy = $_GET['allergy'];
				$prescription = $_GET['description'];
				$report = $_GET['report'];
				$status = $_GET['status'];
				$appointmentid = $_GET['id'];
				$clint_id = $_GET['clientid'];

				$qry = "UPDATE `appointment` SET `status` = '$status', `prescription` = '$prescription', `report_need` = '$report' WHERE `appointment`.`appointmentid` = $appointmentid ;";
				$ans1 = mysqli_query($con, $qry);




				$qry2 =  "UPDATE `loginc` SET `allergy` = '$allergy ' WHERE `loginc`.`clientid` =$clint_id;";
				$ans2 = mysqli_query($con, $qry2);
				if ($ans1 && $ans2) {
					echo "<h5 class='alert alert-danger'> Details Updated</h5>";
				} else {
					echo " <h5 class='alert alert-danger'> Not Updated Go Back </h5>";
				}
				?>

				<br>
				<?php

				if ($report == "yes") {


				?>

					<form action="finalchanges.php" method="get" class="w-50">
						<div class="form-group">
							<label for="labs">Choose Laboratory:</label>
							<select id="labs" name="value" class="custom-select" required>
								<option value="">Select laboratory for report</option>
								<?php
								$qry =  "SELECT * FROM `cliniclogin`";
								$ans = mysqli_query($con, $qry);

								while ($data = mysqli_fetch_assoc($ans)) {

								?>
									<option value=<?php echo $data['clinicid'] ?>>Nome da Clinica - <?php echo $data['clinicname'] ?></option>
								<?php
								}

								?>
							</select>
						</div>
						<button type="submit" class="btn btn-primary" value="Submit" name="lab_select">Submit Labname Data</button>
					</form>
				<?php
				} else {

				?>

					<a href="../dashboard.php">voltar</a>

					<<?php }
						?> </div>


						<!-- Optional JavaScript -->
						<!-- jQuery first, then Popper.js, then Bootstrap JS -->
						<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
						<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
						<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>