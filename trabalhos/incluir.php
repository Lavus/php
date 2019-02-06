<?php
 function Incluir($tabela,$login,$senha,$CPF,$email,$endereco,$CEP,$nome){
  $incluir="INSERT INTO ".$tabela." (`login`, `nome`, `senha`, `CPF`, `email`, `endereco`, `CEP`, `tipoconta`) VALUES ('".$login."','".$nome."','".$senha."','".$CPF."','".$email."','".$endereco."','".$CEP."','2')";
  return $incluir;
 }
?>
