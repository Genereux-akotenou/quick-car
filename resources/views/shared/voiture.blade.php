@extends('layout.base')

<style>
    #header .row-2 ul li a:hover,  #header .row-2 ul li a.active3 {
        background:url(../images/nav-act.png) repeat-x left top;
    }
    #header .row-2 ul li a:hover span, #header .row-2 ul li a.active3 span {
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
                        <br>
                        <div class="inner zebbraFilter">
                            <h4><b>Nos</b> Voitures</h4>
                            <div>
                                <input type="text" placeholder="filter par nom de voiture ou prix" name="" id="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="carList">
    @forelse($carList as $car)
        <div class="carProduct">
            <div class="carImage">
                <img src="{{ $car['image'] }}" alt="image voiture">
            </div>
            <div class="carData">
                <div>
                    <h4>{{ $car['name'] }}</h4>
                    <p>
                        <span>5 </span> places |
                        <span>{{ $car['price'] }} FCFA</span> / Jours
                    </p>
                </div>
                <div class="carAction">
                    <a href="{{ route('user.details', $car['id']) }}">
                        <button>Reserver</button>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <p><br><br><br><br>Oups ! Aucune voiture n'est disponibe pour le moment.<br><br></p>
    @endforelse
</div>

<br>
<br>

@endsection
