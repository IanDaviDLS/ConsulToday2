<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendamento - ConsulToday</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background: linear-gradient(rgba(12, 17, 40, 0.85), rgba(12, 17, 40, 0.85)),
                  url('../assets/css/clinica-capa.png') no-repeat center center/cover;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      color: #333;
      padding-top: 70px;
    }
    .card {
      background-color: #fff;
      border: none;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      padding: 40px;
      max-width: 500px;
      width: 100%;
      text-align: center;
    }
    .card-title {
      font-weight: 700;
      color: #0c1128;
      margin-bottom: 30px;
      font-size: 26px;
    }
    .form-control, .form-select {
      border-radius: 8px;
      border: 1px solid #ced4da;
      padding: 12px 15px;
      margin-bottom: 20px;
      font-size: 16px;
    }
    .form-control:focus, .form-select:focus {
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


  <!-- Formulário de Agendamento -->
  <div class="card">
    <h2 class="card-title">Agendamento de Consulta</h2>
    <form action="../process/agendamento_process.php" method="POST">
      <input type="text" class="form-control" name="nome_paciente" placeholder="Nome do paciente" required>
      <input type="tel" class="form-control" name="telefone" placeholder="Telefone para contato" required>
      <input type="email" class="form-control" name="email" placeholder="E-mail" required>

      <select class="form-select" name="especialidade" required>
        <option selected disabled>Selecione a especialidade</option>
        <option value="cardiologia">Cardiologia</option>
        <option value="dermatologia">Dermatologia</option>
        <option value="pediatria">Pediatria</option>
        <option value="ortopedia">Ortopedia</option>
        <option value="clinico_geral">Clínico Geral</option>
      </select>

      <input type="date" class="form-control" name="data" required>
      <input type="time" class="form-control" name="hora" required>

      <textarea class="form-control" name="observacoes" rows="3" placeholder="Observações (opcional)"></textarea>

      <button type="submit" class="btn btn-primary">Confirmar Agendamento</button>
    </form>
  </div>

  <!-- Modal de Confirmação -->
  <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmModalLabel">Agendamento Enviado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          Seu agendamento foi enviado com sucesso! O doutor retornará em breve sobre o andamento.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="modalOkBtn">OK</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Script combinado -->
  <script>
    // 1️⃣ Preencher data automaticamente via URL
    const params = new URLSearchParams(window.location.search);
    const dia = params.get('dia'); // precisa estar no formato YYYY-MM-DD
    if (dia) {
      const inputData = document.querySelector('input[name="data"]');
      if (inputData) inputData.value = dia;
    }

    // 2️⃣ Modal de confirmação antes do envio
    const form = document.querySelector('form');
    const confirmModalEl = document.getElementById('confirmModal');
    const confirmModal = new bootstrap.Modal(confirmModalEl);
    const modalOkBtn = document.getElementById('modalOkBtn');
    let readyToSubmit = false;

    form.addEventListener('submit', function(event) {
      event.preventDefault();       // impede envio imediato
      confirmModal.show();          // abre o modal

      const autoSubmit = setTimeout(() => {
        readyToSubmit = true;
        confirmModal.hide();
      }, 3000);

      modalOkBtn.addEventListener('click', function handler() {
        clearTimeout(autoSubmit);
        readyToSubmit = true;
        confirmModal.hide();
        modalOkBtn.removeEventListener('click', handler);
      });
    });

    confirmModalEl.addEventListener('hidden.bs.modal', function () {
      if (readyToSubmit) form.submit();
    });
  </script>

</body>
</html>
