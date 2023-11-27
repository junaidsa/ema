<!-- Packages -->
<?php 
                            $user_id = $_SESSION['user_id'];
                                $qry = $this->db->query("SELECT balance FROM `ema_user` WHERE id = $user_id");
                                $res =  $qry->result();
                                foreach($res as $row){
                                    $amount = $row->balance;
                                }
                            ?>
<div id="appCapsule">
    <div class="section full mt-5">
        <div class="card-body">

            <div class="goals">
                <!-- item -->
                <?php $query = $this->db->query("SELECT * FROM `ema_packages` WHERE id = $pkg_id AND is_deleted = 0");
                                            $res =  $query->result();
                                            foreach($res as $row){
                                            $valid_days = $row->valid_days;
                                            $min = $row->min_amount;
                                            $max = $row->max_amount;
                                            $profit = $row->profit;
                                            $packages_name = $row->packages_name;
                                    ?>
                <div class="item  bg-dark">
                    <h6 class="price text-light text-end"><span
                            class="badge badge-warning"><?php echo $row->valid_days;?> Days</span></6>
                        <div class="img-wrapper d-flex justify-content-center">
                            <img src="<?php echo base_url()?>assets/uploads/packages/<?php echo $row->image ?>"
                                alt="img" class="image-block imaged w64">
                        </div>
                        <hr class="hr hr-blurry text-light" />
                        <div class="in">
                            <div>
                                <h6 class="text-light text-start" id="pkg_name"><?php echo $row->packages_name ?></h6>
                                <h6 class="text-light text-start" id="pkg_name">Invest limit</h6>
                            </div>
                            <div class="text-end">
                                <h6 class="price text-light"><?php echo $row->profit ?>% Per Day</h6>
                                <h6 class="text-light"><?php echo $row->min_amount ?> - <?php echo $row->max_amount ?>
                                </h6>
                            </div>
                        </div>
                        <a href="#" class="btn btn-warning btn-block btn-sm showPkg" data="" id="showPkg">Buy</a>
                </div>
                <?php } ?>
                <!-- * item -->
            </div>
        </div>
    </div>
</div>
<!-- * Packages -->

<div class="mb-4">
    <div class="section">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="p-1">
                    <form>
                        <div class="form-group boxed animated">
                            <div class="input-wrapper">
                                <label class="label text-warning" for="name2">Amount</label>
                                <input type="number" class="form-control text-light bg-dark" onkeyup="getAmount()"
                                    id="invest_amount" placeholder="Enter amount">
                                    <p class="text-warning" id="alert"></p>
                            </div>
                            <div class="input-wrapper">
                                <label class="label text-warning" for="profit_amount">Profit</label>
                                <input type="number" class="form-control text-light bg-dark"
                                    id="profit_amount" name="profit_amount">
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" onclick="buyPkg()" id="invest_btn"
                                class="btn btn-warning btn-sm btn-block">Invest</button>
                                </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
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
            .text-end ul li {
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
function getAmount() {
    var date = new Date();
    var invest_amount = $('#invest_amount').val();
    var minAmount = "<?php echo $min ?>";
    var maxAmount = "<?php echo $max ?>";
    var valid_days = "<?php echo $valid_days ?>";
    var percent = "<?php echo $profit ?>";
    var total_percent = valid_days * percent;
    var total_profit = (invest_amount / 100) * total_percent;
    var profit_amount = parseFloat(invest_amount) + parseFloat(total_profit);
    var total_balance = '<?php echo $amount ?>';
    if (Number(invest_amount) < Number(minAmount)) {
        document.getElementById("invest_btn").disabled = true;
        $('#profit_amount').val('0.00');
        $('#alert').html("Amount between " + Number(minAmount) + '-' + Number(maxAmount));
        // $('#alert').html("Amount in low");
    } else if (Number(invest_amount) > Number(maxAmount)) {
        document.getElementById("invest_btn").disabled = true;
        $('#profit_amount').val('0.00');
        // $('#alert').html("Amount in high");
        $('#alert').html("Amount between " + Number(minAmount) + '-' + Number(maxAmount));
    } else if (Number(invest_amount) > Number(total_balance)) {
        document.getElementById("invest_btn").disabled = true;
        $('#profit_amount').val('0.00');
        $('#alert').html("Balance not enough");
        // $('#alert').html("Amount between " + Number(minAmount) + '-' + Number(maxAmount));
    } else {
        document.getElementById("invest_btn").disabled = false;
        $('#profit_amount').val(parseFloat(profit_amount).toFixed(2));
        $('#alert').html("");
    }
}

function buyPkg() {
    var valid_days = "<?php echo $valid_days ?>";
    var date = new Date();
    date.setDate(date.getDate() + Number(valid_days));
    var day = date.getDate(); // Get the day (1-31)
    var month = date.getMonth() + 1; // Get the month (0-11, so add 1)
    var year = date.getFullYear(); // Get the year (4 digits)
    var hours = date.getHours(); // Get the hour (0-23)
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
    var expiry_date = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
    var invest_amount = $('#invest_amount').val();
    var profit_amount = $('#profit_amount').val();
    var pkg_name = "<?php echo $packages_name ?> "; 
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