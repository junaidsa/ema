<!-- App Capsule -->
    <div id="appCapsule" class="mt-5 pt-1">
                        <?php 
                            $user_id = $_SESSION['user_id'];
                                $qry = $this->db->query("SELECT balance FROM `ema_user` WHERE id = $user_id");
                                $res =  $qry->result();
                                foreach($res as $row){
                                    $amount = $row->balance;
                                }
                        ?>

        <div class="section">
            <div class="row">
                <div class="col-md-4 mt-2">
                    <div class="stat-box bg-dark">
                        <div class="title text-light">Total Balance</div>
                        <div class="value text-light">Rs. <span id="total_balance"><?php echo number_format((float)$amount, 2, '.', ''); ?></span></div>
                    </div>
                </div>
                 <?php 
                                $qry = $this->db->query("SELECT SUM(invest_amount) AS TotalInvest FROM `ema_purchase` WHERE user_id = $user_id");
                                $res =  $qry->result();
                                foreach($res as $row){
                                    $TotalInvest = $row->TotalInvest;
                                }
                        ?>
                <div class="col-md-4 mt-2">
                    <div class="stat-box bg-dark">
                        <div class="title text-light">Total Invesment</div>
                        <div class="value text-light">Rs.&nbsp;<?php echo number_format((float)$TotalInvest, 2, '.', ''); ?></div>
                    </div>
                </div>
                   <?php 
                                $qry = $this->db->query("SELECT SUM(amount) AS totalWidrow FROM `ema_transaction` WHERE type_transaction = 1 AND user_id = $user_id AND is_deleted = 0");
                                $res =  $qry->result();
                                foreach($res as $row){
                                    $totalWidrow = $row->totalWidrow;
                                }
                        ?>
                <div class="col-md-4 mt-2">
                    <div class="stat-box bg-dark">
                        <div class="title text-light">Total Withdraw</div>
                        <div class="value text-light">Rs. <?php echo number_format((float)$totalWidrow, 2, '.', ''); ?></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="listview-title mt-1">Profile Settings</div>
        <ul class="listview image-listview text inset bg-dark">
            <li>
                <a href="#" class="item">
                    <div class="in text-light">
                        <div>Password</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('Settings/help')?>" class="item">
                    <div class="in text-light">
                        <div>Earning help</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('Settings/aboutus')?>" class="item">
                    <div class="in text-light">
                        <div>About Us</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('Bank')?>" class="item">
                    <div class="in text-light">
                        <div>Add Account</div>
                       
                    </div>
                </a>
            </li>
           
        </ul>

        <div class="listview-title mt-1">Security</div>
        <ul class="listview image-listview text mb-2 inset  bg-dark">
            <!--<li>-->
            <!--    <a href="#" class="item">-->
            <!--        <div class="in">-->
            <!--            <div>Update Password</div>-->
            <!--        </div>-->
            <!--    </a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <div class="item">-->
            <!--        <div class="in">-->
            <!--            <div>-->
            <!--                2 Step Verification-->
            <!--            </div>-->
            <!--            <div class="form-check form-switch ms-2">-->
            <!--                <input class="form-check-input" type="checkbox" id="SwitchCheckDefault3" checked />-->
            <!--                <label class="form-check-label" for="SwitchCheckDefault3"></label>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</li>-->
            <li>
                <a href="<?php echo site_url('Login/logout')?>" class="item">
                    <div class="in text-light">
                        <div>Log out</div>
                    </div>
                </a>
            </li>
        </ul>

    </div>
    <div class="mb-5 pt-2 "></div>
    <!-- * App Capsule -->
    
     <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="<?php echo site_url('Dashboard')?>" class="item">
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
        <a href="<?php echo base_url('Settings')?>" class="item active">
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
    <script src="<?php echo base_url()?>assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Splide -->
    <script src="<?php echo base_url()?>assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?php echo base_url()?>assets/js/base.js"></script>
<script>
     AddtoHome("2000", "once");
</script>
</body>

</html>