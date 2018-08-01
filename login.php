<?php

require "cabecalho.php";
require "config.php";
session_start();
if (isset($_POST['cpf']) && !empty($_POST['cpf'])) {
	$usuario = addslashes($_POST['cpf']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = $pdo->prepare("SELECT * FROM pessoa WHERE cpf = :cpf and senha = :senha");
	$sql->bindValue(":cpf", $usuario);
	$sql->bindValue(":senha", $senha);
	$sql->execute();

	if ($sql->rowCount() > 0) {
		$sql = $sql->fetchAll();
		foreach ($sql as $tipo) {
			
		$_SESSION['id'] = $tipo['id'];
		}
   	    header("Location: index.php?msn=0");
	}
	else{
		?>
    <label class="btn btn-danger form-control"><?php echo "Usuário não existe";?></label>
<?php		
	}
}
?>
<form method="POST">
	<legend>Processo Seletivo</legend>

	<div class="form-group">
		<label class="fa fa-user">&ensp;CPF</label>
		<input type="text" class="form-control" name="cpf" placeholder="Digite o seu CPF" maxlength="11" minlength="11" onblur="return verificarCPF(this.value)">
	</div>
	<div class="form-group">
		<label class="fa fa-unlock">&ensp;Senha</label>
		<input type="password" class="form-control" name="senha" placeholder="Digite sua Senha">
	</div>

	<button type="submit" class="btn btn-primary fa fa-sign-in">&ensp;Logar</button>
</form>


        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
         <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
           <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Clique aqui se ainda não tiver Login</a>
           </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
           <div class="panel-body">
            <form class="form-inline" action="busca_pessoa.php" method="POST">
             <div class="form-group" style="padding:50px 0 50px 0;">
              <label class="sr-only" for="CPF">CPF</label>
              <div class="input-group">
               <div class="input-group-addon">CPF</div>
               <input type="text" class="form-control" id="cpf" name="CPF" placeholder="00000000000" minlength="11" maxlength="11" onblur="return verificarCPF(this.value)"/>
              </div>
             </div>
             <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
           </div>
          </div>
         </div>

         <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
           <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Esqueci a senha</a>
           </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
           <div class="panel-body">
            <form class="form-inline" action="gerar_senha.php" method="POST">
             <div class="form-group" style="padding:50px 0 50px 0;">
              <label class="sr-only" for="CPF">CPF</label>
              <div class="input-group">
               <div class="input-group-addon">CPF</div>
               <input type="text" class="form-control" id="cpf" name="cpf" placeholder="00000000000" minlength="11" maxlength="11" onblur="return verificarCPF(this.value)"/>
              </div>
              <div class="input-group">
               <div class="input-group-addon">Email</div>
               <input type="email" class="form-control" id="cpf" name="email" placeholder="mail@gmail.com"/>
              </div>
             </div>
             <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
           </div>
          </div>
         </div>
        </div>

<?php
require "rodape.php";
?>