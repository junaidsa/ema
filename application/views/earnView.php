
<div class=" mb-5 pb-1">
       <!-- Extra Header -->
    <div class="extraHeader pe-0 ps-0 bg-dark">
        <ul class="nav nav-tabs lined" role="tablist">
            <li class="nav-item text-light">
                <a class="nav-link active" data-bs-toggle="tab" href="#waiting" role="tab">
                    Working
                </a>
            </li>
            <li class="nav-item text-light">
                <a class="nav-link" data-bs-toggle="tab" href="#paid" role="tab">
                    Complete
                </a>
            </li>
        </ul>
    </div>
    <!-- * Extra Header -->
    
    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header-active full-height">

        <div class="section tab-content mt-2 mb-1">

            <!-- waiting tab -->
            <div class="tab-pane fade show active" id="waiting" role="tabpanel">
                <div class="goals">
                <?php 
    $userID = $_SESSION['user_id'];
    $currentDate = date('Y-m-d H:i:s');
    $qry = $this->db->query("SELECT ep.*,p.valid_days FROM ema_purchase as ep,ema_packages as p WHERE ep.pkg_name = p.packages_name AND ep.user_id = $userID AND ep.expiry_date > '$currentDate' and ep.is_expired = 0");
    $query = $qry->result();
    foreach($query as $row){
        $data = $row->pkg_name;
    
?>
                                
                                    <!-- item -->
                                        <div class="item  bg-dark">
                                            <div class="in">
                                                <div>
                                                    <h6 class="text-light text-start"><span class="badge badge-warning"><?php echo $row->pkg_name ?></span></h6>
                                                    <h6 class="text-light text-start">Invest Amount</h6>
                                                    <h6 class="text-light text-start">Starting Date</h6>
                                                    <h6 class="text-light text-start">Ending Date</h6>
                                                    <h6 class="text-light text-start">Total Return</h6>
                                                    <h6 class="text-light text-start">Status</h6>
                                                </div>
                                                <div class="text-end">
                                                    <h6 class="price text-light text-end"><span class="badge badge-warning"><?php echo $row->valid_days ?> Days</span></6>
                                                    <h6 class="price text-light"><?php echo $row->invest_amount ?></h6>
                                                    <h6 class="price text-light"><?php echo $row->entry_date; ?></h6>
                                                    <h6 class="price text-light"><?php echo $row->expiry_date ?></h6>
                                                    <h6 class="price text-light"><?php echo $row->profit_amount ?></h6>
                                                    <h6 class="price text-light">Runing</h6>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- * item -->
                                <?php } ?>
                                </div>
            </div>
            <!-- * waiting tab -->



            <!-- paid tab -->
            <div class="tab-pane fade" id="paid" role="tabpanel">
                <div class="goals">
                    <?php 
    $userID = $_SESSION['user_id'];
    $currentDate = date('Y-m-d H:i:s');
    $qry = $this->db->query("SELECT ep.*,p.valid_days FROM ema_purchase as ep,ema_packages as p WHERE ep.pkg_name = p.packages_name AND ep.user_id = $userID AND ep.is_expired = 1");
    $query = $qry->result();
    foreach($query as $row){
        $data = $row->pkg_name;
    
?>
                                    <!-- item -->
                                        <div class="item  bg-dark">
                                            <div class="in">
                                                <div>
                                                    <h6 class="text-light text-start"><span class="badge badge-warning"><?php echo $row->pkg_name ?></span></h6>
                                                    <h6 class="text-light text-start">Invest Amount</h6>
                                                    <h6 class="text-light text-start">Starting Date</h6>
                                                    <h6 class="text-light text-start">Ending Date</h6>
                                                    <h6 class="text-light text-start">Total Return</h6>
                                                    <h6 class="text-light text-start">Status</h6>
                                                </div>
                                                <div class="text-end">
                                                    <h6 class="price text-light text-end"><span class="badge badge-warning"><?php echo $row->valid_days ?> Days</span></6>
                                                    <h6 class="price text-light"><?php echo $row->invest_amount ?></h6>
                                                    <h6 class="price text-light"><?php echo $row->entry_date; ?></h6>
                                                    <h6 class="price text-light"><?php echo $row->expiry_date; ?></h6>
                                                    <h6 class="price text-light"><?php echo $row->profit_amount ?></h6>
                                                    <h6 class="price text-light">Complete</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                            
                                    <!-- * item -->
                                </div>
            </div>
            <!-- * paid tab -->

        </div>

    </div>
    <!-- * App Capsule -->

    
    
</div>




        
 
    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="<?php echo site_url('Dashboard')?>" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="<?php echo site_url('Earn')?>" class="item active">
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
    <!-- Apex Charts -->
    <script src="<?php echo base_url()?>assets/js/plugins/apexcharts/apexcharts.min.js"></script>
    <!-- Base Js File -->
    <script src="<?php echo base_url()?>assets/js/base.js"></script>

    <script>
      // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
    
    </script>
</body>

</html>