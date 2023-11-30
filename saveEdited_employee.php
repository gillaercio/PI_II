<?php

    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nName'];
        $cpf = $_POST['nCpf'];
        $endereco = $_POST['nAdress'];
        $bairro = $_POST['nNabe'];
        $numero = $_POST['nNum'];
        $cidade = $_POST['nCity'];
        $uf = $_POST['nUf'];
        $fone = $_POST['nPhone'];
        $usuario = $_POST['nUser'];
        $senha = $_POST['nPass'];
        $email = $_POST['nMail'];
        $nasc = $_POST['nBorn'];
        $cargo = $_POST['nJob'];
        $admissao = $_POST['nAdmD'];
        $demissao = $_POST['nResD'];

        $sqlUpdate = "UPDATE funcionarios SET nome='$nome',cpf='$cpf',endereco='$endereco',bairro='$bairro',numero='$numero',cidade='$cidade',uf='$uf',fone='$fone',usuario='$usuario',senha='$senha',email='$email',nasc='$nasc',cargo='$cargo',admissao='$admissao',demissao='$demissao' WHERE id_func='$id'";

        $result = $conexao->query($sqlUpdate);

    }
    header("Location: consult_employee.php");
?>