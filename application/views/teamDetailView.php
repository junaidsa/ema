<body>
    <div class="pt-5"></div>
<!--Details-->

        <div id="appCapsule">
            <div class="section full mt-2">
                    <div class="card-body pt-0">
                                <div class="goals">
                                    <!-- item -->
                                    <div class="item bg-dark">
                                        <div class="in">
                                            <div>
                                                <h6 class="text-light">Username</h6>
                                                <h6 class="text-light">Mobile No</h6>
                                                <h6 class="text-light">Status</h6>
                                                <h6 class="text-light">Date</h6>
                                                <h6 class="text-light">Level</h6>
                                            </div>
                                            <div class="text-end">
                                                <h6 class="price text-light">Demo</h6>
                                                <h6 class="price text-light">Demo</h6>
                                                <h6 class="price text-light">Demo</h6>
                                                <h6 class="price text-light">Demo</h6>
                                                <h6 class="price text-light">Demo</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- * item -->
                                </div>
                    </div>
            </div>
        </div>
        
            
            <!--Details-->
            
            
                   
     <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="<?php echo site_url('Dashboard')?>" class="item ">
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
        <a href="<?php echo site_url('Team')?>" class="item active">
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
     <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?php echo base_url()?>assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?php echo base_url()?>assets/js/base.js"></script>
     <!-- ========= JS Files =========  -->
      <script>
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
    </script>
</body>

</html>