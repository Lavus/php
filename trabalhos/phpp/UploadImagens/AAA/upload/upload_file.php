<?php
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
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
//    if (file_exists("upload/" . $_FILES["file"]["name"]))
//      {
//      echo $_FILES["file"]["name"] . " already exists. ";
//     }
//    else
//      {
      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);
      $imagem_nome = md5(uniqid(time())) . "." . $ext[1];
      $imagem_dir = $imagem_nome;
      copy($_FILES["file"]["tmp_name"],"upload/" . $imagem_dir);
      echo "Sua imagen foi enviada com sucesso!<br>";
      echo('<img src="upload/'.$imagem_dir.'">');
      $imagem=$imagem_dir;
      echo($imagem);
//      }
    }
  }
else
  {
  echo "Invalid file";
  }
}
?>
