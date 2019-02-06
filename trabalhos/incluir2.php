<?php
 function Incluir($tabela,$titulo,$descricao,$valor,$imagem,$categoria,$position){
  $incluir="INSERT INTO ".$tabela." (`titulo`, `descricao`, `valor`, `imagem`, `categorias`, `position`) VALUES ('".$titulo."','".$descricao."','".$valor."','".$imagem."','".$categoria."','".$position."')";
return $incluir;
 }
?>
