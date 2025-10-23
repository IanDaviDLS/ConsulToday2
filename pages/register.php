<?php 
// 1. INICIA A SESSÃO para usar mensagens de erro e dados do formulário
session_start(); 

// Recupera os dados do formulário da sessão para repopular os campos
$form_data = $_SESSION['form_data'] ?? [];
unset($_SESSION['form_data']); // Limpa após uso

// Variáveis para facilitar a repopulação (usadas no 'value' dos inputs)
$nome_val = htmlspecialchars($form_data['nome'] ?? '');
$email_val = htmlspecialchars($form_data['email'] ?? '');
$telefone_val = htmlspecialchars($form_data['telefone'] ?? '');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - ConsulToday</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(rgba(12, 17, 40, 0.85), rgba(12, 17, 40, 0.85)),
                        url('../assets/css/clinica-capa.png') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            color: #333;
        }
        .card {
            background-color: #fff;
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 450px;
            width: 100%;
            text-align: center;
        }
        .card-title {
            font-weight: 700;
            color: #0c1128;
            margin-bottom: 30px;
            font-size: 28px;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 12px 15px;
            margin-bottom: 20px;
            font-size: 16px;
        }
        .form-control:focus {
            border-color: #0c1128;
            box-shadow: 0 0 0 0.25rem rgba(12, 17, 40, 0.25);
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            border-radius: 8px;
            padding: 12px 25px;
            font-size: 18px;
            font-weight: 700;
            margin-top: 10px;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0a58ca;
            border-color: #0a58ca;
        }
        .mt-3 a {
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            transition: color 0.3s ease;
        }
        .mt-3 a:hover {
            color: #ccc;
        }

         .navbar {
            background: #0d0e18c4!important;
            z-index: 10;
        }

        .navbar .nav-link,
        .navbar .btn {
            color: white !important;
            font-weight: bold;
        }

        .navbar .btn {
            border-radius: 20px;
            border: 1px solid white;
            padding: 8px 18px; 
            transition: 0.3s;
            white-space: nowrap; 
            margin:0;
            border: none;
        }

        .navbar .btn:hover {
            background: white;
            color: #0c1128 !important;
        }

    </style>
</head>
<body>
    
    <?php 
    if (isset($_SESSION['registration_errors'])): 
    ?>
        <div class="alert alert-danger alert-dismissible fade show fixed-top mt-5" role="alert" style="z-index: 2000;">
            <strong>Erro de Cadastro!</strong>
            <ul>
                <?php 
                foreach ($_SESSION['registration_errors'] as $error) {
                    echo "<li>" . htmlspecialchars($error) . "</li>";
                }
                ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php 
        unset($_SESSION['registration_errors']); // Limpa os erros após exibi-los
    endif; 
    ?>
    <nav class="navbar navbar-expand-lg fixed-top bg-dark">
    <div class="container d-flex justify-content-center">
        <div class="d-flex align-items-center">
            <a class="navbar-brand text-white fw-bold mx-3" href="http://localhost/Projetos-agendamentos/">ConsulToday</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="btn mx-2" href="http://localhost/Projetos-agendamentos/pages/consulta.php">Agendamento</a></li>
                    <li class="nav-item"><a class="btn mx-2" href="http://localhost/Projetos-agendamentos/pages/dashboard.php">Sobre Nós</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

    <div class="card">
        <h2 class="card-title">Cadastro de Usuário</h2>
        <form action="../process/register_process.php" method="POST">
            <input type="text" class="form-control" name="nome" placeholder="Nome completo" required 
                   value="<?= $nome_val ?>">
                   
            <input type="email" class="form-control" name="email" placeholder="E-mail" required
                   value="<?= $email_val ?>">
                   
            <input type="tel" class="form-control" name="telefone" placeholder="Telefone" required
                   value="<?= $telefone_val ?>">
                   
            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <div class="mt-3">
            <a href="login.php">Já tem uma conta? Faça login</a>
        </div>
    </div>
</body>
</html>