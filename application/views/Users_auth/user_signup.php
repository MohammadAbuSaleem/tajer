<style type="text/css">
	@import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700);
body {
    background-color: #f9f9f9 !important;
    font-family: 'Open Sans', sans-serif!important;
    font-size:11px;
}
.well{
    background-color:#fff!important;
    border-radius:0!important;
    border:black solid 1px;
}

.well.login-box {
    /*width:400px; */
    border:#d1d1d1 solid 1px;
    margin:0 auto;
    margin-top:30px;
}
.well.login-box legend {
  font-size:26px;
  text-align:center;
  font-weight:300;
}
.well.login-box label {
  font-weight:300;
  font-size:13px;
  
}
.well.login-box input[type="text"] {
  box-shadow:none;
  border-color:#ddd;
  border-radius:0;
}

.well.welcome-text{
    font-size:21px;
}

/* Notifications */

.notification{
    position:fixed;
    top: 20px;
    right:0;
    background-color:#FF4136;
    padding: 20px;
    color: #fff;
    font-size:21px;
    display:none;
}
.notification-success{
  background-color:#3D9970;
}

.notification-show{
    display:block!important;
}
.alert {
   height: :30px;    
}
/*Loged in*/
.btn-default {
    color: #333;
    background-color: #f9f9f9;
    border-color: #ccc;
    border: 1px solid;
    text-align: center;
    cursor: pointer;
    color: #5e5e5e;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #fefefe), color-stop(100%, #f9f9f9)), #f9f9f9;
    background: -moz-linear-gradient(#fefefe, #f9f9f9), #f9f9f9;
    background: -webkit-linear-gradient(#fefefe, #f9f9f9), #f9f9f9;
    background: linear-gradient(#fefefe, #f9f9f9), #f9f9f9;
    border-color: #c3c3c3 #c3c3c3 #bebebe;
    -moz-box-shadow: rgba(0, 0, 0, 0.06) 0 1px 0, rgba(255, 255, 255, 0.1) 0 1px 0 0 inset;
    -webkit-box-shadow: rgba(0, 0, 0, 0.06) 0 1px 0, rgba(255, 255, 255, 0.1) 0 1px 0 0 inset;
    box-shadow: rgba(0, 0, 0, 0.06) 0 1px 0, rgba(255, 255, 255, 0.1) 0 1px 0 0 inset;
}
  </style>
	<div class="container">
		<div class="row">
			<div class='col-md-3'></div>
			<div class="col-md-6">
				<div class="login-box well">
						<div class="row">
							<div class='col-md-1'></div>
							<div class="col-md-10 ">
									<div class="main">
										<h3>Please Fill up the form to sign up</h3>		
										<h4> or You can <a href="<?=base_url();?>index.php/user_login_controller">Login</a></h4>
										  <?php if (isset($status) && $status == 0){?>
										  	<span style='color :red'>The Username Already Exists!</span>
										  <?php } ?>															
										  <form action="<?php echo site_url('user_login_controller/validate_signup') ?>" method="post" id="login_form">										  												
											<div class="form-group">
												<label for="Username">Username</label>
												<span style='color :red'> <?php echo form_error('username');?></span>
												<input type="text"  autocomplete="username" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo set_value('username'); ?>" />
											</div>
											<div class="form-group">
												<label for="Email">Email</label>
												<span style='color :red'> <?php echo form_error('email');?></span>
												<input type="text"  autocomplete="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>" />
											</div>
											<div class="form-group">
												<?php echo form_error('full_name');?>
												<label for="full_name">Full Name</label>
												<span style='color :red'> <?php echo form_error('full_name');?></span>
												<input type="text"  autocomplete="full_name" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo set_value('full_name'); ?>" />
											</div>
											<div class="form-group">
												<label for="Phone">Phone Number</label>
												<span style='color :red'> <?php echo form_error('phone');?></span>
												<input type="text"  autocomplete="phone" class="form-control" name="phone" id="phone" placeholder="Phone Numner" value="<?php echo set_value('phone'); ?>"/>
											</div>
											<div class="form-group">												
												<label for="password">Password</label>
												<span style='color :red'> <?php echo form_error('password');?></span>
												<input type="password"  class="form-control" name="password" id="password" placeholder="Password" />
											</div>
											<div class="form-group">												
												<label for="password_confirm">Password Confirmation</label>
												<span style='color :red'> <?php echo form_error('password_confirm');?></span>
												<input type="password"  class="form-control" name="password_confirm" id="password_confirm" placeholder="Password Confirm" />
											</div>	
											<div class= 'text-center'>
												<button value="send" class="btn">Sign Up</button>
											</div>
										</form>
									</div>
							</div>
						</div>
				</div>
			<div class='col-md-3'></div>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-md-12'>&nbsp;</div>
	</div>