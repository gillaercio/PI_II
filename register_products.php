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

        $nome = $_POST['nDesc'];
        $cbarras = $_POST['nEan'];
        $ncm = $_POST['nNcm'];
        $unidade = $_POST['nUn'];
        $tipo = $_POST['nType'];
        $est_min = $_POST['nMinS'];
        $est_atual = $_POST['nCurS'];
        $vencimento = $_POST['nExpD'];
        $pco_compra = str_replace(',', '.', number_format($_POST['nPurP'],2,",","."));
        $pco_venda = str_replace(',', '.', number_format($_POST['nSaleP'],2,",","."));
        $origem = $_POST['nOrig'];
        $tributacao = $_POST['nTrib'];

        $result = mysqli_query($conexao, "INSERT INTO produtos(nome,cbarras,ncm,unidade,tipo,est_min,est_atual,vencimento,pco_compra,pco_venda,origem,tributacao) VALUES('$nome','$cbarras','$ncm','$unidade','$tipo','$est_min','$est_atual','$vencimento','$pco_compra','$pco_venda','$origem','$tributacao')");

        header("Location: consult_products.php");
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
        <h1>Cadastro de Produtos</h1>

        <form class="form" action="register_products.php" method="post">
            <fieldset>
                <legend>Dados Gerais</legend>
                <label for="iDesc">Descrição: </label>
                <input type="text" name="nDesc" id="iDesc" required>
                <label for="iEan">Código Barras: </label>
                <input type="text" name="nEan" id="iEan" required>
                <label for="iNcm">Código NCM: </label>
                <input type="number" name="nNcm" id="iNcm" required>
                <label for="iUn">Unidade: </label>
                <input type="text" name="nUn" id="iUn" size="1"><br>
                <label for="iType">Tipo do Produto: </label>
                <select name="nType" id="iType">
                    <option value="Revenda">0 - Mercadoria para Revenda</option>
                    <option value="Matéria Prima">1 - Matéria Prima</option>
                    <option value="Consumo">2 - Uso e Consumo</option>
                </select>
                <label for="iMinS">Estoque Mínimo: </label>
                <input type="number" name="nMinS" id="iMinS">
                <label for="iCurS">Estoque Atual: </label>
                <input type="number" name="nCurS" id="iCurS"><br>
                <label for="iExpD">Validade: </label>
                <input type="date" name="nExpD" id="iExpD" required>
                <label for="iPurP">Preço Compra: R$</label>
                <input type="decimal" name="nPurP" id="iPurP" required>
                <label for="iSaleP">Preço Venda: R$</label>
                <input type="float" name="nSaleP" id="iSaleP" required>
            </fieldset>
            <fieldset><legend>Dados Fiscais</legend>
                <label for="iOrig">Origem:</label>
                <select name="nOrig" id="iOrig">
                    <label for="iOrig">Tributação:</label>
                    <option value="0">0 - Nacional</option>
                    <option value="1">1 - Estrangeira - Importação direta</option>
                    <option value="2">2 - Estrangeira - Adquirida mercado interno</option>
                    <option value="3">3 - Nacional, mercadoria ou bem com Conteúdo de Importação superior a 40%</option>
                    <option value="4">4 - Nacional, cuja produção tenha sido feita em conformidade com ...</option>
                    <option value="5">5 - Nacional, mercadoria ou bem com Conteúdo de Importação inferior ...
                    </option>
                    <option value="6">6 - Importação direta, sem similar nacional, constante em lista de ...</option>
                    <option value="7">7 - Adquirida no mercado interno, sem similar nacional, constante ...</option>
                </select>
                <label for="iTrib">Tributação:</label>
                <select  name="nTrib" id="iTrib">
                    <option value="Tributado">0 - Tributado Integralmente</option>
                    <option value="Substituição">1 - Substituição Tributária</option>
                    <option value="Isento">2 - Isento</option>
                </select>
            </fieldset>
            
            <p><input class="iSave" type="submit" name="submit" value="GRAVAR" /></p>
        </form>
    </main>
    <hr noshade="">
    <footer>Desenvolvido por <a href="https://github.com/gillaercio/" target="_blank"> &copy;Gildman Laécio</a></footer>
</body>
</html>