<?php
  include("conexao.php");
  include("incluir2.php");
  if(isset($_POST['concluir'])){
   $consulta = Incluir('anuncios',$_POST['descriver'],$_POST['valor'],$_POST['datainicial'],$_POST['datafinal'],$_POST['minimovenda'],$_POST['valorkm'],$_POST['prazoentrega'],$_POST['imagem'],$_POST['regras'],$_POST['titulo']);
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error());
   }
?>
<html>
    <a href="destroi.php">Sair</a>
 <head>
  <title>Home</title>
  <style type="text/css">
   #divmagem
    {
      width:100%;
      height:100%;
      background-image: url(imagens/logo.png);
      background-size:100% 100%;
-webkit-background-size: 100% 100%;
-o-background-size: 100% 100%;
-khtml-background-size: 100% 100%;
-moz-background-size: 100% 100%;
      background-repeat: no-repeat;
      background-position: left;
    }
   #divmagem2
    {
      width:700px;
      height:500px;
      background-image: url(imagens/logo1.jpg);
      background-size:100% 100%;
-webkit-background-size: 100% 100%;
-o-background-size: 100% 100%;
-khtml-background-size: 100% 100%;
-moz-background-size: 100% 100%;background-size:100% 100%;
-webkit-background-size: 100% 100%;
-o-background-size: 100% 100%;
-khtml-background-size: 100% 100%;
-moz-background-size: 100% 100%;
      background-repeat: no-repeat;
      background-position: left;
    }
      #fora{
     -moz-border-radius:15px;
          width:96%;
          height:600px;
          margin:10px auto;
          border:1px solid black;
      }
        #cabecalho{
           -moz-border-radius:15px;
          width:1206px;
          height:80px;
          margin:3px auto;
          border:1px solid black;
          margin-right:3px;
          }
       #subcabecalho{
          -moz-border-radius:15px;
          width:82%;
          height:36px;
          margin:3px;
          margin-top:1px;
          border:1px solid black;
          float:left;
      }
       #table2{
          -moz-border-radius:15px;
          width:50%;
          height:110px;
          margin:3px;
          margin-top:1px;
          border:1px solid black;
          float:left;
      }
           #table3{
          -moz-border-radius:15px;
          width:10%;
          height:120px;
          margin:3px;
          margin-top:100px;
          border:1px solid black;
          float:left;
      }
           #table4{
          -moz-border-radius:15px;
          width:1%;
          height:1%;
          margin:3px;
          margin-top:1px;
          border:1px solid black;
          float:center;
      }
           #table5{
          -moz-border-radius:15px;
          width:50px;
          height:50px;
          margin:3px;
          margin-top:-350px;
          border:1px solid black;
          float:left;
      }
               #table6{
          -moz-border-radius:15px;
          width:10%;
          height:500px;
          margin:3px;
          margin-top:-300px;
          margin-right:0px;
          border:1px solid black;
          float:right;
      }
                   #table7{
          -moz-border-radius:15px;
          width:10%;
          height:100px;
          margin:3px;
          margin-top1;
          margin-right:1px;
          float:center;
          border:1px solid black;
      }
                   #table8{
          -moz-border-radius:15px;
          width:90%;
          height:100px;
          margin:3px;
          margin-top:-60px;
          margin-left:50px;
          border:1px solid black;
          float:center;
      }
       #ladodireito{
     -moz-border-radius:15px;
      width:200px;
      height:505px;
      border:1px solid black;
      float:right;
      margin-right:3px;
      }
     #centro{
           -moz-border-radius:15px;
          width:82%;
          height:463;
          margin:3px;
          margin-top:1px;
          float:left;
          border:1px solid black;
           }
          table1 {

border:outset 5px #704181;
-moz-border-radius-topright:35px;
-moz-border-radius-bottomleft:35px;
-webkit-border-top-right-radius:35px;
-webkit-border-bottom-left-radius:35px;
border-top-right-radius:35px;
border-bottom-left-radius:35px;
 }

#td51 {
border:ridge 1px #704181;
-moz-border-radius-bottomleft:24px;
-webkit-border-bottom-left-radius:24px;
border-bottom-left-radius:24px;
}

#td15 {
border:ridge 2px #704181;
-moz-border-radius-topright:24px;
-webkit-border-top-right-radius:24px;
border-top-right-radius:24px;
}
#td11 {
    border:ridge 2px #704181;
}

#td12 {
    border:ridge 2px #704181;
}
#td13 {
    border:ridge 2px #704181;
}
#button {
          -moz-border-radius:15px;
          width:100px;
          height:120px;
}
#button2 {
          -moz-border-radius:15px;
          width:80px;
          height:80px;
}
#text {
          -moz-border-radius:15px;
          width:80px;
          height:80px;
}
#text1 {
          -moz-border-radius:15px;
          width:80px;
          height:80px;
}
 </style>
 </head>
  <body bgcolor="white">
   <table align="right" id="table2">
    <tr><td><div id="divmagem" align="right"></div></td></tr>
   </table>
    <table id="table7">
      <tr>
       <td><input type="text" name="login" value="login"></td>
       <td><input type="password" name="senha" value="senha"></td>
       <td><input type="submit" name="enviar" value="enviar"></td>
      </tr>
      <tr>
       <td><input type="text" name="email" value="receba promoções pelo e-mail"></td>
       <td><input type="submit" name="enviar" value="enviar"></td>
      </tr>
</table><br><br><br>
  <title>Login</title>
 </head>
  <form name='name' method="POST" action="validacao.php" >

  </form>

<table border="1px" id="table8">
<tr>
<?php
$campo=array('link overmouse','link overmouse','link overmouse','link overmouse','link overmouse','link overmouse');
      for($x=0;$x<6;$x++){
       echo('<td>');
        echo('<a href="exibe4.php?opicao='.$campo[$x].'&order=desc">'.$campo[$x].'</a>');
       echo('</td>');
      }
      ?>
     <td><input type="text" name="pesquisar" value="Pesquisar"></td>
     <td><input type="submit" name="OK" value="OK" id="button2"></td>
</tr>
   </table>
   <table align="right" id="table3">
   <?php
        echo('<tr><td><input type="text" name="valor" value="'.$_POST['valor'].'"></td></tr><br>');
        echo('<tr><td><input type="submit" name="comprar" value="Comprar"></td></tr>');
        echo('<tr><td><input type="text" name="regras" value="'.$_POST['regras'].'"></td></tr>');
        echo('</table>');
        echo('<table align="center" id="table4">');
        echo('<tr><td><input type="text" name="titulo" value="'.$_POST['titulo'].'"></td></tr>');
        echo('<tr><td><img src="upload/'.$_POST['imagem'].'"></td></tr>');
        echo('<tr><td><input type="text" name="descriver" value="'.$_POST['descriver'].'"></td></tr>');
   ?>
   </table>
      <table align="right" id="table6">
        <?php
       $campo=array('Patrocinio','Patrocinio','outros anuncios','outros anuncios','outros anuncios');
      for($x=0;$x<5;$x++){
       echo('<tr><td>');
        echo('<a href="exibe4.php?opicao='.$campo[$x].'&order=desc">'.$campo[$x].'</a>');
       echo('</td></tr>');
      }
      ?>
   </table>
   <table align="center" id="table5">
    <tr><td><input type="submit" name="maps" value="localização" id="button"></td></tr>
   </table>
 </body>
</html>
