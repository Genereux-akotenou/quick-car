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
                        <div class="inner linkAriane">
                            <a href="">Nos Voiture</a>
                            <span>></span>
                            <a href="{{ route('user.details', $car['name']) }}">Details Voiture</a>
                            <span>></span>
                            <a class="currentLink" href="">Valider reservation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
    <div class="validationDetails validateCart">
        <h4>Details</h4>
        <table>
            <tr>
                <td class="td_head">
                    Valider la location de vehicule
                </td>
            </tr>
            <tr>
                <td><b>identifiant</b></td>
                <td>{{ $car['name'] }}</td>
            </tr>
            <tr>
                <td>Date de debut</td>
                <td>{{ session('dateDebut') }}</td>
            </tr>
            <tr>
                <td>Date de fin</td>
                <td>{{ session('dateFin') }}</td>
            </tr>
            <tr>
                <td>Cout par jours</td>
                <td>{{ $car['price'] }} <b>FCFA</b></td>
            </tr>
            <tr>
                <td>Total</td>
                <td>{{ $days * $car['price'] }} <b>FCFA</b></td>
            </tr>
            <tr>
                <td>
                    <div class="carAction resserve">
                        <a href="{{ route('car.finale', $car['id']) }}">
                            <button>
                                VALIDER
                            </button>
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </div>

<br><br>

@endsection
