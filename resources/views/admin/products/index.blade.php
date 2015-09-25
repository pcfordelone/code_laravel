@extends('layout')

@section('content')

    <h1>Produtos</h1>

    <hr/>

    <a href="{{ route('product.new') }}" >
        <button class="btn btn-primary">
            Cadastrar Novo Produto
        </button>
    </a>

    <br/><br/>

    <table class="table">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Ação</th>
        </tr>

        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>R$ {{ $product->price }}</td>
                <td>
                    <a href="{{ route('product.edit', ['id' => $product->id]) }}">
                        <button class="btn btn-primary btn-sm">
                            Editar
                        </button>
                    </a>
                    <a href="{{ route('product.destroy', ['id' => $product->id]) }}">
                        <button class="btn btn-danger btn-sm">
                            Excluir
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach

    </table>

@endsection