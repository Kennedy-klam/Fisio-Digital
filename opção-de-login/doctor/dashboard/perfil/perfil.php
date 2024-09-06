<?php
include('../../conexões/db.php');
include("../../conexões/protect.php");
$id=$_SESSION['id'];
$sql = "SELECT * FROM `logind` WHERE `doctorid`= $id;";
$execute1 = mysqli_query($con,$sql);
		if($execute1)
		{
			$data = mysqli_fetch_assoc($execute1);
			$doctorname=$data['doctorname'];
			$doctoremail=$data['doctoremail'];
			$phoneno=$data['phoneno'];
			$speciality=$data['speciality'];
			$experience=$data['experience'];
			$age=$data['age'];
			$sex=$data['sex'];
		}
		else
		{
			
			echo "error in getting details from database";
		}
//session and database string	
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Meu Perfil</title>
	<link rel="shortcut icon" href="http://localhost/Fisio_Digital/src/images/favicon_32x32.png" type="image/x-icon">
	<link rel="stylesheet" href="perf.css">
</head>

<body>
	<header>
		<h1>
			Dados do Usuario
		</h1>
	</header>

	<div class="container-fluid">
<form action="update.php" method="POST" enctype="multipart/form-data" class="my-5 w-50 mx-auto myform"> 
<div class="textfield" >
    <label>Digite o nome do Doutor</label>
	<div class="box">
    <input type="text" class="form-control" name="name" required require value = <?php echo $doctorname?>>
  </div>
  <div class="textfield" >
    <label>Digite o email</label>
	<div class="box">
    <input type="text" class="form-control" name="email" required require value = <?php echo $doctoremail?>>
  </div>

  <div class="textfield" >
    <label>Número de Telefone</label>
	<div class="box">
    <input type="text" class="form-control" required name="phone_no" value = <?php echo $phoneno?>>
  </div>

  <div class="textfield" >
    <label>Especialidade</label>
	<div class="box">
    <input type="text" class="form-control" required name="special" value = <?php echo $speciality?>>
  </div>
  <div class="textfield" >
    <label>Experiência</label>
	<div class="box">
    <input type="text" class="form-control" required name="exp" value = <?php echo $experience?>>
  </div>
  <div class="textfield" >
    <label>Idade</label>
	<div class="box">
    <input type="text" class="form-control" required name="age" value = <?php echo $age?>>
  </div>

  <div class="textfield" >
    <label>Sexo</label>
	<div class="box">
    <input type="text" class="form-control" required name="sex" value=<?php echo $sex ?>>
  </div>
  </div>

</div>

	<footer>
		<a href = "../dashboard.php">Voltar</a>
		<button type="submit" class="btn btn-primary"value="submit" name="submit">Enviar</button>
		</form> 
	</footer>
	
</body>

</html>