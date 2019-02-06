<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			if (isset($_GET['mensagem'])){
		?>
			<script language="javascript">
				var mensagem = "<?php echo $_GET['mensagem'];?>";
				alert(mensagem);
			</script>
		<?php
			}
		?>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Museu da imagem</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le styles -->
		<link href="Museu/bootstrap.css" rel="stylesheet">
		<style type="text/css">
			body {
			padding-top: 41px;
			padding-bottom: 0px;
			}
		</style>
		<link href="Museu/bootstrap-responsive.css" rel="stylesheet">
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<![endif]-->
		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://getbootstrap.com/2.3.2/assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://getbootstrap.com/2.3.2/assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://getbootstrap.com/2.3.2/assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="http://getbootstrap.com/2.3.2/assets/ico/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="http://getbootstrap.com/2.3.2/assets/ico/favicon.png">
	</head>
	
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand" href="Museu%20da%20Imagem.php">Imagens</a>
					<div style="height: 0px;" class="nav-collapse collapse">
						<ul class="nav">
							<li class="active"><a href="Museu%20da%20Imagem.php">Home</a></li>
							<li><a href="Museu%20da%20Imagem.php">About</a></li>
							<li><a href="Museu%20da%20Imagem.php">Contact</a></li>
							<li class="dropdown">
								<a href="Museu%20da%20Imagem.php" class="dropdown-toggle" data-toggle="dropdown"> Fotos <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="Museu%20da%20Imagem.php">Foto 1</a></li>
									<li><a href="Museu%20da%20Imagem.php">Foto 2</a></li>
									<li class="divider"></li>
									<li class="nav-header">Foto extra</li>
									<li><a href="Museu%20da%20Imagem.php">Foto</a></li>
								</ul>
							</li>
						</ul>
						<form class="navbar-form pull-right" method="POST" action="Museu%20da%20Imagem.php">
							<input class="span2" placeholder="Pesquisar" type="text" name="pesquisar">
							<button type="submit" class="btn">OK</button>
						</form>
					</div><!--/.nav-collapse -->
				</div><!--/.container -->
			</div><!--/.navbar-inner -->
		</div><!--/.navbar navbar-inverse navbar-fixed-top -->
		<div class="container">
			<div class="row-fluid">
				<div class="span3">
					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<li class="nav-header">Categorias</li>
							<?php
								#$cesta = array("laranja", "morango");
								#array_push($cesta, "melancia", "batata");
								#print_r($cesta);
								@header("Content-Type: text/html; charset=utf-8");
								$xml = simplexml_load_file("imagens.xml");
								$categoria = array();
								foreach($xml->foto as $foto){
									if ($foto->id == 001){
										array_push($categoria, $foto->categoria);
										echo "<li class='active'><a href='Museu%20da%20Imagem.php?categoria=".$foto->categoria."'>".$foto->categoria."</a></li>";
									}else{
										$verificador = 0;
										for ($posicao = 0; $posicao <= (count($categoria) - 1); $posicao++){
											if ($foto->categoria == (string)$categoria[$posicao]){
												$verificador = 1;
											}
										}
										if ($verificador == 0){
											array_push($categoria, $foto->categoria);
											echo "<li><a href='Museu%20da%20Imagem.php?categoria=".$foto->categoria."'>".$foto->categoria."</a></li>";
										}
									}
								}
							?>
						</ul>
					</div><!--/.well sidebar-nav-->
				</div><!--/span3-->
			</div><!--/row-fluid-->
			<!--  Carousel -->
			<!--  consult Bootstrap docs at 
			http://twitter.github.com/bootstrap/javascript.html#carousel -->
			<div id="this-carousel-id" class="carousel slide">
				<div class="carousel-inner">
					<?php
						#define o encoding do cabeçalho para utf-8;
						#usando o utf8_decode para exibir com acentos;
						@header("Content-Type: text/html; charset=utf-8");
						#carrega o arquivo XML e retornando um Array;
						$xml = simplexml_load_file("imagens.xml");
						# se o xml for um link e nao um arquivo como livros.xml, troque -o pelo link ex.;
						# $xml = simplexml_load_file("http://endereco/link/mesmoQueNaoTenhaExtensaoXML/");
						#para cada nó LIVRO  atribui à variavel $foto (obj simplexml);
						if(isset($_POST['pesquisar'])){
							$id = array();
							foreach($xml->foto as $foto){
								// Note o uso de ===.  Simples == não funcionaria como esperado
								// por causa da posição de 'a' é 0 (primeiro) caractere.
								if (((strpos(strtolower($foto->id), strtolower($_POST['pesquisar']))) !== false) or ((strpos(strtolower($foto->nome), strtolower($_POST['pesquisar']))) !== false) or ((strpos(strtolower($foto->descricao), strtolower($_POST['pesquisar']))) !== false) or ((strpos(strtolower($foto->categoria), strtolower($_POST['pesquisar']))) !== false) or ((strpos(strtolower($foto->ano), strtolower($_POST['pesquisar']))) !== false) or ((strpos(strtolower($foto->pchave), strtolower($_POST['pesquisar']))) !== false) or ((strpos(strtolower($foto->di_autoral), strtolower($_POST['pesquisar']))) !== false)){
									array_push($id, "1");
									if (count($id) == 1){
										echo "<div class='item active'>";
									}else{
										echo "<div class='item'>";
									}
											echo "<a href='#'><img src='".$foto->caminho."' alt='".$foto->id."'></a>";
											echo "<div class='carousel-caption'>";
												echo "<p>".$foto->nome."</p>";
												echo "<p><a href=''>".$foto->descricao."</a></p>";
											echo "</div>";
										echo "</div>";				
								}
							}
							if (count($id) == 0){
								$mensagem = "Não foi encontrado nada referente ah ".$_POST['pesquisar'].". /n Verifique se não escreveu errado. /n Agora voce será reinviado a tela inicial.";
								# em casos normais header('Location: Museu%20da%20Imagem.php');
								echo"<script>location.href='Museu%20da%20Imagem.php?mensagem=".$mensagem."'</script>";
							}
						}else{
							if (isset($_GET['categoria'])){
								$id = array();
								foreach($xml->foto as $foto){
									if (($foto->categoria) == ($_GET['categoria'])){
										array_push($id, "1");
										if (count($id) == 1){
											echo "<div class='item active'>";
										}else{
											echo "<div class='item'>";
										}
												echo "<a href='#'><img src='".$foto->caminho."' alt='".$foto->id."'></a>";
												echo "<div class='carousel-caption'>";
													echo "<p>".$foto->nome."</p>";
													echo "<p><a href=''>".$_GET['categoria']."</a></p>";
												echo "</div>";
											echo "</div>";	
									}
								}
							}else{
								$id = array();
								foreach($xml->foto as $foto){
									array_push($id, "1");
									if (count($id) == 1){
										echo "<div class='item active'>";
									}else{
										echo "<div class='item'>";
									}
											echo "<img src='".$foto->caminho."' alt='".$foto->id."' class = 'imagens' >";
											echo "<div class='carousel-caption'>";
												echo "<p>".$foto->nome."</p>";
												echo "<p><a href=''>".$foto->descricao."</a></p>";
											echo "</div>";
										echo "</div>";
								}
							}
						}
					?>
				</div><!-- .carousel-inner -->
				<!--  next and previous controls here
				href values must reference the id for this carousel -->
				<a class="carousel-control left" href="#this-carousel-id" data-slide="prev">‹</a>
				<a class="carousel-control right" href="#this-carousel-id" data-slide="next">›</a>
			</div><!-- .carousel -->
			<!-- end carousel -->
			<!-- Example row of columns -->
		</div> <!-- /container -->
		
		<!-- Le javascript
		================================================== -->
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script src="Museu/jquery.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>
		<!-- Bootstrap jQuery plugins compiled and minified -->
		<script src="Museu/bootstrap.js"></script>
		<script>
			$(document).ready(function(){
				$('.carousel').carousel({
					interval: 40
				});
				$(".imagens").click(function() {
					<?php
						if(isset($_SESSION["pause"])){
							if ($_SESSION["pause"] == "sim"){
								$_SESSION["pause"] = "nao";
								?>$(".carousel").carousel("cycle");alert("ola1");<?php
							}else{
								$_SESSION["pause"] = "sim";
								?>$(".carousel").carousel("pause");alert("ola2");<?php
							}
						}else{
							$_SESSION["pause"] = "sim";
							?>$(".carousel").carousel("pause");alert("ola3");<?php
						}
					?>
				});
			});
		</script>
	</body>
</html>
