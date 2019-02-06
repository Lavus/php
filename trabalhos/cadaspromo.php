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
    <li id="menus3"><a href="cadaspromo.php">Cadastra Produtos</a></li>
    <li id="menus3"><a href="gerenciar.php">Gerenciar Produtos</a></li>
</ul>


        <div class="mainwrapper-inner">

        <div class="mainwrapper-inner-inner">








            <div id="listaE">







            </div>



            <div id="corpodosite">


<div id="content">
        <div id="corpoesquerda">

            <h2><span class="green">Cadastro de Produto</span></h2>
                <div id="contactform">
                    <div class="form">
                    <div class="clear2"></div>
                    <div class="clear2"></div>
                    <div class="clear2"></div>
        <form method="POST" action="verifprodut.php" enctype="multipart/form-data">
        <table align="center" id="table3">
        <?php
            if(isset($_POST["voltar"])){

                echo('<tr><td><input type="text" name="valor" value="'.$_POST['valor'].'"></td></tr><br>');
                echo('<tr><td><input type="text" name="titulo" value="'.$_POST['titulo'].'"></td></tr><br>');
                echo('<tr><td><img src="upload/'.$_POST['file'].'"></td></tr>');
                echo('<tr><td><input type="file" name="change"></td></tr><br>');
                echo('<tr><td><input type="text" name="descriver" value="'.$_POST['descriver'].'"></td></tr><br>');
                echo('<tr><td><input type="hidden" name="imagem" value="'.$_POST['file'].'"></td></tr><br>');
                echo('<tr><td><select name="position">');
                echo('<option>Lista direita</option>');
                echo('<option>Lista central</option>');
                echo('<option>Slide</option>');
                echo('</select></td></tr><br>');
                echo('<tr><td><select name="categoria">');
    $consulta = 'select nome from categoria';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<option>'.$linha['nome'].'</option>');
    }
               echo('</select></td></tr><br>');
                echo('<tr><td><input type="submit" name="OK" value="OK"></td></tr><br>');
    
    
    
    
    }elseif(isset($_POST["alterar"])){
    $consulta = 'select codigo from produtos where titulo="'.$_POST['titulo'].'" and descricao="'.$_POST['descriver'].'" and valor="'.$_POST['valor'].'" and categorias="'.$_POST['categoria'].'"  and imagem="'.$_POST['imagem'].'"';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    $produto=$linha['codigo'];
    }
    
                echo('<tr><td><input type="text" name="valor" value="'.$_POST['valor'].'"></td></tr><br>');
                echo('<tr><td><input type="text" name="titulo" value="'.$_POST['titulo'].'"></td></tr><br>');
                echo('<tr><td><img src="upload/'.$_POST['imagem'].'"></td></tr>');
                echo('<tr><td><input type="file" name="change"></td></tr><br>');
                echo('<tr><td><input type="text" name="descriver" value="'.$_POST['descriver'].'"></td></tr><br>');
                echo('<tr><td><input type="hidden" name="imagem" value="'.$_POST['imagem'].'"></td></tr><br>');
                if(isset($_POST['codigo'])){
                echo('<tr><td><input type="hidden" name="codigo" value="'.$_POST['codigo'].'"></td></tr><br>');
                }else{
                echo('<tr><td><input type="hidden" name="codigo" value="'.$produto.'"></td></tr><br>');
                }
                echo('<tr><td><select name="position">');
                echo('<option>Lista direita</option>');
                echo('<option>Lista central</option>');
                echo('<option>Slide</option>');
                echo('</select></td></tr><br>');
                echo('<tr><td><select name="categoria">');
    $consulta = 'select nome from categoria';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<option>'.$linha['nome'].'</option>');
    }
               echo('</select></td></tr><br>');
                echo('<tr><td><input type="submit" name="alterar" value="Alterar"></td></tr><br>');
		
		
		            
            }else{
				echo('<tr><td><label for="name">Descrição</label></tr></td>');
                echo('<tr><td><input class="text" type="text" name="valor" value="valor"></td></tr><br>');
                
                echo('<tr><td><label for="name">Descrição</label></tr></td>');
                echo('<tr><td><input class="text" type="text" name="titulo" value="titulo"></td></tr><br>');
                
                echo('<tr><td><label for="name">Descrição</label></tr></td>');
                echo('<tr><td><input class="text" type="file" name="file"></td></tr><br>');
                
                echo('<tr><td><label for="name">Descrição</label></tr></td>');
                echo('<tr><td><input class="text" type="text" name="descriver" value="descrever produto"></td></tr><br>');
                
                echo('<tr><td><label for="name">Descrição</label></tr></td>');
                echo('<tr><td><select name="position" class="text">');
                echo('<option>Lista direita</option>');
                echo('<option>Lista central</option>');
                echo('<option>Slide</option>');

                
                echo('<tr><td><label for="name">Descrição</label></tr></td>');
                echo('</select class="text"></td></tr><br>');
                echo('<tr><td><select name="categoria" class="text">');
    $consulta = 'select nome from categoria';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<option>'.$linha['nome'].'</option>');
    }
               echo('</select></td></tr><br>');
                echo('<tr><td><input class="button" type="submit" name="OK" value="OK"></td></tr><br>');
            }
        ?>
        </table>
        </form>
 </div>
 </div>



    <div id="conteudoslide">

        </div>





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
