<?php
    session_start();

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: home.php');
    }
    $logado = $_SESSION['email'];

    if(isset($_POST['submit']))
    {

        include_once('config.php');

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

        $result = mysqli_query($conexao, "INSERT INTO funcionarios(nome,cpf,endereco,bairro,numero,cidade,uf,fone,usuario,senha,email,nasc,cargo,admissao,demissao) VALUES('$nome','$cpf','$endereco','$bairro','$numero','$cidade','$uf','$fone','$usuario','$senha','$email','$nasc','$cargo','$admissao','$demissao')");

        header("Location: home.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Cafeteria Gourmet</title>
</head>
<body>
    <header>
        <nav class="nav">
            <ul>
                <!-- <li><a href="dash.html"><img src="images/casinha.png" width="20" height="20" alt="Tela Inicial"> Início</a></li> -->
                <li><a href="consult_products.php"><img src="images/produtos icon.png" width="20" height="20" alt="Consulta de Produtos"> Produtos</a></li>
                <li><a href="consult_employee.php"><img src="images/pessoas icon.png" width="20" height="20" alt="Consulta de Colaboradores"> Colaborador</a></li>
                <!-- <li><a href="settings.html"><img src="images/configurações icon.png" width="20" height="20" alt="Configurações"> Configurações</a></li>
                <li><a href="financial.html"><img src="images/financeiro icon.png" width="20" height="20" alt="Financeiro"> Financeiro</a></li> -->
            </ul>
            <p><a class="sair" href="logoff.php">Sair</a></p>
        </nav>
    </header>
    <hr noshade="">
    <main class="insertProd">
        <h1>Cadastro de Colaborador</h1>

        <form class="form" action="register_employee.php" method="POST">
            <fieldset>
                <legend>Dados Gerais</legend>
                <label for="iName">Nome</label>
                <input type="text" name="nName" id="iName" required>
                <label for="iCpf">CPF</label>
                <input type="text" name="nCpf" id="iCpf" required>
                <label for="iAdress">Endereço</label>
                <input type="text" name="nAdress" id="iAdress" required><br>
                <label for="iNabe">Bairro</label>
                <input type="text" name="nNabe" id="iNabe" required>
                <label for="iNum">Número</label>
                <input type="number" name="nNum" id="iNum" required>
                <label for="iCity">Cidade</label>
                <input type="text" name="nCity" id="iCity" required>
                <label for="iUf">UF</label>
                <input type="text" name="nUf" id="iUf" required>
                <label for="iPhone">Fone</label>
                <input type="text" name="nPhone" id="iPhone" required><br>
                <label for="iUser">Usuário</label>
                <input type="text" name="nUser" id="iUser" required>
                <label for="iPass">Senha</label>
                <input type="password" name="nPass" id="iPass" required>
                <label for="iMail">E-mail</label>
                <input type="email" name="nMail" id="iMail" required>
            </fieldset>
            <fieldset>
                <legend>Informações Adicionais</legend>
                <label for="iBorn">Data Nascimento</label>
                <input type="date" name="nBorn" id="iBorn" required>
                <label for="iJob">Cargo</label>
                <select  name="nJob" id="iJob" required>
                    <option value="Admin">0 - Administrador</option>
                    <option value="Caixa">1 - Operador de Caixa</option>
                    <option value="Repositor">2 - Repositor de Estoque</option>
                </select>
                <label for="iAdmD">Data Admissão</label>
                <input type="date" name="nAdmD" id="iAdmD">
                <label for="ResD">Data Demissão</label>
                <input type="date" name="nResD" id="iResD">
            </fieldset>
            
            <p><input class="iSave" type="submit" name="submit" value="GRAVAR" /></p>
        </form>
    </main>
    <hr noshade="">
    <footer>Desenvolvido por <a href="https://github.com/gillaercio/" target="_blank"> &copy;Gildman Laécio</a></footer>
</body>
</html>