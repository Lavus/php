<?php
 function Incluir($tabela,$titulo,$descricao,$valor,$imagem,$categoria){
  $incluir="INSERT INTO ".$tabela." (`titulo`, `descricao`, `valor`, `imagem`, `categorias`) VALUES ('".$titulo."','".$descricao."','".$valor."','".$imagem."','".$categoria."')";
return $incluir;
 }
?>
