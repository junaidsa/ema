<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Package</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Package</li>
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
                <form action='<?php echo base_url().'admin/Packages/create'?>' method="post" name='UserForm' id='UserForm'
			            enctype="multipart/form-data">
			            <div class="container-fluid">
			                <div class="card">
			                    <div class="card-body">
			                        <div class="row">
			                            <!-- row 1 -->
			                            <div class="col-md-4">
			                                <div class="mb-3">
			                                    <label for="packages_name">Package Name</label>
			                                    <input type="text" name="packages_name" id="packages_name"
			                                        class="form-control <?php echo (form_error('packages_name') != '') ? 'is-invalid' : ''; ?>"
			                                        placeholder="Package Name" value="<?php echo set_value('packages_name');?>"
			                                        autocomplete="off">
			                                    <?php echo form_error('packages_name');?>
			                                </div>
			                            </div>
			                            <div class="col-md-4">
			                                <div class="mb-3">
			                                    <label for="min_amount">Min Amount</label>
			                                    <input type="number" name="min_amount" id="min_amount"
			                                        class="form-control <?php echo (form_error('min_amount') != '') ? 'is-invalid' : ''; ?>"
			                                        placeholder="Min Amount" value="<?php echo set_value('min_amount');?>"
			                                        autocomplete="off">
			                                    <?php echo form_error('min_amount');?>
			                                </div>
			                            </div>
			                            <!-- row 2 -->
			                            <div class="col-md-4">
			                                <div class="mb-3">
			                                    <label for="max_amount">Max Amount</label>
			                                    <input type="number" name="max_amount" id="max_amount" class="form-control  <?php echo (form_error('email') != '') ? 'is-invalid' : ''; ?>"
			                                        placeholder="Max Amount" value="<?php echo set_value('max_amount');?>">
			                                <?php echo form_error('max_amount');?>
			                                </div>
			                            </div>
			                            <div class="col-md-3">
			                                <div class="mb-3">
			                                    <label for="valid_days">Valid Days</label>
			                                    <input type="number" name="valid_days" id="valid_days" class="form-control <?php echo (form_error('valid_days') != '') ? 'is-invalid' : ''; ?>"
			                                        placeholder="Valid Days">
			                                    <?php echo form_error('valid_days');?>
			                                </div>
			                            </div>
			                            <!-- row 3-->
			                            <div class="col-md-3">
			                                <div class="mb-3">
			                                    <label for="profit">Profit</label>
			                                    <input type="text" name="profit" id="profit" class="form-control <?php echo (form_error('profit') != '') ? 'is-invalid' : ''; ?>"
			                                        placeholder="Profit" value="<?php echo set_value('profit');?>">
			                                    <?php echo form_error('profit');?>
			                                </div>
			                            </div>
			                            <div class="col-md-3">
			                                <div class="mb-3">
			                                    <label for="description">Description</label>
			                                    <input type="text" name="description" id="description" class="form-control <?php echo (form_error('description') != '') ? 'is-invalid' : ''; ?>"
			                                        placeholder="Description" value="<?php echo set_value('description');?>">
			                                    <?php echo form_error('description');?>
			                                </div>
			                            </div>
			                              <div class="col-md-3">
			                                <div class="mb-3">
			                                    <label for="profit">Status</label>
			                                   <select class="form-control" name="status">
                                                    <option selected>Choose Status</option>
                                                    <option value="0">Active</option>
                                                    <option value="1">Deactive</option>
                                               </select>
			                                </div>
			                            </div>

			                            <div class="col-md-4 mr-4">
			                                <label for="profit">Image</label>
			                                <div class="custom-file">
			                                    <input type="file" class="custom-file-input" id="customFile"
			                                        onchange="loadFile(event)" name="image">
			                                    <label class="custom-file-label" for="customFile">Choose file</label>
			                                </div>
			                            </div>
			                            <div class="col-md-4">
			                                <img src="<?php echo base_url()?>demo.png" width="30%" id="output">
			                            </div>
			                        </div>
			                    </div>
			                    <!-- End rows -->
			                </div>
			            </div>
			            <div class="pb-5 pt-3">
			                <input type="submit" value="Create" class="btn btn-primary">
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
</body>
</html>
