<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Bank</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Bank</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <div class="card card-primary card-outline">
              <!--<div class="card-header">-->
              <!--  <h5 class="m-0">Featured</h5>-->
              <!--</div>-->
              <div class="card-body">
                <form action='<?php echo base_url().'admin/Bank/create'?>' method="post" name='UserForm' id='UserForm'
			            enctype="multipart/form-data">
			            <div class="container-fluid">
			                <div class="card">
			                    <div class="card-body">
			                        <div class="row">
			                            <?php 
			                                $qry = $this->db->query("SELECT * FROM `ema_bank` WHERE id = 1");
                                                    $res = $qry->result();
                                                    foreach($res as $row) {
                                                    ?>
			                            <!-- row 1 -->
			                            <div class="col-md-6">
			                                <div class="mb-3">
			                                    <label for="bank_name">Bank Name</label>
			                                    <input type="text" name="bank_name" id="bank_name"
			                                        class="form-control <?php echo (form_error('bank_name') != '') ? 'is-invalid' : ''; ?>"
			                                        placeholder="Bank Name" value="<?php echo $row->bank_name?>"
			                                        autocomplete="off">
			                                    <?php echo form_error('bank_name');?>
			                                </div>
			                            </div>
			                            <div class="col-md-6">
			                                <div class="mb-3">
			                                    <label for="account_holder">Acount Holder</label>
			                                    <input type="text" name="account_holder" id="account_holder"
			                                        class="form-control <?php echo (form_error('account_holder') != '') ? 'is-invalid' : ''; ?>"
			                                        placeholder="Acount Holder Name" value="<?php echo $row->account_holder;?>"
			                                        autocomplete="off">
			                                    <?php echo form_error('account_holder');?>
			                                </div>
			                            </div>
			                            <!-- row 2 -->
			                            <div class="col-md-12">
			                                <div class="mb-3">
			                                    <label for="account_number">Acount Number</label>
			                                    <input type="number" name="account_number" id="account_number" class="form-control  <?php echo (form_error('account_number') != '') ? 'is-invalid' : ''; ?>"
			                                        placeholder="Acount Number" value="<?php echo $row->account_number ?>">
			                                <?php echo form_error('account_number');?>
			                                </div>
			                            </div>
			                            <!-- row 3-->
			                        </div>
			                        <?php } ?>
			                    </div>
			                    <!-- End rows -->
			                </div>
			            </div>
			            <div class="pb-5 pt-3">
			                <input type="submit" value="Update" class="btn btn-primary">
			            </div>
			        </form>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
   <footer class="main-footer text-center">
    <strong>Copyright &copy; 2023 <a href="https://www.facebook.com/queryprovider" target="_blank">Query Provider</a>.</strong>
    All rights reserved.
    <!--<div class="float-right d-none d-sm-inline-block">-->
    <!--  <b>Version</b> 3.2.0-->
    <!--</div>-->
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>admin_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>admin_assets/dist/js/adminlte.min.js"></script>
<script>
    imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
</body>
</html>
