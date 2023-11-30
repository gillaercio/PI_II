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

        $sqlSelect = "SELECT * FROM produtos WHERE id_produto=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {

            $sqlDelete = "DELETE FROM produtos WHERE id_produto=$id";

            $resultDelete = $conexao->query($sqlDelete);

        }
    }
    header("Location: consult_products.php");
?>