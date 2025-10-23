<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ConsulToday</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #edf3f3;
      padding-top: 50px; Espaço para a navbar fixa
    }

    /* navbar */
    .navbar {
      background: #0d0e18!important;
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

    /* busca */
    .search-section {
      background: #413d51;
      padding: 20px;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .search-section input {
      padding: 10px;
      border-radius: 15px;
      border: none;
      width: 100%;
    }

    .search-section button {
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
      background: #1a1a3d;
      color: white;
      cursor: pointer;
      margin-top: 10px;
      transition: 0.3s;
    }

    .search-section button:hover {
      background: #2d2d70;
    }

    /* resultados */
    .results {
      display: none;
      padding: 20px;
    }

    .doctor {
      display: flex;
      align-items: center;
      background: white;
      padding: 15px;
      border-radius: 15px;
      margin-bottom: 15px;
      box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
    }

    .doctor img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      margin-right: 15px;
    }

    .doctor-info {
      flex: 1;
    }

    .doctor-info h3 {
      margin: 0;
    }

    /* schedules como botões */
    .schedules {
      display: flex;
      gap: 10px;
    }

    .day {
      background: #0a1a4a;
      color: white;
      padding: 10px;
      border-radius: 10px;
      text-align: center;
      width: 60px;
      cursor: pointer;
      transition: transform 0.2s, background 0.3s;
      text-decoration: none; /* tira sublinhado do link */
      display: inline-block;
    }

    .day:hover {
      background: #1a2e80;
      transform: scale(1.1);
    }
  </style>
</head>
<body>

  <!-- Navbar -->
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


  <!-- Busca -->
<section class="search-section">
  <input type="text" placeholder="Condição, Procedimento, Hospital, Médico..." class="search-input">
  <input type="text" placeholder="Cidade" class="search-input">
  <input type="text" placeholder="Convênio médico, plano de saúde" class="search-input">
</section>

<script>
  // pega todos os inputs da busca
  const inputs = document.querySelectorAll(".search-input");

  inputs.forEach(input => {
    input.addEventListener("keypress", function(event) {
      if (event.key === "Enter") { // verifica se a tecla é Enter
        event.preventDefault(); // evita comportamento padrão (como recarregar a página)
        mostrarResultados();    // chama a função de exibir resultados
      }
    });
  });

  function mostrarResultados() {
    document.getElementById('results').style.display = 'block';
    window.scrollTo({ 
      top: document.getElementById('results').offsetTop, 
      behavior: 'smooth' 
    });
  }
</script>
  <!-- Resultados -->
  <section class="results" id="results">
    <h2>Temos “x” Médicos e hospitais que podem cuidar disso pra você</h2>

    <div class="doctor">
      <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Foto do médico">
      <div class="doctor-info">
        <h3>Dr. Ricardio</h3>
        <p>Cardiologista - Limeira</p>
        <p>⭐⭐⭐⭐⭐</p>
      </div>
      <div class="schedules">   
         <a href="pagina_agendamento.php?dia=2025-09-24" class="day">Qua<br>24</a>
         <a href="pagina_agendamento.php?dia=2025-09-25" class="day">Qui<br>25</a>
         <a href="pagina_agendamento.php?dia=2025-09-26" class="day">Sex<br>26</a>
         <a href="pagina_agendamento.php?dia=2025-09-27" class="day">Sab<br>27</a>
         <a href="pagina_agendamento.php?dia=2025-09-28" class="day">Dom<br>28</a>
         <a href="pagina_agendamento.php?dia=2025-09-29" class="day">Seg<br>29</a>
         <a href="pagina_agendamento.php?dia=2025-09-30" class="day">Ter<br>30</a>
         <a href="pagina_agendamento.php?dia=2025-09-01" class="day">Qua<br>1</a>
      </div>
    </div>

    
    <div class="doctor">
      <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Foto do médico">
      <div class="doctor-info">
        <h3>Dr. CoraSantos</h3>
        <p>Cardiologista - Limeira</p>
        <p>⭐⭐⭐⭐⭐</p>
      </div>
      <div class="schedules">
             <a href="pagina_agendamento.php?dia=2025-09-24" class="day">Qua<br>24</a>
         <a href="pagina_agendamento.php?dia=2025-09-25" class="day">Qui<br>25</a>
         <a href="pagina_agendamento.php?dia=2025-09-26" class="day">Sex<br>26</a>
         <a href="pagina_agendamento.php?dia=2025-09-27" class="day">Sab<br>27</a>
         <a href="pagina_agendamento.php?dia=2025-09-28" class="day">Dom<br>28</a>
         <a href="pagina_agendamento.php?dia=2025-09-29" class="day">Seg<br>29</a>
         <a href="pagina_agendamento.php?dia=2025-09-30" class="day">Ter<br>30</a>
         <a href="pagina_agendamento.php?dia=2025-09-01" class="day">Qua<br>1</a>
      </div>
    </div>

    
    <div class="doctor">
      <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Foto do médico">
      <div class="doctor-info">
        <h3>Dr. Flaviamor</h3>
        <p>Cardiologista - Americana</p>
        <p>⭐⭐⭐⭐⭐</p>
      </div>
      <div class="schedules">
             <a href="pagina_agendamento.php?dia=2025-09-24" class="day">Qua<br>24</a>
         <a href="pagina_agendamento.php?dia=2025-09-25" class="day">Qui<br>25</a>
         <a href="pagina_agendamento.php?dia=2025-09-26" class="day">Sex<br>26</a>
         <a href="pagina_agendamento.php?dia=2025-09-27" class="day">Sab<br>27</a>
         <a href="pagina_agendamento.php?dia=2025-09-28" class="day">Dom<br>28</a>
         <a href="pagina_agendamento.php?dia=2025-09-29" class="day">Seg<br>29</a>
         <a href="pagina_agendamento.php?dia=2025-09-30" class="day">Ter<br>30</a>
         <a href="pagina_agendamento.php?dia=2025-09-01" class="day">Qua<br>1</a>
      </div>
    </div>

    
    <div class="doctor">
      <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Foto do médico">
      <div class="doctor-info">
        <h3>Dr. Ricardio</h3>
        <p>Cardiologista - São Paulo</p>
        <p>⭐⭐⭐⭐⭐</p>
      </div>
      <div class="schedules">
            <a href="pagina_agendamento.php?dia=2025-09-24" class="day">Qua<br>24</a>
         <a href="pagina_agendamento.php?dia=2025-09-25" class="day">Qui<br>25</a>
         <a href="pagina_agendamento.php?dia=2025-09-26" class="day">Sex<br>26</a>
         <a href="pagina_agendamento.php?dia=2025-09-27" class="day">Sab<br>27</a>
         <a href="pagina_agendamento.php?dia=2025-09-28" class="day">Dom<br>28</a>
         <a href="pagina_agendamento.php?dia=2025-09-29" class="day">Seg<br>29</a>
         <a href="pagina_agendamento.php?dia=2025-09-30" class="day">Ter<br>30</a>
         <a href="pagina_agendamento.php?dia=2025-09-01" class="day">Qua<br>1</a>
      </div>
    </div>

  </section>

  <script>
    function mostrarResultados() {
      document.getElementById('results').style.display = 'block';
      window.scrollTo({ top: document.getElementById('results').offsetTop, behavior: 'smooth' });
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
