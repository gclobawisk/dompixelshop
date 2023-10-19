<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Events\SuccessEvent;
use App\Livewire\Forms\PostForm;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class FormModalProduct extends Component
{

    public $listeners = ['editProduct' => 'edit'];

    public $inputs = [
        'produto' => '',
        'descricao' => '',
        'preco' => '',
        'estoque' => '',
    ];

    public $id;

    protected $rules = [
        'inputs.produto'=>'required|min:3|max:255',
        'inputs.descricao'=>'required|min:3|max:255',
        'inputs.preco'=>'required|numeric',
        'inputs.estoque'=>'integer|max:99999',
    ];

    protected $messages = [
        'inputs.produto.required' => 'Por favor, o nome do produto é obrigatório',
        'inputs.produto.min' => 'Insira ao menos 3 caracteres',
        'inputs.produto.unique' => 'Este produto já existe na tabela',
        'inputs.descricao.required' => 'Por favor, a descrição do produto é obrigatório',
        'inputs.descricao.min' => 'Insira ao menos 3 caracteres',
        'inputs.preco.required' => 'O preço do produto é obrigatório',
        'inputs.preco.numeric' => 'O preço deve ser um valor numérico',
        'inputs.estoque.integer' => 'O estoque deve ser um número inteiro',
        'inputs.estoque.max' => 'O estoque não pode exceder 999999',
    ];

   

    #[On('edit')]
    public function edit($id){

        $this->id = $id;
        $produto = Produto::where('id', $id)->first();

        $this->inputs = [
            'produto' => $produto->produto,
            'descricao' => $produto->descricao,
            'preco' => $produto->preco,
            'estoque' => $produto->estoque,
        ];

        $this->dispatch('modalShow');

    }

    public function resetInputs()
    {
        $this->reset();
        
    }


    public function save(){

        $this->validate([
            'inputs.produto' => [
                'required',
                'min:3',
                Rule::unique('produtos', 'produto')->ignore($this->id),
            ],
        ]);

        try{
            DB::beginTransaction();

            $produto = Produto::find($this->id);
            $produto->update([
                'produto' => $this->inputs['produto'],
                'descricao' => $this->inputs['descricao'],
                'preco' => $this->inputs['preco'],
                'estoque' => $this->inputs['estoque'],
            ]);

            DB::commit();
            $this->resetInputs();
            $this->dispatch('success', 'Seu formulário foi salvo com sucesso.');
            //$this->emitTo('intranet.documents.documents-index','$refresh');

        }catch(Exception $e){

            DB::rollBack();
            $this->dispatchBrowserEvent('notify',['error'=>$e->getMessage()]);
        }

    }

    

    
    public function render()
    {

        return view('livewire.form-modal-product');
    }
}
