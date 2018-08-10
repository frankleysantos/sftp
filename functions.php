<?php
session_start();

function inscricao($vaga, $id){
    require "config.php";
    $sql = $pdo->prepare("INSERT INTO cargos (vaga, id_pessoa, insercaovaga) VALUES(:vaga, :id_pessoa, now())");
    $sql->bindValue(":vaga", $vaga);
    $sql->bindValue(":id_pessoa", $id);
    $sql->execute();
    $id_cargo = $pdo->lastInsertId();
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
         <p>Foi realizado o seu cadastro no processo seletivo para o cargo de:</p>
         <p>".$_SESSION['vaga']."</p>
         <p>Gentileza não responder a esse email.</p>
         <p>Processo Seletivo 2018.</p>";
         sendMail($mail,$subject,$body);
         header("Location: imprime.php");
     }
     
     $id_pessoa = $id;
     atendimento($id_cargo, $id_pessoa); 
}
function update_cargo($vaga, $id){
    require "config.php";
    $sql  = $pdo->prepare("UPDATE cargos SET vaga = :vaga, atualizacaovaga = now() WHERE id_pessoa = :id_pessoa");
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
         <p>Gentileza não responder a esse email.</p>
         <p>Processo Seletivo 2018.</p>";
         sendMail($mail,$subject,$body);
         header("Location: imprime.php");
     } 
}

function sendMail($mail,$subject,$body){
    $header  = "Content-type: text/html; charset=\"UTF-8\" \r\n";
    $header .= "From: Processo Seletivo Simplificado - Teófilo Otoni<noreply@teofilootoni.mg.gov.br>" . "\r\n";
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
        header("Location: login.php?msn=CPF já Cadastrado.");
        }else{
        $_SESSION['cpf'] = $cpf;
        header("Location: formulario_pessoa.php");
        }
    }

function inserirpessoa($nome, $mae, $pai, $cpf, $rg, $data_nasc, $sexo, $email, $rua, $numero, $complemento, $bairro, $cidade, $uf, $senha){
    include "config.php";
    $sql = $pdo->prepare("INSERT INTO pessoa (nome, mae, pai, cpf, rg, datanasc, sexo, email, rua, numero, complemento,
    bairro, cidade, uf, senha, insercao) 
        VALUES (:nome, :mae, :pai, :cpf, :rg, :datanasc, :sexo, :email, :rua, :numero, :complemento, :bairro, :cidade,
        :uf, md5(:senha), now())");
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
    header("Location: login.php?msn=Cadastro Realizado!");
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
         $mail= $email;
         $subject="Vaga do Processo Seletivo atualizada";
         $body = "<h3>Prezado!</h3>
         <p>Segue abaixo a sua nova senha. Para altera-la logue no sistema e clique em Alterar Senha.</p>
         <p>".$senha."</p>
         <p>Gentileza não responder a esse email.</p>
         <p>Processo Seletivo 2018.</p>";
         sendMail($mail,$subject,$body);
        header("Location: login.php?msn=Foi encaminhada nova senha para seu email!");
    }else{
        header("Location: login.php?msn=Usuário não existe.");
    }

}


function updatepessoa($id, $nome, $mae, $pai, $rg, $data_nasc, $sexo, $email, $rua, $numero, $complemento, $bairro, $cidade, $uf){
    include "config.php";
    $sql = $pdo->prepare("UPDATE pessoa SET nome = :nome, mae = :mae, pai = :pai, rg = :rg, datanasc = :datanasc, sexo = :sexo, email = :email, rua = :rua, numero = :numero, complemento = :complemento,
    bairro = :bairro, cidade = :cidade, uf = :uf WHERE id = :id");
    $sql        -> bindValue(":id",       $id);
    $sql        -> bindValue(":nome",       $nome);
    $sql        -> bindValue(":mae",        $mae); 
    $sql        -> bindValue(":pai",        $pai); 
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
    $sql->execute();
    header("Location: index.php");
}

function atendimento($id_cargo, $id_pessoa){
    include "config.php";
    $sql = $pdo->prepare("INSERT INTO atendimento (id_cargo, id_pessoa) VALUES (:id_cargo, :id_pessoa)");
    $sql ->bindValue(":id_cargo", $id_cargo);
    $sql ->bindValue(":id_pessoa", $id_pessoa); 
    $sql ->execute();  
}