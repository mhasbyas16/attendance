<style type="text/css">
    #status{
        color:;
    }
</style>
<link rel="stylesheet" href="<?php echo e(url('assets/css/materializes.css')); ?>">

<?php $__env->startSection('isi'); ?>

        <div class="container text-center">
            <h1>EMPLOYEE HELPDESK</h1>
        </div>
        <!--Page -->
        <div class="page-info">
            <div class="container">
                    <ul>
                        <li style="color: white"><strong>About Mssages and Suggestions for Better</strong></li>
                    </ul>
            </div>
        </div>
        <!--End Page-->
    </div><!-- end section -->

   <?php echo $__env->make('admin.awan.gaya_awan', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Container -->
    <div class="container z-depth-3" style="min-height: 500px">
        </br>
        </br>
    <form method="post">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            	<thead>
						<tr style="background-color: #000051; color: white;">
							<th class="text-center" >No.</th>
							<th class="text-center" >Subject</th>
							<th class="text-center" >Email</th>
              <th class="text-center" >Description</th>
              <th class="text-center" >Mark</th>
						</tr>
				</thead>
				<tbody>
                <?php $no=0;?>
                <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $isi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $no++?>
						<tr>
							<td class="text-center"><?php echo e($no); ?>.</td>
							<td><?php echo e($isi ->subject); ?></td>
							<td><?php echo e($isi ->email); ?></td>
                            <td><?php echo e($isi ->description); ?></td>
							<td><a href="<?php echo e(url('/mark')); ?>/readed/<?php echo e($isi ->id); ?>">Mark As Read</a></td>
						</tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
        </table>
        </div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

        </form>
    </div>

</br>
</br>
</br>
<!--
<script type="text/javascript" src="<?php echo e(url('assets/js/materialize.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/js/materialize.min.js')); ?>"></script>
<script>
  $(document).ready(function(){
    $('select').material_select();
  });
</script>
-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>