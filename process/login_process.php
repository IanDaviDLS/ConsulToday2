<?php
session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Usa prepared statement para prevenir SQL Injection
    $stmt = $conn->prepare("SELECT id, nome, email, senha, tipo FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verifica a senha criptografada
    
        (password_verify($senha, $user['senha'])) {
            // Senha correta, armazena dados na sessão
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nome'] = $user['nome'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_tipo'] = $user['tipo']; 

            // Lógica de Redirecionamento Baseada no 'tipo'
            $tipo_usuario = $_SESSION['user_tipo'];

            if ($tipo_usuario === 'administrador') {
                header("Location: ../pages/dashboard_admin.php");
                exit;
            } elseif ($tipo_usuario === 'profissional') {
                header("Location: ../pages/dashboard_profissional.php"); 
                exit;
            } elseif ($tipo_usuario === 'cliente') {
                header("Location: ../pages/consulta.php"); 
                exit;
            } else {
                // Redirecionamento de segurança para tipos não reconhecidos
                header("Location: ../pages/home.php");
                exit;
            }

        } else {
            // Login falhou (Senha incorreta)
            header("Location: ../pages/login.php?error=1");
            exit;
        }
    } else {
        // Login falhou (Usuário não encontrado)
        header("Location: ../pages/login.php?error=1");
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>