@extends('layouts.default')

@section('main')<div class="menu">

    <div class="catalogue-par">
        @if ($message = Session::get("succes"))
            <p style="float: left; position: absolute; top: 70px; left: 20px;">
                {{ $message }}
            </p>
        @endif
        @foreach ($products as $product)
        <div class="catalogue-chld">
            <div class="product-space">
                <div class="product-imgC">
                    <img src="{{asset('storage/pictures/'.$product->picture)}}" alt="{{ $product->titre }}" class="imgC">
                </div>
                <div class="under-img">
                    <p>{{ $product->title }}</p>
                    <p>{{ $product->price }}</p>
                    <div>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->title }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->picture }}"  name="image">
                            @csrf
                            <input type="hidden" value="1" name="quantity">

                            <button class="under-btn">Acheter</button>
                        </form>
                    </div>
                        <div class="prd-btn">
                            <a href="{{ route('product.show', $product->id) }}" class="ButtonProd">Voir</a>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
