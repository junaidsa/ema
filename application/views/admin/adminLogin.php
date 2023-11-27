<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.png" sizes="32x32" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>King Profit | Admin</title>
    <style>
    .btn-color{
  background-color: #0e1c36;
  color: #fff;
  
}

.profile-image-pic{
  height: 100px;
  width: 100px;
  object-fit: cover;
}



.cardbody-color{
  background-color: #ebc46c;
  height: 450px;
  border: 2px solid #ebc46c;
  border-radius: 5px;
}

a{
  text-decoration: none;
}
    </style>

  </head>
  <body>
    <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 offset-md-3 mt-5">
          <form class="card-body cardbody-color p-lg-5" action="<?php echo base_url().'admin/AdminLogin/authenticate'?>" method="POST">
            <?php
									if (!empty($this->session->flashdata('msg'))) {
										# code...
										echo "<div class='alert alert-primary' role='alert'>".$this->session->flashdata('msg')."</div>";
									}
									 ?>
            <div class="text-center">
                <h2 class="text-center text-light ">Admin Login</h2>
								<!-- admin_assets/dist/img/login_img.png -->
              <img src="<?php echo base_url().'admin_assets/dist/img/login_img.png'?>" class="img-fluid profile-image-pic img-thumbnail my-3"
                 alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
                placeholder="User Name">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            <div class="text-center"><button type="submit" class="btn btn-warning px-5 mb-5 w-100">Login</button></div>
            
          </form>
        </div>

      </div>
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
  </body>
</html>
