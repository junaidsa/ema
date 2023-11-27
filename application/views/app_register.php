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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="manifest" href="<?php echo base_url() ?>__manifest.json">
</head>

<body class="bg-dark">

    <!-- loader -->
    <div id="loader">
        <img src="<?php echo base_url()?>assets/img/loader/loading-icon4.gif" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <!--<div class="pageTitle"></div>-->
        <!--<div style="height:40px; top: 10px;" class="right btn btn-outline-warning me-1 mb-1">-->
        <!--    <a href="<?php echo base_url('Login')?>" class="headerButton">-->
        <!--        Login-->
        <!--    </a>-->
        <!--</div>-->
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" style="padding: 25px 0;">

        <div class="section mt-1 text-center">
            <h2 class="text-light">Welcome to King Profit</h2>
            <h4 class="text-light">Create an account</h4>
        </div>
        <div class="section p-2">
            <?php 
            if (!empty($this->session->flashdata('msg'))) {
    # code...
   echo '<div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">'.
                       $this->session->flashdata('msg').
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
}
 ?>
            <form action="<?php echo base_url('Login/Register')?>" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-wrapper">
                                <label class="label" for="email1">Full Name</label>
                                <input type="text" class="form-control mb-1 <?php echo (form_error('full_name') != '') ? 'is-invalid' : ''; ?>" name="full_name" placeholder="Full Name..." value="<?php echo set_value('full_name');?>">
                                <i class="clear-input me-1">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                                	<?php echo form_error('full_name'); ?>
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-wrapper">
                                <label class="label" for="email1">Mobile</label>
                                <input type="text" class="form-control mb-1" id="phone" name="phone" placeholder="Mobile#..." value="<?php echo set_value('phone');?>">
                                <i class="clear-input me-1">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                                <?php echo form_error('phone'); ?>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="input-wrapper">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control mb-1" id="password" name="password" autocomplete="off"
                                    placeholder="Your password">
                                      <i class="eye-input">
                                 <i class="fa-regular fa-eye me-3" id="eyeicon1"></i>
                                </i>
                            </div>
                                <?php echo form_error('password'); ?>
                        </div>
                        <div class="form-group ">
                            <div class="input-wrapper">
                                <label class="label" for="conform_password">Confirm Password</label>
                                <input type="password" class="form-control mb-1" id="confirm_password" name="confirm_password" autocomplete="off"
                                    placeholder="Conform password">
                                      <i class="eye-input">
                                 <i class="fa-regular fa-eye me-3" id="eyeicon2" onclick="eyeicon2()"></i>
                                </i>
                            </div>
                                <?php echo form_error('confirm_password'); ?>
                        </div>
                        <div class="form-group ">
                            <div class="input-wrapper">
                                
                                <label class="label">Refrence Code (optional)</label>
                                
                                <?php 
                                $readonly = 0;
                                if($this->uri->segment('3') == ''){
                                $reference = '';
                                $readonly = '';
                                }else{
                                $reference = $this->uri->segment('3');
                                $readonly = 'readonly';
                                }
?>
                                <input type="number" class="form-control mb-1" name="refrence_code" id="refrence_code" value="<?php echo $reference,set_value('refrence_code') ?>" autocomplete="off" <?php echo $readonly ?>>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <span id="mobile_result"></span> 
                        </div>
                        	<input type="hidden" name="refral_code" id="refral_code">
                    </div>
                </div>

                    <div class="text-center mt-1">
                        Already have an account <a href="<?php echo base_url().'Login'?>" class="text-warning">Log in</a>
                    </div>

                    <button type="submit" class="mt-1 btn btn-warning btn-block btn-lg" id="reg_submit">Register</button>
                

            </form>
        </div>

    </div>
    <!-- * App Capsule -->
    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?php echo base_url() ?>assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?php echo base_url() ?>assets/js/base.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
var reg_id = 0;

$(document).ready(function(){  
     
     
      $('#refrence_code').keyup(function(){  
          var refrence_code = $('#refrence_code').val();
          if(refrence_code != '')  
          {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Login/check_reference_varification",  
                     method:"POST",  
                     data:{refrence_code:refrence_code}, 
                     dataType:'json',
                     success:function(result){  
                         var html = '';
                         if(result.length > 0){
                             $.each(result,function(index,data){
                            reg_id = data['id'];
                         });
                         }else{
                             reg_id = 0;
                         }
                         if(reg_id != 0){
                              html = '<label class="text-success">Reference  is available</label>';
                              document.getElementById("reg_submit").disabled = false;
                         }else{
                              html = '<label class="text-danger">Not Fount</label>';
                             document.getElementById("reg_submit").disabled = true;
                         }
                         $('#mobile_result').html(html); 
                     },
                     error:function(){
                       alert('not Works')
                     }
                });  
          }else{
               document.getElementById("reg_submit").disabled = false;
                 html = '<label class="text-danger"></label>';
          }
             $('#mobile_result').html(html); 
      });  
      
 });
	refralNo();
// 	display password and hide password
	let eyeicon1 = document.getElementById("eyeicon1");
	let password = document.getElementById("password");
	eyeicon1.onclick = function(){
	    if(password.type == "password"){
	        password.type = "text";
	        password.type = "text";
	    }else{
	        password.type = "password";
	    }
	}
	
// 	display confirm password and hide confirm password
function eyeicon2() {
  var y = document.getElementById("confirm_password");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}
	
	
// var state= false;
// function toggle(){
//     if(state){
// 	document.getElementById("password").setAttribute("type","password");
// 	document.getElementById("eye1").style.color='#7a797e';
// 	state = false;
//      }
//      else{
// 	document.getElementById("confirm_password").setAttribute("type","text");
// 	document.getElementById("eye1").style.color='#FFB000';
// 	state = true;
//      }
// }
  function refralNo() {
            var randomCharacter = [Math.floor(1000+ Math.random() *10000000)]
            document.getElementById("refral_code").value = randomCharacter;
        }
</script>
</body>

</html>