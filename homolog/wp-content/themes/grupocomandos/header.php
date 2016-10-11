<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>Grupo Comandos</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="description" content="Demo project">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.min.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
	</head>
	<body onload="calcEnergy()">
		<header>
			<div class="basket">
				<a class="">
					<svg viewbox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
				       <g>
				        <circle id="svg_1" r="3.2" cy="43.6" cx="14.4" fill="#fff"/>
				        <circle id="svg_2" r="3.2" cy="43.6" cx="35.2" fill="#fff"/>
				        <rect id="svg_5" height="5.2" width="12.5" fill="#fff" y="9.5625" x="2.6"/>
				        <rect id="svg_6" height="23.3" width="4.9" fill="#fff" y="14.4" x="10.2"/>
				        <rect id="svg_7" height="4.9" width="28.5" fill="#fff" y="32.8" x="14.0375"/>
				        <rect id="svg_8" height="5.5" width="5.875" y="17.875" x="16.375" stroke-linecap="null" stroke-linejoin="null" fill="#fff"/>
				        <rect transform="rotate(26.071134567260742 27.5625,15.781249999999996) " id="svg_9" height="9.6875" width="18.75" y="10.9375" x="18.1875" stroke-linecap="null" stroke-linejoin="null" fill="#2d5764"/>
				        <rect id="svg_3" height="15.5" width="21.1625" fill="#fff" y="14.9" x="14.0375"/>
				        <polygon id="svg_4" points="44.06249971630314,14.962499618530273 35.13750076293945,30.462499618530273 35.13750076293945,14.862500190734863 " fill="#fff"/>
				      </g>
				    </svg>
			    </a>
			</div>
			<div class="row">
				<div class="column small-10 medium-4">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="logo" alt="logo grupo comandos">
				</div>
				
				<div class="column small-2 dropdown show-for-small-only">
					<ul class="sandwich">
						<li>
						  <a onclick="openMenu();">
						    <svg version="1.1" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 124 124" style="enable-background:new 0 0 124 124;" xml:space="preserve">
						      <path d="M112,6H12C5.4,6,0,11.4,0,18s5.4,12,12,12h100c6.6,0,12-5.4,12-12S118.6,6,112,6z"/>
						      <path d="M112,50H12C5.4,50,0,55.4,0,62c0,6.6,5.4,12,12,12h100c6.6,0,12-5.4,12-12C124,55.4,118.6,50,112,50z"/>
						      <path d="M112,94H12c-6.6,0-12,5.4-12,12s5.4,12,12,12h100c6.6,0,12-5.4,12-12S118.6,94,112,94z"/>
						    </svg>
						  </a>
						  <ul id="hidden" class="hidden">
						    <li><a>Item1</a></li>
						    <li><a>Item 2</a></li>
						    <li><a>item3</a></li>
						  </ul>
						</li>
					</ul>
				</div>

				<div class="inline-menu column medium-8 hide-for-small-only">
					<ul>
						<li><a href="<?php echo home_url('servicos');?>">Serviços</a></li>
						<li><a href="#">Sobre</a></li>
						<li><a href="<?php echo home_url('eventos');?>">Eventos</a></li>
						<li><a href="#">Trabalhe no Grupo</a></li>
					</ul>
				</div>
			</div>
		</header>