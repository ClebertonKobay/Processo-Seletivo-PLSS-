<div class="btn-group" role="group" aria-label="Ações">
    <a href="{{ $showUrl }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i> Vizualizar</a>
    <button type="button" data-bs-toggle="modal" data-bs-target="#excluirModal{{$chamado->id}}" class="btn btn-danger">
        <i
            class="fa-solid fa-trash"></i> Excluir
    </button>
</div>

<div class="modal fade" id="excluirModal{{$chamado->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-custom ">
                <h1 class="modal-title fs-5" id="ModalLabel">Excluir registro de chamado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-black">
                Tem certeza que deseja excluir esse chamado
            </div>
            <div class="modal-footer bg-custom">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                        class="fa-solid fa-cancel"></i> Cancelar
                </button>
                <form action="{{$deleteUrl}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>
