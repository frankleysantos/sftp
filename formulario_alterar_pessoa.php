<?php
session_start();
include "cabecalho.php";
include "config.php";
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {

    $id = $_SESSION['id'];
    $sql = $pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
    $sql -> bindValue(":id", $id);
    $sql -> execute();
    if ($sql->rowCount() > 0) {
        $sql = $sql->fetchAll();
        foreach ($sql as $pessoa) {
?>
   <h3>Bem Vindo ao Processo Seletivo Simplificado do Municipio de Teófilo Otoni.</h3>
   <h4>Efetue o cadastro a inscrição:</h4>
   <p>Campos Obrigatórios (*)</p>
   <form method="post" action="atualizar_pessoa.php">

    <div class="form-group">
     <label class="sr-only" for="nome">Nome</label>
     <div class="input-group">
      <div class="input-group-addon">Nome *</div>
      <input type="text" class="form-control" id="nome" name="nome" required onkeyup="maiuscula(this);" value="<?php echo $pessoa['nome'];?>" />
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="mae">Mãe</label>
     <div class="input-group">
      <div class="input-group-addon">Mãe</div>
      <input type="text" class="form-control" id="mae" name="mae" onkeyup="maiuscula(this);" value="<?php echo $pessoa['mae']?>" />
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="pai">Pai</label>
     <div class="input-group">
      <div class="input-group-addon">Pai</div>
      <input type="text" class="form-control" id="pai" name="pai" onkeyup="maiuscula(this);" value="<?php echo $pessoa['pai']?>" />
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="cpf">CPF</label>
     <div class="input-group">
      <div class="input-group-addon">CPF</div>
      <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $pessoa['cpf'];?>"/>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="rg">RG</label>
     <div class="input-group">
      <div class="input-group-addon">RG</div>
      <input type="text" class="form-control" id="rg" name="rg" onkeyup="maiuscula(this);" value="<?php echo $pessoa['rg']?>" />
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="datanasc">Nascimento</label>
     <div class="input-group">
      <div class="input-group-addon">Nascimento *</div>
      <input type="text" class="form-control" id="datanasc" name="datanasc" required onkeypress="dataConta(this);return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10" value="<?php echo $pessoa['datanasc']?>" />
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="sexo">Sexo</label>
     <div class="input-group">
      <div class="input-group-addon">Sexo *</div>
      <select name="sexo" id="sexo" class="form-control" required>
       <option value="">Escolha</option>
       <option value="Feminino"<?php if($pessoa['sexo'] == 'Feminino') echo 'selected'?>>Feminino</option>
       <option value="Masculino"<?php if($pessoa['sexo'] == 'Masculino') echo 'selected'?>>Masculino</option>
      </select>
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="email">E-mail</label>
     <div class="input-group">
      <div class="input-group-addon">E-mail *</div>
      <input type="email" class="form-control" id="email" name="email" required value="<?php echo $pessoa['email']?>" />
     </div>
    </div>
    <div class="row">
       <div class="col-md-6">
         <label>Rua:</label>
         <input type="text" name="rua" class="form-control" onkeyup="maiuscula(this);" value="<?php echo $pessoa['rua']?>">
       </div> 
       <div class="col-md-2">
       <label>Número:</label>
         <input type="text" name="numero" class="form-control" onkeyup="maiuscula(this);" value="<?php echo $pessoa['numero']?>">
       </div>
       <div class="col-md-4">
         <label>Complemento:</label>
         <input type="text" name="complemento" class="form-control" onkeyup="maiuscula(this);" value="<?php echo $pessoa['complemento']?>">
       </div>
    </div>
    <div class="row ">
      <div class="col-md-6">
      <label>Bairro:</label>
        <input type="text" name="bairro" class="form-control" onkeyup="maiuscula(this);" value="<?php echo $pessoa['bairro']?>">
      </div>
      <div class="col-md-4">
      <label>Cidade:</label>
        <input type="text" name="cidade" class="form-control" onkeyup="maiuscula(this);" value="<?php echo $pessoa['cidade']?>">
      </div>
      <label>UF</label>
      <div class="col-md-2">
        <select name="uf" class="form-control">
          <option value="">Escolha...</option>
          <option value="AC"<?php if($pessoa['uf'] == 'AC') echo 'selected'?>>AC</option>
          <option value="AL"<?php if($pessoa['uf'] == 'AL') echo 'selected'?>>AL</option>
          <option value="AP"<?php if($pessoa['uf'] == 'AP') echo 'selected'?>>AP</option>
          <option value="AM"<?php if($pessoa['uf'] == 'AM') echo 'selected'?>>AM</option>
          <option value="BA"<?php if($pessoa['uf'] == 'BA') echo 'selected'?>>BA</option>
          <option value="CE"<?php if($pessoa['uf'] == 'CE') echo 'selected'?>>CE</option>
          <option value="DF"<?php if($pessoa['uf'] == 'DF') echo 'selected'?>>DF</option>
          <option value="ES"<?php if($pessoa['uf'] == 'ES') echo 'selected'?>>ES</option>
          <option value="GO"<?php if($pessoa['uf'] == 'GO') echo 'selected'?>>GO</option>
          <option value="MA"<?php if($pessoa['uf'] == 'MA') echo 'selected'?>>MA</option>
          <option value="MT"<?php if($pessoa['uf'] == 'MT') echo 'selected'?>>MT</option>
          <option value="MS"<?php if($pessoa['uf'] == 'MS') echo 'selected'?>>MS</option>
          <option value="MG"<?php if($pessoa['uf'] == 'MG') echo 'selected'?>>MG</option>
          <option value="PA"<?php if($pessoa['uf'] == 'PA') echo 'selected'?>>PA</option>
          <option value="PB"<?php if($pessoa['uf'] == 'PB') echo 'selected'?>>PB</option>
          <option value="PR"<?php if($pessoa['uf'] == 'PR') echo 'selected'?>>PR</option>
          <option value="PE"<?php if($pessoa['uf'] == 'PE') echo 'selected'?>>PE</option>
          <option value="PI"<?php if($pessoa['uf'] == 'PI') echo 'selected'?>>PI</option>
          <option value="RJ"<?php if($pessoa['uf'] == 'RJ') echo 'selected'?>>RJ</option>
          <option value="RN"<?php if($pessoa['uf'] == 'RN') echo 'selected'?>>RN</option>
          <option value="RS"<?php if($pessoa['uf'] == 'RS') echo 'selected'?>>RS</option>
          <option value="RO"<?php if($pessoa['uf'] == 'RO') echo 'selected'?>>RO</option>
          <option value="RR"<?php if($pessoa['uf'] == 'RR') echo 'selected'?>>RR</option>
          <option value="SC"<?php if($pessoa['uf'] == 'SC') echo 'selected'?>>SC</option>
          <option value="SP"<?php if($pessoa['uf'] == 'SP') echo 'selected'?>>SP</option>
          <option value="SE"<?php if($pessoa['uf'] == 'SE') echo 'selected'?>>SE</option>
          <option value="TO"<?php if($pessoa['uf'] == 'TO') echo 'selected'?>>TO</option>
        </select>
      </div>
    </div> 
    <div class="form-group row">
     <div class="col-md-6">
     <input type="submit" class="btn btn-primary" value="Alterar"/>
     </div>
    </div>

   </form>
<?php 
}
        }
}
else{
  header("Location: index.php");
}
include "rodape.php";
?>