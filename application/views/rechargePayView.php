    <!-- App Capsule -->
    <div class=" mt-5 ">
        <div id="appCapsule">
            <div class="section mt-3">
                <div class="card">
                    <div class="card-body bg-dark rounded">
                                <!--<div class="goals">-->
                                    <!-- item -->
                                    <div class="item bg-dark">
                                            <!--<div class="img-wrapper  d-flex justify-content-center">-->
                                            <!--    <img src="https://seeklogo.com/images/N/new-jazz-logo-D69BD35771-seeklogo.com.png?v=638133576270000000" alt="img"-->
                                            <!--        class="image-block imaged w36">-->
                                            <!--</div>-->
                                        <!--<div class="in">-->
                                        <!--    <div>-->
                                        <!--        <h6 class="text-light">Bank Name</h6>-->
                                        <!--        <h6 class="text-light">Name</h6>-->
                                        <!--        <h6 class="text-light">Amount</h6>-->
                                        <!--        <h6 class="text-light">Account Number</h6>-->
                                                
                                        <!--    </div>-->
                                        <!--    <div class="text-end">-->
                                        <!--        <h6 class="price text-light" id="bank_name"></h6>-->
                                        <!--        <h6 class="price text-light" id="holder"></h6>-->
                                        <!--        <h6 class="price text-light" id="amountdiv"></h6>-->
                                        <!--        <h6 class="price text-light" id="div1"><span id="account_number"></span> -->
                                        <!--        <button class="border border-0 bg-dark m-0 p-0" id="button1" onclick="CopyToClipboard('div1')"><ion-icon name="copy-outline"></ion-icon></button>-->
                                        <!--        </h6>-->
                                            
                                        <!--    </div>-->
                                        <!--</div>-->
                                        
                                        <!--Bank Detail-->
                                        
                                            <div class="text-center">
                                                <h2 class="text-light">Bank Detail</h2>
                                            </div>
                                        <?php 
			                                $qry = $this->db->get('ema_bank');
                                                    $res = $qry->result();
                                                    foreach($res as $row) {
                                        ?>
                                            <form action='#' method="post">
                                                <div class="form-group boxed animated">
                                                    <div class="input-wrapper">
                                                        <label class="label text-light" for="bank_name">Bank Name</label>
                                                        <input type="text"  id="bank_name" name="bank_name" readonly value="<?php echo $row->bank_name?>" class="form-control bg-dark text-light">
                                                        <i class="clear-input me-1">
                                                            <ion-icon name="close-circle-outline"></ion-icon>
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="form-group boxed animated">
                                                    <div class="input-wrapper">
                                                        <label class="label text-light" for="account_title">Account Title</label>
                                                        <input type="text" value="<?php echo $row->account_holder?>" readonly id="account_title" name="account_title" class="form-control bg-dark text-light">
                                                    </div>
                                                </div>
                                                <div class="form-group boxed animated">
                                                     <div class="input-wrapper">
                                                        <label class="label text-light" for="account_number">Account Number</label>
                                                        <input type="number" id="account_number" value="<?php echo $row->account_number?>" readonly name="accountnumber" class="form-control bg-dark text-light">
                                                    </div>
                                                </div>
                                            </form>
                                            <?php } ?>
                                        
                                        <!--Bank Detail-->
                                        
                                        
                                        
                                    </div>
                                    <!-- * item -->
                                    
                                <!--</div>-->

                            
                        
                    </div>
            </div>
                
                
                
                
                
                
                
                
                
                <div class="section-title"></div>
                   <?php
            if ($this->session->flashdata('success')!= "") {?>
            <div class="alert alert-imaged alert-success alert-dismissible fade show mb-2" role="alert">
                        <div class="icon-wrap">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                        <div>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
           <?php } ?>
           <?php
            if ($this->session->flashdata('error')!= "") {?>
            <div class='alert alert-danger alert-dismissible fade show'><?php echo $this->session->flashdata('error'); ?></div>
           <?php } ?>
                
            </div>
        </div>

    </div>
    <!-- * App Capsule -->
    <!-- App Capsule 2-->
    <div class="mb-4">
        <div id="appCapsule">

            <div class="section mb-4">
                <div class="card bg-dark">
                    <div class="card-body">
                        <div class="p-1">
                            <div class="text-center">
                                <h2 class="text-light">Payment Proof</h2>
                                <p class="text-light">Fill the form to payment proof</p>
                            </div>
                            <form action='<?php echo base_url().'Recharge/create'?>' method="post" enctype="multipart/form-data">
                                <input type="hidden" id="bank_name1" name="bank_name1" value="<?php echo set_value('bank_name1');?>">
                                <input type="hidden" id="amount1" name="amount1" value="<?php echo set_value('amount1');?>">
                                <div class="form-group boxed animated">
                                    <div class="input-wrapper">
                                        <label class="label text-light" for="transection_ID">Enter Transection ID</label>
                                        <label class="label text-light" for="transection_ID">رقم بھیجنے کے بعد آپ کو ایک
                                            ٹرانزیکشن
                                            آئی ڈی ملے گی وہ آئی ڈی نیچے لکھیں۔</label>
                                        <input type="number"  id="transection_ID"
                                          name="transection_ID" maxlength="10" class="form-control bg-dark text-light <?php echo (form_error('transection_ID') != '') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('transection_ID');?>">
                                           
                                          <?php echo form_error('transection_ID');?>
                                    </div>
                                </div>
                                <div class="form-group boxed animated">
                                    <div class="input-wrapper">
                                        <label class="label text-light" for="account_holder_name">Enter Account Holder Name</label>
                                        <label class="label text-light" for="account_holder_name">اکاؤنٹ ہولڈر کا نام درج
                                            کریں۔</label>
                                        <input type="text" id="account_holder_name" name="account_holder_name" class="form-control bg-dark text-light <?php echo (form_error('account_holder_name') != '') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('account_holder_name');?>">
                                        <?php echo form_error('account_holder_name');?>
                                    </div>
                                </div>
                                <div class="form-group boxed animated">
                                    <div class="input-wrapper">
                                        <label class="label text-light" for="account_number">Enter Account Number</label>
                                        <input type="number" id="account_number" name="account_number" class="form-control bg-dark text-light <?php echo (form_error('account_number') != '') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('account_number');?>">
                                        <?php echo form_error('account_number');?>
                                    </div>
                                </div>
                                <div class="form-group boxed animated">
                                    <div class="input-wrapper">
                                        <label class="label text-light" for="amount">Amount</label>
                                        <input type="number" id="amount" name="amount" class="form-control bg-dark text-light <?php echo (form_error('amount') != '') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('account_number');?>">
                                        <?php echo form_error('amount');?>
                                    </div>
                                </div>

                                <div class="section mt-2">
                                    <div class="section-title text-light">Upload Input</div>
                                    <div class="card">
                                        <div class="card-body bg-dark ">
                                                <div class="custom-file-upload bg-dark" id="fileUpload1">
                                                    <input type="file" id="image" name="image" accept=".png, .jpg, .jpeg">
                                                    <label for="image" class="bg-dark">
                                                        <span>
                                                            <strong>
                                                                <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                                                <i class="text-light">Upload a Photo</i>
                                                            </strong>
                                                        </span>
                                                    </label>
                                                </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="img-wrapper text-center">
                                    <img src="<?php echo base_url()?>assets/img/sample/rechagre-image/payment-sleep.png"
                                        alt="image" class="image-block mt-4 imaged w-75">
                                </div>
                                </div> 
                                <div class="mt-2 text-center">
                                    <button type="submit"
                                        class="btn btn-secondary me-1 mb-1 btn-lg center">Cancel</button>
                                    <button type="submit"
                                        class="btn btn-outline-secondary me-1 mb-1 btn-lg center">Send
                                    </button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>







    </div>
    <!-- * App Capsule 2 -->
    
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
                            <a href="#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * DialogIconedSuccess -->
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
</script>

    <script>
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
    var account_id = 0;
    $(document).ready(function(){
         account_id = localStorage.getItem("account_id");
     var amount = localStorage.getItem("amount");
            $('#amountdiv').html(amount);
            $('#amount1').val(amount);
         getData(account_id)
  });
  
 function getData(id) {
     var url = "<?php echo site_url('Recharge/get_Date')?>";
        $.ajax({
            type: "GET",
            url:url,
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                $.each(data, function(id,bank_name,account_holder,account_number) {
                 $('#bank_name').html(data.bank_name);
                 $('#bank_name1').val(data.id);
                 $('#holder').html(data.account_holder);
                 $('#account_number').html(data.account_number);
                });
            }
        });
        return false;
    }
    </script>
</body>

</html>