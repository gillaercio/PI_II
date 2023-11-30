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
        $sql = "SELECT * FROM funcionarios WHERE id_func LIKE '%$data%' or nome LIKE '%$data%' or cpf LIKE '%$data%' or email LIKE '%$data%' or cargo LIKE '%$data%' or usuario LIKE '%$data%'  ORDER BY id_func DESC";
    }
    else
    {
        $sql = "SELECT * FROM funcionarios ORDER BY id_func DESC";
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
        <h1>Consulta de Colaboradores</h1>
        <nav>
            <ul>
                <li><a href="register_employee.php">Cadastrar Colaboradores</a></li>
                <!-- <li><a href="usergroup.html">Grupos de Usuários</a></li> -->
                <li>
                    <input type="search" placeholder="Pesquisar" id="pesquisar">
                    <button onclick="searchData()"><img src="images/search-icon.jpg" width="23" height="23" alt="Botão de pesquisa de produtos"></button>
                </li>
            </ul>
        </nav>
        <table class="table">
            <thead>
                <tr>
                    <td class="ce">Código</td>
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>Endereço</td>
                    <td>Bairro</td>
                    <td>Número</td>
                    <td>Cidade</td>
                    <td>Estado</td>
                    <td>Data Nasc</td>
                    <td>Fone</td>
                    <td>Email</td>
                    <td>Cargo</td>
                    <td>Usuário</td>
                    <td>Data Admissão</td>
                    <!-- <td>Data Demissão</td> -->
                    <td class="cd">...</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$user_data['id_func']."</td>";
                        echo "<td>".mb_strtoupper($user_data['nome'])."</td>";
                        echo "<td>".$user_data['cpf']."</td>";
                        echo "<td>".mb_strtoupper($user_data['endereco'])."</td>";
                        echo "<td>".mb_strtoupper($user_data['bairro'])."</td>";
                        echo "<td>".$user_data['numero']."</td>";
                        echo "<td>".mb_strtoupper($user_data['cidade'])."</td>";
                        echo "<td>".$user_data['uf']."</td>";
                        echo "<td>".$user_data['nasc']."</td>";
                        echo "<td>".$user_data['fone']."</td>";
                        echo "<td>".strtolower($user_data['email'])."</td>";
                        echo "<td>".$user_data['cargo']."</td>";
                        echo "<td>".$user_data['usuario']."</td>";
                        echo "<td>".$user_data['admissao']."</td>";
                        // echo "<td>".$user_data['demissao']."</td>";
                        echo "<td>
                            <a class='edit' href='edit_employee.php?id=$user_data[id_func]'>
                                <img src='images/pencil.png' width='15' height='15' alt='Editar colaborador'>
                            </a>
                            <a class='del' href='delete_employee.php?id=$user_data[id_func]'>
                                <img src='images/can.png' width='15' height='15' alt='Excluir colaborador'>
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

    search.addEventListener("keydown", function(Event){
        if (event.key === "Enter")
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'consult_employee.php?search=' + search.value;
    }
</script>
</html>