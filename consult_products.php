<?php
    
    session_start();
    include_once('config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: home.php');
    }
    $logado = $_SESSION['email'];

    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM produtos WHERE id_produto LIKE '%$data%' or nome LIKE '%$data%' or cbarras LIKE '%$data%' or tipo LIKE '%$data%' ORDER BY id_produto DESC";
    }
    else
    {
        $sql = "SELECT * FROM produtos ORDER BY id_produto DESC";
    }

    $result = $conexao->query($sql);

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
        <h1>Consulta de Produtos</h1>
        <nav>
            <ul>
                <li><a href="register_products.php">Cadastrar Produtos</a></li>
                <!-- <li><a href="">Reposição de Estoque</a></li> -->
                <li>
                    <input type="search" placeholder="Pesquisar" id="pesquisar">.
                    <button onclick="searchData()"><img src="images/search-icon.jpg" width="23" height="23" alt="Botão de pesquisa de produtos"></button>
                </li>
            </ul>
        </nav>
        <table class="table">
            <thead>
                <tr>
                    <td class="ce">Código</td>
                    <td>Descrição</td>
                    <td>C. Barras</td>
                    <td>UN</td>
                    <td>P. Compra</td>
                    <td>P. Venda</td>
                    <td>Tipo</td>
                    <td>Est. Min</td>
                    <td>Est. Atual</td>
                    <td>Venc</td>
                    <td>NCM</td>
                    <td>Origem</td>
                    <td class="trib">Tributação</td>
                    <td class="cd">...</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$user_data['id_produto']."</td>";
                        echo "<td>".mb_strtoupper($user_data['nome'])."</td>";
                        echo "<td>".$user_data['cbarras']."</td>";
                        echo "<td>".mb_strtoupper($user_data['unidade'])."</td>";
                        echo "<td>".'R$ '.str_replace(',', '.', number_format($user_data['pco_compra'],2,",","."))."</td>";
                        echo "<td>".'R$ '.str_replace(',', '.', number_format($user_data['pco_venda'],2,",","."))."</td>";
                        echo "<td>".mb_strtoupper($user_data['tipo'])."</td>";
                        echo "<td>".$user_data['est_min']."</td>";
                        echo "<td>".$user_data['est_atual']."</td>";
                        echo "<td>".$user_data['vencimento']."</td>";
                        echo "<td>".$user_data['ncm']."</td>";
                        echo "<td>".$user_data['origem']."</td>";
                        echo "<td>".$user_data['tributacao']."</td>";
                        echo "<td>
                            <a class='edit' href='edit_products.php?id=$user_data[id_produto]'>
                                <img src='images/pencil.png' width='15' height='15' alt='Editar produtos'>
                            </a>
                            <a class='del' href='delete_products.php?id=$user_data[id_produto]'>
                                <img src='images/can.png' width='15' height='15' alt='Excluir produtos'>
                            </a>
                        </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>
    <hr noshade="">
    <footer>Desenvolvido por <a href="https://github.com/gillaercio/" target="_blank"> &copy;Gildman Laécio</a></footer>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event){
        if (event.key === "Enter")
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'consult_products.php?search=' + search.value;
    }
</script>
</html>