<html>
    <a href="destroi.php">Sair</a>
    <head>
        <title>Home</title>
    </head>
    <body bgcolor="white">
        <form method="POST" action="verifprodut.php" enctype="multipart/form-data">
        <table align="center" id="table3">
        <?php
            if(isset($_POST["voltar"])){
				
                echo('<tr><td><input type="text" name="valor" value="'.$_POST['valor'].'"></td></tr><br>');
                echo('<tr><td><input type="text" name="regras" value="'.$_POST['regras'].'"></td></tr><br>');
                echo('<tr><td><input type="text" name="titulo" value="'.$_POST['titulo'].'"></td></tr><br>');
                echo('<tr><td><img src="upload/'.$_POST['file'].'"></td></tr>');
                echo('<tr><td><input type="file" name="change"></td></tr><br>');
                echo('<tr><td><input type="text" name="datainicial" value="'.$_POST['datainicial'].'"></td></tr><br>');
                echo('<tr><td><input type="text" name="datafinal" value="'.$_POST['datafinal'].'"></td></tr><br>');
                echo('<tr><td><input type="text" name="minimovenda" value="'.$_POST['minimovenda'].'"></td></tr><br>');
                echo('<tr><td><input type="text" name="valorkm" value="'.$_POST['valorkm'].'"></td></tr><br>');
                echo('<tr><td><input type="text" name="prazoentrega" value="'.$_POST['prazoentrega'].'"></td></tr><br>');
                echo('<tr><td><input type="text" name="descriver" value="'.$_POST['descriver'].'"></td></tr><br>');
                echo('<tr><td><input type="hidden" name="imagem" value="'.$_POST['file'].'"></td></tr><br>');
                echo('<tr><td><input type="submit" name="OK" value="OK"></td></tr><br>');
            }else{
                echo('<tr><td><input type="text" name="valor" value="valor"></td></tr><br>');
                echo('<tr><td><input type="text" name="regras" value="regras"></td></tr><br>');
                echo('<tr><td><input type="text" name="titulo" value="titulo"></td></tr><br>');
                echo('<tr><td><input type="file" name="file"></td></tr><br>');
                echo('<tr><td><input type="text" name="datainicial" value="data inicial"></td></tr><br>');
                echo('<tr><td><input type="text" name="datafinal" value="data final"></td></tr><br>');
                echo('<tr><td><input type="text" name="minimovenda" value="minimo venda"></td></tr><br>');
                echo('<tr><td><input type="text" name="valorkm" value="valorkm"></td></tr><br>');
                echo('<tr><td><input type="text" name="prazoentrega" value="prazo de entrega"></td></tr><br>');
                echo('<tr><td><input type="text" name="descriver" value="descrever produto"></td></tr><br>');
                echo('<tr><td><input type="submit" name="OK" value="OK"></td></tr><br>');
            }
        ?>
        </table>
        </form>
    </body>
</html>

