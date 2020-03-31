function pesquisaSql() {
    jQuery.ajax({
        url: "/busca/busca.php",
        data:'pesquisar='+$("#pesquisar").val(),
        type: "POST",
        success:function(data){
            $("#resultadoPesquisa").html(data);
        },
        error:function (){}
    });
}