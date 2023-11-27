<body>

<div id="appCapsule">
    <div class="section  full mt-5">
        <div class="section full ">
            <!--Image-->
                    <div class="section  text-center">
                            <!-- Wallet Footer -->
                             <?php
                                    $count = 1;
                                        $user_id = $_SESSION['user_id'];
                                            $qry = $this->db->query("SELECT refral_no,full_name FROM `ema_user` WHERE id = $user_id");
                                            $res =  $qry->result();
                                            foreach($res as $row){
                                              $refral_code =  $row->refral_no;
                                              $full_name =  $row->full_name;
                                            }
                                            
                                            
                                    ?>
                    </div>
                <!-- * Wallet Footer --> 
                
                <div class="section">
                    <div class="row">
                        <div class="col-6 col-md-6 mt-1">
                            <div class="stat-box bg-dark">
                                <div class="title text-light">Total Team Invesment</div>
                                <div class="value text-light">Rs. 00.00</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 mt-1">
                            <div class="stat-box bg-dark">
                                <div class="title text-light">Total Team Deposit</div>
                                <div class="value text-light">Rs. 00.00</div>
                            </div>
                        </div>
                    
                        <div class="col-6 col-md-6 mt-1">
                            <div class="stat-box bg-dark">
                                <div class="title text-light">Total Team Members</div>
                                <div class="value text-light">Rs. 00.00</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 mt-1">
                            <div class="stat-box bg-dark">
                                <div class="title text-light">Total Team Commission</div>
                                <div class="value text-light">Rs. 00.00</div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!--Image-->
            
            
               <div class="section mt-1">
                    <div class="card bg-dark">
                            <div class="card-body">
                                    <h5 class="card-text text-center text-light" >Reference code: <span id="div1"> <?php echo $refral_code ?></span>
                                      <button class="border border-0 bg-dark"  id="button1"><ion-icon name="copy-outline" onclick="CopyToClipboard('div1')"></ion-icon></button>
                                    </h5>
                            </div>
                    </div>
                </div>
                
               <div class="section mt-1">
                    <div class="card bg-dark">
                            
                            <div class="card-body">
                                    <h5 class="card-text text-center text-light">Reference link: <span id="div2"><?php echo base_url().'Register/refral/'.$refral_code ?></span>
                                      <button class="border border-0 bg-dark"  id="button1"><ion-icon name="copy-outline" onclick="CopyToClipboardTwo('div2')"></ion-icon></button>
                                    </h5>
                            </div>
                    </div>
                </div>
        </div>
        <!-- DialogIconedSuccess -->
        <div class="modal fade dialogbox" id="DialogIconedSuccess" data-bs-backdrop="static" tabindex="-1"
            role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-success">
                        <ion-icon name="checkmark-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Success</h5>
                    </div>
                    <div class="modal-body">
                        Number Copyed successfully.
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn" onclick="location.reload()">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * DialogIconedSuccess -->
       
            <!--team view-->
            <div class="section  mt-1">

            <div class="goals">
                <?php 
                                     $refral_no = $_SESSION['refral_no'];
                                                $qry = $this->db->query("SELECT * FROM `ema_user` WHERE r1 = $refral_no OR r2 = $refral_no OR r3 = $refral_no");
                                                $res = $qry->result();
                                                foreach($res as $row) {
                                                    $value1 = $row->refral_no;
                                                    $r1 = $row->r1;
                                                    $r2 = $row->r2;
                                                    $r3 = $row->r3;
                                                    $client_id = $row->id;
                                                ?>
                <!-- item -->
                <div class="item bg-dark">
                    <a href="<?php echo site_url('Team/teamDetail')?>">
                    <div class="in">
                        <div>
                            <h3 class="text-light"><?php echo $row->full_name;?></h3>
                            <h5 class="text-light">Team Deposit</h5>
                            <h5 class="text-light">Commission</h5>
                            <h5 class="text-light">Team</h5>
                            
                        </div>
                        <div class="text-end">
                            <?php
                            if($r1 == $refral_no){
                          echo   '<span class="badge badge-warning text-light mb-1">Level 1</span>';
                              $qry = $this->db->query("SELECT SUM(amount *0.025) as profit FROM `ema_transaction` WHERE user_id = $client_id AND type_transaction = 1;");
                                $arr =  $qry->result();
                                foreach($arr as $ar1){
                                    $profit1 = $ar1->profit;
                                }
                                $recharge = 0;
                                  $qry2 = $this->db->query("SELECT SUM(amount) as Recharge FROM `ema_transaction` WHERE user_id = $client_id AND type_transaction = 1;");
                                $arr2 =  $qry2->result();
                                foreach($arr2 as $ar2){
                                    $recharge = $ar2->Recharge;
                                }
                            }
                            else if($r2 == $refral_no){
                            $qry = $this->db->query("SELECT SUM(amount *0.015) as profit FROM `ema_transaction` WHERE user_id = $client_id AND type_transaction = 1;");
                                $arr =  $qry->result();
                                foreach($arr as $ar1){
                                    $profit1 = $ar1->profit;
                                }
    $recharge = 0;
        $qry2 = $this->db->query("SELECT SUM(amount) as Recharge FROM `ema_transaction` WHERE user_id = $client_id AND type_transaction = 1;");
                                $arr2 =  $qry2->result();
                                foreach($arr2 as $ar2){
                                    $recharge = $ar2->Recharge;
                                }
                                
                          echo   '<span class="badge badge-warning text-light mb-1">Level 2</span>';
                          
                            }
                                else if($r3 == $refral_no){
                            $qry = $this->db->query("SELECT SUM(amount *0.01) as profit FROM `ema_transaction` WHERE user_id = $client_id AND type_transaction = 1;");
                                $arr =  $qry->result();
                                foreach($arr as $ar1){
                                    $profit1 = $ar1->profit;
                                }
                                
                                $qry2 = $this->db->query("SELECT SUM(amount) as Recharge FROM `ema_transaction` WHERE user_id = $client_id AND type_transaction = 1;");
                                $arr2 =  $qry2->result();
                                foreach($arr2 as $ar2){
                                    $recharge = $ar2->Recharge;
                                }
                                
                          echo   '<span class="badge badge-warning text-light mb-1">Level 3</span>';
                            }
                            ?>
                            <h5 class="text-light"><?php if($recharge == 0 || $recharge == null){
                                    echo "0.00";
                                } else {
                                echo $recharge;
                                }?></h5>
                            <h5 class="text-light"><?php if($profit1 == 0 || $profit1 == null){
                                    echo "0.00";
                                } else {
                                echo $profit1;
                                }?></h5>
                            
                                        <?php
                                                $qry1 = $this->db->query("SELECT COUNT(id) as total_team FROM `ema_user` WHERE r1 = $value1 OR r2 = $value1 OR r3 = $value1;");
                                            $res1 =  $qry1->result();
                                            foreach($res1 as $row){
                                              $total_team =  $row->total_team;
                                            }
                                        ?>
                            <h5 class="text-light"><?php echo $total_team ?> People</h5>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- * item -->
                <?php } ?>
            </div>

        </div>
            <!--team view-->
            
            
            
            
        </div>
            
    </div>
            </div>
    </div>
        <div class="mb-5 pb-3"></div>
</div>
         <!-- * App Capsule -->
         
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
<script>
function CopyToClipboard(containerid) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy");
  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerid));
    window.getSelection().addRange(range);
    document.execCommand("copy");
    //arlet
    $('#DialogIconedSuccess').modal('show');
  }
}
function CopyToClipboardTwo(containerid) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy");
  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerid));
    window.getSelection().addRange(range);
    document.execCommand("copy");
    //arlet
    $('#DialogIconedSuccess').modal('show');
  }
}
</script>
    <script>
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
    </script>
</body>

</html>