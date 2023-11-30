<?php
    // session_start();
    
    // if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    // {
    //     unset($_SESSION['email']);
    //     unset($_SESSION['senha']);
    //     header('Location: home.php');
    // }
    // $logado = $_SESSION['email'];
    
    if(!empty($_GET['id']))
    {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM funcionarios WHERE id_func=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {

            $sqlDelete = "DELETE FROM funcionarios WHERE id_func=$id";

            $resultDelete = $conexao->query($sqlDelete);

        }
    }
    header("Location: consult_employee.php");
?>