<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>ConsulToday</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            font-family: 'Open Sans', sans-serif;
            height: 100%;
        }
        .background-full {
            background: linear-gradient(rgba(12, 17, 40, 0.7), rgba(12, 17, 40, 0.7)),
                        url('assets/css/clinica-capa.png') no-repeat center center/cover;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
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
            background: #0d0e18c4 !important;
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
            padding: 8px 18px; /* Ajuste para aumentar o tamanho */
            transition: 0.3s;
            white-space: nowrap; /* Evita quebra de linha */
        }

        .navbar .btn:hover {
            background: white;
            color: #0c1128 !important;
        }

        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>

    <div class="background-full"></div>

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

    <section class="hero">
        <h1>
             <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bandaid-fill" viewBox="0 0 16 16">
                                <path d="m2.68 7.676 6.49-6.504a4 4 0 0 1 5.66 5.653l-1.477 1.529-5.006 5.006-1.523 1.472a4 4 0 0 1-5.653-5.66l.001-.002 1.505-1.492.001-.002Z"/>
                            </svg>ConsulToday</h1>
        <p>UM JEITO FÁCIL E RÁPIDO DE AGENDAR SUA CONSULTA MÉDICA</p>
        <button onclick="window.location.href='pages/login.php'">LOGIN</button>
    </section>

</body>
</html>