@extends('store.layout')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">

                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Imagem</td>
                        <td class="description">Descrição</td>
                        <td class="price">Valor</td>
                        <td class="qtd">Qtd.</td>
                        <td class="total">Valor Total</td>
                        <td></td>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($cart->all() as $k => $item)
                        <tr>
                            <td class="cart_product">
                                <a href="#">Imagem</a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="#">{{ $item['name'] }}</a></h4>
                                <p>Cód. Produto: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ $item['price'] }}
                            </td>
                            <td class="cart_qtd">
                                {{ $item['qtd'] }}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    R$ {{ $item-['qtd'] * $item['price'] }}
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a href="#" class="cart_quantity_delete">
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
                <h2 class="title text-center">Carrinho</h2>
        </div>
    </section>

@stop