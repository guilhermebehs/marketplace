<?php

  header("content-type: image/jpeg");
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
  $imagem = $venda->getImagem();
  echo $imagem;

?>