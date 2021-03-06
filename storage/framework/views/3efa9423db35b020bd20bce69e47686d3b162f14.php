<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Senjata</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Laporan ID</th>
                        <th>Admin ID</th>
                        <th>Laporan</th>
                        <th>Status Laporan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($laporans)){ foreach($laporans as $laporan){ ?>
                    <form role="form" action="<?php echo e(url('/direksi/create-acc-laporan')); ?>" method="post">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="id" value="<?php echo e($laporan->id); ?>">  
                      <tr>
                        <td><?php echo e($laporan->id); ?></td>
                        <td><?php echo e($laporan->adminID); ?></td>
                        <td><?php echo e($laporan->laporan); ?></td>
                        <td>
                          <?php if(!isset($laporan->isAccepted)){ ?>
                            <span class="label label-warning">Pending</span>
                            <?php }else{ ?>
                          <?php if($laporan->isAccepted){ ?>
                            <span class="label label-success">Diterima</span>
                          <?php }else{ ?>
                            <span class="label label-danger">Ditolak</span>
                          <?php }} ?>
                        </td>
                        <td>
                          <button type="submit" value="ACC" name="isAccepted" class="btn btn-success">ACC</button>
                          <button type="submit" value="Tolak" name="isAccepted" class="btn btn-danger">Tolak</button>
                        </td>
                      </tr>
                    </form>
                    <?php }} ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Laporan ID</th>
                        <th>Admin ID</th>
                        <th>Laporan</th>
                        <th>Status Laporan</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>