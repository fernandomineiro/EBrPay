<?php
include "menu.php";
include "config.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sorteio
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sorteio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
            <form action="cadsorteio.php">
            <button type="submit"  class="btn btn-primary">+ Cadastrar</button>
             
            </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                <tr>
                  <th>Data premiação</th>
                  <th>Data início</th>
                  <th>Data fim</th>
                  <th>Tipo</th>
                  <th>Imagem</th>
                  <th>Ação</th>
                  
                </tr>
                
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM sorteio";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row['datasorteio']; ?></td>
                  <td><?php echo $row['datainicio']; ?></td>
                  <td><?php echo $row['datafim']; ?></td>
                  <td><?php echo $row['premiacao']; ?></td>
                  <td><img src="<?php echo $row['img']?>" height="50px" width="100px"/></td>
                  <td><a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                  <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Deletar</a></td>
                  <?php include('edit_delete_modalcadsorteio.php'); ?>
                  
                </tr>
                <?php
                  }
                }
                ?>
               
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include "footer.php";
  ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>

