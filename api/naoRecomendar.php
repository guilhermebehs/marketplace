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

       $venda->setNaoRecomendo($venda->getNaoRecomendo()+1);
     
     echo $venda->getNaoRecomendo(); 
     $lista[$i] = $venda;
     $_SESSION["vendas"] = $lista; 
    

  
?> 
