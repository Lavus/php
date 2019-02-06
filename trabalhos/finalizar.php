<?php
 session_start();
?>
<?php
  include("conexao.php");
  include("incluir6.php");
  if(isset($_POST['enderecos'])){
  $consulta = Incluir6('enderecovenda',$_POST['estado'],$_POST['cidade'],$_POST['bairro'],$_POST['rua'],$_POST['numero'],$_POST['telefone'],$_POST['adicionais'],$_POST['CEP']);
  $resultado=mysql_query($consulta,$link);
  echo(mysql_error());
  }
  $consulta = "select codigo from enderecovenda where estado='".$_POST['estado']."' and cidade='".$_POST['cidade']."' and bairro='".$_POST['bairro']."' and rua='".$_POST['rua']."' and numero='".$_POST['numero']."' and telefone='".$_POST['telefone']."' and adicionais='".$_POST['adicionais']."' and CEP='".$_POST['CEP']."'";
  $resultado=mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
  $endereco=$linha['codigo'];
  }
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


<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
  $consulta = 'select nome,codigo,tipoconta from usuarios where usuarios.login="'.$_SESSION["login"].'" and usuarios.senha="'.$_SESSION["senha"].'"';
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
     echo("Voce está logado ".$linha['nome'].".");
        echo("<br><a href='destroi.php'>Sair</a><br>");
                $codigousuario=$linha['codigo'];
     if ($linha['tipoconta']==1){
        echo("<a href='contaadmin.php'>Conta</a>");
     }
  }
   }
?>
<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
    }else{
?>
            <form name='name' method="POST" action="validacao.php">
                     Login <input type="text" name="login" value=""><br>
                     Senha <input type="password" name="senha" value=""><br>
                    <input type="submit" name="enviar" value="enviar">
            </form>
<?php
}
?>

    <div id="banner" class="main" style="background: url(imagens/inverno.jpg) center;">
        <a class="bannerlink" href="" title="asd"></a>


    </div>



    <div id="mainwrapper">



<ul id="menus">
    <li><a href="home.php">Home</a></li>
    <li><a href="produtos.php">Produtos</a></li>
    <li><a href="promo.php">Promoções</a></li>
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

                            <strong>Reçeba promoções por E-mail</strong>
                                <li class="caixaemailpromo">
                                <form action="" method="post">
                                <input type="text" size="13" value="E-mail" name="signup"><input class="submit" type="image" src="imagens/signupsubmit.png" width="20" height="15"  alt="" title="Enviar">
                                </form>
                            </li>


                    </ul>




            </div>



            <div id="corpodosite">





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
    $consulta = 'select * from enderecovenda where codigo="'.$endereco.'"';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
     echo('<table>');
     echo('<tr><td><H3>Endereço</H3></td></tr>');
     echo('<tr><td>Estado  :'.$linha["estado"].'</td></tr>');
     echo('<tr><td>Cidade  :'.$linha["cidade"].'</td></tr>');
     echo('<tr><td>Bairro  :'.$linha["bairro"].'</td></tr>');        
     echo('<tr><td>Rua     :'.$linha["rua"].'</td></tr>');
     echo('<tr><td>Número  :'.$linha["numero"].'</td></tr>');
     echo('<tr><td>Telefone para contato  :'.$linha["telefone"].'</td></tr>');
     echo('<tr><td>Informações Adicionais  :'.$linha["adicionais"].'</td></tr>');
     echo('<tr><td>CEP  :'.$linha["CEP"].'</td></tr>');
     echo('</table>');
    }
    echo("<br>");
    if(isset($_POST["gproduto"])){
    $consulta = 'select * from produtos where codigo in(select codigoprodutos from guardaprodutos where codigo="'.$_POST["gproduto"].'")';
    }else{
		
		
		
    $consulta = 'SELECT produtos.* FROM produtos INNER JOIN guardaprodutos ON produtos.codigo = guardaprodutos.codigoprodutos AND guardaprodutos.codigoprodutos in(select codigoprodutos from guardaprodutos where codigousuarios="'.$codigousuario.'")';
    }
    $resultado = mysql_query($consulta,$link);
  //solução de problemas em tudo relacionado a banco de dados echo($consulta);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
     echo('<table>');
     echo('<tr><td><H3>Produto</H3></td></tr>');
     echo('<tr><td>Nome do produto  :'.$linha["titulo"].'</td></tr>');
    $consultar = 'select nome from categoria where codigo="'.$linha["categorias"].'"';
    $resultados = mysql_query($consultar,$link);
    echo(mysql_error());
    while($linhas  =  mysql_fetch_array($resultados)){
    $categorias=$linhas['nome'];
    }
        echo('<tr><td>Categoria  :'.$categorias.'</td></tr>');
        echo('<tr><td>Descricao  :'.$linha["descricao"].'</td></tr>');        
        echo('<tr><td>Valor  :R$ '.$linha["valor"].'</td></tr>');
        echo('<tr><td><img src="upload/'.$linha["imagem"].'"></td></tr>');
     echo('</table>');
    }
    
    
    
    
    echo('<table>');
    echo('<form method="POST" action="produtos.php" enctype="multipart/form-data">');
    echo('<tr><td><H3>Forma de pagamento</H3></td></tr>');
    echo('<tr><td><select name="formapagamento">');
    $consulta = 'select * from formapagamento';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<option value="'.$linha['codigo'].'">'.$linha['nome'].'</option>');
    }
    echo('</select></td></tr><br>');
    if(isset($_POST["gproduto"])){
    echo('<tr><td><input type="hidden" name="gproduto" value="'.$_POST["gproduto"].'"></td></tr>');
    }
    echo('<tr><td><input type="hidden" name="endereco" value="'.$endereco.'"></td></tr>');
    echo('<tr><td><input type="submit" name="confirmar" value="Confirmar"></td></tr><br>');
    echo('</form>');
    echo('</table>');
    ?>
    
        </div>

        </div>




            </div>




        </div>

        </div>

    </div>


        </div>



</body></html>

