<!-- App Capsule -->
<div class="mt-5">
    <div id="appCapsule">

        <div class="section mt-3 mb-1">

            <!-- waiting tab -->
            <div class="tab-pane fade show active" id="waiting" role="tabpanel">
                <div class="row">

                    <div class="col-12">
                         <div class="bill-box bg-dark">
                            <h2 class="text-light">Recharge Balance</h2>
                            <hr>
                            <h2 class="text-light">Available Balance</h2>
                            <?php
                            $user_id = $_SESSION['user_id'];
                                $qry = $this->db->query("SELECT SUM(amount) AS balance FROM `ema_transaction` WHERE user_id = $user_id AND is_approved = 1;");
                                $res =  $qry->result();
                                foreach($res as $row){
                                    $amount = $row->balance;
                                }
                            ?>
                            <div class="price text-light">Rs <?php echo number_format((float)$amount, 2, '.', ''); ?></div>
                        </div>
                    </div>


                </div>
                <!-- * waiting tab -->

            </div>
        </div>
        <!-- * App Capsule -->


        <!-- App Capsule 2-->
        <div class="mb-4">
            <div id="appCapsule">

                <div class="section">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="p-1">
                                <div class="text-center">
                                    <h2 class="text-light">Enter details</h2>
                                    <p class="text-light">Fill the form to recharge</p>
                                </div>
                                <form>
                                    <div class="form-group boxed"> 
                                        <div class="input-wrapper">
                                            <label class="label text-warning" for="select4">Select Your Acount</label>
                                            <select class="form-control custom-select text-light bg-dark" id="account">
                                                <option value="0" selected>Choose Account</option>
                                                  <?php 
                                                    $qry = $this->db->query("SELECT * FROM `ema_bank` WHERE is_deleted = 0");
                                                    $res = $qry->result();
                                                    foreach($res as $row) {
                                                    ?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->bank_name;?></option>
                                        <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group boxed animated">
                                        <div class="input-wrapper">
                                            <label class="label text-warning" for="name2">Amount</label>
                                            <input type="number" class="form-control text-light bg-dark" id="amount"
                                                placeholder="Enter amount">
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                            <button type="button" id="request" class="btn btn-warning btn-lg btn-block">Send
                                                Request</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        <!-- DialogIconedDanger -->
        <div class="modal fade dialogbox" id="DialogIconedDanger" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="close-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Error</h5>
                    </div>
                    <div class="modal-body">
                        Fill All The Fields
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * DialogIconedDanger -->
                <div class="section mt-2 mb-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="p-1">
                                <div class="text-center">
                                    <h2 class="text-warning">بیلنس ریچارج کے لیے کمپنی پالیسیز</h2>

                                    <ul dir="auto" type="1" class="text-end text-light">
                                        <li>بیلنس ریچارج کے لیے دیے گئے پیمنٹ میتھڈ میں سے ایک کا انتخاب کریں اپنی
                                            اماؤنٹ
                                            درج کریں اور پروسیس ریکویسٹ کے بٹن پر کلک کر دیں
                                        </li>
                                        <li>اس کے بعد اپ کو اکاؤنٹ کی ڈیٹیلز دی جائیں گی جس پر اپ نے پیمنٹ ٹرانسفر کرنی
                                            ہے
                                        </li>
                                        <li>پیمنٹ ٹرانسفر کرنے کے بعد نیچے دیے گئے پیمنٹ پروف کے فارم میں مطلوبہ ڈیٹا
                                            انٹر
                                            کریں
                                        </li>
                                        <li>یاد رہے اپ کو صحیح اور غلط سکرین شاٹ کی نشاندہی کی گئی ہے. غلط سکرین شاٹ
                                            بھیجنا
                                            اپ کی پیمنٹ ویریفکیشن کے پروسیس میں تاخیر کا سبب بن سکتا ہے.
                                        </li>
                                        <li>درست معلومات کے اندراج کے بعد کنفرم پیمنٹ کا بٹن دبا دیں. یہاں اپ کا ریچارج
                                            اماؤنٹ کا پروسیس مکمل ہوا
                                        </li>
                                        <li>پیمنٹ کی ویریفکیشن میں ایک گھنٹے سے چھ گھنٹے تک کا وقت لگ سکتا ہے
                                        </li>
                                        <li>پیمنٹ ویریفائیڈ ہونے کی صورت میں اپ کے اکاؤنٹ میں بیلنس ایڈ کر دیا جائے گا
                                        </li>
                                        <li>یاد رہے پیمنٹ ویریفکیشن کا پروسیس صبح اٹھ بجے سے رات نو بجے تک جاری رہتا ہے
                                        </li>
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

    <script>
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
    $(document).ready(function(){
   $('#request').on('click', function() {
        var account_id = $("#account option:selected").val();
        // alert(account_id)
        var account_name = $("#account option:selected").text();
        var amount = $("#amount").val();
        if(account_id != 0 && amount != ""){
           // Store the variables in local storage
        localStorage.setItem("account_id",account_id);
        localStorage.setItem("account_name",account_name);
        localStorage.setItem("amount",amount);
        location.replace("<?php echo base_url('Recharge/Create')?>")  
        }else{
         $('#DialogIconedDanger').modal('show');
        }
    });
  });
    </script>
</body>

</html>