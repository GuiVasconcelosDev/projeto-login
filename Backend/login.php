<?php
include('conexao.php'); //importar a conexão

if(isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $_POST['senha'];

    //buscando o usuario do banco
    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' ";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

        if($sql_query->num_rows == 1) {
            $usuario = $sql_query->fetch_assoc();

            //verifica se a senha digitada bate com o hash do banco
            if(password_verify($senha, $usuario['senha'])) {
                if(!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['id'] = $usuario['id'];
                header('Location: painel.php'); //vai para area logada
            } else {
                echo "Email ou senha incorretos!";
            }
        } else {
            echo "Email ou senha incorretos!";
        }
}
?>