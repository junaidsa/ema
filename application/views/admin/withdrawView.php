  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Withdraw</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Withdraw</li>
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
                          <h3 class="card-title">Withdraw</h3>
                      </div>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Bank Name</th>
                    <th>Account title</th>
                    <th>Account Number</th>
                    <th>User Name</th>
                    <th>Mobile Name</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                        <?php 
													$Todate = Date('d-m-Y');
                                                    $qry = $this->db->query("SELECT t.id As transactionId,t.bank_id,u.full_name,b.account_title,u.balance,b.bank_name,b.account_number,b.mobile_number,t.amount,t.is_approved,t.type_transaction,t.created_on FROM `ema_transaction`  AS t,ema_user AS u,ema_bank_account AS b WHERE u.id = t.user_id AND b.id = t.bank_id AND t.type_transaction = 0 order by transactionId Desc");
                                                    $res = $qry->result();
                                                    foreach($res as $row) {
																											$amount = $row->amount;
																											$percentagedecrease = 0.03;
																											$totalAmount =  $amount - ($amount * $percentagedecrease); 
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
                          <td><?php echo $row->bank_name?></td>
                          <td><?php echo $row->account_title?></td>
                          <td><?php echo $row->account_number?></td>
                          <td><?php echo $row->full_name?></td>
                          <td><?php echo $row->mobile_number?></td>
                          <td><?php echo $totalAmount ?></td>
													<td><?php echo $dateStatus; ?></td>
                          <?php 
                          $is_approve = 0;
                          if($row->is_approved == 0){
                              $is_approve= '<span class="right badge badge-danger">Pending</span>';
                          }else if($row->is_approved == 1){
                                $is_approve= '<span class="right badge badge-success">Approved</span>';
                          }else{
                                 $is_approve= '<span class="right badge badge-warning">Decline</span>';   
                          }
                          
                          ?>
                          <td><?php echo $is_approve?></td>
                          <td><a href="javascript:;"  class="text-primary update_is_approve w-4 h-4 mr-1" data="<?php echo $row->transactionId?>"><i class="fas fa-pen-alt"></i></a></td>
                          
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
            url: "<?php echo site_url('admin/Transaction/approvedwithdrow')?>",
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
