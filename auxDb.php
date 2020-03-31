<?php
class auxDb {
    private $nomedb, $precodb,$urldb;
    private $conexao;
    public function getConexao(){
        return $this->conexao;
    }
   function connectDb(){
        $hn='grupo3.marciosantos.com.br';
        $db='grupo3_bot';
        $un='grupo3';
        $pw='G3^:?*oks/'; 
        $this->conexao = mysqli_connect($hn,$un,$pw,$db); 
            if ($this->conexao) {
                echo "A conexão ao banco de dados ocorreu normalmente!."."</br>"; 
            }else {
                die( "Não foi possível conectar ao banco MySQL");   
            }
    }
     function reset(){
        mysqli_query($this->conexao,"DROP TABLE produto");
        mysqli_query($this->conexao,"CREATE TABLE produto(idProduto INT AUTO_INCREMENT PRIMARY KEY,nome TINYTEXT,preco DECIMAL(7,2),link VARCHAR(400));");
        mysqli_query($this->conexao,"ALTER TABLE produto ADD FULLTEXT(nome)");
    }
    function insert($nome,$preco,$url){
        $this->nomedb=$nome;
        $this->precodb=$preco;
        $this->urldb=$url;
        mysqli_query($this->conexao,"INSERT INTO produto(nome,preco,link) VALUES('$this->nomedb','$this->precodb','$this->urldb')");
    }
}
