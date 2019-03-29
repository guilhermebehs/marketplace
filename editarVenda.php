<?php 

    include_once 'api/Venda.php';

    session_start();

     
    $lista = array();
    $filtro = null;
    if(isset($_SESSION["vendas"]))
       $lista = $_SESSION["vendas"];
    $i = 0;
       $lista = array();
       $lista = $_SESSION["vendas"]; 
        $venda = new Venda();
       do{
          $venda =  $lista[$i];
          if($venda->getId() == $_GET["id"])     
             break;
          $i++;
       }while(true);

 ?>
<html>
    <meta charset="UTF-8">
	<head>	
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="scripts.js"></script>
	  <link rel="stylesheet" type="text/css" href="styles.css">	
	</head>
	<body>	
	 <h1>Venda de Produtos Online</h1>	
	  <div class="painelCadastro">
	    <form action="api/editar.php" id="edicao" method="post" enctype="multipart/form-data">
	    	<?php echo '<input class="camposForm" type="text" value="'.$venda->getId().'"  id="id" name="id" hidden="true" />' ?> <br/>    
	        Nome: <br/> 
	       <?php echo '<input class="camposForm" type="text" value="'.$venda->getNome().'" id="nome" name="nome" disabled="true" />' ?><br/>
	       Caracteristicas: <br/>
	       <?php echo '<textarea class="camposForm"  rows="4" cols="50" id="caracteristicas" name="caracteristicas" >'.$venda->getDescricao().'</textarea>' ?><br/> 
	       Vendedor: <br/>
	       <?php echo '<input class="camposForm" value="'.$venda->getVendedor().'"type="text" id="vendedor" name="vendedor" disabled="true"/>' ?><br/> 
	        <br/>
	       Valor(R$): <br/>
	        <?php echo ' <input class="camposForm" value="'.$venda->getValor().'"  type="number" id="valor" name="valor"/>' ?> <br/>
	        Foto: <br/>
	        <?php echo '<input class="camposForm" type="file" name="imagem" id="imagem" accept="image/*" />' ?>
	       <br/><br/>
	       <input type="button" value="Salvar" onclick="editVenda()" />
	   </form>    
      </div> 
	</body>

</html>
