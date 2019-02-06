<?php
 function Incluir($tabela,$login,$senha,$CNPJclientes,$email,$endereco,$codigocidade,$CEP){
  $incluir="INSERT INTO ".$tabela." (`login`, `senha`, `CNPJclientes`, `email`, `endereco`, `codigocidade`, `CEP`) VALUES ('".$login."','".$senha."','".$CNPJclientes."','".$email."','".$endereco."','".$codigocidade."','".$CEP."')";
  return $incluir;
 }
?>
