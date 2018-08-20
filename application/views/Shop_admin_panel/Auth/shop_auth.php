
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Tajer - Shop login</title>        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" />
    </head>
    <body>
        <!--hero section-->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-8 mx-auto">
                        <div class="card border-none">
                            <div class="card-body">
                                <div class="mt-2">
                                    <img src="<?=base_url()?>/assets/images/logo.png" alt="logo" class="brand-logo mx-auto d-block img-fluid"/>
                                </div>
                                <p class="mt-4 text-white lead text-center">
                                    Sign in to access your Authority account
                                </p>
                                <div id="infoMessage">
                                    <?php 
                                    if(!empty($this->session->flashdata('error_message')))
                                    {
                                        echo $this->session->flashdata('error_message');
                                    }
                                    ?>
                                </div>
                                <div class="mt-4">
                                      <?php echo form_open("shop_admin_login_controller/validate");?>
                                        <div class="form-group">             
                                            <?php 
                                                $identity_att = array(
                                                                    'type'=>'text', 
                                                                    'id'  => 'login',
                                                                    'name'  => 'login',
                                                                    'class'=>'form-control',
                                                                    'placeholder' =>'Enter email address'
                                                                  );
                                                echo form_input($identity_att);?>
                                        </div>
                                        <br>
                                        <div class="form-group">                   
                                            <?php 
                                                $pass_att = array(
                                                                    'type'=>'password', 
                                                                    'id'  => 'password',
                                                                    'name'  => 'password',
                                                                    'class'=>'form-control',
                                                                    'placeholder' =>'Enter password'
                                                                  );
                                                echo form_input($pass_att);?>
                                        </div>
                                        <br>
                                        <label class="custom-control custom-checkbox mt-2">
                                            <input type="checkbox" class="custom-control-input" name="remember" value ='1' id="remember" >
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description text-white">Keep me logged in</span>
                                        </label>

                                          <?php 
                                          $btn_att = array('class'=>'btn btn-primary  float-right',);
                                          echo form_submit('submit', 'Login' , $btn_att);?>                                        
                                      <?php echo form_close();?>
                                      
                                      <p><a href="forgot_password"><?php echo 'Forget your Password ?';?></a></p>                                    
                                </div>                                
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </section>
    </body>
</html>
