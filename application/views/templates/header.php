<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Nuomok.lt</title>
	<meta name="description" content="Nuomok.lt">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Navigacija</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php
					if(($this->session->userdata('user_id')!="")){
						echo "<a class='navbar-brand' href=",base_url().'Shopping_cart/index',">Nuomok.lt</a>";
					} else {
						echo "<a class='navbar-brand' href=",base_url().'user/index',">Nuomok.lt</a>";
					}
					?>
					
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href='<?php echo base_url()."user/apie"; ?>'>Apie mus</a></li>
							<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kategorijos <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
							<li><a href='<?php echo base_url()."Shopping_cart/automobiliai"; ?>'>Automobiliai</a></li>
							<li><a href='<?php echo base_url()."Shopping_cart/dronai"; ?>'>Dronai</a></li>
							<li><a href='<?php echo base_url()."Shopping_cart/irankiai"; ?>'>Įrankiai</a></li>
							<li><a href='<?php echo base_url()."Shopping_cart/motociklai"; ?>'>Motociklai</a></li>
							<li><a href='<?php echo base_url()."Shopping_cart/vaikams"; ?>'>Vaikams</a></li>
							<li><a href='<?php echo base_url()."Shopping_cart/sportas"; ?>'>Sportas</a></li>
							<li><a href='<?php echo base_url()."Shopping_cart/ivairus"; ?>'>Įvairūs</a></li>
							<li><a href='<?php echo base_url()."Shopping_cart/konsoles"; ?>'>Žaidimų konsolės</a></li>
							</ul>
							<li><a href='<?php echo base_url()."user/naujienos"; ?>'>Naujienos</a></li>
							<li><a href='<?php echo base_url()."user/kontaktai"; ?>'>Kontaktai</a></li>
							
							<?php
							if(($this->session->userdata('user_id')!="")){
								echo "<li><a href=",base_url().'user/useris',">",$this->session->userdata('user_name'),"</a></li>";
							}
							?>
							
							<?php
							if(($this->session->userdata('user_id')=="1")){
								echo "<li><a href=",base_url().'user/admin',">Valdymo pultas</a></li>";
							}
							?>
							
						</li>
					</ul>	
			<div class="navbar-brand navbar-right">
				<ul class="nav navbar-nav">

				
					
				<li><form action="<?php echo site_url('Shopping_cart/search');?>" method = "post">
					<input type="text" name = "keyword" size="10" />
					<input type="submit" value = "Ieškoti" />
					</form>
				</li>
				
				<?php
				$this->load->helper('directory');
				$usr = $this->session->userdata('user_name');
				$filename = "myassets/user_photo/"."$usr".".jpg";
				$dir = "myassets/user_photo/";
				if (file_exists($filename)) {
					echo '<img src="',base_url($dir).'/'.$usr.'" height="32" width="32">';
				} else {
					echo "";
				}
				?>
	
				<?php
				if(($this->session->userdata('user_id')!="")){
					echo  "<b>", $this->session->userdata('user_name'),"</b>","       ", anchor('user/logout', 'Atsijungti');
					} else {
					 echo "<a href=",base_url().'user/loging',">Prisijungimas</a>";
					} ?>
					</div>
				
				</ul>
			</div>
		</div>
	</nav>
		</div>		
		
			<div id="carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel" data-slide-to="0" class="active"></li>
					<li data-target="#carousel" data-slide-to="1"></li>
					<li data-target="#carousel" data-slide-to="2"></li>
					<li data-target="#carousel" data-slide-to="3"></li>
				</ol>
				
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src='<?php echo base_url()."myassets/images/1.jpg" ?> '>
						<div class="carousel-caption">
							<a href='<?php echo base_url()."Shopping_cart/konsoles"; ?>'><h1>Žaidimų konsolės</h1></a>
							<h5><i></i></h5>
						</div>
					</div>
					
					<div class="item">
						<img src='<?php echo base_url()."myassets/images/2.jpg" ?> '>
							<div class="carousel-caption">
							<a href='<?php echo base_url()."Shopping_cart/automobiliai"; ?>'><h1>Automobiliai</h1></a>
							<h10><i>Patikrinti automobiliai lengvam susiekimui!</i></h10>
						</div>
					</div>
					
					<div class="item">
						<img src='<?php echo base_url()."myassets/images/34.jpg" ?> '>
						<div class="carousel-caption">
							<a href='<?php echo base_url()."Shopping_cart/sportas"; ?>'><h1>Sportas</h1></a>
							<h4><i>Sporto atributika</i></h4>
						</div>
					</div>
					
					<div class="item">
						<img src='<?php echo base_url()."myassets/images/41.jpg" ?> '>
						<div class="carousel-caption">
							<a href='<?php echo base_url()."Shopping_cart/dronai"; ?>'><h1>Dronai</h1></a>
							<h4><font color="black"><i>Skraidykite su dronais!</i></h4></font>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Ankstesnis</span>
				</a>
				<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Sekantis</span>
				</a>
			</div>
	</header>
	
	</br>