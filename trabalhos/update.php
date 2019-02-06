<?php
 function Atualizar($tabela,$titulo,$descricao,$valor,$imagem,$categorias,$position,$codigo){
  $atualizar="update ".$tabela." set titulo='".$titulo."',descricao='".$descricao."',valor='".$valor."',imagem='".$imagem."',categorias='".$categorias."',position='".$position."' where codigo='".$codigo."'";
return $atualizar;
 }
?>
