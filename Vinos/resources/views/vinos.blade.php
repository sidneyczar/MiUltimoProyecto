@extends('layouts.main')
@section('contenido')

         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Vinos</h1>
         <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalAgregar">
             <i class="fas fa-table fa-sm text-white-50"></i> Agregar vino</a>
         </div>

<!-- Modal -->
<div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar vino</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin/vinos" method="post">
             @csrf
            <div class="modal-body">
            @if($message = Session::get('ErrorInsert'))
                <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
                    <h5>Errores: </h5>
                    <ul>
                        @foreach($errors->all() as $error)
                         <li>{{ $error }}</li>   
                        @endforeach
                    </ul>
                </div>
             @endif
                <div class="form-group">
                    <input type="text" class="form-control" name="edad" placeholder="Edad del vino" value="{{ old('edad') }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="color" placeholder="Color" value="{{ old('color') }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="azucar" placeholder="Azucar Residual" value="{{ old('azucar') }}">
                </div>

                <div class="form-group">
                    <input type="integer" class="form-control" name="grado" placeholder="Grado alcoholico" value="{{ old('grado') }}">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('scripts')
    <script>
      $(document).ready(function(){
        @if($message = Session::get('ErrorInsert'))
            $("#modalAgregar").modal('show');
        @endif

      });
    </script>
@endsection('scripts')
