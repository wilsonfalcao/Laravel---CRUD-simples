@extends('template-table')

@section('title','App - Contato')


@section('content')

<table id="example2" class="display" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Contato</th>
      <th>CPF</th>
      <th>Empresa</th>
      <th>Email</th>
      <th>Ação</th>
    </tr>
  </thead>

  <tfoot>
    <tr>
      <th>ID</th>
      <th>Contato</th>
      <th>CPF</th>
      <th>Empresa</th>
      <th>Email</th>
      <th>Ação</th>
    </tr>
  </tfoot>

  <tbody>
    @foreach ($data as $value )
    <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->nome_contato}}</td>
      <td>{{$value->cpf}}</td>
      <td>{{$value->empresa}}</td>
      <td>{{$value->email_contato}}</td>
      <td>
          <a data-toedit='{!! json_encode($value) !!}' data-toggle="modal" data-target="#contatoFormUpdate" class="btn btn-primary">Editar</a>
          <button data-id='{{$value->id}}' class="btn btn-danger delete-date-contato">Apagar</button>
      </td>
      </tr>
    @endforeach
  </tbody>
</table>

<a href="#" data-toggle="modal" data-target="#contatoForm">
<svg class="svg" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg"><g><g><circle cx="64" cy="64.024" fill="#ff595e" r="45"/><path d="m87.16 60.024h-19.16v-19.16a4 4 0 0 0 -8 0v19.16h-19.16a4 4 0 0 0 0 8h19.16v19.16a4 4 0 0 0 8 0v-19.16h19.16a4 4 0 0 0 0-8z" fill="#fffae3"/></g><g fill="#001363"><path d="m64 17.25a46.75 46.75 0 1 0 27.4 84.635 1.75 1.75 0 0 0 -2.052-2.835 43.242 43.242 0 1 1 14.021-17.109 1.75 1.75 0 1 0 3.184 1.454 46.772 46.772 0 0 0 -42.553-66.145z"/><path d="m97.409 91.469q-.365.444-.741.876a1.75 1.75 0 1 0 2.642 2.3q.406-.468.8-.946a1.75 1.75 0 1 0 -2.7-2.225z"/><path d="m64 92.91a5.756 5.756 0 0 0 5.75-5.75v-17.41h17.41a5.75 5.75 0 0 0 0-11.5h-17.41v-17.41a5.75 5.75 0 0 0 -11.5 0v17.41h-17.41a5.75 5.75 0 0 0 0 11.5h17.41v17.41a5.757 5.757 0 0 0 5.75 5.75zm-23.16-26.66a2.25 2.25 0 0 1 0-4.5h19.16a1.751 1.751 0 0 0 1.75-1.75v-19.16a2.25 2.25 0 0 1 4.5 0v19.16a1.75 1.75 0 0 0 1.75 1.75h19.16a2.25 2.25 0 0 1 0 4.5h-19.16a1.75 1.75 0 0 0 -1.75 1.75v19.16a2.25 2.25 0 0 1 -4.5 0v-19.16a1.751 1.751 0 0 0 -1.75-1.75z"/></g></g></svg>
</a>

<!-- Modal Cadastro Contato -->
<div class="modal fade" id="contatoForm" tabindex="-1" role="dialog" aria-labelledby="contatoForm" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Adicionar Contato</h4>
          </div>
          <div class="modal-body">
          <form class="was-validated" id="contatoform">
            @csrf
            <div class="form-group">
              <label for="NomeField">Nome de Contato</label>
              <input type="text" name="nome_contato" class="form-control is-valid" oninvalid="this.setCustomValidity('Digite o nome entre 25 a 45 caracteres')" minlength="15" maxlength="45" id="NomeField" placeholder="Digite o nome pessoal..." required>
              <small id="NomeField" class="form-text text-muted">Informe a razão social da empresa.</small>
            </div>
            <div class="form-group">
              <label for="CPFField">CPF</label>
              <input type="text" name="cpf" class="form-control is-valid" id="CPFField" placeholder="000.000.000-00" required>
            </div>
            <div class="form-group">
              <label for="EmpresaField">Empresa</label>
              <select name="id_cliente" class="form-control is-invalid" id="EmpresaField" required>
                <?php foreach ($clientes as $cliente ):?>
                    <option value="<?php echo $cliente->id;?>"><?php echo $cliente->nome;?> | <?php echo $cliente->cnpj;?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group">
              <label for="EmailField">Email</label>
              <input type="email" name="email_contato" class="form-control is-valid" id="EmailField" placeholder="nome@dominio.com" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <div style="display:none;" class="alert alert-danger errors-menssage mt-4" role="alert"></div>
          </form>
          </div>
        </div>
    </div>
  </div>
</div>

<!-- Modal Update Cliente-->
<div class="modal fade" id="contatoFormUpdate" tabindex="-1" role="dialog" aria-labelledby="clientFormUpdate" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Atualização de Contato</h4>
          </div>
          <div class="modal-body">
          <form class="was-validated" id="contatoformup"> 
            @csrf
            <div class="form-group">
              <label for="NomeField2">Nome de Contato</label>
              <input type="text" name="nome_contato" class="form-control is-valid" oninvalid="this.setCustomValidity('Digite o nome entre 25 a 45 caracteres')" minlength="15" maxlength="45" id="NomeField2" placeholder="Digite o nome pessoal..." required>
              <small id="NomeField2" class="form-text text-muted">Informe a razão social da empresa.</small>
            </div>
            <div class="form-group">
              <label for="CPFField2">CPF</label>
              <input type="text" name="cpf" class="form-control is-valid" id="CPFField2" placeholder="000.000.000-00" required>
            </div>
            <div class="form-group">
              <label for="EmpresaField2">Empresa</label>
              <select name="id_cliente" class="form-control is-invalid" id="EmpresaField2" required>
              <?php foreach ($clientes as $cliente ):?>
                    <option value="<?php echo $cliente->id;?>"><?php echo $cliente->nome;?> | <?php echo $cliente->cnpj;?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group">
              <label for="EmailField2">Email</label>
              <input type="email" name="email_contato" class="form-control is-valid" id="EmailField2" placeholder="nome@dominio.com" required>
            </div>
            <input type="hidden" id="IDField2" value="" name="id"/>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <div style="display:none;" class="alert alert-danger errors-menssage mt-4" role="alert"></div>
          </form>
          </div>
        </div>
    </div>
  </div>
</div>


@endsection

@section('javasready')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
  $(document).ready(function() {

    //Implementação do DataTable
    $('#example2').DataTable({
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
    $("#CPFField").mask('000.000.000-00', {reverse: true});
    $("#CPFField2").mask('000.000.000-00', {reverse: true});

    //Envio do Formulário Cliente
    $("#contatoform").submit(function(){
        $.ajax({
            url: '/sendform/contato',
            data:$("#contatoform").serialize() ,
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
        //return false;
    });

    $(".btn-primary").click(function(){

        var JSONDATA = JSON.stringify($(this).data("toedit"));
        JSONDATA = JSON.parse(JSONDATA);
        //
        $("#NomeField2").val(JSONDATA.nome_contato);
        $("#CPFField2").val(JSONDATA.cpf);
        $("#EmailField2").val(JSONDATA.email_contato);
        $("#IDField2").val(JSONDATA.id);
        $("#EmpresaField2")[0].val(JSONDATA.empresa);
        alert("ok");
    })

    //Envio do Formulário Cliente Update
    $("#contatoformup").submit(function(){
        $.ajax({
            url: '/sendform/contatup',
            data:$("#contatoformup").serialize() ,
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

    $(".delete-date-contato").click(function(){
      $.ajax({
            url: '/sendform/delete-contato',
            data:{
              id:$(this).data("id"),
              "_token": "{{ csrf_token() }}"
            },
            type: 'POST',
            success: function ( data ) {
              location.reload();
            },
          error:function(data){
            console.log(data);
          }
        });
        return false;
    });
  
  } );
</script>
@endsection