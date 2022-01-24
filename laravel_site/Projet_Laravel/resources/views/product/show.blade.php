@extends('layouts.default')

@section('main')

                    <div class="contain">
                        <div class="left">
                            <div class="productimg">
                                <img src="{{ asset($product->file)}}" alt="{{$product->titre}}" class="img">
                            </div>
                        </div>
                        <div class="right">
                            <div class="divdescription">
                                <div class="title">
                                    {{ $product->title }}
                                </div>
                                <div class="price">
                                    {{ $product->price }}
                                </div>
                                <hr>
                                <div class="stock">
                                    Stock disponible : {{ $product->quantity }}
                                </div>
                                <p>{{ $product->description }}</p>
                            </div>

                            <div class="produitbutton">
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->title }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->picture }}"  name="image">
                                <input type="hidden" value="1" name="quantity">

                                <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                            </form>
                            @can('update', $product)
                            <a href="{{route('product.edit', $product->id)}}">
                            <button>Modifier</button>
                            </a>
                            @endcan
                            @can('delete', $product)
                            <form action="{{route('product.destroy', $product->id)}}", method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                            </form>
                            @endcan
                            </div>
                        </div>
                    </div>
@endsection
