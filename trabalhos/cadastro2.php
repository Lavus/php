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
    function verificaCampos(){
       if (document.name.login.value==''){
            alert('Preencha o Login');
            document.name.login.focus();
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

   




                      <form name='name' method="POST" action="home.php" onSubmit="return verificaCampos();">

                      <div class="form">
                        <label for="name">Nome - Login</label>
                            <input class="text" name="login" id="name" type="text" />

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

                            <input class="button" type="submit" name="enviar" value="enviar">
                             </form>
 
