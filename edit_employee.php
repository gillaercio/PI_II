<?php

    if(!empty($_GET['id']))
    {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM funcionarios WHERE id_func=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $cpf = $user_data['cpf'];
                $endereco = $user_data['endereco'];
                $bairro = $user_data['bairro'];
                $numero = $user_data['numero'];
                $cidade = $user_data['cidade'];
                $uf = $user_data['uf'];
                $fone = $user_data['fone'];
                $usuario = $user_data['usuario'];
                $senha = $user_data['senha'];
                $email = $user_data['email'];
                $nasc = $user_data['nasc'];
                $cargo = $user_data['cargo'];
                $admissao = $user_data['admissao'];
                $demissao = $user_data['demissao'];
            }
        }
        else {
            header("Location: consult_employee.php");
        }
    }
    else
    {
        header("Location: consult_employee.php");
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

        <form class="form" action="saveEdited_employee.php" method="POST">
            <fieldset>
                <legend>Dados Gerais</legend>
                <label for="iName">Nome</label>
                <input type="text" name="nName" id="iName" value="<?php echo $nome?>" required>
                <label for="iCpf">CPF</label>
                <input type="text" name="nCpf" id="iCpf" value="<?php echo $cpf?>" required>
                <label for="iAdress">Endereço</label>
                <input type="text" name="nAdress" id="iAdress" value="<?php echo $endereco?>" required><br>
                <label for="iNabe">Bairro</label>
                <input type="text" name="nNabe" id="iNabe" value="<?php echo $bairro?>" required>
                <label for="iNum">Número</label>
                <input type="number" name="nNum" id="iNum" value="<?php echo $numero?>" required>
                <label for="iCity">Cidade</label>
                <input type="text" name="nCity" id="iCity" value="<?php echo $cidade?>" required>
                <label for="iUf">UF</label>
                <input type="text" name="nUf" id="iUf" value="<?php echo $uf?>"  required>
                <label for="iPhone">Fone</label>
                <input type="text" name="nPhone" id="iPhone" value="<?php echo $fone?>" required><br>
                <label for="iUser">Usuário</label>
                <input type="text" name="nUser" id="iUser" value="<?php echo $usuario?>" required>
                <label for="iPass">Senha</label>
                <input type="password" name="nPass" id="iPass" value="<?php echo $senha?>" required>
                <label for="iMail">E-mail</label>
                <input type="email" name="nMail" id="iMail" value="<?php echo $email?>" required>
            </fieldset>
            <fieldset>
                <legend>Informações Adicionais</legend>
                <label for="iBorn">Data Nascimento</label>
                <input type="date" name="nBorn" id="iBorn" value="<?php echo $nasc?>" required>
                <label for="iJob">Cargo</label>
                <select  name="nJob" id="iJob"value="<?php echo $cargo?>"  required>
                    <option value="Admin">0 - Administrador</option>
                    <option value="Caixa">1 - Operador de Caixa</option>
                    <option value="Repositor">2 - Repositor de Estoque</option>
                </select>
                <label for="iAdmD">Data Admissão</label>
                <input type="date" name="nAdmD" id="iAdmD" value="<?php echo $admissao?>" >
                <label for="ResD">Data Demissão</label>
                <input type="date" name="nResD" id="iResD" value="<?php echo $demissao?>" >
            </fieldset>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <p><input class="update" type="submit" name="update" value="GRAVAR" /></p>
        </form>
    </main>
    <hr noshade="">
    <footer>Desenvolvido por <a href="https://github.com/gillaercio/" target="_blank"> &copy;Gildman Laécio</a></footer>
</body>
</html>