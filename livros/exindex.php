<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>tabela de imagem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>
					Cod
				</th>
				
				<th>
					Titulo
				</th>
				
				<th>
					Descrição
				</th>
				
				<th>
					Autor
				</th>
				
				<th>
					Pagina
				</th>
				
				<th>
					Preço
				</th>

				<th>
					<form class="navbar-form pull-right" method="POST" action="index.php">
						<input class="span2" placeholder="Pesquisar" type="text" name="pesquisar">
						<button type="submit" class="btn">OK</button>
					</form>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				#define o encoding do cabeçalho para utf-8;
				#usando o utf8_decode para exibir com acentos;
				@header("Content-Type: text/html; charset=utf-8");
				#carrega o arquivo XML e retornando um Array;
				$xml = simplexml_load_file("livros.xml");
				# se o xml for um link e nao um arquivo como livros.xml, troque -o pelo link ex.;
				# $xml = simplexml_load_file("http://endereco/link/mesmoQueNaoTenhaExtensaoXML/");
				#para cada nó LIVRO  atribui à variavel $livro (obj simplexml);
				if(isset($_POST['pesquisar'])){
					foreach($xml->livro as $livro){
						// Note o uso de ===.  Simples == não funcionaria como esperado
						// por causa da posição de 'a' é 0 (primeiro) caractere.
						if (((strpos(strtolower($livro->cod), strtolower($_POST['pesquisar']))) !== false) or ((strpos(strtolower($livro->titulo), strtolower($_POST['pesquisar']))) !== false) or ((strpos(strtolower($livro->descricao), strtolower($_POST['pesquisar']))) !== false) or ((strpos(strtolower($livro->autor), strtolower($_POST['pesquisar']))) !== false) or ((strpos(strtolower($livro->paginas), strtolower($_POST['pesquisar']))) !== false) or ((strpos(strtolower($livro->preco), strtolower($_POST['pesquisar']))) !== false)){
							echo"<tr>";
								echo"<td>";
									echo $livro->cod;
								echo"</td>";
								
								echo"<td>";
									echo $livro->titulo;
								echo"</td>";

								echo"<td>";
									echo $livro->descricao;
								echo"</td>";
			
								echo"<td>";
									echo $livro->autor;
								echo"</td>";

								echo"<td>";
									echo $livro->paginas;
								echo"</td>";
								
								echo"<td>";
									echo $livro->preco;
								echo"</td>";
							echo"</tr>";						
						}
					}
				}else{
					foreach($xml->livro as $livro){
						echo"<tr>";
							echo"<td>";
								echo $livro->cod;
							echo"</td>";
							
							echo"<td>";
								echo $livro->titulo;
							echo"</td>";

							echo"<td>";
								echo $livro->descricao;
							echo"</td>";
		
							echo"<td>";
								echo $livro->autor;
							echo"</td>";

							echo"<td>";
								echo $livro->paginas;
							echo"</td>";
							
							echo"<td>";
								echo $livro->preco;
							echo"</td>";
						echo"</tr>";
					}
				}
			?>
		</tbody>
	</table>
</html>
