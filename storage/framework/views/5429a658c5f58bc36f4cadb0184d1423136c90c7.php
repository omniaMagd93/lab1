<?php $__env->startSection('content'); ?>


<div class="col-md-12 text-center"> 

<button type="button" class="btn btn-success" onclick="window.location='<?php echo e(url("posts/create")); ?>'">Create Post</button>

</div>

<div class ="container-fluid"> 
<table  class="table table-bordered table-striped text-center">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
      <th scope="row">1</th>
      <td><?php echo e($post->title); ?></td>
      <td><?php echo e($post->user->name); ?></td>
      <td><?php echo e(date('Y-m-d', strtotime($post->created_at))); ?></td>
      <td>
        <button type="button" class="btn btn-info" onclick="window.location='<?php echo e(url("posts/$post->id")); ?>'" >View</button>
        <button type="button" class="btn btn-primary"  onclick="window.location='<?php echo e(url("posts/$post->id/edit")); ?>'" >Edit</button>
        <form action="posts/delete" method="post">
          <?php echo e(csrf_field()); ?>

<?php echo e(method_field('Delete')); ?>

<button onclick="return confirm('Are You Sure ?')" type="button" class="btn btn-danger">Delete</button>
</form>
        
      </td>
    </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
  </tbody>
</table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>