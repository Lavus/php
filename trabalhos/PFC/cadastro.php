<html>
    <a href="destroi.php">Sair</a>
 <head>
<body bgcolor="aquablack">
     <a href="login.php">Home</a>
<html>
 <head>

  <style type="text/css">

    #mensagem a{
      visibility:visible;
      color:aquablack;
    }
    #mensagem a:hover{  //mouse em cima
      visibility:visible;
      color:aquablack;
    }
  </style>


 </head>
 <body bgcolor="white">
   <script language="javascript">
    function verificaCampos(){
       if (document.name.login.value==''){
            alert('Preencha o login');
            document.name.login.focus();
            return false;
       }
       if (document.name.senha.value==''){
            alert('Preencha a senha');
            document.name.senha.focus();
            return false;
       }
       if (document.name.CNPJclientes.value==''){
            alert('Preencha o CNPJclientes');
            document.name.CNPJclientes.focus();
            return false;
       }
       if (document.name.email.value==''){
            alert('Preencha o email');
            document.name.email.focus();
            return false;
       }
       if (document.name.endereco.value==''){
            alert('Preencha o Endere&ccedil;o');
            document.name.endereco.focus();
            return false;
       }
       if (document.name.codigocidade.value==''){
            alert('Preencha o codigocidade');
            document.name.codigocidade.focus();
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

  </div>
  <table align="center"><tr><td>
   <br/>
  <form name='name' method="POST" action="login.php" onSubmit="return verificaCampos();">
   <table border="1" align="center">
    <tr><td> login <input type="text" name="login" value=""><br></td></tr>

    <tr><td> Senha <input type="password" name="senha" value=""><br></td></tr>

    <tr><td> CNPJclientes <input type="text" name="CNPJclientes" value=""><br></td></tr>

    <tr><td> Email <input type="text" name="email" value=""><br></td></tr>

    <tr><td> Endere&ccedil;o <input type="text" name="endereco" value=""><br></td></tr>

    <tr><td> codigocidade <input type="text" name="codigocidade" value=""><br></td></tr>

    <tr><td> CEP <input type="text" name="CEP" value=""><br></td></tr>

    <tr><td><input type="submit" name="enviar" value="enviar"></div></td></tr>
   </table>
  </form>
 </body>
</html>

