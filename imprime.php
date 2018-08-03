<?php session_start();
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {

?><!DOCTYPE html>
<html lang="pt-br">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="PSS PMTO">
  <meta name="author" content="CPD - ti@teofilootoni.mg.gov.br">
  <meta property="og:locale" content="pt_BR" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="PSS" />
  <meta property="og:description" content="Prefeitura Municipal de Teófilo Otoni" />
  <meta property="og:url" content="http://pss.teofilootoni.mg.gov.br" />
  <meta property="og:site_name" content="PSS" />
  <!--link rel="icon" href="resources/img/debian.svg" /-->
  <title>PMTO | PSS</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/print.css" rel="stylesheet" media="print">
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
   <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 </head>
 <body>
  <div class="container">
      <br><br>
      <h3>Processo Seletivo Simplicado</h3>
      <p><label><?php echo $_SESSION['nome']?></label></p>
      <p>Cadastro realizado para o seguinte cargo:</p>
      <p><label><?php echo $_SESSION['vaga'];?></label></p>
      <p>O candidato deverá verificar a data e horario, para apresentação de documentos no site <a href="http://www.teofilootoni.mg.gov.br"> da Prefeitura Municipal de Teófilo Otoni</a></p>
  </div>
  <div class="hidden-print container">
   <p>
    <a href="/" class="btn btn-info">Alterar Cargo</a>
    <a href="#" onclick="window.print()" class="btn btn-warning">Imprimir</a>
    <span class="pull-right"><a href="sair.php" class="btn btn-danger">Sair</a></span>
   </p>
  </div>
  <footer class="container hidden-print">
   <hr />
   <p>&copy; CPD PMTO
    <span class="pull-right">
     Powered By:
     <a href="https://github.com/PrefeituraTO/cadastrosocioeconomico" target="_BLANK"><i class="fa fa-github"></i></a>
     <a href="https://linux.org" target="_BLANK"><i class="fa fa-linux"></i></a>
     <a href="https://www.w3schools.com/html/html5_intro.asp" target="_BLANK"><i class="fa fa-html5"></i></a>
     <a href="https://www.w3schools.com/css/css3_intro.asp" target="_BLANK"><i class="fa fa-css3"></i></a>
    </span>
   </p>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="../resources/js/bootstrap.js"></script>
 </body>
</html>
<?php
}else{
  header("Location: login.php");
}
?>
