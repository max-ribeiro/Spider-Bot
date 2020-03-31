<pre>
<?php
require_once 'auxDb.php';
ini_set('max_execution_time', NULL);
$db=new auxDb();
$db->connectDb();
$db->reset();
$k=1;
do{
$cont=file_get_contents('/home/grupo3/public_html/xml/arquivo'.$k.'.xml');
$xml= simplexml_load_string($cont);
foreach ($xml as $conteudo){
    $nomedb= $conteudo->nome;
    $precodb= $conteudo->preco;
    $urldb=$conteudo->url;
    $db->insert($nomedb, $precodb, $urldb);
    
}
$k++;
}while($cont);
echo "<b>".$k."</b>"."<h1>Concluido</h1>";
?>
</pre>