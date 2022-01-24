<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>tympiano</title>
        <link rel="stylesheet" href="{{asset('css/default.css')}}">
        <link rel="stylesheet" href="{{asset('css/footer.css')}}">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <link rel="stylesheet" href="{{asset('css/cart.css')}}">
        <link rel="stylesheet" href="{{asset('css/create.css')}}">
        <link rel="stylesheet" href="{{asset('css/catalogue.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/produit.css')}}">
    </head>
    <body>
        <div class="container">
            <header class="header">
                <div class="left">
                    <div class="logo">
                        <a href="{{url('/product')}}" class="btn"><img src="images/logoTymPiano.png" alt="logo" class="logo-img"></a>
                        <h1 class="title">TYMPIANO</h1>
                    </div>
                </div>
                <div class="right">
                    <a href="{{ url('cart') }}">
                        <div class="nav-btn">
                            <img src="images/cart.png" alt="cart" class="cart">
                            {{Cart::getTotalQuantity()}}
                        </div>
                    </a>
                        <div class="nav-btn">
                            @auth
                            @if (Auth::user()->role === 'admin')
                            <a href="{{ url('admin') }}" class="btn">
                                <div class="nav-button">
                                    <div>Ajouter un produit</div>
                                    @if (session('succes'))
                                    <div class="succes">{{ session('succes') }}</div>
                                        @endif
                                    </div>
                                </a>
                                @endif
                                @endauth
                            </div>
                            <div class="nav-btn">
                                <a href="{{url('/welcome')}}" class="btn">Accueil</a>
                            </div>
                            <div class="nav-btn">
                                <a href="{{url('/cart')}}" class="btn">
                            </div>
                        </a>
                        @if (Route::has('login'))
                        @auth
                        <div class="nav-btn">
                            <div class="logout">
                                <form id="logout" method="POST" action="{{ route('logout')}}">
                                    @csrf
                                    <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{__('Déconnexion')}}</a>
                                </form>
                            </div>
                        </div>
                        @else
                            <div class="nav-btn">
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Se connecter</a>
                            </div>
                            <div class="nav-btn">
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">S'inscrire</a>
                            </div>
                        @endif
                        @endauth
                </div>
            </header>
                <div class="div_default">
                @yield('main')
                </div>
                <hr class="hr1">
                <footer class="footer">
                    <hr class="hr2">
                <div class="marques">
                    <img src="images/marques/arturia.png" alt="arturia" class="logo">
                    <img src="images/marques/nativeinstruments.png" alt="nativeinstruments" class="logo">
                    <img src="images/marques/nord.png" alt="lonordgo" class="logo">
                    <img src="images/marques/yamaha.png" alt="yamaha" class="logo">
                    <img src="images/marques/AKG.png" alt="AKG" class="logo">
                    <img src="images/marques/roland.png" alt="roland" class="logo">
                    <img src="images/marques/sony.png" alt="sony" class="logo">
                </div>
                <div class="icones-btn">
                    <div class="icones">
                        <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="Logo facebook" class="icone"><h4>Poke nous sur facebook</h4></a>
                        <a href="https://twitter.com/home?lang=fr"><img src="images/twitter.png" alt="Logo twitter" class="icone"><h4>Follow nous sur twitter</h4></a>
                    </div>
                </div>
                <div class="copyright">
                    <h5>Copyright © 2021</h5>
                </div>
            </footer>
        </div>
    </body>
</html>
