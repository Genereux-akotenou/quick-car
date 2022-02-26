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

@if($carData != null)
<div class="box">
    <div class="border-bot">
        <div class="right-bot-corner">
            <div class="left-bot-corner">
                <div class="inner">
                    <div class="box1 alt vcarBaner">
                        <div class="inner linkAriane">
                            <a href="route('shared.voiture')">Nos Voiture</a>
                            <span>></span>
                            <a class="currentLink" href="">Details Voiture</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="one_carList">
    <div class="carProduct">
        <div class="carImage">
            <img src="/{{ $carData['image'] }}" alt="image voiture">
        </div>
        <div class="carData">
            <div>
                <h4>{{ $carData['name'] }}</h4>
                <p>
                    <span>5 </span> places |
                    <span>{{ $carData['price'] }} FCFA</span> / Jours
                </p>
            </div>
            <div class="carAction">
                <a href="#{{ $carData['id'] }}">
                    <button>
                        <i class="fa fa-arrow-down"></i>
                        Images
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="availabilityBox">
        <form id="zebbraChecker" action="{{ route('user.check', $carData['id']) }}" method="post">
            {{ csrf_field() }}

            <div class="availabilityDate">
                <div>
                    <label for="">DATE DEBUT</label>
                    <input required type="date" name="dateDebut" value="{{ old('dateDebut') }}">
                </div>
                <div>
                    <label for="">DATE FIN</label>
                    <input required type="date" name="dateFin" value="{{ old('dateFin') }}">
                </div>
            </div>
            <br>
            <div class="availabilityAction">
                @if(Session::get('checkStatus') == 'OCCUPE')
                    <div class="carAction nonDispo">
                        <a href="/#available">
                            <button id="resetAction1">
                                OCCUPÉ
                            </button>
                        </a>
                    </div>
                @elseif(Session::get('checkStatus') == 'LIBRE')
                    <div class="carAction resserve">
                        <a href="{{ route('car.validation', $carData['id']) }}">
                            <button id="resetAction">
                                RESERVEZ
                            </button>
                        </a>
                    </div>
                @else
                    <div class="carAction">
                        <a href="">
                            <button>
                                VERIFIER DISPONIBILITÉ
                            </button>
                        </a>
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>

@if(Session::get('freeCar'))
    <p id="available">
        <br>
        <b>
            Quelques voitures libre dans cette plage horaire
        </b>
        <br>
    </p>
    <div class="carList">
        @forelse(Session::get('freeCar') as $car)
            <div class="carProduct">
                <div class="carImage">
                    <img src="/{{ $car['image'] }}" alt="image voiture">
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
            <p><br><br><br><br>Oups ! Aucune voiture n'est disponibe pour cette plage d'heure.<br><br></p>
        @endforelse
    </div>
@endif

<div class="carDetails">
    <h4>Details</h4>
    {{ $carData['description'] }}
</div>
<br id="{{ $carData['id'] }}">
<div class="carBigImg">
    <img src="/{{ $carData['image'] }}" alt="">
</div>

<br>
<br>

<script>
    document.getElementById('resetAction').addEventListener('click', (e) => {
        e.preventDefault();
        window.location = "{{ route('car.validation', $carData['id']) }}"
    });
    document.getElementById('resetAction1').addEventListener('click', (e) => {
        e.preventDefault();
        window.location = "";
    });

</script>

@endif

@endsection

