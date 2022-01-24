@extends('layouts.default')

@section('main')
<div class="cart-content">
    <div class="top-cart">
        <h3>Votre panier</h3>
        <form action="{{route('cart.clear')}}" method="POST">
            @csrf
            <button class="remove-cart">Vider</button>
        </form>
    </div>

    <div class="recap">
        <div class="top">
            <input type="hidden" {{$nbritem = 0}}>
            @foreach ($cartItems as $item)
                <input type="hidden" {{$quantity = $item->quantity}}>
                <div class="cart-Items">
                    <div class="item-title">
                        <h1 class="title">{{$item->title}}</h1>
                    </div>
                </div>
                <div class="item-price">
                    <div class="amount">
                        {{$price=$item->price}}€<br>
                    </div>
                    <div class="remove">
                        <form action="{{route('cart.remove')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$item->id}}" name="id">
                            <button class="delete">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="bottom">
                <div class="total-amount">
                    Total : € {{Cart::getTotal()}}
                </div>
                <div>
                        <button class="pay-btn">Payer</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
