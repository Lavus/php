<?php
 function Incluir($tabela,$descricao,$valor,$datainicio,$datafim,$minimovenda,$valorkm,$prazoentrega,$imagem,$regras,$titulo){
  $incluir="INSERT INTO ".$tabela." (`descricao`, `valor`, `datainicio`, `datafim`, `minimovenda`, `valorkm`, `prazoentrega`, `imagem`, `regras`, `titulo`) VALUES ('".$descricao."','".$valor."','".$datainicio."','".$datafim."','".$minimovenda."','".$valorkm."','".$prazoentrega."','".$imagem."','".$regras."','".$titulo."')";
return $incluir;
 }
?>
