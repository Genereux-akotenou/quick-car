@extends('layout.base')

<style>
    #header .row-2 ul li a:hover,  #header .row-2 ul li a.active6 {
        background:url(../images/nav-act.png) repeat-x left top;
    }
    #header .row-2 ul li a:hover span, #header .row-2 ul li a.active6 span {
        background:url(../images/nav-arrow.gif) no-repeat center bottom;
    }
    .notShow{
        display: none;
    }
</style>

@section('content')

<div class="box">
    <div class="border-bot">
        <div class="right-bot-corner">
            <div class="left-bot-corner">
                <div class="inner">
                    <div class="box1 alt vcarBaner">
                        <div class="inner linkAriane">
                            <a href="">Admin</a>
                            <span>></span>
                            <a href="{{ route('admin.index') }}">Les voitures</a>
                            <span>></span>
                            <a href="" class="currentLink">Ajouter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

<div>
    <form action="{{ route('car.create') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="gLineField m1-2 R-login">
            <label for="">IMAGE DU VEHICULE</label>
            <input class="" type="file" name="image" placeholder="image" value="">
            @if($errors->has('image'))
                <span class="error-form">{{ $errors->first('image') }}</span>
            @endif
        </div>

        <div class="gLineField m1-2 R-login">
            <label for="">NOM DU VEHICULE</label>
            <input class="" type="text" name="name" placeholder="nom de votre vehicule" value="">
            @if($errors->has('name'))
                <span class="error-form">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="gLineField m1-2 R-login">
            <label for="">PRIX / JOURS</label>
            <input class="" type="text" name="price" placeholder="prix" value="">
            @if($errors->has('price'))
                <span class="error-form">{{ $errors->first('price') }}</span>
            @endif
        </div>

        <div class="gLineField m1-2 R-login">
            <label for="">DESCRIPTION</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            @if($errors->has('description'))
                <span class="error-form">{{ $errors->first('description') }}</span>
            @endif
        </div>

        <br>

        <div class="adminActAction">
            <div class="carAction">
                <a href="">
                    <button>
                        CREER
                    </button>
                </a>
            </div>
        </div>

    </form>
</div>

<br><br>

@endsection
