

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bank Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Bank</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <?php if($this->session->flashdata('success') != ""){ ?>
			  <div class="alert alert-success"><?php echo $this->session->flashdata('success')?></div>
			<?php }?>
        <div class="row">
            
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-4">
                          <h3 class="card-title">Bank</h3>
                      </div>
                      <div class="col-6">
                      </div>
                      <div class="col-2">
                          <a href="<?php echo base_url('admin/Bank/create')?>" class="btn btn-block btn-primary">Update Bank</a>
                      </div>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Sr#</th>
                      <th>Bank Name</th>
                      <th>Bank Holder Name</th>
                      <th>Account Number</th>
                  </tr>
                  </thead>
                  <?php 
                                                    $sr = 1;
                                                    $qry = $this->db->query("SELECT * FROM `ema_bank` WHERE is_deleted = 0");
                                                    $res = $qry->result();
                                                    foreach($res as $row) {
                                                    ?>
                  <tbody>
                      <tr>
                          <td><?php echo $sr++;?></td>
                          <td><?php echo $row->bank_name?></td>
                          <td><?php echo $row->account_holder?></td>
                          <td><?php echo $row->account_number?></td>
                      </tr>
                      
                  </tbody>
                  <?php } ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Modal Edit-->
<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <div class="modal-body"></div> -->
            <div class="modal-body">
                <!--start work md12  -->
                <input type="hidden" name="update_id" id="update_id">
                <div class="col-lg-12">
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
			                                   <select class="form-control" name="update_status" id="update_status">
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
                </div>
                <!--start work md12  -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_update" name="btn_update">Update</button>
            </div>
        </div>
    </div>
</div>
  <!--MODAL EDIT-->

  
 
<!--MODAL DELETE-->
<div class="modal fade" id="Modal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteTital">Confirm Delete?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">X</span></button>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="delete_id" id="delete_id">
                    <div class="alert alert-warning">
                        <p>Do you want to delete this record?</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button class="btn_hapus btn btn-danger" id="btn_delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL DELETE-->
 <footer class="main-footer text-center">
    <strong>Copyright &copy; 2023 <a href="https://www.facebook.com/queryprovider" target="_blank">Query Provider</a>.</strong>
    All rights reserved.
    <!--<div class="float-right d-none d-sm-inline-block">-->
    <!--  <b>Version</b> 3.2.0-->
    <!--</div>-->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>admin_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>admin_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>admin_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>admin_assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>admin_assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>admin_assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>admin_assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>admin_assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>admin_assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>admin_assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>admin_assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
      // get update data
    $('#example1').on('click', '.item_edit', function() {
        var id = $(this).attr('data');
        alert(id)
        $('#Modal_Edit').modal('show');

        $.ajax({
            type: "GET",
            url: "<?php echo site_url('admin/Packages/get_id')?>",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                $.each(data, function(id, packages_name, min_amount,max_amount,valid_days,profit,description,status) {
                    $('#update_id').val(data.id);
                    $('#packages_name').val(data.packages_name);
                    $('#min_amount').val(data.min_amount);
                    $('#max_amount').val(data.max_amount);
                    $('#valid_days').val(data.valid_days);
                    $('#profit').val(data.profit);
                    $('#description').val(data.description);
                    $('#update_status').val(data.status);
                    
                });
            }
        });
        return false;

    });
    //Update data
    $('#btn_update').on('click', function() {
        var id = $('#update_id').val();
        var packages_name = $('#packages_name').val();
        var min_amount = $('#min_amount').val();
        var max_amount = $('#max_amount').val();
        var valid_days = $('#valid_days').val();
        var profit = $('#profit').val();
        var description = $('#description').val();
        var status = $('#update_status option:selected').val();
        alert(status);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/Packages/updatePackages')?>",
            dataType: "JSON",
            data: {
                id: id,
                packages_name:packages_name,
                min_amount:min_amount,
                max_amount:max_amount,
                valid_days:valid_days,
                profit:profit,
                description:description,
                status:status
                
            },
            success: function(data) {
                location.reload();
            }
        });
        return false;
    });
    
    
   //GET DELETE
    $('#example1').on('click', '.item_delete', function() {
        var id = $(this).attr('data');
        alert(id)
        $('#Modal_delete').modal('show');
        $('[name="delete_id"]').val(id);
    });
    // DELETE QUTATION
    $('#btn_delete').on('click', function() {
        var id = $('#delete_id').val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/Packages/deletePackages')?>",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                location.reload();
            }
        });
        return false;
    });
});
</script>
</body>
</html>
