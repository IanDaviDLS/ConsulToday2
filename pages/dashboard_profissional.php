<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
  header("Location: ../pages/consulta.php"); 
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Bem-vindo | ConsulToday</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f6fdff;
      color: #0a1a33;
    }


    /* Hero Section */
    .hero {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 80px 60px; 
      flex-wrap: wrap;
    }

    .hero-text {
      max-width: 500px;
      text-align: center;
    }

    .hero-text h1 {
      font-size: 32px;
      font-weight: 800;
      line-height: 1.3em;
    }

    .hero-text p {
      margin-top: 20px;
      line-height: 1.6em;
      color: #555;
    }

    /* Stats */
    .stats {
      display: flex;
      justify-content: center;
      gap: 100px;
      margin: 40px 0;
      text-align: center;
      flex-wrap: wrap;
    }

    .stats h2 {
      font-size: 28px;
      margin: 0;
    }

    .stats p {
      margin: 5px 0 0;
      font-size: 14px;
      color: #333;
    }

     .navbar {
            background: #0d0e18c4 !important;
            z-index: 10;
            padding: center;
        }

        .navbar .nav-link,
        .navbar .btn {
            color: white !important;
            font-weight: bold;
            padding: center; 
        }

        .navbar .btn {
            border-radius: 20px;
            border: 1px solid white;
            padding: 8px 18px; /* Ajuste para aumentar o tamanho */
            transition: 0.3s;
            white-space: nowrap; /* Evita quebra de linha */
            margin:0;
            border: none;
        }

        .navbar .btn:hover {
            background: white;
            color: #0c1128 !important;
        }

        .navbar .navbar-brand {
            text-align: center;
        }

        .navbar .navbar-nav {
            text-align: center;
        }


  </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg fixed-top bg-dark">
    <div class="container d-flex justify-content-center">
        <div class="d-flex align-items-center">
            <a class="navbar-brand text-white fw-bold mx-3" href="http://localhost/Projetos-agendamentos/">ConsulToday</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="btn mx-2" href="consulta.php">Agendamento</a></li>
                    <li class="nav-item"><a class="btn mx-2" href="sobre.php">Sobre Nós</a></li>
                 </ul>
            </div>
        </div>
    </div>
</nav>


  <div style="margin-top:100px"></div>

<!-- Hero Section -->
<section class="hero">
  <img 
  src=https://png.pngtree.com/png-vector/20250716/ourmid/pngtree-thin-line-icon-for-businessman-vector-png-image_7075041.png

    width="auto" height="auto"
    alt="Minha foto">

  <div class="hero-text">
    <h1>Olá, nós somos a equipe <br>ConsulToday <br>Seja bem-vindo!</h1>
    <h2>Quem nós somos?</h2>
    <p>
      O projeto ConsulToday visa facilitar o agendamento de consultas médicas online, permitindo o cadastro de pacientes e profissionais, gerenciamento de agendas e envio de notificações. As principais funcionalidades incluem login, CRUD de agenda, busca de médicos e lembretes. Utiliza tecnologias como PHP, HTML, CSS, Flutter, Java com Spring Boot e MySQL. O progresso atual abrange protótipos de telas e estrutura inicial da API. Os próximos passos incluem desenvolvimento completo das páginas web e mobile e implementação de endpoints na API.
    </p>
  </div>
</section> 

  <!-- Stats Section -->
  <section class="stats">
    <div>
      <h2>52</h2>
      <p>Clinicas</p>
    </div>
    <div>
      <h2>100</h2>
      <p>Pessoas atendidas</p>
    </div>
    <div>
      <h2>1</h2>
      <p>Anos de experiencia</p>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
