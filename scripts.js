
var vendas = new Array();

var idConsulta = 0;

const Venda = {
    id : 0,
    nome: "",
    caracteristicas: "",
    vendidoPor: "",
    valor: 0,
    recomendo: 0,
    naoRecomendo: 0
    };
 



function getVenda(){
 
 var query = location.search.slice(1);
 var partes = query.split('&');
 idConsulta = partes[0].split('=')[1];
 var venda;
 $.post(
      "api/retornarVenda.php",
      JSON.stringify({"id":idConsulta}),
      function( data ) {
       venda = data;    
       vendas.push(venda);
       montarTableVenda();
    }
);

}

function getVendaEdit(){

     var query = location.search.slice(1);
     var partes = query.split('&');
     idConsulta = partes[0].split('=')[1];
     var venda;
     $.post(
      "api/retornarVenda.php",
      JSON.stringify({"id":idConsulta}),
      function( data ) {
       venda = data;
       vendas.push(venda);
       $("#id").val(vendas[0].id);
       $("#nome").val(vendas[0].nome);
       $("#caracteristicas").val(vendas[0].caracteristicas);
       $("#valor").val(vendas[0].valor);
       $("#vendedor").val(vendas[0].vendidoPor);
    }
);
    
}


function buscaGeral(){
  
  var filtro = $("#buscaGeral").val();
  location.href="index.php?filtro="+filtro;

}


function montarTableVenda(){
         tabBody=document.getElementsByTagName("tbody").item(0);
         for(var venda of vendas){
             var row=document.createElement("tr");

             $("#btnRecomendar").val("Recomendo ("+venda.recomendo+")");     
             $("#btnnaoRecomendar").val("Não Recomendo ("+venda.naoRecomendo+")");  
		 
             cellImagem = document.createElement("td");

             cellInfo = document.createElement("td");
             paragNome = document.createElement("p");
             paragValor = document.createElement("p");
             paragCaract = document.createElement("p");
             paragVendidoPor = document.createElement("p");

             paragNome.innerHTML = "<b>Nome:</b> " +  venda.nome; 
             paragValor.innerHTML = "<b>Valor(R$):</b>" + venda.valor; 
             paragCaract.innerHTML = "<b>Características:</b>" + venda.caracteristicas;
             paragVendidoPor.innerHTML ="<b>Vendido por:</b>" + venda.vendidoPor;  

             row.classList.add("linhaClicavel");
             cellImagem.classList.add("tdInicial");
             cellInfo.classList.add("pInicial");
             paragNome.classList.add("pInicial");
             paragNome.classList.add("pInicial");
             paragValor.classList.add("pInicial");
             paragCaract.classList.add("pInicial");
             paragVendidoPor.classList.add("pInicial");

             imagem = document.createElement("img");
             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function(){
              if(this.readyState == 4 && this.status == 200){
                 var url = window.URL || window.webkitURL;
                 imagem.src =  url.createObjectURL(this.response);
                 document.getElementById("img").src = url.createObjectURL(this.response);
                 }
              }          
              xhttp.open("GET", "api/retornarImagem.php", true);
              xhttp.responseType = "blob";
              xhttp.send(JSON.stringify({"id":venda.id}));
             cellImagem.appendChild(imagem);
             cellInfo.appendChild(paragNome);
             cellInfo.appendChild(paragValor);
             cellInfo.appendChild(paragCaract);
             cellInfo.appendChild(paragVendidoPor);
             row.appendChild(cellImagem);
             row.appendChild(cellInfo);
             tabBody.appendChild(row);
         }
}


function redirect(id){
     
     location.href = "venda.php?id="+id;

}

function saveVenda(){

 var nome = $("#nome").val();
 var caracteristicas = $("#caracteristicas").val();
 var valor = $("#valor").val();
 var vendedor = $("#vendedor").val();
 var imagem = $("#imagem").val();

 if(		   nome.trim() == "" || 
 	caracteristicas.trim() == "" ||
 		      valor.trim() == "" ||
 		   vendedor.trim() == "" ||
 		     imagem.trim() == "" 
 		     )
 	window.alert("Um ou mais campos necessários vazios!");
 else{
      document.getElementById('cadastro').submit();
}


}


function editVenda(){

  var caracteristicas = $("#caracteristicas").val();
  var valor = $("#valor").val();

  if(caracteristicas.trim() == "" || valor.trim() == "" )
 	   window.alert("Um ou mais campos necessários vazios!");
 else{
     $("#edicao").submit();
   }

}

function recomendar(){

  var valor =  $("#btnRecomendar").val().replace("Recomendo ", ""); 
  valor = valor.replace("(", "").replace(")", "");
  valor = parseInt(valor) + 1;

  $("#btnRecomendar").attr("disabled", true);     
  $("#btnNaoRecomendar").attr("disabled", true);	
  $.post(
          "api/recomendar.php?id="+idConsulta,
          function(  ) {
             $("#btnRecomendar").val("Recomendo ("+valor+")");
        }
    );
}

function naoRecomendar(){

  var valor =  $("#btnNaoRecomendar").val().replace("Não Recomendo ", ""); 
  valor = valor.replace("(", "").replace(")", "");
  valor = parseInt(valor) + 1;

  $("#btnRecomendar").attr("disabled", true);     
  $("#btnNaoRecomendar").attr("disabled", true);	
  $.post(
          "api/naoRecomendar.php?id="+idConsulta,
          function() {
             $("#btnNaoRecomendar").val("Não Recomendo ("+valor+")");
        }
    );
}


function redirecionarEdit(){

  location.href="editarVenda.php?id="+idConsulta;

}

function deleteVenda(){
 
 var venda;
 if(confirm("Tem certeza de que deseja fazer a exclusão?")){
     $.post(
          "api/excluir.php?id="+idConsulta,
          function( data ) {
          window.alert("Venda excluída com sucesso!");  
          location.href="index.php";
           
        }
    );
}

}
