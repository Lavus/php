<?php
 session_start();
?>
<?php
  include("conexao.php");
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">



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
     echo("<p>Voce est� logado </p>".$linha['nome'].".");
        echo("<a href='destroi.php'><p>      Sair</p></a>");
     if ($linha['tipoconta']==1){
        echo("<a href='contaadmin.php'><p>         Conta</p></a>");
     }
  }
   }
?>
</div>
    <div id="banner" class="main" style="background: url(imagens/inverno.jpg) center;">
<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
	           echo("<br><a href='andamento.php'>Compras em Andamento</a><br>");
    }else{
?>
		     <form name='name' method="POST" action="validacao.php">
				 
				         <a class="bannerlink" href="" title="asd"></a>

				 <div class="form2" >
                       <label> Login</label>
                            <input class="text" name="login" value="" type="text" />

                       <label> Senha</label>
                            <input class="text" name="senha" value="" type="password" />
				 
                    <label> <input class="button" type="submit" name="enviar" value="enviar"></label>
                     
            </form>

<?php
}
?>



    </div>



    <div id="mainwrapper">



<ul id="menus">
    <li><a href="home.php">Home</a></li>
    <li><a href="produtos.php">Produtos</a></li>
    <li><a href="promo.php">Promo��es</a></li>
    <li><a href="contato.php">Contato</a></li>
<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
  $consulta = 'select nome, tipoconta from usuarios where usuarios.login="'.$_SESSION["login"].'" and usuarios.senha="'.$_SESSION["senha"].'"';
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
    $tipo=$linha['tipoconta'];
  }
  if($tipo==1){
	  echo('<li><a href="gerenciar.php">Gerenciar</a></li>');	
  }else{
  		 echo('<li><a href="produtos.php">Produto</a></li>');	
  }
    }else{
	echo('<li><a href="cadastro.php">Cadastro</a></li>');	
    }
?>
</ul>


        <div class="mainwrapper-inner">

        <div class="mainwrapper-inner-inner">








            <div id="listaE">
 						<ul class="nav2"><li class="titulo2"><a href=""><h4>Categorias</h4></a></li></ul>


                <ul class="nav">
    <?php
    $consulta = 'select * from categoria';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<li><a href="produtos.php?codigo='.$linha['codigo'].'&nome='.$linha['nome'].'">');
    echo($linha['nome']);
    echo("</a></li>");
    }
    ?>
                </ul>



                    <ul class="emailpromo">

                            <strong>Re�eba promo��es por E-mail</strong>
                                <li class="caixaemailpromo">
                                <form action="" method="post">
                                <input type="text" size="13" value="E-mail" name="signup"><input class="submit" type="image" src="imagens/signupsubmit.png" width="20" height="15"  alt="" title="Enviar">
                                </form>
                            </li>


                    </ul>




            </div>



            <div id="corpodosite">






    <div id="conteudoslide">
        <div id="slide">
    <?php
    $consulta = 'select produtos.codigo,produtos.titulo,produtos.imagem,produtos.descricao from slide,produtos where slide.codigoproduto=produtos.codigo';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<a href="paginaprodutos.php?codigo='.$linha['codigo'].'"><img src="upload/'.$linha["imagem"].'" alt="" /><span><b>'.$linha["titulo"].'</b>'.$linha["descricao"].'</span></a>');
    }
    ?>
        </div>
            <script>
                $(function() {
                    $('#slide').coinslider({width: 510, height: 200, spw: 11, sph: 4, delay: 5000, sDelay: 10, path: ''});
                    $('#slide').show();
                })
            </script>
        </div>


                <ul id="listaD">
                    <li class="titulo"><a href=""><h4>Produtos Promovidos</h4></a></li>
    <?php
    $consulta = 'select produtos.codigo,produtos.titulo,produtos.valor,produtos.imagem from listad,produtos where listad.codigoproduto=produtos.codigo';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<li class="first odd">');
    echo('<a href="paginaprodutos.php?codigo='.$linha['codigo'].'">');
    echo('<img src="upload/'.$linha["imagem"].'" width="50" height="35" border="0" alt="">');
    echo('<p>'.$linha["titulo"].'</p>');
    echo('<span style="text-decoration:none !important;">R$ '.$linha["valor"].'</span>');
    echo('</a>');
    echo('</li>');
    }
    ?>
                                        </ul>




            <div id="conteudo">

    <?php
    $consulta = 'select produtos.codigo,produtos.titulo,produtos.valor,produtos.imagem,produtos.descricao from produtosindex,produtos where produtosindex.codigoproduto=produtos.codigo';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<div class="productblurb">');
    echo('<h3><a href="paginaprodutos.php?codigo='.$linha['codigo'].'">'.$linha["titulo"].'</a></h3>');
    echo('<div class="productblurb-img">');
    echo('<a href="paginaprodutos.php?codigo='.$linha['codigo'].'"><img src="upload/'.$linha["imagem"].'" width="148" height="116" alt="" title="'.$linha["titulo"].'"></a>');
    echo('<a class="visorpreco" href="paginaprodutos.php?codigo='.$linha['codigo'].'">R$ '.$linha["valor"].'</a>');
    echo('</div>');
    echo('<p>'.$linha["descricao"].'</p>');
    echo('</div>');
    }
    ?>
        </div>

        </div>




            </div>




        </div>

        </div>

    </div>


        </div>



</body></html>
