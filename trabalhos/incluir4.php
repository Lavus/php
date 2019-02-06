<?php
 function Incluir4($tabela,$codigoproduto){
  $incluir="INSERT INTO ".$tabela." (`codigoproduto`) VALUES ('".$codigoproduto."')";
  return $incluir;
 }
?>
