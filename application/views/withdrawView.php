<!-- App Capsule -->
<div class="mt-5">
    <div id="appCapsule">

        <div class="section mt-3 mb-1">
            
            
               <?php
            if ($this->session->flashdata('success')!= "") {?>
            <div class="alert alert-imaged alert-success alert-dismissible fade show mb-2" id="success" role="alert">
                        <div class="img-wrap">
                            <img src="<?php echo base_url()?>assets/img/logo.png" alt="avatar" class="imaged w24 rounded">
                        </div>
                        <div>
                            <strong id="success_sms"><?php echo $this->session->flashdata('success'); ?></strong>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
           <?php } ?>
           <?php
            if ($this->session->flashdata('error')!= "") {?>
            <div class="alert alert-imaged alert-danger alert-dismissible fade show mb-2" id="success" role="alert">
                        <div class="img-wrap">
                            <img src="<?php echo base_url()?>assets/img/logo.png" alt="avatar" class="imaged w24 rounded">
                        </div>
                        <div>
                            <strong id="success_sms"><?php echo $this->session->flashdata('error'); ?></strong>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
           <?php } ?>
            <!-- alert -->

                    <!--alert -->
            <!-- waiting tab -->
            <div class="tab-pane fade show active" id="waiting" role="tabpanel">
                <div class="row">

                    <div class="col-12">
                        <div class="bill-box bg-dark">
                            <h2 class="text-light">Withdraw Amount</h2>
                            <hr>
                            <h2 class="text-light">Available Balance</h2>
                            <?php
                            $user_id = $_SESSION['user_id'];
                                $qry = $this->db->query("SELECT balance FROM `ema_user` WHERE id = $user_id");
                                $res =  $qry->result();
                                foreach($res as $row){
                                    $amount = $row->balance;
                                }
                            ?>
                            <div class="price text-light">Rs <span id="currentAmount"><?php echo number_format((float)$amount, 2, '.', ''); ?></span></div>
                        </div>
                    </div>


                </div>
                <!-- * waiting tab -->
            </div>
        </div>
        <div class="mb-4">
            <div id="appCapsule">

                <div class="section">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="p-1">
                                <div class="text-center">
                                    <h2 class="text-light">Enter details</h2>
                                    <p class="text-light">Fill the form to Withdraw</p>
                                </div>
                                <form action='<?php echo base_url().'Withdraw/index'?>' method="post">
                                    <div class="input-wrapper">
                                                    <label class="label text-light" for="select4">Select Bank</label>
                                                    <select class="form-control text-light bg-dark <?php echo (form_error('bank_name') != '') ? 'is-invalid' : ''; ?>" id="bank_name" name="bank_name">
                                                         <?php 
                                                        $userID = $_SESSION['user_id'];
														$qry = $this->db->get('ema_bank_account', array('user_id' => $userID,'is_deleted' => 0));
                                                    $res = $qry->result();
                                                    foreach($res as $row) { ?>
                                                    <option value="<?php echo $row->id;?>" selected> <?php echo $row->bank_name;?></option>
                                    <?php } ?>
                                                    </select>
                                                         <?php echo form_error('bank_name');?>
                                                </div>
                                                    <input type="hidden" value="1" id="transaction_type" name="transaction_type">
                                                    <input type="hidden"   name="account_amount" id="account_amount">
                                    <div class="form-group boxed animated">
                                        <div class="input-wrapper">
                                            <label class="label text-light" for="name2">Amount</label>
                                            <input type="number" class="form-control text-light bg-dark <?php echo (form_error('amount') != '') ? 'is-invalid' : ''; ?>" id="amount" name="amount"
                                                placeholder="Enter amount" min="600">
                                        </div>
                                        <?php echo form_error('amount');?>
                                    </div>
                                    <div class="mt-2">
                                           <input type="submit" class="btn btn-warning btn-lg btn-block" id="save_withdraw" value="Send Request">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section mt-2 mb-4">
                    <div class="card">
                        <div class="card-body bg-dark">
                            <div class="p-1">
                                <div class="text-center">
                                    <h2 class="text-warning">کیش اؤٹ کے لیے کمپنی پالیسیز</h2>

                                    <ul dir="auto" type="1" class="text-end text-light">
                                        <li>ڈیئر کسٹمر آپ روزانہ Orbits World کے ایک اکاؤنٹ سے ایک ہی دفعہ کیش اؤٹ لے
                                            سکتے ہیں.
                                        </li>
                                        <li>کیش اؤٹ کی ہر درخواست پر %1.5 ٹیکس لاگو ہوگا.
                                        </li>
                                        <li>کیش اؤٹ کی درخواستیں صبح اٹھ بجے سے رات نو بجے تک پروسیس کی جائیں گی.
                                        </li>
                                        <li>کم سے کم کیش اؤٹ کروانے کی لمٹ 600 روپے ہے
                                        </li>
                                        <li>کیش اؤٹ کی درخواست بھیجنے کے بعد آپ کی پیمنٹ 24 گھنٹے سے لے کر 36 گھنٹے تک
                                            آپ کے اکاؤنٹ میں منتقل کر دی جائے گی. پیمنٹ موصول نہ ہونے کی صورت میں آپ
                                            ہماری کسٹمر سروس سے رابطہ کر سکتے ہیں.
                                        </li>
                                        <li>آپ 24 گھنٹے میں کسی بھی وقت وڈرا کی درخواست بھیج سکتے ہیں.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- * App Capsule 2 -->
    
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
    
    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?php echo base_url()?>assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?php echo base_url()?>assets/js/base.js"></script>
    <script>
    appendCurrentAmount()
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
function appendCurrentAmount(){
 var currentAmount = $('#currentAmount').html();
 $('#account_amount').val(currentAmount)
 
}
   
    </script>
</body>

</html>
