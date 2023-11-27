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
                                    <?php 
                                                $user_id = $_SESSION['user_id'];
                                                $qry = $this->db->query("SELECT t.id,t.amount,t.is_approved,t.created_on,b.bank_name,b.image,b.account_number,ba.account_title FROM `ema_transaction` AS t,ema_bank AS b,ema_bank_account AS ba WHERE b.id=t.bank_id AND t.is_deleted=0 AND t.user_id = $user_id and t.type_transaction = 1;");
                                                $res = $qry->result();
                                                foreach($res as $row) {
                                                ?>
                           
                                    <!-- item -->
                                    <div class="item bg-dark">
                                        
                                        <div class="in">
                                            <div>
                                                <h6 class="text-light">Account Title</h6>
                                                <h6 class="text-light">Bank Name</h6>
                                                <h6 class="text-light">Account No#</h6>
                                                <h6 class="text-light">Amount</h6>
                                                <h6 class="text-light">Date</h6>
                                                <h6 class="text-light">Status</h6>
                                                
                                            </div>
                                            <div class="text-end">
                                                <h6 class="price text-light"><?php echo $row->account_title;?></h6>
                                                <h6 class="price text-light"><?php echo $row->bank_name?></h6>
                                                <h6 class="price text-light"><?php echo $row->account_number?></h6>
                                                <h6 class="price text-light">Rs.<?php echo $row->amount?></h6>
                                                <h6 class="price text-light"><?php echo $row->created_on;?></h6>
                                                <h6 class="price text-light">
                                                    <?php 
                                                        if($row->is_approved==0){ ?>
                                                            <h6 class="price text-danger"> Pendding</h6>
                                                            
                                                        <?php }else if($row->is_approved==1) { ?>
                                                        
                                                            <h6 class="price text-success"> Approved</h6>
                                                        <?php }else{ ?>
                                                            <h6 class="price text-warning"> Decline</h6>
                                                        <?php } ?>
                                                </h6>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- * item -->
                                    <?php } ?>
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