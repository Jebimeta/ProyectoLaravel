<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-center font-weight-bold" id="exampleModalLabel">Añadir Alimento</h5>
                <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('home.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">



                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="" value="{{ old('nombre') }}" />
                        <small id="helpId" class="form-text text-muted">Introduce el nombre del alimento*</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Precio</label>
                        <input type="text" class="form-control" name="precio" id="" aria-describedby="helpId" placeholder="" value="{{ old('precio') }}" />
                        <small id="helpId" class="form-text text-muted">Introduce el precio*</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="" aria-describedby="helpId" placeholder="" value="{{ old('cantidad') }}" />
                        <small id="helpId" class="form-text text-muted">Introduce la cantidad*</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Mostrar errores de validación -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif