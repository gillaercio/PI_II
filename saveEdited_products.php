<?php

    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nDesc'];
        $cbarras = $_POST['nEan'];
        $ncm = $_POST['nNcm'];
        $unidade = $_POST['nUn'];
        $tipo = $_POST['nType'];
        $est_min = $_POST['nMinS'];
        $est_atual = $_POST['nCurS'];
        $vencimento = $_POST['nExpD'];
        $pco_compra = $_POST['nPurP'];
        $pco_venda = $_POST['nSaleP'];
        $origem = $_POST['nOrig'];
        $tributacao = $_POST['nTrib'];

        $sqlUpdate = "UPDATE produtos SET nome='$nome',cbarras='$cbarras',ncm='$ncm',unidade='$unidade',tipo='$tipo',est_min='$est_min',est_atual='$est_atual',vencimento='$vencimento',pco_compra='$pco_compra',pco_venda='$pco_venda',origem='$origem',tributacao='$tributacao' WHERE id_produto='$id'";

        $result = $conexao->query($sqlUpdate);

    }
    header("Location: consult_products.php");

?>