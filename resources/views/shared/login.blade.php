@extends('layout.base')

<style>
    #header .row-2 ul li a:hover,  #header .row-2 ul li a.active5 {
        background:url(../images/nav-act.png) repeat-x left top;
    }
    #header .row-2 ul li a:hover span, #header .row-2 ul li a.active5 span {
        background:url(../images/nav-arrow.gif) no-repeat center bottom;
    }
    .currentNav2{
        background: linear-gradient(to bottom, #409ddf 50%, #1c76ce 50%);
        color: white !important;
    }
    .notShow{
        display: none;
    }
</style>

@section('content')

<br>
<div class="">
    <div class="wrapper">
        <div class="">
            <div class="box3 box33">
                <div class="right-bot-corner">
                    <div class="left-bot-corner">
                        <div class="inner">
                            <h4><b>Se</b> connecter</h4>
                            <form action="{{ route('gauth.login') }}" method="post" id="login-form login-form2">
                                <br><br><br>
                                <fieldset style="position: relative;">
                                    {{ csrf_field() }}

                                    @if($errors->has('status'))
                                        <span id="hideMe" class="fail-login">{{ $errors->first('status') }}</span>
                                    @endif

                                    @if(session('state'))
                                        <span id="hideMe" class="fail-login gBack-green">{{ session('state') }}</span>
                                    @endif

                                    <div class="gLineField m1-2 R-login lineRow">
                                        <label for="">ADRESSE EMAIL</label>
                                        <input value="{{ old('email') }}" class="" type="email" name="email" placeholder="email" value="">
                                        @if($errors->has('email'))
                                            <span class="error-form">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="gLineField lineRow">
                                        <label for="">MOT DE PASSE</label>
                                        <input class="" type="password" name="password" placeholder="password">
                                        @if($errors->has('password'))
                                            <span class="error-form">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="adminActAction">
                                        <div class="carAction">
                                            <a href="">
                                                <button>
                                                    SE CONNECTER
                                                </button>
                                            </a>
                                        </div>
                                    </div>

                                    <br>
                                    <ul class="oauth">
                                        <li>
                                            <a href="#">Mot de pass oublié?</a>
                                        </li>
                                        <br>
                                        <li class="last">
                                            <a href="{{ route('auth.register') }}">S'inscrire</a>
                                        </li>
                                    </ul>
                                </fieldset>
                                <br><br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
