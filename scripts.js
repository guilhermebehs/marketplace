
var idConsulta = 0;
 

function buscaGeral(){
  
  var filtro = $("#buscaGeral").val();
  location.href="index.php?filtro="+filtro;

}


function redirect(id){
     
     location.href = "venda.php?id="+id;

}



function formatCurrency(valor){

  return valor.toFixed(2);

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
