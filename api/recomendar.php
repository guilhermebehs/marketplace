<?php
       include_once 'Venda.php';

       session_start(); 

 
     
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

       $venda->setRecomendo($venda->getRecomendo()+1);
     
      
     $lista[$i] = $venda;
     $_SESSION["vendas"] = $lista; 


  
?>  
