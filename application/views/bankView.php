<!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-3">
            <div class="section-title">&nbsp;</div>
                               <?php
            if ($this->session->flashdata('success')!= "") {?>
            <div class="alert alert-imaged alert-info alert-dismissible fade show mb-2" role="alert">
                        <div>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
           <?php } ?>
           <?php
           $user_id = $_SESSION['user_id'];
           $this->db->where('user_id',$user_id);
        $query = $this->db->get('ema_bank_account');
        $count_row = $query->num_rows();
            if ($count_row > 0) {
				$button_status = 'disabled';
				$show = 'show';
			}else{
				$button_status = 'enabled';
				$show = 'hidden';

			}
            ?>
            <div class='alert alert-warning alert-dismissible fade <?php echo $show; ?>'><p>Your Bank Account is Already Add Contact HelpLine</p></div>
            <div class="card bg-dark">
                <div class="card-body pb-1">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="overview2" role="tabpanel">
                            <div class="section ">
                                <div class="card-body">
                                    <div class="p-1">
                                        <div class="text-center">
                                            <h2 class="text-light">Bank Account Details</h2>
                                        </div>
                                        <form action='<?php echo base_url().'Bank'?>' method="post" name='bankForm' id='bankForm'>
                                            <div class="form-group boxed">
                                                <div class="input-wrapper">
                                                    <label class="label text-light  bg-dark " for="select4">Select Bank</label>
                                                    <select class="form-control  bg-dark text-light <?php echo (form_error('bank_name') != '') ? 'is-invalid' : ''; ?>" id="bank_name" name="bank_name">
                                                        <option selected>Choose Bank</option>
                                                        <option value="Jazzcash">Jazzcash</option>
                                                        <option value="EasyPaisa">EasyPaisa</option>
                                                        <option value="Habib Bank Limited">Habib Bank Limited</option>
                                                        <option value="Allied Bank Limited">Allied Bank Limited</option>
                                                        <option value="United Bank Limited">United Bank Limited</option>
                                                        <option value="Bank Alfalah Limited">Bank Alfalah Limited</option>
                                                        <option value="MCB Bank Limited">MCB Bank Limited</option>
                                                        <option value="Faysal Bank Limited">Faysal Bank Limited</option>
                                                        <option value="Meezan Bank Limited">Meezan Bank Limited</option>
                                                        <option value="Askari Bank Limited">Askari Bank Limited</option>
                                                        <option value="Bank AL Habib Limited">Bank AL Habib Limited</option>
                                                        <option value="Standard Chartered Bank (Pakistan) Limited">Standard Chartered Bank (Pakistan) Limited</option>
                                                        <option value="BankIslami Pakistan Limited">BankIslami Pakistan Limited</option>
                                                        <option value="NBP">NBP</option>
                                                        <option value="Silkbank Limited">Silkbank Limited</option>
                                                        <option value="The Bank of Punjab">The Bank of Punjab</option>
                                                        <option value="JSoneri Bank">Soneri Bank</option>
                                                        <option value="Summit Bank Limited">Summit Bank Limited</option>
                                                        <option value="Standard Chartered">Standard Chartered</option>
                                                        <option value="Dubai Islamic Bank">Dubai Islamic Bank</option>
                                                        <option value="Bank Alfalah">Bank Alfalah</option>
                                                        <option value="Habib Metropolitan Bank Limited">JHabib Metropolitan Bank Limited</option>
                                                        <option value="Al Baraka Bank (Pakistan) Limited">Al Baraka Bank (Pakistan) Limited</option>
                                                        <option value="Bank Of Punjab">Bank Of Punjab</option>
                                                        <option value="Askari Bank">Askari Bank</option>
                                                        <option value="JS Bank Limited">JS Bank Limited</option>
                                                    </select>
                                                </div>
                                                   <?php echo form_error('bank_name');?>
                                            </div>
                                            <div class="form-group boxed animated">
                                                <div class="input-wrapper">
                                                    <label class="label text-light" for="name2">Account Title</label>
                                                    <input type="text" class="form-control bg-dark text-light <?php echo (form_error('account_title') != '') ? 'is-invalid' : ''; ?>" 
                                                        placeholder="" name="account_title" id="account_title">
                                                </div>
                                                 <?php echo form_error('account_title');?>
                                            </div>
                                            <div class="form-group boxed animated">
                                                <div class="input-wrapper">
                                                    <label class="label text-light">Account Number (IBAN)</label>
                                                    <input type="number" class="form-control  bg-dark text-light <?php echo (form_error('account_number') != '') ? 'is-invalid' : ''; ?>" 
                                                        placeholder="" name="account_number" id="account_number">
                                                </div>
                                                    <?php echo form_error('account_number');?>
                                            </div>
                                            <div class="form-group boxed animated">
                                                <div class="input-wrapper">
                                                    <label class="label text-light">Mobile Number
                                                        (Optional)</label>
                                                    <input type="number" class="form-control  bg-dark text-light" id="mobile_number" name="mobile_number"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                            <input type="submit" class="btn btn-warning btn-lg btn-block" id="btn_submit" value="Submit">
                                            </div>

                                        </form>
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

    
    
<?php // $this->load->view('compound/footer'); ?>
    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?php echo base_url()?>assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?php echo base_url()?>assets/js/base.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
		  $(document).ready(function(){
        // Assuming $button_status is set in your PHP code
        var buttonStatus = "<?php echo $button_status; ?>";

        // Disable or enable the button based on the $button_status
        if (buttonStatus === 'disabled') {
            $("#btn_submit").prop("disabled", true);
		} else {
            $("#btn_submit").prop("disabled", false);
        }
    });
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
    </script>
</body>

</html>
