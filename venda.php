<?php 

    include_once 'api/Venda.php';

    session_start();

     
    $lista = array();
    $venda = new Venda();
     $i = 0;
    if(isset($_SESSION["vendas"]))
       $lista = $_SESSION["vendas"];
    do{
          $venda =  $lista[$i];
          if($venda->getId() == $_GET["id"])     
             break;
          $i++;
       }while(true);

 ?>
<html>
<head>	
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="scripts.js"></script>
	  <link rel="stylesheet" type="text/css" href="styles.css">	
	</head>
<body>
 <?php echo "<h1>". $venda->getNome()."</h1>" ?>
<div class="painelInicial">
 <table class="tableInicial">
   <tbody>
      <?php
       	  

                   echo "<tr class='linhaNormal' onclick='redirect(".$venda->getId().")'>"; 
                   echo '<td class="tdImagem"><img src="data:image/jpeg;base64,'.base64_encode($venda->getImagem() ).'" width="150" height="200"/></td>';
                 echo "<td class='pInicial'>
                  <p class='pVenda' style='font-size:15px'> Vendido por ".$venda->getVendedor()."</p>
                  <p class='pVenda' style='font-size:30px'><b>R$ ".number_format($venda->getValor(), 2, ',', '.')."</b></p> </td>";
                 echo "</tr>";

   	 ?>	
          
   </tbody>
 </table>
  <div class="painelCaract">
    <?php
     echo "<b>Carateristicas:</b> <p>".$venda->getDescricao()."</p>";
    ?>
   </div>
 
<input type="submit" value="Excluir" onclick="deleteVenda()"/>
 <input type="button" value="Editar" onclick="redirecionarEdit()"/>
 <input style="margin-left:10px" value="<?php echo "Recomendo (".$venda->getRecomendo().")"; ?>" type="button" id="btnRecomendar" onclick="recomendar()"/>
 <input  type="button" id="btnNaoRecomendar" value="<?php echo "Não Recomendo (".$venda->getNaoRecomendo().")"; ?>" onclick="naoRecomendar()"/> 
   
</div>	
  
<script type="text/javascript">
  var query = location.search.slice(1);
  var partes = query.split('&');
  idConsulta = partes[0].split('=')[1];
</script>
</body>

</html>
