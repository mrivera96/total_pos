<div class="modal fade" id="deleteAlert" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">{{__('Eliminar Servicio')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{__('¿Estás seguro de eliminar el servicio '.$service->name .'?')}}</p>
                <form id="delete-category" method="POST"
                      action="{{route('service.destroy', $service->id)}}">
                    @method('DELETE')
                    @csrf
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
