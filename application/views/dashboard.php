    <!-- App Capsule -->
    <div class="mt-4 ">
        <div id="appCapsule">
            <!-- Wallet Card -->
            <div class="section wallet-card-section mt-2 pt-1">
                <div class="wallet-card bg-dark">
                    <!-- Balance -->
                    <div class="balance">
                        <div class="left">
                            <span class="title text-light">Total Balance</span>
                            <?php 
							$amount = 0;
                            $user_id = $_SESSION['user_id'];
                                $qry = $this->db->query("SELECT balance FROM `ema_user` WHERE id = $user_id");
                                $res =  $qry->result();
                                foreach($res as $row){
                                    $amount = $row->balance;
                                }
                            ?>
                            <h1 class="total text-light">Rs. <span id="total_balance"><?php echo number_format((float)$amount, 2, '.', ''); ?></span></h1>
                        </div>

                    </div>
                    <!-- * Balance -->
                    <!-- Wallet Footer -->
                    <div class="wallet-footer">
                        <div class="item">
                            <a href="<?php echo site_url('Recharge/Create')?>">
                                <div class="icon-wrapper bg-warning">
                                    <ion-icon name="flash-outline"></ion-icon>
                                </div>
                                <strong class="text-light">Recharge</strong>
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo site_url('Withdraw')?>">
                                <div class="icon-wrapper bg-warning">
                                    <ion-icon name="wallet-outline"></ion-icon>
                                </div>
                                <strong class="text-light">Withdraw</strong>
                            </a>
                        </div>
                       
                        <div class="item">
                            <a href="https://wa.me/+923287465667">
                                <div class="icon-wrapper bg-warning">
                                    <ion-icon name="logo-whatsapp"></ion-icon>
                                </div>
                                <strong class="text-light">Contact Us</strong>
                            </a>
                        </div>
                         <div class="item">
                            <a href="<?php echo base_url().'Apk/app-debug.apk' ?>">
                                <div class="icon-wrapper bg-warning">
                                    <ion-icon name="logo-google-playstore"></ion-icon>
                                </div>
                                <strong class="text-light">APK Download</strong>
                            </a>
                        </div>
                       
                        
                    </div>

                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>
    </div>
    <!-- Wallet Card -->

    <!-- Packages -->
        <div id="appCapsule">
            <div class="section full mb-5 pb-3">
                    <div class="card-body">
                                    <?php
									$userID = $_SESSION['user_id'];
									$query = $this->db->query("SELECT * FROM `ema_purchase` WHERE is_expired = 0 AND is_deleted = 0 AND user_id = $userID");
									if ($query->num_rows() > 0) {
										$buttons_disabled = true;
									}else{
										$buttons_disabled = false;
									}
                                        $qry = $this->db->query("SELECT * FROM `ema_packages` where is_deleted = 0");
                                        $res = $qry->result();
                                        foreach($res as $row) {

                                    ?>
                                <div class="goals">
                                    <!-- item -->
                                            <a href="#">
                                                <div class="item  bg-dark">
                                                            <h6 class="price text-light text-end"><span class="badge badge-warning"><?php echo $row->valid_days;?> Days</span></6>
                                                        <div class="img-wrapper  d-flex justify-content-center">
                                                           <img src="<?php echo base_url()?>assets/uploads/packages/<?php echo $row->image; ?>" alt="img"
                                                            class="image-block imaged w64">
                                                        </div>
                                                        <hr class="hr hr-blurry text-light"/>
                                                    <div class="in">
                                                        <div>
                                                            <h6 class="text-light text-start"><?php echo $row->packages_name;?></h6>
                                                            <h6 class="text-light text-start">Invest limit</h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <h6 class="price text-light"><?php echo $row->profit;?>% Per Day</h6>
                                                            <h6 class="price text-light"><?php echo $row->min_amount;?> - <?php echo $row->max_amount;?></h6>
                                                        </div>
                                                    </div>
                                            </a>
                                                    <!--<a href="<?php // echo base_url("Recharge/Invesment/" . $row->id)?>" class="btn btn-warning btn-block btn-sm showPkg" data="<?php echo $row->id?>" id="showPkg">Buy</a>-->
                                                    <a href="<?php echo base_url("Recharge/Invesment/" . $row->id)?>" class="btn btn-warning btn-block btn-sm check_btn" data-id="button<?php echo $row->id;?>">Buy</a>
                                                </div>
                                            
                                    <!-- * item -->
                                    <?php } ?>
                                </div>
                    </div>
            </div>
        </div>
    <!-- * Packages -->
    
    <!-- Deposit Action Sheet -->
    <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="pkg_name"></span></h5>
                    <input type="hidden" id="update_id">
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <div class="img-wrapper text-center" id="img_p">
                           
                        </div>
                        <div class="section mt-2 mb-2">
                            <!-- <div class="card"> -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Valid Days</th>
                                            <th scope="col">Invesment Amount</th>
                                            <th scope="col">Per Day Income</th>
                                            <th scope="col">Offer Time Period</th>
                                            <th scope="col">Cycle Profit</th>
                                            <th scope="col">Cycle Profit + Capital</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row"><span class="valid_days"></span>  Days Offer</td>
                                            <td scope="row">Mini /Max: <span class="min"></span> - <span class="max"></span></td>
                                            <td scope="row"><span class="percent"></span>%</td>
                                            <td scope="row"><span class="valid_days"></span> Days</td>
                                            <td scope="row">Mini/Max: Rs. <span class="min"></span> - <span class="max"></span></td>
                                            <td scope="row">Rs. <span class="min"></span> - <span class="totalProfit"></span></td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <!-- </div> -->
                        </div>



                        <form id="buy_pkg_model">
                            <div class="row">
                                <div class="col-6 col-6">
                                    <div class="form-group basic">
                                <label class="label">Invesment Amount</label>
                                <div class="input-group mb-2">
                                    <input type="number" id="invest_amount" name="invest_amount" onkeyup="getAmount()" class="form-control" placeholder="0.00">
                                </div>
                                <p class="text-danger" id="alert"></p>
                            </div>
                                </div>
                                <div class="col-6 col-6">
                                    <div class="form-group basic">
                                <label class="label">profit Amount</label>
                                <div class="input-group mb-2">
                                    <input type="number" id="profit_amount" name="profit_amount" class="form-control" placeholder="0.00" readonly>
                                </div>
                                
                            </div>
                                </div>
                            </div>
                            
                            <div class="form-group basic">
                                <button type="button" id="invest_btn" class="btn btn-warning btn-block btn-lg" onclick="buyPkg()">Invest Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Android Add to Home Action Sheet -->
    <div class="modal inset fade action-sheet android-add-to-home" id="android-add-to-home-screen" tabindex="-1"
        role="dialog">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content newmodel-content bg-dark">
                <div class="modal-header  bg-dark">
                    <div class="mt-2 text-center"> 
                        <h2 class="text-light">King Profit</h2>
                    <!--        <img src="<?php // echo base_url()?>assets/img/logo.png" alt="image"-->
                    <!--            class="imaged w64 mb-2" />-->
                        </div>
                    <h2 class="modal-title text-light">ڈیئر کسٹمر ایپلیکیشن پر بہتر طریقے سے کام کرنے اور ایپ میں موجود فنگشنز سے فائدہ اٹھانے کے لیے نیچے دی گئی کمپنی پالیسیز اور فنکشنز کی تفصیلات پڑھ لیں شکریہ
</h2>
                  
                    <!--<a href="#" class="close-button" data-bs-dismiss="modal">-->
                    <!--    <ion-icon name="close"></ion-icon>-->
                    <!--</a>-->
                </div>
                
                <style>
                    @font-face{
                            font-family: 'jameel';
                            src: url("<?php echo base_url()?>assets/font/Jameel\ Noori\ Nastaleeq\ Regular.ttf")
                            }
                            .jameel{
                                font-family: 'jameel';
                                /*letter-spacing: 1px;*/
                                word-spacing:2px;
                            }
                </style>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="modal-header">
                    <h1 class="modal-title text-light">بیلنس ریچارج کے لیے کمپنی پالیسیز
                    </h1>
                </div>
                        
                        <ul dir="auto" type="1" class="text-end text-light">
                            
                            <li>بیلنس ریچارج کے لیے دیے گئے پیمنٹ میتھڈ میں سے ایک کا انتخاب کریں اپنی اماؤنٹ درج کریں اور پروسیس ریکویسٹ کے بٹن پر کلک کر دیں</li>
                            <li>اس کے بعد اپ کو اکاؤنٹ کی ڈیٹیلز دی جائیں گی جس پر اپ نے پیمنٹ ٹرانسفر کرنی ہے
</li>
                            <li>پیمنٹ ٹرانسفر کرنے کے بعد نیچے دیے گئے پیمنٹ پروف کے فارم میں مطلوبہ ڈیٹا انٹر کریں
</li>
                            <li>یاد رہے اپ کو صحیح اور غلط سکرین شاٹ کی نشاندہی کی گئی ہے. غلط سکرین شاٹ بھیجنا اپ کی پیمنٹ ویریفکیشن کے پروسیس میں تاخیر کا سبب بن سکتا ہے.
</li>
                            <li>درست معلومات کے اندراج کے بعد کنفرم پیمنٹ کا بٹن دبا دیں. یہاں اپ کا ریچارج اماؤنٹ کا پروسیس مکمل ہوا
</li>
                            <li>افر خریدنے کے بعد اس افر کا پرافٹ اپ کے اکاؤنٹ میں رات 12 بجے کے بعد خود کار طریقے سے جمع ہو جائے گا
</li>
                            <li>پیمنٹ کی ویریفکیشن میں ایک گھنٹے سے چھ گھنٹے تک کا وقت لگ سکتا ہے
</li>
                            <li>پیمنٹ ویریفائیڈ ہونے کی صورت میں اپ کے اکاؤنٹ میں بیلنس ایڈ کر دیا جائے گا
</li>
                            <li>یاد رہے پیمنٹ ویریفکیشن کا پروسیس صبح اٹھ بجے سے رات نو بجے تک جاری رہتا ہے
</li>
                        </ul>
                    </div>
                    <div class="modal-header">
                    <h1 class="modal-title text-light">کیش اؤٹ کے لیے کمپنی پالیسیز
                    </h1>
                </div>
                    
                <ul dir="auto" type="1" class="text-end text-light">
                            
                          <li>ڈیئر کسٹمر آپ روزانہ Orbits World کے ایک اکاؤنٹ سے ایک ہی دفعہ وڈرا لے سکتے ہیں.
</li>
                          <li>کیش اؤٹ کی ہر درخواست پر %1.5 ٹیکس لاگو ہوگا.
</li>
                          <li>وڈرا کی درخواستیں صبح اٹھ بجے سے رات نو بجے تک پروسیس کی جائیں گی.
</li>
                          <li>کیش اؤٹ کی درخواست بھیجنے کے بعد آپ کی پیمنٹ 24 گھنٹے سے لے کر 36 گھنٹے تک آپ کے اکاؤنٹ میں منتقل کر دی جائے گی. پیمنٹ موصول نہ ہونے کی صورت میں آپ ہماری کسٹمر سروس سے رابطہ کر سکتے ہیں.
</li>
                          <li>آپ 24 گھنٹے میں کسی بھی وقت وڈرا کی درخواست بھیج سکتے ہیں.
</li>
                          <li>Orbits World کمپنی میں کیش اؤٹ اور ریچارج کسی بھی دن بند نھیں ھوتا آپ جب چاہے ودڈرا اور ریچارج کروا سکتے ہیں
</li>
                        </ul>
                        <div class="modal-header">
                    <h6 class="modal-title text-light">ہم نے اپنی ایپ میں مکمل ایپ کی انفارمیشن ٹائمنگ اینڈ ڈیٹیلز بہت اچھے طریقے سے مینشن کی ہوئی ہیں لہذا پالیسیز پر عمل کر کے اپنا اور ہمارا ٹائم بچائیں شکریہ
</h6>
                </div>
                </div>
                
                <div class="mb-2 mt-2 me-2 ms-2 text-center">
                        <button type="button" class="btn btn-warning btn-block" data-bs-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- * Android Add to Home Action Sheet -->
    
    
     
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

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                        <div class="image-wrapper">
                            <a href="<?php echo base_url('Settings')?>">
                            <img src="<?php echo base_url()?>assets/img/sample/avatar/avatar1.jpg" alt="image"
                                class="imaged w36" />
                            </a>
                        </div>
                        <div class="in">
                            <a href="<?php echo base_url('Settings')?>">
                                <strong class="text-light">Welcome back!</strong>
                                <div class="text-muted"><?php echo $_SESSION['full_name'] ?></div>
                        </div>
                                <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                                    <ion-icon name="close-outline"></ion-icon>
                                </a>
                            </a>
                    </div>
                    <!-- * profile box -->
                    
                   
                    <!-- * menu -->

                    <!-- others -->
                    <div class="listview-title mt-1">Others</div>
                    <ul class="listview flush transparent no-line image-listview">
                         
                        <li>
                            <a href="<?php echo base_url('Dashboard')?>" class="item bg-dark">
                                <div class="icon-box bg-primary">
                                <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in text-light">Home</div>
                            </a>
                        </li>
                       
                        <li>
                            <a href="<?php echo site_url("Recharge/Create")?>" class="item bg-dark">
                                <div class="icon-box bg-primary">
                                <ion-icon name="flash-outline"></ion-icon>
                                </div>
                                <div class="in text-light">Deposit</div>
                            </a>
                        </li>
                         <li>
                            <a href="<?php echo site_url("Recharge/rechargeHistory")?>" class="item bg-dark">
                                <div class="icon-box bg-primary">
                                <ion-icon name="flash-outline"></ion-icon>
                                </div>
                                <div class="in text-light">Deposit History</div>
                            </a>
                        </li>
                         
                        
                        <li>
                            <a href="<?php echo site_url("Withdraw")?>" class="item bg-dark">
                                <div class="icon-box bg-primary">
                                 <ion-icon name="wallet-outline"></ion-icon>
                                </div>
                                <div class="in text-light">Withdraw</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("Withdraw/withdrawHistory")?>" class="item bg-dark">
                                <div class="icon-box bg-primary">
                                 <ion-icon name="wallet-outline"></ion-icon>
                                </div>
                                <div class="in text-light">Withdraw History</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://chat.whatsapp.com/GbGWpoJGynhBcO4MhvdDQU" class="item bg-dark">
                                <div class="icon-box bg-primary">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                                </div>
                                <div class="in text-light">Join Group</div>
                            </a>
                        </li>
                       
                        
                        <li>
                            <a href="<?php echo base_url('Notification')?>" class="item bg-dark">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                </div>
                                <div class="in text-light">Notification</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Login/logout')?>" class="item bg-dark">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in text-light">Log out</div>
                            </a>
                        </li>
                    </ul>
                    <!-- * others -->
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->
<div class="goals" style="display:none;">
                                    <?php
                                    $count = 1;
                                        $user_id = $_SESSION['user_id'];
                                            $qry = $this->db->query("SELECT ep.id,ep.pkg_name,p.valid_days,ep.invest_amount,ep.profit_amount,ep.entry_date,ep.expiry_date FROM ema_purchase as ep, ema_packages as p WHERE ep.pkg_name = p.packages_name AND ep.user_id = $user_id AND ep.is_deleted = 0 AND ep.is_expired = 0;");
                                            $res =  $qry->result();
                                            foreach($res as $row){
                                    ?>
                                    <div class="item">
                                        <div class="in">
                                            <div>
                                                <h5 class="text-dark">&nbsp;</h5>
                                                <h5 class="text-dark">Package name</h5>
                                                <h5 class="text-dark">Invest amount</h5>
                                                <h5 class="text-dark">Total Profit</h5>
                                                <h5 class="text-dark">Valid days</h5>
                                                <h5 class="text-dark">Entry date</h5>
                                                <h5 class="text-dark">Expiry date</h5>
                                                <input type="hidden" class="count" value="<?php echo $count ?>">
                                            </div>
                                            <style>
                                               .text-end ul li{
                                                    display: inline-block;
                                                 border-left: 2px solid black;
                                                 padding: 4px;
                                                }
                                                     
                                                    
                                                }
                                            </style>
                                            <div class="text-end">
                                                    <ul data-countdown="<?php echo $row->expiry_date;?>" class="text-dark conter-div">
                                                    <li data-days="00">00</li>
                                                    <li data-hours="00">00</li>
                                                    <li data-minuts="00">00</li>
                                                    <li data-seconds="00">00</li>
                                                </ul>
                                                <input type="hidden" id="pkg_id" value="<?php echo $row->id ?>">
                                                <h5 class="price text-dark"></h5>
                                                <h5 class="price text-dark"><?php echo $row->pkg_name;?></h5>
                                                <h5 class="price text-dark"><?php echo $row->invest_amount;?></h5>
                                                <h5 class="price text-dark"><?php echo $row->profit_amount;?></h5>
                                                <h5 class="price text-dark"><?php echo $row->valid_days;?></h5>
                                                <h5 class="price text-dark"><?php echo $row->entry_date;?></h5>
                                                <h5 class="price text-dark" id="expiry_d"><?php echo $row->expiry_date;?></h5>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <?php
                                    $count++;
                                    } ?>
                                </div>
    
    <!-- * End Footer -->
        
    <?php // $this->load->view('compound/footer'); ?>
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
    AddtoHome("2000", "once");
	document.addEventListener("DOMContentLoaded", function() {
        var buttonsDisabled = <?php echo json_encode($buttons_disabled); ?>;
        var buttons = document.querySelectorAll(".check_btn");
        buttons.forEach(function(button) {
			button.style.display = buttonsDisabled ? "none" : "inline-block";
        });
    });
    $(document).ready(function(){
		var total_balance = <?php echo json_encode($amount); ?>;
        $('#android-add-to-home-screen').modal('show');
        
        $('.showPkg').on('click', function() {
            $('#buy_pkg_model')[0].reset();
        var id = $(this).attr('data');
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('Dashboard/get_id')?>",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                $.each(data, function(id, packages_name, min_amount,max_amount,valid_days,profit,description,status,image) {
                    // $('#depositActionSheet').modal('show');
                    $('#update_id').val(data.id);
                    $('#pkg_name').html(data.packages_name);
                    $('.min').html(data.min_amount);
                    $('.max').html(data.max_amount);
                    $('.valid_days').html(data.valid_days);
                    $('.percent').html(data.profit);
                    $("#img_p").html(`<img src="<?php echo base_url() ?>/assets/uploads/packages/${data.image}" style="width:86px; border-radius: 5px;" alt="Image not found" id="update_expence_img">`);
                    // $('#description').val(data.description);
                    // $('#update_status').val(data.status);
                    
                    
                });
                var minAmount=$('.min').html();
                var valid_days=$('.valid_days').html();
                var percent=$('.percent').html();
                var totalPercent = valid_days * percent;
                var totalProfit = (minAmount/100)*totalPercent;
                if(minAmount >= Number(total_balance)){
                        document.getElementById("invest_btn").disabled = true;
                    } else if(minAmount <= Number(total_balance)){
                        document.getElementById("invest_btn").disabled = false;
                    }
                $('.totalProfit').html(parseFloat(minAmount) + parseFloat(totalProfit));
            }
        });
        return false;

    });
        
        ///////gat packege min/max data
    $('#amount_input').on('click', function() {
        
        
                var id = $("#update_id").val();
                var url = "<?php echo site_url('Dashboard/get_pkg')?>";
        $.ajax({
            type: "ajax",
            method: "get",
            url: url,
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                $.each(data, function(id, packages_name, min_amount,max_amount,valid_days,profit,description,status) {
                    $('#depositActionSheet').modal('show');
                    $('#update_id').val(data.id);
                    $('#pkg_name').html(data.packages_name);
                    $('.min').html(data.min_amount);
                    $('.max').html(data.max_amount);
                    $('.valid_days').html(data.valid_days);
                    $('.percent').html(data.profit);
                    
                    
                });
                var minAmount=$('.min').html();
                var valid_days=$('.valid_days').html();
                var percent=$('.percent').html();
                var totalPercent = valid_days * percent;
                var totalProfit = (minAmount/100)*totalPercent;
                if(minAmount >= Number(total_balance)){
                        document.getElementById("invest_btn").disabled = true;
                    } else if(minAmount <= Number(total_balance)){
                        document.getElementById("invest_btn").disabled = false;
                    }
                $('.totalProfit').html(parseFloat(minAmount) + parseFloat(totalProfit));
            }
        });
        return false;

    });
    
    $('[data-countdown]').each(function(){
        var deadline = new Date($(this).data('countdown')).getTime();
        
        var dataDays = $(this).children('[data-days]');
        var dataHours = $(this).children('[data-hours]');
        var dataMinuts = $(this).children('[data-minuts]');
        var dataSeconds = $(this).children('[data-seconds]');
        var x = setInterval(function(){
            var now = new Date().getTime();
            var t = deadline - now;
            var days = Math.floor(t/(1000*60*60*24));
            var hours = Math.floor(t%(1000*60*60*24)/ (1000*60*60));
            var minuts = Math.floor(t%(1000*60*60)/ (1000*60));
            var seconds = Math.floor(t%(1000*60)/ (1000));
   
            if(days < 10){
                days = '0'+days
            }else if(hours < 10){
                hours = '0'+hours
            }else if(minuts < 10){
               minuts = '0'+ minuts
            }else if(seconds < 10){
                seconds = '0'+seconds
            }
             dataDays.html(days);
            dataHours.html(hours);
            dataMinuts.html(minuts);
            dataSeconds.html(seconds);
            
            var count_down_time = days + "-" + hours + "-" + minuts + "-" + seconds;
            console.log(count_down_time);
        
        if(count_down_time.trim() <= "00-00-00-00") {
                var user_id = "<?php echo $_SESSION['user_id'] ?>";
                var pkg_id = $('#pkg_id').val();
                $.ajax({
                url: "<?php echo base_url("Dashboard/checkExpiry");?>",
                type: "POST",
                data: {
                    type: 1,
                    user_id: user_id,
                    pkg_id: pkg_id
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        location.reload();
                    } else if (dataResult.statusCode == 201) {
                        alert("Error occured !");
                    }

                }
            });
            }
            
        }
        ,1000);
        
    })
    
    });
    
    
    function getAmount(){
        var date = new Date();
        var invest_amount = $('#invest_amount').val();
        var minAmount=$('.min').html();
        var maxAmount=$('.max').html();
        var valid_days=$('.valid_days').html();
        var percent=$('.percent').html();
        var total_percent = valid_days * percent;
        var total_profit = (invest_amount/100)*total_percent;
        var profit_amount = parseFloat(invest_amount) + parseFloat(total_profit);
        if(Number(invest_amount) < Number(minAmount)){
            document.getElementById("invest_btn").disabled = true;
            $('#alert').html("Amount between "+Number(minAmount)+ '-'+ Number
        } else if(Number(invest_amount) > Number(maxAmount)){
            document.getElementById("invest_btn").disabled = true;
            $('#alert').html("Amount between "+Number(minAmount)+ '-'+ Number
        } else {
            document.getElementById("invest_btn").disabled = false;
            $('#profit_amount').val(parseFloat(profit_amount).toFixed(2));
            $('#alert').html("");
        }
    }
    function buyPkg(){
            var valid_days=$('.valid_days').html();
            var date = new Date();
            date.setDate(date.getDate() + Number(valid_days));
            var day = date.getDate();       // Get the day (1-31)
            var month = date.getMonth() + 1; // Get the month (0-11, so add 1)
            var year = date.getFullYear();   // Get the year (4 digits)
            var hours = date.getHours();     // Get the hour (0-23)
            var minutes = date.getMinutes(); // Get the minutes (0-59)
            var seconds = date.getSeconds(); // Get the seconds (0-59)
            
            // Ensure day and month are formatted as two digits
            if (day < 10) {
                day = "0" + day;
            }
            if (month < 10) {
                month = "0" + month;
            }
            if (hours < 10) {
                hours = "0" + hours;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            var expiry_date = year + "-" + month + "-" + day  + " " + hours + ":" + minutes + ":" + seconds;
            var invest_amount = $('#invest_amount').val();
            var profit_amount = $('#profit_amount').val();
            var pkg_name = $('#pkg_name').html();
        if (invest_amount != "" && profit_amount != "" && pkg_name != "") {
            $("#invest_btn").attr("disabled", "disabled");
            $.ajax({
                url: "<?php echo base_url("Dashboard/buyPkg");?>",
                type: "POST",
                data: {
                    type: 1,
                    expiry_date: expiry_date,
                    invest_amount: invest_amount,
                    profit_amount: profit_amount,
                    pkg_name: pkg_name
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $('#depositActionSheet').modal('hide');
                        $("#invest_btn").removeAttr("disabled");
                        $('#success').html('Data added successfully !');
                        window.location = "<?php echo base_url('Earn') ?>";
                    } else if (dataResult.statusCode == 201) {
                        alert("Error occured !");
                    }

                }
            });
        } else {
            alert('Please fill all the field !');
        }
    }
	    </script>
</body>

</html>
