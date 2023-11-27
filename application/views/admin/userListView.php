

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                <h3 class="card-title">Users List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr#</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Balance</th>
                    <th>Refral No</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="userList">
                      
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
<div class="modal fade" id="Modal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">X</span></button>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="delete_id" id="delete_id">
                    <div class="alert alert-warning">
                        <p>Are you sure?</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button class="btn_hapus btn btn-danger" id="btn_modal_delete">Delete</button>
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
    
    $('#userList').on('click', '.item_delete', function() {
            var id = $(this).attr('data');
            $('#Modal_delete').modal('show');
            $('[name="delete_id"]').val(id);
        });
        // DELETE QUTATION
        $('#btn_modal_delete').on('click', function() {
            var id = $('#delete_id').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/Users/delete_User_Data')?>",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#Modal_delete').modal('hide');
                    show_data();
                }
            });
            return false;
        });
  });
  function show_data() {
    var url = "<?php echo site_url('admin/Users/getUserList') ?>";
    $.ajax({
        type: 'get',
        url: url,
        async: false,
        dataType: 'json',
        success: function(data) {
            var html = '';
            var i;
            var sr = 1;
						 var dayStatus = 0;
            for (i = 0; i < data.length; i++) {
							let createdAtString = data[i].created_on;
							let createdAt = new Date(createdAtString);
							let dateOnly = createdAt.toLocaleDateString();
							let currentDate = new Date();
							let mainDate = currentDate.toLocaleDateString('en-US', {
  month: '2-digit',
  day: '2-digit',
  year: 'numeric'
});
							if (dateOnly == mainDate) {
								dayStatus = '<span class="right badge badge-success">Today</span>'
							}else{
								dayStatus = createdAt.toLocaleDateString();
							}
                html += '<tr>' +
                    '<td>' + sr++ + '</td>' +
                    '<td>' + data[i].full_name + '</td>' +
                    '<td >' + data[i].mobile_number + '</td>' +
                    '<td>' + data[i].balance + '</td>' +
                    '<td>' + data[i].refral_no + '</td>' +
                    '<td>' + dayStatus + '</td>' +
                    '<td  style="text-align:center;">' +
                    '<a href="javascript:;" class="btn btn-danger btn-sm item_delete" data="' +
                    data[i]
                    .id + '">Delete</a>' +
                    '</td>' +
                    '</tr>';
            }

            $('#userList').html(html);
        },
        error: function(error) {
            alert(error.name);
        }

    });
}
show_data();
</script>
</body>
</html>
