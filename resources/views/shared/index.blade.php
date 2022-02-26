@extends('layout.base')

<style>
    #header .row-2 ul li a:hover,  #header .row-2 ul li a.active1 {
        background:url(../images/nav-act.png) repeat-x left top;
    }
    #header .row-2 ul li a:hover span, #header .row-2 ul li a.active1 span {
        background:url(../images/nav-arrow.gif) no-repeat center bottom;
    }
    .currentNav1{
        background: linear-gradient(to bottom, #409ddf 50%, #1c76ce 50%);
        color: white !important;
    }
</style>

@section('content')

<ul class="box-list">
    <li>
        <div class="box">
            <div class="border-bot">
                <div class="right-bot-corner">
                    <div class="left-bot-corner">
                        <div class="inner">
                            <div class="box1">
                                <div class="inner">
                                    <h4><b>Location</b> Express</h4>
                                    <p>Si vous rechercher une voiture pour une sortie, vous etes au bon endroit. Vous trouverai tous les models à votre prix.  <a href="#"><img src="images/arrow.gif" alt="" /></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="alt">
        <div class="box">
            <div class="border-bot">
                <div class="right-bot-corner">
                    <div class="left-bot-corner">
                        <div class="inner">
                            <div class="box1">
                                <div class="inner">
                                    <h4><b>taxi</b> Express</h4>
                                    <p>Si vous êtes en mission ou avez besoin d'un conducteur vous êtes également au bon endroit. Reçevez un chauffer par voiture <a href="#"><img src="images/arrow.gif" alt="" /></a></p>
                                    <!-- <p>Free 1028X768 Optimized Website Template from TemplateMonster.com! We hope that you like this template and will use for your websites. <a href="#"><img src="images/arrow.gif" alt="" /></a></p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="last">
        <div class="box">
            <div class="border-bot">
                <div class="right-bot-corner">
                    <div class="left-bot-corner">
                        <div class="inner">
                            <div class="box1">
                                <div class="inner">
                                    <h4><b>Monto</b> tchéeee</h4>
                                    <p>Toute nos voitures sont assurées et nous effectuons une visite techniques avant chaque location de voiture. Votre confort notre vocation.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>
<div class="indent">
    <div class="wrapper">
        <div class="col-1">
            <h3><b>Bienvenu sur</b> SpeedRacing</h3>
            <p>Speed Racing est une entreprise spécilisée dansla location de véhicule à l'occasion de vos sortie, voyages ou missions. </p>
            <div class="img-box1">
                <img src="images/1page-img.jpg" alt="" />
                <p class="p0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
                <!-- <p >This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p> -->
            </div>
            <p>
                Pour louer votre voiture, c'est simple. <a href="">connectez vous</a> puis rendez-vous dans la session <a href="">voiture</a> pour recherchez le model de voiture puis <a href="">reservez</a>. Les informations complémentaires vous seront automatiquement transférer.
            </p>
            <p class="p0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
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
