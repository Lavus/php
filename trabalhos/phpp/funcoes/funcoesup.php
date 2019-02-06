<?php
function upload($_FILES["file"])
	{
		$erro = $config = array();
		$arquivo = isset($_FILES["file"]) ? $_FILES["file"] : FALSE;

		if($arquivo){
			$tamanhos = getimagesize($arquivo["tmp_name"]);
			$config["tamanho"] = 506883;
			$config["largura"] = 1000;
			$config["altura"]  = 1000;

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
		if(isset($_FILES["charge"])){
			$tamanhos = getimagesize($_FILES["charge"]["tmp_name"]);
			$config["tamanho"] = 506883;
			$config["largura"] = 1000;
			$config["altura"]  = 1000;

			if (
				($_FILES["charge"]["type"] == "image/gif")
		or ($_FILES["charge"]["type"] == "image/jpeg")
		or ($_FILES["charge"]["type"] == "image/jpg")
		or ($_FILES["charge"]["type"] == "image/pjpeg")
		or ($_FILES["charge"]["type"] == "image/png")
		&& ($_FILES["charge"]["size"] < $config["tamanho"])
		&& ($tamanhos[0] < $config["largura"])
		&& ($tamanhos[1] < $config["altura"])
		)
		  {
		  if ($_FILES["charge"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["charge"]["error"] . "<br />";

			}
		  else
			{
			  preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $_FILES["charge"]["name"], $ext);
			  $imagem_nome = md5(uniqid(time())) . "." . $ext[1];
			  $imagem_dir = $imagem_nome;
			  copy($_FILES["charge"]["tmp_name"],"upload/" . $imagem_dir);
			  $imagem=$imagem_dir;
		//      }
			}
		  }
		else
		  {
		  echo "Invalid file";
		  }
		}
      }
?>
