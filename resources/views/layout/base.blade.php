<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>SpeedRacing - Location express de voiture</title>
		<!-- app config -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="description" content="Place your description here"/>
		<meta name="keywords" content="put, your, keyword, here"/>
		<!-- style file -->
		<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" />
		<!-- <link href="style.css" rel="stylesheet" type="text/css" /> -->
		<link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('css/gQuick.css') }}" rel="stylesheet" type="text/css" />
		<!-- javascript file -->
		<script src="{{ URL::asset('js/jquery-1.4.2.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('js/cufon-yui.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('js/cufon-replace.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('js/Myriad_Pro_400.font.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('js/Myriad_Pro_600.font.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('js/NewsGoth_BT_400.font.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('js/NewsGoth_BT_700.font.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('js/NewsGoth_Dm_BT_400.font.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('js/script.js') }}" type="text/javascript"></script>
	</head>
	<body>
		<div id="main">
			<!-- HEADER -->
			<header id="header">
				<div class="header-row-1">
					<div class="logo">
						<a href="home.html"><img src="images/logo.gif" alt="" /></a>
					</div>
					<div class="navBar">
						<ul>
							<li>
								<a href="{{ route('shared.index') }}">
									<i class="currentNav1 fa fa-home"></i>
								</a>
							</li>
                            @if(auth()->check())
                                <li>
                                    <a href="{{ route('auth.logout') }}">
                                        <i class="currentNav2 fa fa-sign-out"></i>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('auth.login') }}">
                                        <i class="currentNav2 fa fa-user"></i>
                                    </a>
                                </li>
                            @endif
							<li>
								<a href="{{ route('shared.contact') }}">
									<i class="currentNav3 fa fa-sitemap"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row-2">
					<div class="left">
						<ul>
							<li><a href="{{ route('shared.index') }}" class="active1"><span>acceuil</span></a></li>
							<li><a href="{{ route('shared.contact') }}" class="active2"><span>contact</span></a></li>
                            @if(auth()->check())
                                @if(Auth::user()['role'] == 'ROLE_ADMIN')
							        <li class="adminGate"><a href="{{ route('admin.liste') }}" class="active3"><span>LES RESERVATIONS</span></a></li>
                                    <li class="adminGate"><a href="{{ route('admin.index') }}" class="active6"><span>Administration</span></a></li>
                                @else
							        <li><a href="{{ route('shared.voiture') }}" class="active3"><span>nos voitures</span></a></li>
							        <li><a href="{{ route('user.location') }}" class="active4"><span>mes locations</span></a></li>
                                @endif
                                    <li class="" class="last">
                                    <a href="{{ route('auth.logout') }}" class="active5"><span>se deconnecter</span></a>
                                </li>
                            @else
							    <li><a href="{{ route('shared.voiture') }}" class="active3"><span>nos voitures</span></a></li>
							    <li><a href="{{ route('user.location') }}" class="active4"><span>mes locations</span></a></li>
                                <li class="last">
                                    <a href="{{ route('auth.login') }}" class="active5"><span>mon compte</span></a>
                                </li>
                            @endif
						</ul>
					</div>
				</div>
				<div class="row-3 notShow">
					<div class="inside">
						<h2>Reserver ici votre <b>voiture</b></h2>
						<!-- <h2>Speed is the Source <b>of Emotions</b></h2> -->
						<p>Vous avez un projet de sortie de weekend ou vous voulez simplement vous deplacer? Louer en trois cliques votre voiture et vivez l'aventure.</p>
						<form action="" id="search-form">
							<fieldset>
								<label>Search:</label>
								<input class="search-field" type="text" />
								<a href="#" onclick="document.getElementById('search-form').submit()" class="link1">
									<em><b>Go!</b></em>
								</a>
							</fieldset>
						</form>
					</div>
				</div>
				<div class="extra notShow"><img src="images/header-img.png" alt="" /></div>
			</header>
			<!-- CONTENT -->
			<div id="content">
				@yield('content')
			</div>
			<!-- FOOTER -->
			<div id="footer">
				<div class="footer-nav">
					<div class="left">
						<ul>
							<li><a href="{{ route('shared.index') }}">Acceuil</a></li>
							<li><a href="{{ route('shared.voiture') }}">Voiture</a></li>
							<li><a href="{{ route('user.location') }}">Location</a></li>
							<li><a href="#">Aide</a></li>
							<li class="last"><a href="{{ route('shared.contact') }}">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="bottom">
					<br/>
					@2021 ifri_tp - tous droits reservé
					<br/>
					<br/>
				</div>
			</div>
		</div>
		<script type="text/javascript"> Cufon.now(); </script>
	</body>
</html>
