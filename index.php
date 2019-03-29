<?php 

    include_once 'api/Venda.php';

    session_start();
     
    $lista = array();
    $filtro = null;
    if(isset($_SESSION["vendas"]))
       $lista = $_SESSION["vendas"];
     if(isset($_GET["filtro"]))
        $filtro = $_GET["filtro"];

 ?>


<html>
<head>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
	<script src="scripts.js"></script>
	  <link rel="stylesheet" type="text/css" href="styles.css">	
	</head>
<body>
 <h1>Venda de Produtos Online </h1>	

 
 <input style="margin-left: 55%;" type="button" value="Cadastrar Produto" onclick="location.href='cadastrarVenda.php'"/>
<div class="principal">	
<div class="painelInicial">
 <table class="tableInicial">
   <tbody>
   	 <?php
       	  $i = 0;
          while($i < sizeof($lista)){ 
                $row = new Venda();
                $row =$lista[$i];
                if($filtro ==null  || (strpos(strtolower($row->getNome()), strtolower($filtro)) !== false)){

                  echo "<tr class='linhaClicavel' onclick='redirect(".$row->getId().")'>"; 
                   echo '<td class="tdInicial"><img src="data:image/jpeg;base64,'.base64_encode($row->getImagem() ).'" width="150" height="200"/></td>';
                 echo "<td class='pInicial'> <p class='pIndex'><b>Nome: ".$row->getNome()."</b></p> <p class='pIndex'><b>Valor(R$): ".$row->getValor()."</b></p> </td>";
                 echo "</tr>";
                 } 
                 $i++; 
       }

   	 ?>	
        
   </tbody>
 </table>
</div>
<div class="buscaGeral">
 Buscar por Nome:<br/>
 <input type="text" id="buscaGeral"/><br/>
 <input type="button" value="Buscar" onclick="buscaGeral()" class="botaoBuscalGeral"/> 
 </div>	
</div>
</body>

</html>
