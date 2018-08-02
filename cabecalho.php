<html>
<head>
	<meta charset="utf-8">
	<title>Téo Nota - 10</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/functions.js"></script>
    <script src="funcoes.js"></script>
    <script>window.history.forward(1);</Script>
</head>
<body>
	
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand fa fa-check" href="index.php?msn=0">PSS</a>
			</div>
			<div class="row">
      <div class="col-md-8">
				<ul class="nav navbar-nav">
          <?php
           if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
          ?>
					<li><a href="listar_excel.php"><i class="fa fa-file-excel-o"></i>&ensp;Excel</a></li>
          <li><a href="formulario_alterar_pessoa.php"><i class="fa fa-list"></i>&ensp;Alterar</a></li>
          <?php }?>
				</ul>
        </div>
        <div class="col-md-2" align="right">
          <ul class="nav navbar-nav">
            <li><?php 
           if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
           echo "<a href='sair.php' class='btn-danger fa fa-sign-out'>&ensp;Sair</a>";
           }
          ?></li>
          </ul>
        </div>
			</div>
		</div>
	</div>
	
	
	<div class="container" style="padding-top: 100px" class="col-md-12">
		<div class="principal">
     <div class="row">
       <div class="col-md-12" align="right">
         <?php
          if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            echo "<label class='btn btn-default'>Usuário:&ensp;".$_SESSION['id']."</label>";
          }
         ?>
       </div>
     </div>
			