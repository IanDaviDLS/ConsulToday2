<?php
// É fundamental para usar $_SESSION para armazenar mensagens de erro
session_start();

// O arquivo config.php deve ser incluído (assume-se que ele contém a conexão $conn)
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Sanitização e Coleta de Dados
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    // Remove caracteres não-numéricos do telefone para validação
    $telefone_limpo = preg_replace('/[^0-9]/', '', $_POST['telefone'] ?? '');
    $senha = $_POST['senha'] ?? '';
    
    // Array para armazenar mensagens de erro
    $errors = [];

    // --- VALIDAÇÕES ---

    // 2. Validação: Nome Completo (Mínimo 3 caracteres e deve ter pelo menos um espaço)
    if (empty($nome) || strpos($nome, ' ') === false || strlen($nome) < 3) {
        $errors[] = "Por favor, insira seu nome completo (nome e sobrenome).";
    }

    // 3. Validação: E-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "O endereço de e-mail é inválido.";
    }

    // 4. Validação: Telefone (11 dígitos)
    if (strlen($telefone_limpo) !== 11) {
        $errors[] = "O telefone deve conter 11 dígitos (incluindo o DDD).";
    }

    // 5. Validação: Senha (mínimo 8 caracteres, 1 maiúscula, 1 caractere especial)
    if (strlen($senha) < 8) {
        $errors[] = "A senha deve ter pelo menos 8 caracteres.";
    }
    // Pelo menos uma letra maiúscula
    if (!preg_match('/[A-Z]/', $senha)) {
        $errors[] = "A senha deve conter pelo menos uma letra maiúscula.";
    }
    // Pelo menos um caractere especial (qualquer coisa que não seja letra, número ou espaço)
    if (!preg_match('/[^a-zA-Z0-9\s]/', $senha)) {
        $errors[] = "A senha deve conter pelo menos um caractere especial.";
    }

    // --- VERIFICAÇÃO DE ERROS E PROCESSAMENTO ---

    if (!empty($errors)) {
        // Armazena os erros na sessão e redireciona de volta para o formulário
        $_SESSION['registration_errors'] = $errors;
        $_SESSION['form_data'] = $_POST; // Opcional: manter dados preenchidos
        header("Location: ../pages/register.php");
        exit();
    } else {
        // 6. Atribui o tipo de usuário fixo (sem o campo no formulário)
        $tipo = 'cliente'; // Definido como cliente, conforme solicitado

        // Criptografa a senha antes de salvar
        $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

        // Usa prepared statements para prevenir SQL Injection
        // ATENÇÃO: Use $telefone_limpo (com 11 dígitos) na execução
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, telefone, senha, tipo) VALUES (?, ?, ?, ?, ?)");
        
        // O bind_param deve refletir as variáveis validadas
        $stmt->bind_param("sssss", $nome, $email, $telefone_limpo, $senha_hashed, $tipo);

        if ($stmt->execute()) {
            // Limpa a sessão de erros, se houver
            unset($_SESSION['registration_errors']);
            unset($_SESSION['form_data']);
            
            // Redireciona para a página de login com sucesso
            header("Location: ../pages/login.php?registration=success");
            exit();
        } else {
            // Se falhar no banco, armazena um erro genérico
            $_SESSION['registration_errors'][] = "Ocorreu um erro ao cadastrar no banco de dados. Tente novamente.";
            header("Location: ../pages/register.php");
            exit();
        }

        $stmt->close();
        // A conexão só deve ser fechada se você tiver certeza de que não será usada novamente
        // $conn->close();
    }
}
?>