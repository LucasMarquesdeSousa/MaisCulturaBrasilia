$(function(){
    $("#cpf").keyup(function(){
        var search = $(this).val();
        
        if(search !=""){
            var dados = {
                 palavra : search
            }
           $.post("../controle/ConsultarCPF.php", dados, function(retorna){
            $(".resultado").html(retorna); 
        });
        }else{
             $(".resultado").html(""); 
        }   
        
       
    });
});


