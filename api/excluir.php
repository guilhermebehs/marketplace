<?php
  include_once 'Venda.php';
  session_start();  
   
  try 
  {    
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

     unset($lista[$i]);
     $lista = array_values($lista);
     $_SESSION["vendas"] = $lista;
     header('Location: concluido.php');

	

    }
  catch(Exception $e)
    {
      header('Location: erro.php');  
    }   

?>	