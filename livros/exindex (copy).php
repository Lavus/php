			<?php
				#define o encoding do cabeçalho para utf-8;
				#usando o utf8_decode para exibir com acentos;
				@header("Content-Type: text/html; charset=utf-8");
				#carrega o arquivo XML e retornando um Array;
				$xml = simplexml_load_file("imagens.xml");
				# se o xml for um link e nao um arquivo como livros.xml, troque -o pelo link ex.;
				# $xml = simplexml_load_file("http://endereco/link/mesmoQueNaoTenhaExtensaoXML/");
				#para cada nó LIVRO  atribui à variavel $livro (obj simplexml);
				foreach($xml->foto as $foto){
					// Note o uso de ===.  Simples == não funcionaria como esperado
					// por causa da posição de 'a' é 0 (primeiro) caractere.
					echo $foto->id;
					echo $foto->nome;
					echo $foto->descricao;
					echo $foto->categoria;
					echo $foto->ano;
					echo $foto->pchave;
					echo $foto->caminho;
					echo $foto->di_autoral."<br>";
				}
			?>
