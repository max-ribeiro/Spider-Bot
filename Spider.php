<?php
error_reporting(1);

class Spider {
    private $url;
    private $regex;
    private $matriz;
    private $arrayDiv;
    private $matches;
    private $dado;
    private $conn;
    public $nomeVetor=array();
    public $precoVetor=array();
    public $urlVetor=array();
    private $r;
    private $nome,$nome2;
    private $preco,$preco2;
    public $preco3;
//Getters & Setters
    function getNome(){
        return $this->nome;
    }function setNome($nome){
        $this->nome=$nome;
    }
    function getNome2(){
        return $this->nome2;
    }function setNome2($nome2){
        $this->nome2=$nome2;
    }
    function get_preco(){
        return $this->preco;
    }function set_preco($preco){
        $this->preco=$preco;
    }
    function getPreco3(){
    return $this->preco3;
    }
    function getPreco2(){
        return $this->preco2;
    }
    function getUrl() {
        return $this->url;
    }
    function getRegex() {
        return $this->regex;
    }
    function getMatriz() {
        return $this->matriz;
    }
    function setUrl($url) {
        $this->url = $url;
    }
    function setRegex($regex) {
        $this->regex = $regex;
    }
    function setMatriz($matriz) {
        $this->matriz = $matriz;
    }
    function Spider($url, $regex) {
        $this->url = $url;
        $this->regex = $regex; 
    }
    function coletor($regex,$url){
        $this->regex=$regex;
         $this->url=$url;
        $cont=file_get_contents($this->url);
        preg_match_all($this->regex,$cont,$this->matches);
        return $this->matches;   
    }
    function garra($regex, $arrayDiv){
        $this->regex=$regex;
        $this->arrayDiv=$arrayDiv;
        $this->dado=NULL;
        preg_match($this->regex,$this->arrayDiv,$this->dado);
        return $this->dado;
    }
    function format(){
        $this->preco2= str_replace(".","",$this->preco);
        $this->preco3= str_replace(",",".", $this->preco2);
    }
    function format2(){
        $antes=array("í","á","ó","ç","ã","é","ú","ê","`","à","â","ô","Ã¡","Á","Ã","Ó");
        $depois=array("i","a","o","c","a","e","u","e","","a","a","o","a","A","A","O");
        $this->nome2=str_replace($antes,$depois,$this->nome);
    }
    function xml($r){
        $xml = "<?xml version='1.0' encoding='UTF-8'?>";
            $xml .= "<produtos>";
                $f=0; $this->r=$r;
                $loop=count($this->nomeVetor);
                do{
                    $xml .= '<Conteudo>';
                        if(@preg_match('/[&]+/',$this->nomeVetor[$f])){
                            $corrigido= str_replace("&", "e", $this->nomeVetor[$f]);   
                            @$xml .= "<nome>".$corrigido."</nome>";
                            }else{
                                @$xml .= "<nome>".$this->nomeVetor[$f]."</nome>"; 
                            }
                               @ $xml .= "<preco>".$this->precoVetor[$f]."</preco>";
                               @ $xml .= "<url>".$this->urlVetor[$f]."</url>";
                    $xml .= '</Conteudo>';$f++;
                    }while($f<=$loop);
                $xml .= "</produtos>"; $gerar = fopen('/home/grupo3/public_html/xml/arquivo'.$r.'.xml', 'w+'); //cria um arquivo com o nome arquivo.xml
            fwrite($gerar, $xml); // salva conteúdo da variável $xml dentro do arquivo arquivo.xml
            fclose($gerar); //fecha o arquivo
    }
}

