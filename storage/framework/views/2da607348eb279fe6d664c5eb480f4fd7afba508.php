<style type="text/css">
    #status{
        color:<?php echo e($status); ?>;
    }
</style>
<link rel="stylesheet" href="<?php echo e(url('assets/css/materializes.css')); ?>">


<?php $__env->startSection('isi'); ?>

        <div class="container text-center">
            <h1>EMPLOYEE DATA</h1>
        </div>
        <!--Page -->
        <div class="page-info">
            <div class="container">
                    <ul>
                        <li style="color: white"><strong>About All Data Employee</strong></li>
                    </ul>
            </div>
        </div>
        <!--End Page-->
    </div><!-- end section -->
    <?php echo $__env->make('admin.awan.gaya_awan', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Container -->
    <div class="container z-depth-3" style="min-height: 500px">
     <?php if(\Session::has('success_alert')): ?>
   		<div class="alert alert-success">
   			<strong><?php echo e(Session::get('success_alert')); ?></strong>
   		</div>
   	<?php endif; ?>
        <form method="post">
        <input class="form-control" id="myInput" type="text" style="font-size: 20px; margin-top: 50px" placeholder="Search..">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" style="text-align: center;">
            <thead>
                <tr style="background-color: #000051; color: white;">
                    <th class="text-center">No.</th>
					<th class="text-center">NIP</th>
					<th class="text-center">Name</th>
					<th class="text-center">Email</th>
					<th class="text-center">Position</th>
					<th class="text-center">Action</th>
				</tr>
            </thead>
            <tbody id="myTable">
			<?php $no=1;?>
			<?php $__currentLoopData = $isi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $isi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td class="text-center"><?php echo e($no); ?>.</td>
					<td><?php echo e($isi->nip); ?></td>
					<td><?php echo e($isi->nama); ?></td>
					<td><?php echo e($isi->email); ?></td>
					<td><?php echo e($isi->jabatan); ?></td>
			<?php if($hakakses=='admin'): ?>
					<td>
						<a class="btn-floating waves-effect waves-light orange" href="<?php echo e(url('/edit')); ?>/<?php echo e($isi->nip); ?>"><i class="mdi-editor-mode-edit"></i></a>
                        <a href="<?php echo e(url('/deletedata')); ?>/<?php echo e($isi->nip); ?>" onclick="return confirm('Are You Sure Delete <?php echo e($isi->nama); ?> ?')" class="btn-floating waves-effect waves-light red" ><i class="mdi-action-delete"></i></a>
					</td>
			<?php else: ?>
					<td></td>
			<?php endif; ?>
				</tr>
			<?php $no++;?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
        </table>
        </div>
        </form>
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
</br>
</br>
</br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>