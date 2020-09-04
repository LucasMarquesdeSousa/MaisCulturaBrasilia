$(function () {
    $("#search").keyup(function () {
        var search = $(this).val();
        if (search != "") {
            var dados = {
                palavra: search
            }
            $.post("../controle/PesquisarEvento2.php", dados, function (retorna) {
                $(".resultado").html(retorna);
            });
        } else {
            $(".resultado").html("");
        }
    });
});


