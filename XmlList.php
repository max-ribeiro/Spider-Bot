<?php
include 'index.php';
$pasta = '/home/grupo3/public_html/xml/';
 if(is_dir($pasta))
 {
  $diretorio = dir($pasta);

  while(($arquivo = $diretorio->read()) !== false)
  {
   echo '<a href='.'/xml/'.$arquivo.'>'.$arquivo.'</a><br />';
  }

  $diretorio->close();
 }
 else
 {
  echo 'A pasta não existe.';
 }
/*"PROGRAMADOR, Mauricio. Listar Arquivos Diretório PHP. 2013. 
    Disponível em: http://www.mauricioprogramador.com.br/posts/listar-arquivos-diretorio-php"*/
 ?>