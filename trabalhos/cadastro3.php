<?php
 session_start();
?>

<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
        echo("Voce está logado");
        echo("<br><a href='destroi.php'>Sair</a><br>");
     if (($_SESSION['login']=='admin') and ($_SESSION['senha']=='1234')){
        echo("<a href='contaadmin.php'>Conta</a>");
     }
    }
?>
</head>
 <body bgcolor="white">
 <script language="javascript">
	function verificaendereco(){
       if (document.name.estado.value==''){
            alert('Preencha o Estado');
            document.name.estado.focus();
            return false;
       }
       if (document.name.cidade.value==''){
            alert('Preencha a Cidade');
            document.name.cidade.focus();
            return false;
       }       
       if (document.name.bairro.value==''){
            alert('Preencha o Bairro');
            document.name.bairro.focus();
            return false;
       }
       if (document.name.rua.value==''){
            alert('Preencha a Rua');
            document.name.rua.focus();
            return false;
       }
       if (document.name.numero.value==''){
            alert('Preencha o Número');
            document.name.numero.focus();
            return false;
       }
       if (document.name.telefone.value==''){
            alert('Preencha o Telefone');
            document.name.telefone.focus();
            return false;
       }
       if (document.name.adicionais.value==''){
            alert('Preencha as Informações Adicionais');
            document.name.adicionais.focus();
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

   




                      <form name='name' method="POST" action="finalizar.php" onSubmit="return verificaendereco();">
                      <div class="form">
                        <label for="name">Estado</label>
                            <input class="text" name="estado" id="name" type="text" />

                        <label for="name">Cidade</label>
                            <input class="text" name="cidade" id="name" type="text" />

                      <div class="clear2"></div>
                        <label for="name">Bairro</label>
                            <input class="text" name="bairro" id="name" type="text" />

                    <div class="clear2"></div>
                        <label for="name">Rua</label>
                            <input class="text" name="rua" id="name" type="text" />

                    <div class="clear2"></div>
                        <label for="name">Número</label>
                            <input class="text" name="numero" id="name"></textarea>
                                                <div class="clear2"></div>


                                                <div class="clear2"></div>
                        <label for="name">Telefone para contato</label>
                            <input class="text" name="telefone" id="name" type="text" />

                            <div class="clear2"></div>
                        <label for="name">Informações Adicionais</label>
                            <input class="text" name="adicionais" id="name" type="text" />
                            
                            <div class="clear2"></div>
                        <label for="name">CEP</label>
                            <input class="text" name="CEP" id="name" type="text" />
                            
                            <input class="button" type="submit" name="endereco" value="enviar">
                             </form>
 
