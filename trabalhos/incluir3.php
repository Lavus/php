<?php
 function Incluir($tabela,$nome,$email,$mensagem){
  $incluir="INSERT INTO ".$tabela." (`nome`,`email`,`mensagem`) VALUES ('".$nome."','".$email."','".$mensagem."')";
  return $incluir;
 }
?>
