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
     echo("Voce está logado ".$linha['nome'].".");
        echo("<br><a href='destroi.php'>Sair</a><br>");
    $tipo=$linha['tipoconta'];
  }
  if($tipo==1){
?>

<?php
if(isset($_FILES["file"])){
$erro = $config = array();
$arquivo = isset($_FILES["file"]) ? $_FILES["file"] : FALSE;

if($arquivo){
    $tamanhos = getimagesize($arquivo["tmp_name"]);
    $config["tamanho"] = 506883;
    $config["largura"] = 10000;
    $config["altura"]  = 10000;

    if (
        ($_FILES["file"]["type"] == "image/gif")
or ($_FILES["file"]["type"] == "image/jpeg")
or ($_FILES["file"]["type"] == "image/jpg")
or ($_FILES["file"]["type"] == "image/pjpeg")
or ($_FILES["file"]["type"] == "image/png")
&& ($_FILES["file"]["size"] < $config["tamanho"])
&& ($tamanhos[0] < $config["largura"])
&& ($tamanhos[1] < $config["altura"])
)
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

    }
  else
    {
      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);
      $imagem_nome = md5(uniqid(time())) . "." . $ext[1];
      $imagem_dir = $imagem_nome;
      copy($_FILES["file"]["tmp_name"],"upload/" . $imagem_dir);
      $imagem=$imagem_dir;
//      }
    }
  }
else
  {
  echo "Invalid file";
  }
}
}else
if(($_FILES["change"]["name"]=="") and ($_FILES["change"]["type"]=="") and ($_FILES["change"]["error"]=="4") and ($_FILES["change"]["size"]=="0") and ($_FILES["change"]["tmp_name"]=="")){
$imagem=$_POST["imagem"];
}else{
    $tamanhos = getimagesize($_FILES["change"]["tmp_name"]);
    $config["tamanho"] = 506883;
    $config["largura"] = 1000;
    $config["altura"]  = 1000;

    if (
        ($_FILES["change"]["type"] == "image/gif")
or ($_FILES["change"]["type"] == "image/jpeg")
or ($_FILES["change"]["type"] == "image/jpg")
or ($_FILES["change"]["type"] == "image/pjpeg")
or ($_FILES["change"]["type"] == "image/png")
&& ($_FILES["change"]["size"] < $config["tamanho"])
&& ($tamanhos[0] < $config["largura"])
&& ($tamanhos[1] < $config["altura"])
)
  {
  if ($_FILES["change"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["change"]["error"] . "<br />";

    }
  else
    {
      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $_FILES["change"]["name"], $ext);
      $imagem_nome = md5(uniqid(time())) . "." . $ext[1];
      $imagem_dir = $imagem_nome;
      copy($_FILES["change"]["tmp_name"],"upload/" . $imagem_dir);
      $imagem=$_POST["imagem"];
      $deletarimg="upload/".$imagem."";
      unlink($deletarimg);
      $imagem=$imagem_dir;
//      }
    }
  }
else
  {
  echo "Invalid file";
  }
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


<h2><span class="green">Verificação</span></h2>
                <div id="contactform">
                    <div class="form">
                    <div class="clear2"></div>
                    <div class="clear2"></div>
                    <div class="clear2"></div>
   <table align="center" id="table3">
   <?php
        echo('<br>');
        echo('<tr><td>'.$_POST['valor'].'</td></tr>');
        echo('<tr><td>'.$_POST['titulo'].'</td></tr>');
        echo('<tr><td><img src="upload/'.$imagem.'"></td></tr>');
        echo('<tr><td>'.$_POST['descriver'].'</td></tr>');
        echo('<tr><td>'.$_POST['position'].'</td></tr>');
        echo('<tr><td>'.$_POST['categoria'].'</td></tr>');
   ?>
   </table>
   <?php
   if(isset($_POST["alterar"])){
   ?>
   <table align="center">
    <form method="POST" action="cadaspromo.php" enctype="multipart/form-data">
    <?php
        echo('<tr><td><input type="hidden" name="valor" value="'.$_POST['valor'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="titulo" value="'.$_POST['titulo'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="imagem" value="'.$imagem.'"></td></tr>');
        echo('<tr><td><input type="hidden" name="descriver" value="'.$_POST['descriver'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="position" value="'.$_POST['position'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="categoria" value="'.$_POST['categoria'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="codigo" value="'.$_POST['codigo'].'"></td></tr><br>');
        echo('<tr><td><input type="submit" name="alterar" value="Re-Alterar"></td></tr>');
    ?>
  </form>
      <form method="POST" action="conclude.php" enctype="multipart/form-data">
    <?php
        echo('<tr><td><input type="hidden" name="valor" value="'.$_POST['valor'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="titulo" value="'.$_POST['titulo'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="imagem" value="'.$imagem.'"></td></tr>');
        echo('<tr><td><input type="hidden" name="descriver" value="'.$_POST['descriver'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="position" value="'.$_POST['position'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="categoria" value="'.$_POST['categoria'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="codigo" value="'.$_POST['codigo'].'"></td></tr><br>');
        echo('<tr><td><input type="submit" name="atualizar" value="Atualizar Produto"></td></tr>');
    ?>
   </table>
  </form>
   <?php
   }else{
   ?>
      <table align="center">
    <form method="POST" action="cadaspromo.php" enctype="multipart/form-data">
    <?php
        echo('<tr><td><input type="hidden" name="valor" value="'.$_POST['valor'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="titulo" value="'.$_POST['titulo'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="file" value="'.$imagem.'"></td></tr>');
        echo('<tr><td><input type="hidden" name="descriver" value="'.$_POST['descriver'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="position" value="'.$_POST['position'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="categoria" value="'.$_POST['categoria'].'"></td></tr>');
        echo('<tr><td><input type="submit" name="voltar" value="voltar"></td></tr>');
    ?>
  </form>
      <form method="POST" action="conclude.php" enctype="multipart/form-data">
    <?php
        echo('<tr><td><input type="hidden" name="valor" value="'.$_POST['valor'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="titulo" value="'.$_POST['titulo'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="imagem" value="'.$imagem.'"></td></tr>');
        echo('<tr><td><input type="hidden" name="descriver" value="'.$_POST['descriver'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="position" value="'.$_POST['position'].'"></td></tr>');
        echo('<tr><td><input type="hidden" name="categoria" value="'.$_POST['categoria'].'"></td></tr>');
        echo('<tr><td><input type="submit" name="concluir" value="concluir"></td></tr>');
    ?>
   </table>
  </form>   
   <?php
   }
   ?>
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
