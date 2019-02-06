<?php
 session_start();
  include("conexao.php");
?>
<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
  $consulta = 'select nome, tipoconta from usuarios where usuarios.login="'.$_SESSION["login"].'" and usuarios.senha="'.$_SESSION["senha"].'"';
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
    $tipo=$linha['tipoconta'];
  }
  if($tipo==1){
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



    <title>Trabalho TCC</title>

        <link rel="stylesheet" type="text/css" href="style2.css" media="all">


    <link rel="stylesheet" type="text/css" href="style.css" media="all">
<script src="jquery.min.js" type="text/javascript"></script>

<script src="coin-slider.min.js" type="text/javascript"></script>

</head>


<body>


<div id="outer-wrap">
<div id="outer-wrap-2">


<div id="wrapper" style="display: block; ">



<div id="innerwrapper">
<div id="logado" class="sombra11">
<div id="cesta">
  	<a href='cestadecompras.php'>Cesta de Compras</a>
</div>
<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
  $consulta = 'select nome, tipoconta from usuarios where usuarios.login="'.$_SESSION["login"].'" and usuarios.senha="'.$_SESSION["senha"].'"';
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());

  while($linha  =  mysql_fetch_array($resultado)){
     echo("<p>Voce está logado </p>".$linha['nome'].".");
        echo("<a href='destroi.php'><p>      Sair</p></a>");
     if ($linha['tipoconta']==1){
        echo("<a href='contaadmin.php'><p>         Conta</p></a>");
     }
  }
   }
?>
</div>
<div id="banner" class="main" style="background: url(imagens/inverno.jpg) center;">



    </div>



    <div id="mainwrapper">



<ul id="menus">
    <li id="menus2"><a href="home.php">Home</a></li>
    <li id="menus2"><a href="contaadmin.php">Conta</a></li>
    <li id="menus2"><a href="comentarios.php">Comentarios</a></li>
    <li id="menus3"><a href="cadaspromo.php">Cadastro Produtos</a></li>
    <li id="menus3"><a href="gerenciar.php">Gerenciar Produtos</a></li>
</ul>


        <div class="mainwrapper-inner">

        <div class="mainwrapper-inner-inner">








            <div id="listaE">








            </div>



            <div id="corpodosite">



             <?php
  $consulta = "select * from contatos";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
   echo('<table align="center" border="1">');
    echo('<tr align="center">');
     echo('<td>');
      echo('nome');
      echo('<br>');
     echo('</td>');
     echo('<td>');
      echo($linha['nome']);
      echo('<br>');
     echo('</td>');
    echo('</tr>');
        echo('<tr align="center">');
       echo('<td>');
      echo('email');
      echo('<br>');
     echo('</td>');
     echo('<td>');
      echo($linha['email']);
      echo('<br>');
     echo('</td>');
    echo('</tr>');
    echo('<tr align="center">');
     echo('<td>');
      echo('mensagem');
      echo('<br>');
     echo('</td>');
     echo('<td>');
      echo($linha['mensagem']);
      echo('<br>');
     echo('</td>');
    echo('</tr>');
   echo('</table>');
  }
?>







            <div id="conteudo">




        </div>

        </div>




            </div>




        </div>

        </div>

    </div>


        </div>



</body></html>

<?php
}else{
    echo('<meta http-equiv="refresh" content="0;home.php">');
}
}
?>
