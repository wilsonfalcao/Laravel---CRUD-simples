$(document).ready(function() {

    //Implementação do DataTable
    $('#example').DataTable({
        "language": {
            "info":"Mostrando _START_ para _END_ de _TOTAL_ total",
            "infoEmpty":"Monstrando 0 to 0 de 0 total",
            "emptyTable":     "Não foi achado nenhuma informação",
            "infoFiltered":   "(filtered from _MAX_ total entries)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ total",
            "loadingRecords": "Carregando...",
            "processing":     "Processando...",
            "search":         "Buscar:",
            "zeroRecords":    "Não Há registros",
            "paginate": {
                "first":      "Primeiro",
                "last":       "Último",
                "next":       "Próximo",
                "previous":   "Anterior"
            },
        }
    });

    //Mascara para o Campo CNPJ
    $("#CNPJField").mask('000.000.000/0000-00', {reverse: true});
    $("#CNPJField2").mask('000.000.000/0000-00', {reverse: true});

    //Envio do Formulário Cliente
    $("#clientform").submit(function(){
        $.ajax({
            url: '/sendform/client',
            data:$("#clientform").serialize() ,
            type: 'POST',
            success: function ( data ) {
              location.reload();
            },
           error:function(data){
               $(".errors-menssage").show();
               $(".errors-menssage").append(data.responseText);
             console.log(data);
           }
        });
        return false;
      });

    $(".btn-primary").click(function(){
        var JSONDATA = JSON.stringify($(this).data("toedit"));
        JSONDATA = JSON.parse(JSONDATA);

        console.log(JSONDATA);
        //
        $("#NomeField2").val(JSONDATA.nome);
        $("#CNPJField2").val(JSONDATA.cnpj);
        $("#StatusField2").val(JSONDATA.status);
        $("#IDField2").val(JSONDATA.id);
    })

    //Envio do Formulário Cliente Update
    $("#clientformup").submit(function(){
        $.ajax({
            url: '/sendform/clientup',
            data:$("#clientformup").serialize() ,
            type: 'POST',
            success: function ( data ) {
              location.reload();
            },
           error:function(data){
            $(".errors-menssage").show();
            $(".errors-menssage").append(data.responseText);
          console.log(data);
           }
        });
        return false;
      });
    

} );