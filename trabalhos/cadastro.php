
<?php
 session_start();
?>
<?php
  include("conexao.php");
?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
 
 <script language="javascript">
    function verificaCampos(){
       if (document.name.login.value==''){
            alert('Preencha o Login');
            document.name.login.focus();
            return false;
       }
       if (document.name.nome.value==''){
            alert('Preencha o Nome');
            document.name.nome.focus();
            return false;
       }       
       if (document.name.senha.value==''){
            alert('Preencha a Senha');
            document.name.senha.focus();
            return false;
       }
       if (document.name.CPF.value==''){
            alert('Preencha o CPF');
            document.name.CPF.focus();
            return false;
       }
       if (document.name.email.value==''){
            alert('Preencha o E-mail');
            document.name.email.focus();
            return false;
       }
       if (document.name.endereco.value==''){
            alert('Preencha o Endereço');
            document.name.endereco.focus();
            return false;
       }
       if (document.name.CEP.value==''){
            alert('Preencha a CEP');
            document.name.CEP.focus();
            return false;
       }
       return true;
    }
  </script>


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
</div>

<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
  $consulta = 'select nome, tipoconta from usuarios where usuarios.login="'.$_SESSION["login"].'" and usuarios.senha="'.$_SESSION["senha"].'"';
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
     echo("Voce está logado ".$linha['nome'].".");
        echo("<br><a href='destroi.php'>Sair</a><br>");
     if ($linha['tipoconta']==1){
        echo("<a href='contaadmin.php'>Conta</a>");
     }
  }
   }
?>
    <div id="banner" class="main" style="background: url(imagens/inverno.jpg) center;">

<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
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

                            <strong>Reçeba promoções por E-mail</strong>
                                <li class="caixaemailpromo">
                                <form action="" method="post">
                                <input type="text" size="13" value="E-mail" name="signup"><input class="submit" type="image" src="/trabalho-tcc/imagens/signupsubmit.png" width="20" height="15"  alt="" title="Enviar">
                                </form>
                            </li>


                    </ul>




            </div>

            <div id="corpodosite">



                <ul id="listaD">
                    <li class="titulo"><a href=""><h4>Produtos Promovidos</h4></a></li>                     <li class="first odd">
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
    <h2>Cadastre-se <span class="green"> Aqui</span></h2>
                <div id="contactform">

                      <form name='name' method="POST" action="home.php" onSubmit="return verificaCampos();">

                      <div class="form">
                        <label for="name">Login</label>
                            <input class="text" name="login" id="name" type="text" />

                        <label for="name">Nome</label>
                            <input class="text" name="nome" id="name" type="text" />

                      <div class="clear2"></div>
                        <label for="name">Senha</label>
                            <input class="text" name="senha" id="name" type="password" />

                    <div class="clear2"></div>
                        <label for="name">CPF</label>
                            <input class="text" name="CPF" id="name" type="text" />

                    <div class="clear2"></div>
                        <label for="name">E-mail</label>
                            <input class="text" name="email" id="name"></textarea>
                                                <div class="clear2"></div>


                                                <div class="clear2"></div>
                        <label for="name">Endereço</label>
                            <input class="text" name="endereco" id="name" type="text" />

                            <div class="clear2"></div>
                        <label for="name">CEP</label>
                            <input class="text" name="CEP" id="name" type="text" />

                            <input class="button" type="submit" name="cadastro" value="enviar">
                             </form>
 </div>


        </div>

        </div>




            </div>




        </div>

        </div>

    </div>


        </div>



</body></html>
