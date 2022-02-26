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
                            <a href=""class="currentLink">Les voitures</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="adminActAction">
    <div class="carAction">
        <a href="{{ route('admin.liste') }}">
            <button>
                RESERVATIONS
            </button>
        </a>
    </div>
    <div class="carAction">
        <a href="{{ route('admin.create') }}">
            <button>
                AJOUTER UN VOITURE
            </button>
        </a>
    </div>
</div>
<br>
<div class=" adminListe">
    <table>
        @foreach($carList as $car)
            <tr>
                <td class="admBox1">
                    <img width="50" src="{{ $car['image'] }}" alt="">
                    <b>{{ $car['name'] }}</b>
                </td>
                <td class="adminPrix">{{ $car['price'] }}</td>
                <td class="admBox2">
                    @if($car['active'] == 0)
                        <div class="carAction resserve adminAction">
                            <a href="{{ route('car.share', $car) }}">
                                <button title="publier">
                                    <i class="fa fa-share"></i>
                                </button>
                            </a>
                        </div>
                    @else
                        <div class="carAction nonDispo adminAction">
                            <a href="{{ route('car.unshare', $car) }}">
                                <button title="depublier">
                                    <i class="fa fa-close"></i>
                                </button>
                            </a>
                        </div>
                    @endif
                    <div class="carAction nonDispo adminAction">
                        <a href="{{ route('car.delete', $car) }}">
                            <button title="supprimer">
                                <i class="fa fa-trash"></i>
                            </button>
                        </a>
                    </div>
                    <div class="carAction adminAction">
                        <a href="{{ route('admin.edit', $car) }}">
                            <button title="editer">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>

@endsection
