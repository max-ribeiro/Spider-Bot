<?php ini_set('max_execution_time', NULL);
    $hn='grupo3.marciosantos.com.br';
    $db='grupo3_bot';
    $un='grupo3';
    $pw='G3^:?*oks/'; 
        $conexao=mysqli_connect($hn,$un,$pw,$db); 
        $pesquisar = $_POST['pesquisar'];
        echo "Resultados para "."<span style='color:red'>".$pesquisar."</span>".":"."</br>";
        $result_produto = "SELECT * FROM produto WHERE Match(nome) Against ('%$pesquisar%')ORDER BY preco ASC";
        $resultado_produto = mysqli_query($conexao, $result_produto);
        while ($rows_produto = mysqli_fetch_array($resultado_produto)) {
           echo "<a href=" . $rows_produto['link'] . " target=\"_blank\">".$rows_produto['nome']."</br>"."Preço: R$ ".$rows_produto['preco']."</a></br>";
    }


