                      <body>
<script language=javascript>
function confirmacao(){
 if (confirm("tem certeza?"))
  alert("então, tá.");
}
</script>
<a href=# onclick="return confirmacao();">blah</a>
</body>
                      <form name='name' method="POST" action="home.php" onSubmit="return verificaCampos();">

                      <div class="form">
                        <label for="name">Login</label>
                            <input class="text" name="login" id="name" type="text" />

                        <label for="name">Nome</label>
                            <input class="text" name="nome" id="name" type="text" />

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

                            <input class="button" type="submit" name="cadastro" value="enviar">
                             </form>
