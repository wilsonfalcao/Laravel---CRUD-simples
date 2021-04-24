@extends('template-table')

@section('title','App - Test Page')


@section('content')

<table id="example" class="display" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CNPJ</th>
      <th>Status</th>
      <th>Registro</th>
      <th>Ação</th>
    </tr>
  </thead>

  <tfoot>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CNPJ</th>
      <th>Status</th>
      <th>Registro</th>
      <th>Ação</th>
    </tr>
  </tfoot>

  <tbody>
    @foreach ($data as $value )
    <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->nome}}</td>
      <td>{{$value->cnpj}}</td>
      <td>{{$value->status == 1 ? "Ativo" : "Inativo"}}</td>
      <td>{{$value->registro}}</td>
      <td>
          <a data-toedit='{!! json_encode($value) !!}' data-toggle="modal" data-target="#clientFormUpdate" class="btn btn-primary">Editar</a>
          <button class="btn btn-danger">Apagar</button>
      </td>
      </tr>
    @endforeach
  </tbody>
</table>

<a href="#" data-toggle="modal" data-target="#clientForm">
<svg class="svg" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg"><g><g><circle cx="64" cy="64.024" fill="#ff595e" r="45"/><path d="m87.16 60.024h-19.16v-19.16a4 4 0 0 0 -8 0v19.16h-19.16a4 4 0 0 0 0 8h19.16v19.16a4 4 0 0 0 8 0v-19.16h19.16a4 4 0 0 0 0-8z" fill="#fffae3"/></g><g fill="#001363"><path d="m64 17.25a46.75 46.75 0 1 0 27.4 84.635 1.75 1.75 0 0 0 -2.052-2.835 43.242 43.242 0 1 1 14.021-17.109 1.75 1.75 0 1 0 3.184 1.454 46.772 46.772 0 0 0 -42.553-66.145z"/><path d="m97.409 91.469q-.365.444-.741.876a1.75 1.75 0 1 0 2.642 2.3q.406-.468.8-.946a1.75 1.75 0 1 0 -2.7-2.225z"/><path d="m64 92.91a5.756 5.756 0 0 0 5.75-5.75v-17.41h17.41a5.75 5.75 0 0 0 0-11.5h-17.41v-17.41a5.75 5.75 0 0 0 -11.5 0v17.41h-17.41a5.75 5.75 0 0 0 0 11.5h17.41v17.41a5.757 5.757 0 0 0 5.75 5.75zm-23.16-26.66a2.25 2.25 0 0 1 0-4.5h19.16a1.751 1.751 0 0 0 1.75-1.75v-19.16a2.25 2.25 0 0 1 4.5 0v19.16a1.75 1.75 0 0 0 1.75 1.75h19.16a2.25 2.25 0 0 1 0 4.5h-19.16a1.75 1.75 0 0 0 -1.75 1.75v19.16a2.25 2.25 0 0 1 -4.5 0v-19.16a1.751 1.751 0 0 0 -1.75-1.75z"/></g></g></svg>
</a>

<!-- Modal Cadastro Cliente -->
<div class="modal fade" id="clientForm" tabindex="-1" role="dialog" aria-labelledby="clientForm" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cadastro de Cliente</h4>
          </div>
          <div class="modal-body">
          <form class="was-validated" id="clientform">
            @csrf
            <div class="form-group">
              <label for="NomeField">Razão Social</label>
              <input type="text" name="nome" class="form-control is-valid" oninvalid="this.setCustomValidity('Digite o nome entre 25 a 45 caracteres')" minlength="15" maxlength="45" id="NomeField" placeholder="Digite a razão social..." required>
              <small id="NomeField" class="form-text text-muted">Informe a razão social da empresa.</small>
            </div>
            <div class="form-group">
              <label for="CNPJField">CNPJ</label>
              <input type="text" name="cnpj" class="form-control is-valid" id="CNPJField" placeholder="000.000.000/0000-00" required>
            </div>
            <div class="form-group">
              <label for="CNPJField">Status do Cliente</label>
              <select name="status" class="form-control is-invalid" id="CNPJField" required>
                <option value="0">Inativo</option>
                <option value="1">Ativo</option>
              </select>
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
<div class="modal fade" id="clientFormUpdate" tabindex="-1" role="dialog" aria-labelledby="clientFormUpdate" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Atualização de Cliente</h4>
          </div>
          <div class="modal-body">
          <form class="was-validated" id="clientformup"> 
            @csrf
            <div class="form-group">
              <label for="NomeField2">Razão Social</label>
              <input type="text" name="nome" class="form-control is-valid" oninvalid="this.setCustomValidity('Digite o nome entre 25 a 45 caracteres')" minlength="15" maxlength="45" id="NomeField2" placeholder="Digite a razão social..." required>
              <small id="NomeField" class="form-text text-muted">Informe a razão social da empresa.</small>
            </div>
            <div class="form-group">
              <label for="CNPJField2">CNPJ</label>
              <input type="text" name="cnpj" class="form-control is-valid" id="CNPJField2" placeholder="000.000.000/0000-00" required>
            </div>
            <div class="form-group">
              <label for="StatusField2">Status do Cliente</label>
              <select name="status" class="form-control is-invalid" id="StatusField2" required>
                <option value="0">Inativo</option>
                <option value="1">Ativo</option>
              </select>
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