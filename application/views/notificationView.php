<body>
    <div class="mt-5 pt-1"></div>
            <div id="appCapsule">
                <div class="section mt-2 mb-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="p-1">
                                <div class="text-center">
                                    <h1 class="text-warning">السلام علیکم</h1>
                                    <ul dir="auto" type="1" class="text-end text-light">
                                        <li>ہماری کمپنی کے دس پیکجز ہیں آپ ان میں سے کسی ایک میں انویسٹمنٹ کرکے متعین مدت میں اپنے پرافٹ سمیت کیپیٹل رقم بھی واپس نکال سکتے ہیں ۔</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
     
    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="<?php echo site_url('Dashboard')?>" class="item active">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="<?php echo site_url('Earn')?>" class="item">
            <div class="col">
                <ion-icon name="layers-outline"></ion-icon>
                <strong>My Plan</strong>
            </div>
        </a>
        <a href="<?php echo site_url('Team')?>" class="item">
            <div class="col">
               <ion-icon name="people-outline"></ion-icon>
                <strong>Team</strong>
            </div>
        </a>
        <a href="<?php echo base_url('Settings')?>" class="item">
            <div class="col">
             <ion-icon name="person-outline"></ion-icon>
                <strong>Me</strong>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->
    
    <!-- *******************/////////////////*******************-->
    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?php echo base_url()?>assets/js/plugins/splide/splide.min.js"></script>
    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Base Js File -->
    <script src="<?php echo base_url()?>assets/js/base.js"></script>
    
    <script>
        // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
    </script>
    
    </body>