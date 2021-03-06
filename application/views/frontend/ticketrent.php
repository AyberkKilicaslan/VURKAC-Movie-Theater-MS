<!DOCTYPE html>


<html lang="en" class="no-js">
<head>

	<!-- Basic need -->
	<?php $customer=$this->session->userdata('user'); ?>
	<title>Reserve Ticket</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600'>
	<!-- Mobile specific meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/plugins.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/theater.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/button.css'); ?>">
	<script> 
		let btn = document.querySelector("button");

		btn.addEventListener("click", active);

		function active() {
		btn.classList.toggle("is_active");
}
	</script>
</head>
<body>
<div id="preloader">
    <img class="logo" src= "<?php echo base_url('assets\front'); ?> \images\logo.png" alt="">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form method="post" action= "<?php echo base_url('useractivities/login')?>">
        	<div class="row">
        		 <label for="email">
                    E-mail:
                    <input type="text" name="email" id="email" placeholder=""  required="required">
                </label>
        	</div>
           
            <div class="row">
            	<label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder=""  required="required">
                </label>
            </div>
           
           <div class="row">
           	 <button  type="submit">Login</button>
           </div>
        </form>
        
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper" id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="post" action="<?php echo base_url('useractivities/register')?>">
            <div class="row">
                 <label for="username-2">
                    Full Name:
                    <input type="text" name="username" id="username-2" placeholder=""required="required">
                </label>
            </div>
           
            <div class="row">
                <label for="email-2">
                    your email:
                    <input type="email" name="email" id="email-2" placeholder="" required="required">
                </label>
            </div>
             <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password" id="password-2" placeholder=""  required="required">
                </label>
            </div>
             
           <div class="row">
             <button type="submit">sign up</button>
           </div>
        </form>
    </div>
</div>
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">

	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="<?php echo base_url(''); ?>"><img class="logo" src= " <?php echo base_url('assets\front'); ?> \images\logo1.png" alt=""></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
					
						<li class="dropdown first">
							<a href= "<?php echo site_url(''); ?>" class="btn btn-default lv1" >
							Home 
							</a>
							
						</li>
						<li class="dropdown first">
							<a href= "<?php echo site_url('movies'); ?>" class="btn btn-default lv1" >
							movies
							</a>
							
						</li>
						
					</ul>
					<?php if($this->session->userdata('durum')){?>
						
						<ul class="nav navbar-nav flex-child-menu menu-right">
						<li> <a class="btn btn-default"> <?php echo $customer->name ?></a></li>
						<li class="btn"><a href="<?php echo base_url('useractivities/logout');?>">log out</a></li>
						</ul>
						<?php }
					else{ ?>
					
						<ul class="nav navbar-nav flex-child-menu menu-right">
						<li class="loginLink"><a href="#">LOG In</a></li>
						<li class="btn signupLink"><a href="#">sign up</a></li>
						</ul>
					<?php } ?>
					
					
				</div>
	    </nav>
	    
	  
	</div>
</header>
<!-- END | Header -->

<div class="hero mv-single-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
		
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<div class="movie-btn">	
						
						<div class="btn-transform transform-vertical">
							<div><a style="cursor:crosshair;"  class="item item-1 yellowbtn">  Reserve Ticket</a></div>
							<div><a style="cursor:crosshair;"  class="item item-2 yellowbtn">Reserve Ticket</a></div>
						</div>
						
					</div>
				</div>
			</div>
			
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
				<?php $query = $this->db->select('name')->from('movie')->where('id',$movie_id)->get()->row(); 
				if(isset($query))
				{?>
					<h1 class="bd-hd"><?php echo $query->name?> <span> Session Date : <?php echo $session_date?></span></h1>
				<?php }
				
				?>
					<div class="movie-rate damn">
						<div class="rate">
							
							<p><span>Time : <?php echo $session_time?></span><br>
							</p>
						</div>
						
					</div>
					
				</div>
			</div>


			<?php if($this->session->userdata('durum')){?>			
			<form action= <?php echo base_url('useractivities/ticketReserve')?> method="post">
				<div class="col-md-2 col-sm-12 col-xs-12">
						<div class="form-group input-group">
							<select id="theater-option"  class="form-control" name="seatid">
							<?php 
							$session_query =  $this->db->query("SELECT * FROM seat where session_id=$id and isFull=0;");
							
							foreach ($session_query->result_array() as $seat)
							{?>
								<option value="<?php echo $seat['id'] ?>" > <?php echo $seat['seat_no']?> </option>
							<?php } ?>
							  
							</select>
							
						</div> 
						<div class="wrapper">
						<button class="btn-hover color-1" type="submit">Reserve Now</button>
						</div>
						<!--<div><button style="width:100%;"type="submit">Reserve Now !</button></div>  -->
							
							
						
				</div>	
			</form>
			<?php }
			else{ ?>
			<form action= <?php echo base_url('useractivities/ticketReserve')?> method="post">
				<div class="col-md-2 col-sm-12 col-xs-12 arif">
						<div class="form-group input-group">
							<select id="theater-option"  class="form-control" name="seatid" disabled>
							<?php 
							$session_query =  $this->db->query("SELECT * FROM seat where session_id=$id and isFull=0;");
							
							foreach ($session_query->result_array() as $seat)
							{?>
								<option value="<?php echo $seat['id'] ?>" > <?php echo $seat['seat_no']?> </option>
							<?php } ?>
							  
							</select>
							
						</div> 
						
				
						
						<button class="btn-hover color-1" type="submit" disabled>Reserve Now</button>
							
						
				</div>	
			</form>
			<?php } ?>

			<div class="col-md-12 col-sm-12 col-xs-12">
			<br> </br>
				<div class="seatStructure">
					<br><br/>
					<td colspan="14">
							<div class="screen">SCREEN</div>
						</td>
					<table id="seatsBlock">
						<p id="notification"></p>
						<tr>
						
						

						<br/>
						</tr>

						<tr>
						<td></td>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
						<td>5</td>
						</tr>

						<tr>
						<td>A</td>
						<?php 
						
						$query = $this->db->query("SELECT * FROM seat where seat_no LIKE 'A%' and session_id = $id ;"); 
						foreach ($query->result_array() as $seat){
							
							if($seat['isFull'] == 1)
							{?>
								<td > <input type="checkbox"  class="seats1"  value="<?php echo $seat['seat_no'] ?>" disabled checked></td>
							<?php }
							
							else
							{ ?>
								<td><input type="checkbox" class="seats" value="<?php echo $seat['seat_no'] ?>" disabled></td>
							<?php } ?>
							
							
							
							
							
						<?php } ?>
						</tr>

						<tr>
						<td>B</td>
						<?php 
						
						$query = $this->db->query("SELECT * FROM seat where seat_no LIKE 'B%' and session_id = $id ;"); 
						foreach ($query->result_array() as $seat){
							
							if($seat['isFull'] == 1)
							{?>
								<td > <input type="checkbox"  class="seats1"  value="<?php echo $seat['seat_no'] ?>" disabled checked></td>
							<?php }
							
							else
							{ ?>
								<td><input type="checkbox" class="seats" value="<?php echo $seat['seat_no'] ?>" disabled></td>
							<?php } ?>
							
							
							
							
							
						<?php } ?>
						</tr>

					</table>
				
						<td rowspan="20">
								<div class="smallBox redBox">Reserved Seat</div><br />
								<div class="smallBox emptyBox">Empty Seat</div><br />
						</td><br></br>
				

			</div>
		</div>
	</div>
</div>
<!-- end of footer section-->

<script src="<?php echo base_url('assets\front\js\jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets\front\js\plugins.js'); ?>"></script>
<script src="<?php echo base_url('assets\front\js\plugins2.js'); ?>"></script>
<script src="<?php echo base_url('assets\front\js\custom.js'); ?>"></script>
<script src="<?php echo base_url('assets\front\grit\jquery.gritter.js'); ?>"></script>
</body>
</html>