<HTML>
<HEAD>
 <TITLE>Documento PHP</TITLE>
</HEAD>
<BODY>
<?
  // caminho e nome do arquivo (o diret�rio no qual o arquivo
  // a ser exclu�do est� deve ter permiss�o de escrita
  $arquivo = "fotos/07667bd73f9dac5209c724ef3b83daa1.jpg";

  // vamos excluir
  if(unlink($arquivo)){
    echo "Arquivo exclu�do com sucesso.";
  }
  else{
    echo "N�o foi poss�vel excluir o arquivo.";
  }
?>

</BODY>
</HTML>
