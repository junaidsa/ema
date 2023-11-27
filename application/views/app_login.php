<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title><?php echo $page_title;?></title>
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/logo.png" sizes="32x32">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/img/logo.png">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="manifest" href="<?php echo base_url()?>__manifest.json">
</head>

<body class="bg-dark">

     <!--loader -->
    <div id="loader">
        <img src="<?php echo base_url()?>assets/img/loader/loading-icon4.gif" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->
    
     <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <!--<div class="pageTitle"></div>-->
        <!--<div style="height:40px; top: 10px;" class="right btn btn-outline-warning me-1 mb-1">-->
        <!--     <a href="<?php // echo base_url().'Login/Register/index'?>" class="text-warning">Register</a>-->
           
        <!--</div>-->
    </div>
    <!-- * App Header -->
    
    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
                <h2 class="text-light">Welcome to King Profit</h2>
            <h4 class="text-light">Fill the form to Login</h4>
        </div>
        <div class="section mb-5 p-2">
<?php
if (!empty($this->session->flashdata('msg'))) {
 echo '<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">'.
                       $this->session->flashdata('msg').
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
}
 ?>
            <form action="<?php echo base_url().'Login/authenticate'?>" method="POST" id="loginFrom" name="loginFrom">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group ">
                            <div class="input-wrapper">
                                <label class="label text-warning" for="mobile">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo set_value('phone'); ?>" autocomplete="off">
                                       <i class="clear-input me-1">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <?php echo form_error('phone'); ?>

                              <div class="form-group ">
                            <div class="input-wrapper">
                                <label class="label mt-1 text-warning" for="password1">Password</label>
                                <input type="password" class="form-control" id="password" autocomplete="off"
                                    name="password">
                               <i class="eye-input">
                                    <i class="fa-regular fa-eye me-3" id="eye" onclick="toggle()"></i>
                                </i>
                            </div>
                             <?php echo form_error('password'); ?>
                            <div><a href="#" class="text-muted" style="float:right;">Forgot Password?</a></div>
                        </div>
                        <?php // echo form_error('password'); ?>
                    </div>
                </div>
                    <div class="text-center mt-1">
                        Don't have an account <a href="<?php echo base_url().'Register'?>" class="text-warning">Create Account</a>
                    </div>
                <button type="submit" class="mt-1 btn btn-warning btn-block btn-lg " name="login" id="login" value="Log in">Log in</button>

                   
                    
                    <!--<div><a href="#" class="text-muted">Forgot Password?</a></div>-->
                    
                     
                </div>

               

            </form>
        </div>

    </div>
    <!-- * App Capsule -->
<script>
    var state = false
    function toggle() {
if (state) {
    document.getElementById('password').setAttribute("type","password")
    document.getElementById("eye-toggle").setAttribute("name","eye-outline")
    state = false
    }else{
        document.getElementById('password').setAttribute("type","text")
        document.getElementById("eye-toggle").setAttribute("name","eye-off-outline")
         state = true
    }
}
</script>

    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?php echo base_url()?>assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?php echo base_url()?>assets/js/base.js"></script>

<script>
notgoback();
    function notgoback(){
     history.pushState(null, null, window.location.href);
history.back();
window.onpopstate = () => history.forward();
};
//   ################                  ########################
    var state= false;
function toggle(){
    if(state){
	document.getElementById("password").setAttribute("type","password");
	document.getElementById("eye").style.color='#7a797e';
	state = false;
     }
     else{
	document.getElementById("password").setAttribute("type","text");
	document.getElementById("eye").style.color='#FFB000';
	state = true;
     }
}

</script>
</body>

</html>