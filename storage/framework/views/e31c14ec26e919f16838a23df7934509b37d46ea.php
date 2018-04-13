<?php $__env->startSection('content'); ?>

<h1>in create</h1>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form class ="container-fluid" method="post" action="/posts">

<?php echo e(csrf_field()); ?>


  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter title">
  </div>

 <div class="form-group">
    <label for="exampleDescription">Description</label>
    <textarea class="form-control" name="description" rows="3"></textarea>
  </div>

   <div class="form-group">
    <label for="exampleSelect1">Post Creator</label>
    <select class="form-control" name="user_id">

    	<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>
  </div>

  
  <button type="submit" class="btn btn-success">Create</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>