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
   <form method="post" action="atualizar_pessoa.php">

    <div class="form-group">
     <label class="sr-only" for="nome">Nome</label>
     <div class="input-group">
      <div class="input-group-addon">Nome</div>
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
     <label class="sr-only" for="rg">RG</label>
     <div class="input-group">
      <div class="input-group-addon">RG</div>
      <input type="text" class="form-control" id="rg" name="rg" onkeyup="maiuscula(this);" value="<?php echo $pessoa['rg']?>" />
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="datanasc">Nascimento</label>
     <div class="input-group">
      <div class="input-group-addon">Nascimento</div>
      <input type="text" class="form-control" id="datanasc" name="datanasc" required onkeypress="dataConta(this);" minlength="10" maxlength="10" value="<?php echo $pessoa['datanasc']?>" />
     </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="sexo">Sexo</label>
     <div class="input-group">
      <div class="input-group-addon">Sexo</div>
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
      <div class="input-group-addon">E-mail</div>
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
        <input type="text" name="uf" class="form-control" value="<?php echo $pessoa['uf']?>">
      </div>
    </div> 
    <div class="form-group">
     <input type="submit" class="btn btn-primary" value="Alterar"/>
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