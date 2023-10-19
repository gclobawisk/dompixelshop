<div>
    <!-- Modal -->
    <div wire:ignore.self  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form wire:submit="save">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Produto {{$this->inputs['produto']}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="produto" class="form-label">Nome do Produto:</label>
                            <input type="text" class="form-control" wire:model="inputs.produto">

                            @error('inputs.produto')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Descrição do Produto:</label>
                            <input type="text" class="form-control" wire:model="inputs.descricao">

                            @error('inputs.descricao')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="dwdw" class="form-label">Preço:</label>
                            <input type="text" class="form-control" wire:model="inputs.preco">

                            @error('inputs.preco')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Quantidade:</label>
                            <input type="number" class="form-control" wire:model="inputs.estoque">
                        </div>

                            @error('inputs.estoque')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
    <!-- Fim modal -->

    
</div>
