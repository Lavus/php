<?php
 function Incluir5($tabela,$codigo,$produto){
  $incluir="INSERT INTO ".$tabela." (`codigousuarios`,`codigoprodutos`) VALUES ('".$codigo."','".$produto."')";
  return $incluir;
 }
?>
