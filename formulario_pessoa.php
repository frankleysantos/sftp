<?php
include "cabecalho.php";
session_start();
?>
   <h3>Bem Vindo ao Processo Seletivo Simplificado do Municipio de Teófilo Otoni.</h3>
   <h4>Efetue o cadastro a inscrição:</h4>
   <p>Campos Obrigatórios (*)</p>
   <form method="post" action="cadastro_pessoa.php">

    <div class="form-group">
     <label class="sr-only" for="nome">Nome</label>
     <div class="input-group">
      <div class="input-group-addon">Nome *</div>
      <input type="text" class="form-control" id="nome" name="nome" required onkeyup="maiuscula(this);"/>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="mae">Mãe</label>
     <div class="input-group">
      <div class="input-group-addon">Mãe</div>
      <input type="text" class="form-control" id="mae" name="mae" onkeyup="maiuscula(this);"/>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="pai">Pai</label>
     <div class="input-group">
      <div class="input-group-addon">Pai</div>
      <input type="text" class="form-control" id="pai" name="pai" onkeyup="maiuscula(this);"/>
     </div>
    </div>
    <div class="form-group">
     <label class="sr-only" for="cpf">CPF</label>
     <div class="input-group">
      <div class="input-group-addon">CPF</div>
      <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $_SESSION['cpf'];?>" readonly/>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="rg">RG</label>
     <div class="input-group">
      <div class="input-group-addon">RG</div>
      <input type="text" class="form-control" id="rg" name="rg" onkeyup="maiuscula(this);"/>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="datanasc">Nascimento</label>
     <div class="input-group">
      <div class="input-group-addon">Nascimento *</div>
      <input type="text" class="form-control" id="datanasc" name="datanasc" required onkeypress="dataConta(this);return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10"/>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="sexo">Sexo</label>
     <div class="input-group">
      <div class="input-group-addon">Sexo *</div>
      <select name="sexo" id="sexo" class="form-control" required>
       <option value="">Escolha</option>
       <option value="Feminino">Feminino</option>
       <option value="Masculino">Masculino</option>
      </select>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="email">E-mail</label>
     <div class="input-group">
      <div class="input-group-addon">E-mail *</div>
      <input type="email" class="form-control" id="email" name="email" required />
     </div>
    </div>
    <div class="row">
       <div class="col-md-6">
         <label>Rua:</label>
         <input type="text" name="rua" class="form-control" onkeyup="maiuscula(this);">
       </div> 
       <div class="col-md-2">
       <label>Número:</label>
         <input type="text" name="numero" class="form-control" onkeyup="maiuscula(this);">
       </div>
       <div class="col-md-4">
         <label>Complemento:</label>
         <input type="text" name="complemento" class="form-control" onkeyup="maiuscula(this);">
       </div>
    </div>
    <div class="row ">
      <div class="col-md-6">
      <label>Bairro:</label>
        <input type="text" name="bairro" class="form-control" onkeyup="maiuscula(this);">
      </div>
      <div class="col-md-4">
      <label>Cidade:</label>
        <input type="text" name="cidade" class="form-control" onkeyup="maiuscula(this);">
      </div>
      <label>UF</label>
      <div class="col-md-2">
        <select name="uf" class="form-control">
          <option value="">Escolha...</option>
          <option value="AC">AC</option>
          <option value="AL">AL</option>
          <option value="AP">AP</option>
          <option value="AM">AM</option>
          <option value="BA">BA</option>
          <option value="CE">CE</option>
          <option value="DF">DF</option>
          <option value="ES">ES</option>
          <option value="GO">GO</option>
          <option value="MA">MA</option>
          <option value="MT">MT</option>
          <option value="MS">MS</option>
          <option value="MG">MG</option>
          <option value="PA">PA</option>
          <option value="PB">PB</option>
          <option value="PR">PR</option>
          <option value="PE">PE</option>
          <option value="PI">PI</option>
          <option value="RJ">RJ</option>
          <option value="RN">RN</option>
          <option value="RS">RS</option>
          <option value="RO">RO</option>
          <option value="RR">RR</option>
          <option value="SC">SC</option>
          <option value="SP">SP</option>
          <option value="SE">SE</option>
          <option value="TO">TO</option>
        </select>
      </div>
    </div> 
    <div class="form-group">
     <label class="sr-only" for="senha">Senha</label>
     <div class="input-group">
      <div class="input-group-addon">Senha *</div>
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required/>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="Confirmar">Confirmar</label>
     <div class="input-group">
      <div class="input-group-addon">Confirmar *</div>
      <input type="password" class="form-control" id="Confirmar" name="Confirmar" onblur="return validasenha(this.value)" placeholder="Repita a senha" required/>
     </div>
    </div>

    <div class="form-group row">
     <div class="col-md-6">
     <input type="submit" class="btn btn-primary" value="Enviar"/>
     </div>
     <div align="right" class="col-md-6">
      <a href="index.php" class="btn btn-success">Página Inicial</a>
     </div>
    </div>

   </form>
<?php 
include "rodape.php";
?>