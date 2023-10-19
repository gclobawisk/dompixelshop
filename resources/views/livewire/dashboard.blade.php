<div>
    @livewire('form-modal-product')   

    <div class="container-fluid">
            <h3 class="text-dark mb-4">Produtos</h3>
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Todos os Produtos</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-nowrap">
                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Mostrar&nbsp;
                                <select class="form-control form-control-sm custom-select custom-select-sm" wire:model.change="totalProdutos">
                                    <option value="5" selected="">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>&nbsp;</label></div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right dataTables_filter" id="dataTable_filter">
                                <label>
                                    <form wire:submit="buscar">
                                        <input type="text" class="form-control form-control-sm" aria-controls="dataTable" wire:model.live="search" placeholder="Procurar">
                                    </form>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
            
                            <thead>
                                <tr>
                                    <th>IMAGEM</th>
                                    <th>Produto</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Estoque</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Deletar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produtos as $produto)

                                <tr>
                                    <td><img class="rounded-circle mr-2" width="30" height="30" src="env('URL_BASE')/assets/assets_admin/img/avatars/avatar1.jpeg"></td>
                                    <td>{{$produto->produto}}</td>
                                    <td>{{$produto->descricao}}</td>
                                    <td>R$ {{$produto->preco}}</td>
                                    <td class="col-1 text-center">{{$produto->estoque}}</td>
                                    <td class="col-1 text-center text-primary"><i class="fas fa-edit" wire:click="editProduct({{$produto->id}})"></i></td>
                                    <td class="col-1 text-center text-danger"><i class="fas fa-trash"></i></td>
                                </tr>

                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>IMAGEM</th>
                                    <th>Produto</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Estoque</th>
                                    <th>Editar</th>
                                    <th>Deletar</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando {{$this->totalProdutos}} de {{count($countProdutos)}} produtos</p>
                        </div>
                        <div class="col-md-6 text-end">



                            <!-- <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav> -->


                        </div>
                    </div>
                    


                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('livewire:initialized', function () {
            
            Livewire.on('modalShow', function (message) {
                $('#exampleModal').modal('show');
                dispatch('edit')
            });
        });        
    </script>

</div>
