<HTML>
<HEAD>
 <TITLE>Documento PHP</TITLE>
</HEAD>
<BODY>
<?
$erro = $config = array();

// Prepara a vari�vel do arquivo
$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
echo $arquivo." echo do arquivo";

// Tamanho m�ximo do arquivo (em bytes)
$config["tamanho"] = 506883;
// Largura m�xima (pixels)
$config["largura"] = 1000;
// Altura m�xima (pixels)
$config["altura"]  = 1000;

// Formul�rio postado... executa as a��es
if($arquivo)
{
    // Verifica se o mime-type do arquivo � de imagem
    if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $arquivo["type"]))
    {
        $erro[] = "Arquivo em formato inv�lido! A imagem deve ser jpg, jpeg,
            bmp, gif ou png. Envie outro arquivo";
    }
    else
    {
        // Verifica tamanho do arquivo
        if($arquivo["size"] > $config["tamanho"])
        {
            $erro[] = "Arquivo em tamanho muito grande!
        A imagem deve ser de no m�ximo " . $config["tamanho"] . " bytes.
        Envie outro arquivo";
        }

        // Para verificar as dimens�es da imagem
        $tamanhos = getimagesize($arquivo["tmp_name"]);

        // Verifica largura
        if($tamanhos[0] > $config["largura"])
        {
            $erro[] = "Largura da imagem n�o deve
                ultrapassar " . $config["largura"] . " pixels";
        }

        // Verifica altura
        if($tamanhos[1] > $config["altura"])
        {
            $erro[] = "Altura da imagem n�o deve
                ultrapassar " . $config["altura"] . " pixels";
        }
    }

    // Imprime as mensagens de erro
    if(sizeof($erro))
    {
        foreach($erro as $err)
        {
            echo " - " . $err . "<BR>";
        }

        echo "<a href=\"up.php\">Fazer Upload de Outra Imagem</a>";
    }

    // Verifica��o de dados OK, nenhum erro ocorrido, executa ent�o o upload...
    else
    {
        // Pega extens�o do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);

        // Gera um nome �nico para a imagem
        $imagem_nome = md5(uniqid(time())) . "." . $ext[1];

        // Caminho de onde a imagem ficar�
        $imagem_dir = "fotos/" . $imagem_nome;

        // Faz o upload da imagem
        move_uploaded_file($arquivo["tmp_name"], $imagem_dir);

        echo "Sua foto foi enviada com sucesso!";
    }
}
?>

</BODY>
</HTML>
