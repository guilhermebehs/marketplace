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
	    <form action="api/cadastrar.php" id="cadastro" method="post" enctype="multipart/form-data">
	        Descrição: <br/> 
	       <input class="camposForm" type="text" id="nome" name="nome" /><br/>    
	       Caracteristicas: <br/>
	       <textarea class="camposForm" rows="4" cols="50" id="caracteristicas" name="caracteristicas">
	       </textarea><br/> 
	       Vendedor: <br/>
	       <input class="camposForm" type="text" id="vendedor" name="vendedor"/> <br/>
	       Valor(R$): <br/>
	       <input class="camposForm"  type="number" id="valor" name="valor"/> <br/>
	        Foto: <br/>
	       <input class="camposForm" type="file" name="imagem" id="imagem" accept="image/*" /><br/><br/>
	       <input type="button" value="Salvar" onclick="saveVenda()"  />
	   </form>    
      </div> 
	</body>
</html>
