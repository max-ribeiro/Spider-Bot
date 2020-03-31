<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>XML The Creator</title>
    </head>
    <body>
        <pre>
            <?php
            ini_set('max_execution_time', NULL);
            require_once 'Spider.php';
            $spider1 = new Spider("https://www.pontofrio.com.br/mapadosite/mapadosite.aspx", '/[https:\/\/]{7,8}[www\.]+[a-z0-9]+[\.com]+[\.br]?[\/a-zA-Z]+\?+[Filtro]{6}[A-Z\=0-9]+/');
            $links = $spider1->coletor($spider1->getRegex(), $spider1->getUrl());
            print_r($links);
            $a=0;$i=0;
            echo"extraindo informações...";
            do{
                @$vejaMais = $spider1->coletor('/(?<=href=").*?(?=" title="veja mais")/', $links[$i][$a]);
                $a++;$b=0;
                do{
                    @$div = $spider1->coletor('/<div class..hproduct.*?>.*?<\/div>/', $vejaMais[$i][$b]);
                    $b++;$c = 0;
                    do{
                        @$nome = $spider1->garra('/(?<=strong class="name fn">).*?(?=<\/strong>)/', $div[$i][$c]);
                        @$preco = $spider1->garra('/(?<=Por: <strong>R\$ ).*?(?=<\/strong>)/', $div[$i][$c]);
                        @$link = $spider1->garra('/(?<=product" href=").*?(?=">)/', $div[$i][$c]);
                        $spider1->set_preco($preco);
                        $spider1->format();
                        $preco2=$spider1->getPreco3();
                        $spider1->setNome($nome);
                        $spider1->format2();
                        $nome2 = $spider1->getNome2();
                        @$spider1->nomeVetor[]=$nome2[$i];
                        @$spider1->precoVetor[]=$preco2[$i];
                        @$spider1->urlVetor[]=$link[$i];
                        echo "Produto: "."$nome2[$i]"."</br>";
                        echo "Preço: "."$preco2[$i]"."</br>";
                        echo "Link: "."$link[$i]"."</br>";
                        $c++;
                    }while(@$div[$i][$c]);
                }while(@$vejaMais[$i][$b]);
                $spider1->xml($a);
                $spider1->nomeVetor=null;
                $spider1->precoVetor=null;
                $spider1->urlVetor=null;
                }while(@$links[$i][$a]);
                echo"<h1>Concluido</h1>";
            ?>
        </pre>
    </body>
</html>
