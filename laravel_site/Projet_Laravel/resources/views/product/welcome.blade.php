<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>tympiano</title>
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
        <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    </head>
    <body>
        <div class="container">
            <header class="headerW">
                <div class="top">
                    <div class="left">
                        <div class="logo">
                            <img src="images/logoTymPiano.png" alt="logo" class="logo-img">
                        </div>
                    </div>
                    <div class="right">
                        <div class="connect">
                            @if (Route::has('login'))
                            @auth
                            <div class="log-out">
                                <form id="logout" method="POST" action="{{ route('logout')}}">
                                    @csrf
                                    <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{__('Déconnexion')}}</a>
                                </form>
                            </div>
                            @else
                            <div class="log-out">
                                <form id="logout" method="POST" action="{{ route('logout')}}">
                                    @csrf
                                    <a href="{{ route('login') }}">{{__('Se connecter')}}</a>
                                </form>
                            </div>
                            <div class="log-out">
                                <form id="logout" method="POST" action="{{ route('logout')}}">
                                    @csrf
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}">{{__('S\'enregistrer')}}</a>
                                </form>
                            </div>
                            @endauth
                            @endif
                        </div>
                        <div class="welcome-div">
                            <h1 class="welcome-message">BIENVENUE</h1>
                        @auth
                            <div class="log-name">
                                {{Auth::user()->surname}}
                                {{Auth::user()->name}}
                            </div>
                        @endauth
                        </div>
                        @endauth
                    </div>
                </div>
                    <div class="bottom">
                        <div class="fixed-nav">
                            <h1 class="title">TYMPIANO</h1>
                            <div class="nav-btn">
                                <a href="{{url('/product')}}" class="btn-cat">Acceder au catalogue</a>
                            </div>
                        </div>
                        <div class="citation">
                            <p class="citation-content"><em>"C'est affreux quand quelque chose vous préoccupe, de ne pas avoir une âme à laquelle vous décharger. Tu sais ce que je veux dire. Je raconte à mon piano les choses que je te disais." ~Chopin</em></p>
                        </div>
                        <div class="middle">
                            <div class="dec-1">
                                <img src="images/PianoImg.jpeg" alt="PianoImg" class="img-1">
                            </div>
                            <div class="text">
                                <p class="text-mdl">Un large choix de pianos numériques et de pianos acoustiques parmi les plus belles marques. Un atelier de restauration aux deux labels d’état pour l’entretien et la rénovation de votre piano.
                                    <br>
                                    <br>
                                    La passion des pianos depuis 1912.</p>

                                    <img src="images/pianoLogo.png" alt="" class="piano-logo">
                            </div>
                        </div>
                    </div>
            </header>
                <div class="div_default">
            </div>
        </div>
    </body>
</html>
