@extends('layouts.default')

@section('main')

<div class="formulaire">
    <div class="formu">

        <h1>Ajouter un produit</h1>
        <hr>
        <br>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="info">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="left-inf">
                    <x-label for="name" :value="__('Titre')"/>
                    <input type="text"  name="title">
                    <x-label for="name" :value="__('Prix')"/>
                    <input type="text"  name="price">
                    <x-label for="name" :value="__('Photo')"/>
                    <input type="file"  name="picture">
                    <x-label for="name" :value="__('Quantité')"/>
                    <input type="number" name="quantity">
                    <x-label for="name" :value="__('Description')"/>
                    <textarea name="description" cols="30" rows="10"></textarea>
                </div>
                <br>
                <br>
                <x-button class="sell-btn">Vendre</x-button>
            </form>
        </div>
    </div>

    <div>
        <img src="images/pianogrosplan.jpeg" alt="pianoImg" class="deco-img">
    </div>
</div>



@endsection

