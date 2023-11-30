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
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $cbarras = $user_data['cbarras'];
                $ncm = $user_data['ncm'];
                $unidade = $user_data['unidade'];
                $tipo = $user_data['tipo'];
                $est_min = $user_data['est_min'];
                $est_atual = $user_data['est_atual'];
                $vencimento = $user_data['vencimento'];
                $pco_compra = str_replace(',', '.', number_format($user_data['pco_compra'],2,",","."));
                $pco_venda = str_replace(',', '.', number_format($user_data['pco_venda'],2,",","."));
                $origem = $user_data['origem'];
                $tributacao = $user_data['tributacao'];                
            }
        }
        else {
            header("Location: consult_products.php");
        }
    }
    else
    {
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

        <form class="form" action="saveEdited_products.php" method="POST">
            <fieldset>
                <legend>Dados Gerais</legend>
                <label for="iDesc">Descrição: </label>
                <input type="text" name="nDesc" id="iDesc" value="<?php echo $nome?>" required>
                <label for="iEan">Código Barras: </label>
                <input type="text" name="nEan" id="iEan" value="<?php echo $cbarras?>" required>
                <label for="iNcm">Código NCM: </label>
                <input type="number" name="nNcm" id="iNcm" value="<?php echo $ncm?>" required><br>
                <label for="iUn">Unidade: </label>
                <input type="text" name="nUn" id="iUn" value="<?php echo $unidade?>" size="1">
                <label for="iType">Tipo do Produto: </label>
                <select name="nType" id="iType" value="<?php echo $tipo?>">
                    <option value="Revenda">0 - Mercadoria para Revenda</option>
                    <option value="Matéria Prima">1 - Matéria Prima</option>
                    <option value="Consumo">2 - Uso e Consumo</option>
                </select>
                <label for="iMinS">Estoque Mínimo: </label>
                <input type="number" name="nMinS" id="iMinS" value="<?php echo $est_min?>">
                <label for="iCurS">Estoque Atual: </label>
                <input type="number" name="nCurS" id="iCurS" value="<?php echo $est_atual?>"><br>
                <label for="iExpD">Validade: </label>
                <input type="date" name="nExpD" id="iExpD" value="<?php echo $vencimento?>" required>
                <label for="iPurP">Preço Compra: R$</label>
                <input type="float" name="nPurP" id="iPurP" value="<?php echo $pco_compra?>" required>
                <label for="iSaleP">Preço Venda: R$</label>
                <input type="float" name="nSaleP" id="iSaleP" value="<?php echo $pco_venda?>" required>
            </fieldset>
            <fieldset><legend>Dados Fiscais</legend>
                <label for="iOrig">Origem:</label>
                <select name="nOrig" id="iOrig" value="<?php echo $origem?>">
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
                <select  name="nTrib" id="iTrib"  value="<?php echo $tributacao?>">
                    <option value="Tributado">0 - Tributado Integralmente</option>
                    <option value="Substituição">1 - Substituição Tributária</option>
                    <option value="Isento">2 - Isento</option>
                </select>
            </fieldset>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <p><input class="update" type="submit" name="update" value="GRAVAR" /></p>
        </form>
    </main>
    <hr noshade="">
    <footer>Desenvolvido por <a href=""> &copy;Gildman Laécio</a></footer>
</body>
</html>