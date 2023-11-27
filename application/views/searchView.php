
    <!-- App Capsule -->
    <div id="appCapsule" class="mt-4">

        <div class="section tab-content mb-5 mt-3 pt-1">

            <!-- waiting tab -->
            <div class="tab-pane fade show active" id="waiting" role="tabpanel">
                <div class="row">
                    <?php 
													$qry = $this->db->query("SELECT * FROM `ema_packages` where is_deleted = 0");
														$res = $qry->result();
														foreach($res as $row) {
														?>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                        <div class="bill-box">
                            <div class="img-wrapper">
                                <img src="<?php echo base_url()?>assets/uploads/packages/<?php echo $row->image; ?>" alt="img"
                                    class="image-block imaged w86">
                            </div>
                            <div class="price"><?php echo $row->packages_name;?></div>
                            <p>Income <?php echo $row->profit;?>% Per Day</p>
                            <p class="text-danger">Invest in PKR <?php echo $row->min_amount;?> - <?php echo $row->max_amount;?></p>
                            <p>Offer Validity <?php echo $row->valid_days;?> Days</p>
                            <a href="#" class="btn btn-warning btn-block btn-sm showPkg" data="<?php echo $row->id?>" id="showPkg">BUY NOW</a>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
            <!-- * waiting tab -->
        </div>

    </div>
    <!-- * App Capsule -->


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
    
    
    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="<?php echo site_url('Bank')?>" class="item">
            <div class="col">
               <ion-icon name="card-outline"></ion-icon>
                <strong>Account</strong>
            </div>
        </a>
        <a href="<?php echo site_url('Earn')?>" class="item">
            <div class="col">
                <ion-icon name="cash-outline"></ion-icon>
                <strong>Earn</strong>
            </div>
        </a>
        <a href="<?php echo site_url('Dashboard')?>" class="item active">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="<?php echo site_url('Team')?>" class="item">
            <div class="col">
               <ion-icon name="people-outline"></ion-icon>
                <strong>Team</strong>
            </div>
        </a>
        <a href="<?php echo base_url('Settings')?>" class="item ">
            <div class="col">
              <ion-icon name="settings-outline"></ion-icon>
                <strong>Settings</strong>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->
    
    <!-- *******************/////////////////*******************-->

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
    // setInterval(countDown, 5000);
    // function countDown(){
    //     var user_id = "<?php echo $_SESSION['user_id'] ?>";
    //     $.ajax({
    //             url: "<?php echo base_url("Dashboard/checkExpiry");?>",
    //             type: "POST",
    //             data: {
    //                 type: 1,
    //                 user_id: user_id
    //             },
    //             cache: false,
    //             success: function(dataResult) {
    //                 var dataResult = JSON.parse(dataResult);
    //                 if (dataResult.statusCode == 200) {
    //                 } else if (dataResult.statusCode == 201) {
    //                     alert("Error occured !");
    //                 }

    //             }
    //         });
    // }
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
    

    
    $(document).ready(function(){
        var total_balance = $('#total_balance').html();
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
                    $('#depositActionSheet').modal('show');
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
                // alert(totalPercent)
                // alert(totalProfit)
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
                    alert(id)
                var url = "<?php echo site_url('Dashboard/get_pkg')?>";
                    alert(url)
        $.ajax({
            type: "ajax",
            method: "get",
            url: url,
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                alert(data)
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
                // alert(totalPercent)
                // alert(totalProfit)
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
            $('#alert').html("Amount between "+Number(minAmount)+ '-'+ Number(maxAmount));
            // $('#alert').html("Amount in low");
        } else if(Number(invest_amount) > Number(maxAmount)){
            document.getElementById("invest_btn").disabled = true;
            // $('#alert').html("Amount in high");
            $('#alert').html("Amount between "+Number(minAmount)+ '-'+ Number(maxAmount));
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
//     function getPackage(){
//                 var id = $("#update_id").val();
//                 alert(id)
//                 var url = "<?php // echo site_url('Dashboard/getPackage')?>";
//                 alert(url)
//         $.ajax({
//             url: url,
//             type: "post",
//             dataType: "JSON",
//             data: {
//                 id: id
//             },
//             success: function(data) {
//                 alert(data)
//                 var i;
//                 var totalAmount = 0;
//                 for (i = 0; i < data.length; i++) {
//                     totalAmount = data[i].TotalAmount;
                   
//                 }
//                 $('#grandTotal').html(parseFloat(totalAmount).toFixed(2));
//           }
//         });
// }
    </script>
</body>

</html>
