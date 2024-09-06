<?php
session_start();

include('../conexões/protect.php');
//include auth_session.php file on all user panel pages
?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Tela do Paciente</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link href="dashboard.css" rel="stylesheet">
</head>
<body>
    <nav>
	<div class="logo-name">
            <div class="logo-image">
                <img src="../../../imagens/logo.png" alt="">
            </div>

            <span class="logo_name">Fisio Digital</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../../../index.html">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Tela Inicial</span>
                </a></li>
                <li><a href="perfil/perfil.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Editar Perfil</span>
                </a></li>
                <li><a href="https://wa.me/5561998149548">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Chat</span>
                </a></li>
                <li><a href="nova-consulta/book1.php">
                    <i class="uil uil-calender"></i>
                    <span class="link-name">Nova Consulta</span>
                </a></li>
                <li><a href="consultas-marcadas/viewappointment.php">
                    <i class="uil uil-schedule"></i>
                    <span class="link-name">Consultas Marcadas</span>
                </a></li>
                <li><a href="treinos/resumo_treino.html">
                    <i class="uil uil-book-medical"></i>
                    <span class="link-name">Ver Treinos</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../../menu.html">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
	<div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Pesquise aqui...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Painel do Paciente</span>
                </div>

                <div class="boxes">
                    <a href="nova-consulta/book1.php" class="box box1">
                        <i class="fas fa-thumbs-up"></i>
                        <span class="text">Nova Consulta</span>
                    </a>
                    <a href="consultas-marcadas/viewappointment.php" class="box box2">
                        <i class="fas fa-comments"></i>
                        <span class="text">Consultas Marcadas</span>
                    </a>
                    <a href="treinos/resumo_treino.html" class="box box3">
                        <i class="fas fa-share"></i>
                        <span class="text">Ver Treinos</span>
                    </a>
                </div>
                
            </div>
<?php
    include("../conexões/db.php");
    $clientid = $_SESSION['id'];

    $query    = "SELECT * FROM `loginc` WHERE clientid=$clientid;";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    if($result)
    {
    $data = mysqli_fetch_assoc($result);
    $clientname = $data['clientname'];
    }
?>
            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Olá, <?php echo $clientname ?>!</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Como funciona os botões:</span>
                        <span class="data-list">Tela inicial</span>
                        <span class="data-list">Editar Perfil</span>
                        <span class="data-list">Chat</span>
                        <span class="data-list">Nova Consulta</span>
                        <span class="data-list">Consultas Marcadas</span>
                        <span class="data-list">Ver Treinos</span>
                        <span class="data-list">Logout</span>
                    </div>
                    <div class="data email">
                        <span class="data-title"></span>
                        <span class="data-list">Te redireciona para a tela inicial da fisio digital.</span>
                        <span class="data-list">Permite que você altere suas informações pessoais.</span>
                        <span class="data-list">Possibilita o contato direto com a secretária.</span>
                        <span class="data-list">Página onde será possivel a marcação de consultas.</span>
                        <span class="data-list">Todas as consultas, futuras, passadas e as do dia atual.</span>
                        <span class="data-list">Permite que o paciente veja os treinos cadastrados pelo Fisioterapeuta.</span>
                        <span class="data-list">Te redireciona para a tela de login do doutor e do paciente.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/script2.js"></script>
</body>
</html>
</body>
</html>