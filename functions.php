<?php
session_start();

function inscricao($vaga, $id){
    require "config.php";
    $sql = $pdo->prepare("INSERT INTO cargos (vaga, id_pessoa) VALUES(:vaga, :id_pessoa)");
    $sql->bindValue(":vaga", $vaga);
    $sql->bindValue(":id_pessoa", $id);
    $sql->execute();
    $sql2 = $pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
    $sql2 ->bindValue(":id", $id);
    $sql2->execute();
    if ($sql2->rowCount() > 0) {
         $sql2 = $sql2->fetchAll();
         foreach ($sql2 as $pessoa) {
             $_SESSION['nome'] = $pessoa['nome'];
             $_SESSION['email'] = $pessoa['email'];
         }
         $_SESSION['vaga'] = $vaga;
         $mail= $_SESSION['email'];
         $subject="Cadastro no Processo Seletivo Realizado";
         $body = "<h3>Prezado&ensp;".$_SESSION['nome']."!</h3>
         <p>Foi realizada o cadastro no processo seletivo  para o cargo de:</p>
         <p>".$_SESSION['vaga']."</p>
         <p>Atenciosamente - CPD - PMTO</p>";
         sendMail($mail,$subject,$body);
         header("Location: imprime.php");
     } 
}
function update_cargo($vaga, $id){
    require "config.php";
    $sql  = $pdo->prepare("UPDATE cargos SET vaga = :vaga WHERE id_pessoa = :id_pessoa");
    $sql  ->bindValue(":vaga", $vaga);
    $sql  -> bindValue(":id_pessoa", $id);
    $sql  ->execute();
    $sql2 = $pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
    $sql2 ->bindValue(":id", $id);
    $sql2 ->execute();
    if ($sql2->rowCount()>0) {
         $sql2 = $sql2->fetchAll(); 
         foreach ($sql2 as $pessoa) {
          $_SESSION['nome'] = $pessoa['nome'];
          $_SESSION['email'] = $pessoa['email'];
         }
         $_SESSION['vaga'] = $vaga;
         $mail= $_SESSION['email'];
         $subject="Vaga do Processo Seletivo atualizada";
         $body = "<h3>Prezado&ensp;".$_SESSION['nome']."!</h3>
         <p>Foi realizada a atualização do cargo para:</p>
         <p>".$_SESSION['vaga']."</p>
         <p>Atenciosamente - CPD - PMTO</p>";
         sendMail($mail,$subject,$body);
         header("Location: imprime.php");
     } 
}

function sendMail($mail,$subject,$body){
    $header  = "Content-type: text/html; charset=\"UTF-8\" \r\n";
    $header .= "From: Não Responda <noreply@teofilootoni.mg.gov.br>" . "\r\n";
    $header .= "Reply-To: Tecnologia da Informação <ti@teofilootoni.mg.gov.br>" . "\r\n" ;
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "Content-Transfer-Encoding: 8bit \r\n";
    $header .= "Date: ".date("r (T)")." \r\n";

    if(mail($mail,$subject,$body,$header))  return true;
    else                    return false;
    
}

function buscapessoa($cpf){
    include "config.php";
    $sql = $pdo->prepare("SELECT * FROM pessoa WHERE cpf = :cpf");
    $sql -> bindValue(":cpf", $cpf);
    $sql -> execute();
    if ($sql->rowCount() > 0) {
        header("Location: /");
        }else{
        $_SESSION['cpf'] = $cpf;
        header("Location: formulario_pessoa.php");
        }
    }

function inserirpessoa($nome, $mae, $pai, $cpf, $rg, $data_nasc, $sexo, $email, $rua, $numero, $complemento, $bairro, $cidade, $uf, $senha){
    include "config.php";
    $sql = $pdo->prepare("INSERT INTO pessoa (nome, mae, pai, cpf, rg, datanasc, sexo, email, rua, numero, complemento,
    bairro, cidade, uf, senha) 
        VALUES (:nome, :mae, :pai, :cpf, :rg, :datanasc, :sexo, :email, :rua, :numero, :complemento, :bairro, :cidade,
        :uf, md5(:senha))");
    $sql        -> bindValue(":nome",       $nome);
    $sql        -> bindValue(":mae",        $mae); 
    $sql        -> bindValue(":pai",        $pai); 
    $sql        -> bindValue(":cpf",        $cpf); 
    $sql        -> bindValue(":rg",         $rg);
    $sql        -> bindValue(":datanasc",   $data_nasc);
    $sql        -> bindValue(":sexo",       $sexo); 
    $sql        -> bindValue(":email",      $email); 
    $sql        -> bindValue(":rua",        $rua);
    $sql        -> bindValue(":numero",     $numero);
    $sql        -> bindValue(":complemento",$complemento);   
    $sql        -> bindValue(":bairro",     $bairro);
    $sql        -> bindValue(":cidade",     $cidade);
    $sql        -> bindValue(":uf",         $uf);
    $sql        -> bindValue(":senha",      $senha);   
    $sql->execute();
}

function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
{
$lmin = 'abcdefghijklmnopqrstuvwxyz';
$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$num = '1234567890';
$simb = '!@#$%*-';
$retorno = '';
$caracteres = '';
$caracteres .= $lmin;
if ($maiusculas) $caracteres .= $lmai;
if ($numeros) $caracteres .= $num;
if ($simbolos) $caracteres .= $simb;
$len = strlen($caracteres);
for ($n = 1; $n <= $tamanho; $n++) {
$rand = mt_rand(1, $len);
$retorno .= $caracteres[$rand-1];
}
return $retorno;
}

function buscasenha($cpf, $email){
    include "config.php";
    $sql = $pdo->prepare("SELECT * FROM pessoa WHERE cpf = :cpf AND email = :email ");
    $sql ->bindValue(":cpf", $cpf);
    $sql ->bindValue(":email", $email);
    $sql ->execute();

    if ($sql->rowCount() > 0) {
        $senha = geraSenha(15, true, true, true);
        $sql2 = $pdo->prepare("UPDATE pessoa SET senha = md5(:senha) WHERE cpf = :cpf");
        $sql2 ->bindValue(":cpf", $cpf);
        $sql2 ->bindValue(":senha", $senha);
        $sql2 ->execute(); 
        echo $senha;
         $mail= $email;
         $subject="Vaga do Processo Seletivo atualizada";
         $body = "<h3>Prezado!</h3>
         <p>Foi realizada a atualização da sua senha para:</p>
         <p>".echo $senha."</p>
         <p>Atenciosamente - CPD - PMTO</p>";
         sendMail($mail,$subject,$body);
        header("Location: index.php");
    }

}