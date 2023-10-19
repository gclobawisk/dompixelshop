<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produto;

class Dashboard extends Component
{

    public $search;
    public $totalProdutos = 5;
    public $descricao;


    public function editProduct($id){
       
        $this->dispatch('edit', id: $id);

    }
    

    public function render()
    {        

        $countProdutos = Produto::get();
        $produtos = Produto::where('produto', 'LIKE', '%' . $this->search . '%')->simplePaginate($this->totalProdutos);
        

        return view('livewire.dashboard',[
            'produtos' => $produtos,
            'countProdutos' => $countProdutos
        ]);
    }

}
