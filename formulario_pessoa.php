<?php
include "cabecalho.php";
session_start();
?>
   <h3>Bem Vindo ao Processo Seletivo Simplificado do Municipio de Teófilo Otoni.</h3>
   <h4>Efetue o cadastro a inscrição:</h4>
   <form method="post" action="cadastro_pessoa.php">

    <div class="form-group">
     <label class="sr-only" for="nome">Nome</label>
     <div class="input-group">
      <div class="input-group-addon">Nome</div>
      <input type="text" class="form-control" id="nome" name="nome" />
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="mae">Mãe</label>
     <div class="input-group">
      <div class="input-group-addon">Mãe</div>
      <input type="text" class="form-control" id="mae" name="mae" />
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="pai">Pai</label>
     <div class="input-group">
      <div class="input-group-addon">Pai</div>
      <input type="text" class="form-control" id="pai" name="pai" />
     </div>
    </div>
    <div class="form-group">
     <label class="sr-only" for="cpf">CPF</label>
     <div class="input-group">
      <div class="input-group-addon">CPF</div>
      <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $_SESSION['cpf'];?>"/>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="rg">RG</label>
     <div class="input-group">
      <div class="input-group-addon">RG</div>
      <input type="text" class="form-control" id="rg" name="rg" />
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="datanasc">Nascimento</label>
     <div class="input-group">
      <div class="input-group-addon">Nascimento</div>
      <input type="text" class="form-control" id="datanasc" name="datanasc" required onkeyup=dataConta(this) minlength="10" maxlength="10"/>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="sexo">Sexo</label>
     <div class="input-group">
      <div class="input-group-addon">Sexo</div>
      <select name="sexo" id="sexo" class="form-control">
       <option value="">Escolha</option>
       <option value="Feminino">Feminino</option>
       <option value="Masculino">Masculino</option>
      </select>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="email">E-mail</label>
     <div class="input-group">
      <div class="input-group-addon">E-mail</div>
      <input type="email" class="form-control" id="email" name="email" />
     </div>
    </div>
    <div class="row">
       <div class="col-md-6">
         <label>Rua:</label>
         <input type="text" name="rua" class="form-control">
       </div> 
       <div class="col-md-2">
       <label>Número:</label>
         <input type="text" name="numero" class="form-control">
       </div>
       <div class="col-md-4">
         <label>Complemento:</label>
         <input type="text" name="complemento" class="form-control">
       </div>
    </div>
    <div class="row ">
      <div class="col-md-6">
      <label>Bairro:</label>
        <input type="text" name="bairro" class="form-control">
      </div>
      <div class="col-md-4">
      <label>Cidade:</label>
        <input type="text" name="cidade" class="form-control">
      </div>
      <label>UF</label>
      <div class="col-md-2">
        <input type="text" name="uf" class="form-control">
      </div>
    </div> 
    <div class="form-group">
     <label class="sr-only" for="senha">Senha</label>
     <div class="input-group">
      <div class="input-group-addon">Senha</div>
      <input type="password" class="form-control" id="senha" name="senha" />
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="Confirmar">Confirmar</label>
     <div class="input-group">
      <div class="input-group-addon">Confirmar</div>
      <input type="password" class="form-control" id="Confirmar" name="Confirmar" onblur="return validasenha(this.value)"/>
     </div>
    </div>

    <div class="form-group">
     <input type="submit" class="btn btn-primary" value="Enviar"/>
    </div>

   </form>
<?php 
include "rodape.php";
?>