@extends('layout.base')

<style>
    #header .row-2 ul li a:hover,  #header .row-2 ul li a.active4 {
        background:url(../images/nav-act.png) repeat-x left top;
    }
    #header .row-2 ul li a:hover span, #header .row-2 ul li a.active4 span {
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
                            <a href="{{ route('shared.voiture') }}">Nos Voitures</a>
                            <span>></span>
                            <a class="currentLink" href="">Mes locations</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="validationDetails">
    <table>
        <!-- <tr>
            <td class="td_head">
                Mes voitures
            </td>
            <td style="width: 6.2em;">Début</td>
            <td style="width: 6em;">Fin</td>
            <td style="width: 11.2em;">
                Actions
            </td>
        </tr> -->
        @forelse($featured as $location)
            <tr>
                <td class="td_head"><b>{{ $location['name'] }}</b></td>
                <td style="width: 6.2em;">{{ $location['date_start'] }}</td>
                <td style="width: 6em;">{{ $location['date_end'] }}</td>
                <td style="width: 11.2em;">
                    <div class="carAction nonDispo">
                        <a href="{{ route('car.rendre', [$location['id_car'], $location['date_start'], $location['date_end']]) }}">
                            <button>
                                RENDRE
                            </button>
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <p>
                <br>
                Aucune reservation pour le moment
                <br>
            </p>
        @endforelse
    </table>
</div>

<br><br>

@endsection
