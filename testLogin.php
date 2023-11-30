<?php

    session_start();

    if(isset($_POST['submit']) && !empty($_POST['nMail']) && !empty($_POST['nSenha']))
    {

        include_once('config.php');
        $email = $_POST['nMail'];
        $senha = $_POST['nSenha'];

        $sql = "SELECT * FROM funcionarios WHERE email = '$email' AND senha = '$senha'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: home.php');
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: consult_products.php');
        }
    }
    else
    {
        header('Location: home.php');
    }

?>