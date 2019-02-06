
<?php
 session_start();
?>
<?php
  include("conexao.php");
  include("incluir.php");
  if(isset($_POST['login'])){
   $consulta = Incluir('usuarios',$_POST['login'],$_POST['senha'],$_POST['CPF'],$_POST['email'],$_POST['endereco'],$_POST['CEP']);
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error());
   }
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


<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
        echo("Voce está logado ".$_SESSION['login'].".");
        echo("<br><a href='destroi.php'>Sair</a><br>");
     if (($_SESSION['login']=='admin') and ($_SESSION['senha']=='1234')){
        echo("<a href='contaadmin.php'>Conta</a>");
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
    <li><a href="unicolance.php">Unico Lançe</a></li>
    <li><a href="contato.php">Contato</a></li>
</ul>


        <div class="mainwrapper-inner">

        <div class="mainwrapper-inner-inner">








            <div id="listaE">


                <ul class="nav">
    <?php
    $consulta = 'select nome from categoria';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<li><a href="">');
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






    <div id="conteudoslide">
        <div id="slide">

            <a href="houses.JPG"><img src="imagens/houses.JPG" alt="" /><span><b>Slide 1</b> Descrisão.</span></a>

            <a href="promocao-a-guerra-dos-tronos.jpg"><img src="imagens/promocao-a-guerra-dos-tronos.jpg" alt="" /><span><b>Slide 2</b> - Descrisão.</span></a>

            <a href="houses.JPG"><img src="houses.JPG" alt="" /><span><b> Slide 3</b> -Descrisão.</span></a>

            <a href="promocao-a-guerra-dos-tronos.jpg"><img src="imagens/promocao-a-guerra-dos-tronos.jpg" alt="" /><span><b>Slide 4</b> - Descrisão.</span></a>

            <a href="houses.JPG"><img src="imagens/houses.JPG" alt="" /><span><b>Slide 5</b> -Descrisão.</span></a>
        </div>
            <script>
                $(function() {
                    $('#slide').coinslider({width: 510, height: 200, spw: 11, sph: 4, delay: 5000, sDelay: 10, path: ''});
                    $('#slide').show();
                })
            </script>
        </div>


                <ul id="listaD">
                    <li class="titulo"><a href=""><h4>Produtos Promovidos</h4></a></li>                     <li class="first odd">
    <?php
    $consulta = 'select produtos.titulo,produtos.valor,produtos.imagem from listad,produtos where listad.codigoproduto=produtos.codigo';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<li class="first odd">');
    echo('<a href="">');
    echo('<img src="upload/'.$linha["imagem"].'" width="50" height="35" border="0" alt="">');
    echo('<p>'.$linha["titulo"].'</p>');
    echo('<span style="text-decoration:none !important;">'.$linha["valor"].'</span>');
    echo('</a>');
    echo('</li>');
    }
    ?>
                                        </ul>




            <div id="conteudo">


    <?php
    $consulta = 'select produtos.titulo,produtos.valor,produtos.imagem,produtos.descricao from produtosindex,produtos where produtosindex.codigoproduto=produtos.codigo';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<div class="productblurb">');
    echo('<h3><a href="">'.$linha["titulo"].'</a></h3>');
    echo('<div class="productblurb-img">');
    echo('<a href=""><img src="upload/'.$linha["imagem"].'" width="148" height="116" alt="" title="'.$linha["titulo"].'"></a>');
    echo('<a class="visorpreco" href="">'.$linha["valor"].'</a>');
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


        </div>



</body></html>
