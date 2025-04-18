@extends('menu.menu')
@section('content')
@if(request()->url() == url('/'))
<div class="container-12">
  <div class="row">
    <div class="col-8">
    <form action="/" method="get" style="margin-bottom:20px;">
        <div class="row">
          <div class="col-3" style="margin-right:10px;">
            <input type="text" name="search" value="{{request()->search}}" class="form-control"  placeholder="Insira o nome do produto">
          </div>
          <div class="col-3">
            <select name="nomecategoria" class="form-control" style="margin-left:-30px;">
              <option value="" name="">- Selecione a Categoria -</option>
              @foreach($categories::categories() as $category)
              <option value="{{$category->nome_cat}}" name="nomecategoria"
                @if($category->nome_cat == Request()->nomecategoria) selected @endif
                >{{$category['nome_cat']}}
              </option>
              @endforeach
            </select>
          </div>
          <div class="col-4">
            <button class="btn btn-success" type="submit" style="margin-left:-20px;">Pesquisar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endif

<div class="container-fluid">
  <div class="row justify-content-center">
    @forelse($produtos as $produto)
    <div class="col-3">
      <div class="card" style="margin-bottom:32px;">
        <div class="card-body">
          <h5 class="card-title">{{$produto->nome_prod}}</h5>
          <p class="card-text">Preço: R$ <span class="num">{{$produto->valor_prod}}</span></p>
          <p class="card-text">Categoria: {{$produto->category->nome_cat}}</p>
          <p class="card-text">Descrição: {{$produto->descricao}}</p>
          <p class="card-text">Autor: <a href="">{{$produto->user->email}}</a></p>
          <a href="produto/show/{{$produto->id}}" class="btn btn-success" id="btn">Comprar</a>
        </div>
      </div>
    </div>

    @empty

    <p class="text-danger">Es tut mir leid! Es gibt keine Produkte für Sie.</p>
    <a href="/conta/">Zurück zum personalprofil</a>

    @endforelse
  </div>
</div>

<style>
  #btn{
    width:100%;
    padding:10px;
    color:white;
    outline:none;
    border-radius:4px;
    transition:.2s;
  }

  #btn:hover{
    padding:12px !important;
  }

</style>

@endsection