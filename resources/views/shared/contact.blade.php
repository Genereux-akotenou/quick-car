@extends('layout.base')

<style>
    #header .row-2 ul li a:hover,  #header .row-2 ul li a.active2 {
        background:url(../images/nav-act.png) repeat-x left top;
    }
    #header .row-2 ul li a:hover span, #header .row-2 ul li a.active2 span {
        background:url(../images/nav-arrow.gif) no-repeat center bottom;
    }
    .currentNav3{
        background: linear-gradient(to bottom, #409ddf 50%, #1c76ce 50%);
        color: white !important;
    }
</style>

@section('content')

<div class="box">
    <div class="border-bot">
        <div class="right-bot-corner">
            <div class="left-bot-corner">
                <div class="inner">
                    <div class="box1 alt">
                        <div class="inner">
                            <h4><b>Nos</b> Contacts</h4>
                            <div class="address">
                                <b>Zip Postal:</b>50122<br />
                                <b>Pays:</b>Bénin<br />
                                <b>Téléphone:</b>+229 61205472<br />
                                <b>Fax:</b>+229 61205472</div>
                                <p class="p0 extra-wrap"><b>A savoir :</b><br />
                                    Vous avez un projet de sortie de weekend ou vous voulez simplement vous deplacer? Louer en trois cliques votre voiture et vivez l'aventure.Vous avez un projet de sortie de weekend ou vous voulez simplement vous deplacer? Louer en trois cliques votre voiture et vivez l'aventure.
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="indent">
    <div class="wrapper">
        <div class="col-1">
            <h3><b>Contactez</b> - nous</h3>
            <form id="contacts-form" action="">
                <fieldset>
                    <div class="ct_field field">
                        <label>Nom & Prenom:</label>
                        <input type="text" value=""/>
                    </div>
                    <div class="ct_field field">
                        <label>Email:</label>
                        <input type="text" value=""/>
                    </div>
                    <div class="ct_field field">
                        <label>Sujet:</label>
                        <input type="text" value=""/>
                    </div>
                    <div class="ct_field field">
                        <label>Message:</label>
                        <textarea cols="1" rows="1"></textarea>
                    </div>
                    <div class="wrapper">
                        <a href="#" onclick="document.getElementById('contacts-form').submit()" class="link1">
                            <em><b>ENVOYER</b></em>
                        </a>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-2">
        <div class="box2">
                <div class="border-top">
                    <div class="left-top-corner">
                        <div class="right-top-corner">
                            <div class="inner">
                                <h4><b>Promo</b> voiture</h4>
                                <ul class="news">
                                    <li><a href="#">May 21, 2010</a><p>Lorem ipsum dolor sit amet, coisectur adipisicing elit, sed doeiusmo.</p></li>
                                    <li><a href="#">May 12, 2010</a><p>Ut enim ad minim veniam, qnostrud exercitation ullamco.</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box3">
                <div class="right-bot-corner">
                    <div class="left-bot-corner">
                        <div class="inner">
                            <h4><b>Se</b> connecter</h4>
                            <form action="{{ route('gauth.login') }}" method="post" id="login-form">
                                <fieldset>
                                    {{ csrf_field() }}
                                    @if($errors->has('email'))
                                        <span class="">{{ $errors->first('email') }}</span>
                                    @endif

                                    @if($errors->has('password'))
                                        <span class="">{{ $errors->first('password') }}</span>
                                    @endif

                                    <div class="field">
                                        <label>email:</label>
                                        <input value="{{ old('email') }}" class="" type="email" name="email" placeholder="email" value="">

                                    </div>
                                    <div class="field">
                                        <label>Mot de passe:</label>
                                        <input class="" type="password" name="password" placeholder="password">

                                    </div>
                                    <div class="field1">
                                        <label class="extra">Se souvenir:</label>
                                        <input type="checkbox" class="extra" />
                                        <a href="#" onclick="document.getElementById('login-form').submit()">
                                            <em><b>Connexion<span>Connexion</span></b></em>
                                        </a>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#">Mot de pass oublié?</a>
                                        </li>
                                        <li class="last">
                                            <a href="{{ route('auth.register') }}">S'inscrire</a>
                                        </li>
                                    </ul>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
