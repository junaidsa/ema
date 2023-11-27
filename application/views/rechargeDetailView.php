<!-- App Capsule -->
    <div id="appCapsule" class="full-height bg-white mt-5">

        <div class="section mt-5 mb-1">


            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="iconbox">
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </div>
                </div>
                <h3 class="text-center mt-2">Payment Sent</h3>
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>Status</strong>
                    <span class="text-success">Success</span>
                </li>
                <li>
                    <strong>To</strong>
                    <span>Jordi Santiago</span>
                </li>
                <li>
                    <strong>Bank Name</strong>
                    <span>Envato Bank</span>
                </li>
                <li>
                    <strong>Transaction Category</strong>
                    <span>Shopping</span>
                </li>
                <li>
                    <strong>Receipt</strong>
                    <span>Yes</span>
                </li>
                <li>
                    <strong>Date</strong>
                    <span>Sep 25, 2020 10:45 AM</span>
                </li>
                <li>
                    <strong>Amount</strong>
                    <h3 class="m-0">$ 24</h3>
                </li>
            </ul>


        </div>

    </div>
    <!-- * App Capsule -->
    
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
    
    <?php // $this->load->view('compound/footer'); ?>
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

</body>

</html>