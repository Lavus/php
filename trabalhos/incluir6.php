<?php
 function Incluir6($tabela,$estado,$cidade,$bairro,$rua,$numero,$telefone,$adicionais,$CEP){
  $incluir="INSERT INTO ".$tabela." (`estado`, `cidade`, `bairro`, `rua`, `numero`, `telefone`, `adicionais`, `CEP`) VALUES ('".$estado."','".$cidade."','".$bairro."','".$rua."','".$numero."','".$telefone."','".$adicionais."','".$CEP."')";
  return $incluir;
 }
?>
