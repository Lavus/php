<?php
 $host='localhost';
 $user='root';
 $pass='';
 $base='compra-coletiva';
 $link=mysql_connect($host,$user,$pass);
  if(!$link){
   die('erro ao conectar :'.mysql_error());
  }
 $escolha=mysql_select_db($base,$link);
  if(!$escolha){
   die('erro ao escolher base: '.mysql_error());
  }
?>
