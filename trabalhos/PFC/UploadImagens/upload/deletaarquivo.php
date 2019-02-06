<HTML>
<HEAD>
 <TITLE>Documento PHP</TITLE>
</HEAD>
<BODY>
<?
  // caminho e nome do arquivo (o diretório no qual o arquivo
  // a ser excluído está deve ter permissão de escrita
  $arquivo = "fotos/07667bd73f9dac5209c724ef3b83daa1.jpg";

  // vamos excluir
  if(unlink($arquivo)){
    echo "Arquivo excluído com sucesso.";
  }
  else{
    echo "Não foi possível excluir o arquivo.";
  }
?>

</BODY>
</HTML>
