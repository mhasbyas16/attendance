<style type="text/css">
    #status{
        color:<?php echo e($status); ?>;
    }
</style>
<link rel="stylesheet" href="<?php echo e(url('assets/css/materializes.css')); ?>">


<?php $__env->startSection('isi'); ?>
        <div class="container text-center">
            <h1>INSERT NEW EMPLOYEE</h1>
        </div>
        <!--Page -->
        <div class="page-info">
            <div class="container">
                    <ul>
                        <li style="color: white"><strong>About Adding New Employee Data</strong></li>
                    </ul>
            </div>
        </div>
        <!--End Page-->
    </div><!-- end section -->

    <?php echo $__env->make('admin.awan.gaya_awan', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
<div class="container z-depth-3" style="min-height: 300px">
    </br>
    <?php if(\Session::has('alert')): ?>
   <div class="alert alert-danger">
   		<strong><?php echo e(Session::get('alert')); ?></strong>
   </div>
   <?php elseif(\Session::has('success_alert')): ?>
   <div class="alert alert-success">
   		<strong><?php echo e(Session::get('success_alert')); ?></strong>
   </div>
   <?php endif; ?>
<form method="post" action="<?php echo e(url('/addnew')); ?>">
<?php echo e(csrf_field()); ?>

    <table>
        <thead>
            <tr>
                <td width="200px">NIP</td>
                <td>:</td>
                <td><input type="text" name="nip" maxlength="13" <?php echo e($rules); ?> style="font-size: 16px"/></td>
            </tr>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><input type="text" name="nama" maxlength="35" <?php echo e($rules); ?> style="font-size: 16px"/></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>
                    <div class="col s12">
                    <div class="input-field col s3 m3" style="font-size: 20px;">
                    <select name="gender" <?php echo e($rules); ?>>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    </div>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="email" maxlength="50" <?php echo e($rules); ?> style="font-size: 16px"/></td>
            </tr>
            <tr>
                <td>Position</td>
				<td>:</td>
				<td>
					<div class="col s12">
					<div class="input-field col s3 m3" style="font-size: 20px;">
					<select name="jabatan" <?php echo e($rules); ?>>
					<?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($jabatan->kd); ?>"><?php echo e($jabatan->jabatan); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					</div>
					</div>
				</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" maxlength="50" <?php echo e($rules); ?> style="font-size: 16px"/></td>
            </tr>
            <tr>
                <td>Repeat Password</td>
                <td>:</td>
                <td><input type="password" name="password2" maxlength="50" <?php echo e($rules); ?> style="font-size: 16px"/></td>
            </tr>
            <tr>
                <td colspan="3" align="center" style="padding-top: 30px"><button type="submit" class="btn btn-success btn-block" name="simpan" style="background-color: #000051; font-size: 20px" <?php echo e($rules); ?>/>Save</button>
                </td>
            </tr>
        </thead>
    </table>
</form>
</br>
</div>
</br>
</br>
</br>

<script type="text/javascript" src="<?php echo e(url('assets/js/materialize.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/js/materialize.min.js')); ?>"></script>
<script>
	$(document).ready(function(){
		$('select').material_select();
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>