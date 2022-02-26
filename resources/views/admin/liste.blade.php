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
                            <a href=""class="currentLink">Emprunteurs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class=" adminListe">
    <table>
        @forelse($emprunteurs as $emprunteur)
            <tr>
                <td class="td_head">
                    {{ $emprunteur['username'] }}
                </td>
                <td>
                    {{ $emprunteur['carname'] }}
                </td>
                <td class="adminPrix">
                    De {{ $emprunteur['date_start'] }}
                </td>
                <td class="admBox2">
                    A {{ $emprunteur['date_end'] }}
                </td>
            </tr>
        @empty
            <p>
                <br>
                Aucun emprunt pour le moment.
                <br>
            </p>
        @endforelse
    </table>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>

@endsection
