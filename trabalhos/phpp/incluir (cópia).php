<?php
 function Incluir($tabela,$login,$senha,$CPF,$email,$endereco,$CEP){
  $incluir="INSERT INTO ".$tabela." (`login`, `senha`, `CPF`, `email`, `endereco`, `CEP`) VALUES ('".$login."','".$senha."','".$CPF."','".$email."','".$endereco."','".$CEP."')";
  return $incluir;
 }
?>
