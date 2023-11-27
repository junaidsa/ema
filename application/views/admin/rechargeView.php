

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Recharge Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Recharge</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-12">
                          <h3 class="card-title">Transaction List</h3>
                      </div>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>User Mobile Number</th>
                    <th>Transaction ID</th>
                    <th>Account Holder</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                        <?php 
												$Todate = Date('d-m-Y');
                                                    $qry = $this->db->query("SELECT r.id as req_id,u.full_name,r.transaction_id,r.account_holder,r.reciept_image,r.is_approve,r.created_on,r.amount,u.mobile_number FROM `recharge_request` AS r,ema_user AS u WHERE u.id = r.user_id Order by r.id DESC");
                                                    $res = $qry->result();
                                                    foreach($res as $row) {
																											$createdAtString = $row->created_on;
																											$createdAt = new DateTime($createdAtString);
																											$dateOnly = $createdAt->format('d-m-Y');
																											if ($dateOnly == $Todate) {
																												# code...
																												$dateStatus = '<span class="right badge badge-success">Today</span>';

																											}else{
																												$dateStatus = $dateOnly;

																											}

                                                    ?>
                      <tr>
                          <td><?php echo $row->full_name?></td>
                          <td><?php echo $row->mobile_number?></td>
                          <td><?php echo $row->transaction_id?></td>
                          <td><?php echo $row->account_holder?></td>
                          <td><?php echo $row->amount?></td>
                          <td><?php echo $dateStatus; ?></td>
                          <?php 
                          $is_approve = 0;
                          if($row->is_approve == 0){
                              $is_approve= '<span class="right badge badge-danger">Pending</span>';
                          }else if($row->is_approve == 1){
                                $is_approve= '<span class="right badge badge-success">Approved</span>';
                          }else{
                                 $is_approve= '<span class="right badge badge-warning">Decline</span>';   
                          }
                          
                          ?>
                          <td><?php echo $is_approve?></td>
                          <td><a href="javascript:;"  class="text-primary update_is_approve w-4 h-4 mr-1" data="<?php echo $row->req_id?>" data-approve="<?php echo $row->req_id?>"><i class="fas fa-pen-alt"></i></a>&nbsp;&nbsp;<a href="<?php echo base_url()?>assets/uploads/recharge/<?php echo $row->reciept_image?>"  class="text-primary w-4 h-4 mr-1"><i class="fas fa-images"></i></a></td>
                          
                      </tr>
                  <?php } ?>
                  </tbody>
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
<!--MODAL DELETE-->
<div class="modal fade" id="approveModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteTital">Update Status?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">X</span></button>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="transaction_id" id="transaction_id">
                    <div class="alert alert-success">
                        <p>Are you sure to receive Amount?</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button class="btn_hapus btn btn-danger is_action" data-billid="2">Decline</button>
                    <button class="btn_hapus btn btn-success is_action" data-billid="1">Approve</button>
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
   //GET Status is Approve##############################################################
    $('#example1').on('click', '.update_is_approve', function() {
        var id = $(this).attr('data');
        $('#approveModel').modal('show');
        $('[name="transaction_id"]').val(id);
    });
    // Approve Amount
    $('.is_action').on('click', function() {
        var id = $('#transaction_id').val();
        var is_id    = $(this).data("billid");
        if(id != "" && is_id != ""){
            $(".is_action").attr("disabled", "disabled");
                   $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/Transaction/approvedAmount')?>",
            dataType: "JSON",
            data: {
                id: id,
                is_id: is_id
                
            },
            success: function(data) {
                $(".is_action").removeAttr("disabled");
                location.reload();
            }
        });
        return false; 
        }else{
            alert('Some thing is woring')
        }

    });
    // ####################################################################
});
</script>
</body>
</html>
