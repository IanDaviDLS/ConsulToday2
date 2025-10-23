<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ConsulToday - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        .login-section {
            background-color: #0a183d;
            color: white;
            padding: 60px 30px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 5;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            margin-bottom: 20px;
        }
        .form-control:focus {
            border-color: #0c1128;
            box-shadow: 0 0 0 0.25rem rgba(12, 17, 40, 0.25);
        }
        .login-btn {
            border-radius: 8px;
            padding: 12px 25px;
            background-color: white;
            color: #0c1128 !important;
            font-weight: 700;
        }
        .login-btn:hover {
            background-color: #ddd;
        }
        .left-img {
            background: url('../assets/css/ConsulToday.jpg') no-repeat center center;
            background-size: cover;
            height: 100vh;
        }
        .logo-text {
            font-size: 2rem;
            font-weight: 700;
        }
        .link-nav {
            color: white;
            text-decoration: none;
            font-weight: 400;
            margin-right: 15px;
            transition: color 0.3s;
        }
        .link-nav:hover {
            color: #ccc;
        }
        .error-message {
            color: #ffc107;
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            font-family: 'Open Sans', sans-serif;
            height: 100%;
        }
        /* Hero section */
        .hero {
            height: 100vh;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
        }

        .hero p {
            margin-top: 10px;
            font-size: 16px;
        }

        .hero button {
            margin-top: 20px;
            background-color: white;
            color: #001;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .hero button:hover {
            background-color: #ddd;
        }

        /* Navbar custom */
        .navbar {
            background: #0d0e18c4!important;
            z-index: 10;
        }

        .navbar .nav-link,
        .navbar .btn {
            color: white !important;
            font-weight: bold;
            margin:0;
            border: none;
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

        body {
            /* padding-top: 70px; */
        }
    </style>
</head>
<body> 
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

    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-6 left-img d-none d-md-block"></div>
            
            <div class="col-md-6 login-section">
                <div class="mb-4 text-end">
                </div>
                
                <div class="d-flex flex-column align-items-center">
                    <div class="text-center mb-4">
                        <h1 class="logo-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bandaid-fill" viewBox="0 0 12 20">
                                <path d="m2.68 7.676 6.49-6.504a4 4 0 0 1 5.66 5.653l-1.477 1.529-5.006 5.006-1.523 1.472a4 4 0 0 1-5.653-5.66l.001-.002 1.505-1.492.001-.002Z"/>
                            </svg>
                            ConsulToday
                        </h1>
                    </div>
                    <h2 class="logo-text">LOGIN TO YOUR ACCOUNT</h2>

                    <?php if (isset($_GET['error'])): ?>
                        <div class="error-message">
                            Email ou senha inválidos.
                        </div>
                    <?php endif; ?>
                    <form action="../process/login_process.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="senha" placeholder="Enter password" required>
                        </div>
                        <div class="d-grid mb-1">
                            <button type="submit" class="btn btn-light login-btn">LOGIN</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <small>Não possui uma conta? <a href="register.php" class="text-light">Crie uma conta agora!</a></small>
                    </div>

                     <div class="mt-5 text-start">
                    <p>+55 (19) 3452-3892</p>
                    <p>www.consultoday.com.br</p>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>