<div id="appCapsule">
     <!-- Transactions -->
        <div class="mt-3 mb-2 pb-1 ">
            <div class="section-title"></div>
              <!-- carousel multiple -->
         <div class="section mb-5">
            <div class="section full mt-3 mb-5">
             <div class="card">
                    <div class="card-body">
                                <div class="goals">
                                   
                                    <!-- item -->
                                    <div class="item bg-dark">
                                        
                                                   <?php 
                                                   $user_id = $_SESSION['user_id'];
                                                    $qry = $this->db->query("SELECT * FROM `recharge_request` WHERE user_id = $user_id AND is_deleted = 0");
                                                    $res = $qry->result();
                                                    foreach($res as $row) {
                                                    ?>
                                        <div class="in">
                                                 
                                            <div>
                                                <h6 class="text-light">Holder Name</h6>
                                                <h6 class="text-light">Account No#</h6>
                                                <h6 class="text-light">Transaction No#</h6>
                                                <h6 class="text-light">Amount</h6>
                                                <h6 class="text-light">Date</h6>
                                                <h6 class="text-light">Status</h6>
                                                
                                            </div>
                                            <div class="text-end">
                                                <h6 class="text-light"><?php echo $row->account_holder?></h6>
                                                <h6 class="text-light"><?php echo $row->account_number?></h6>
                                                <h6 class="text-light"><?php echo $row->transaction_id?></h6>
                                                <h6 class="text-light"><?php echo $row->amount?></h6>
                                                <h6 class="text-light"><?php echo $row->created_on?></h6>
                                                  <?php 
                          $is_approve = 0;
                          if($row->is_approve == 0){
                              $is_approve= '<span class="right badge badge-danger">Pending</span>';
                          }else if($row->is_approve == 1){
                                $is_approve= '<span class="right badge badge-success">Approved</span>';
                          }else{
                                 $is_approve= '<span class="right badge badge-warning">Decline</span>';   
                          }
                          
                          ?>
                                                <h6 class="text-light"><?php echo $is_approve?></h6>
                                            </div>
                                        </div>
                                        <?php }    ?>
                                    </div>
                                    <!-- * item -->
                                </div>
                    </div>
            </div>
        </div>
        </div>
        </div>
        <!-- * Transactions -->
        
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