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
      <th scope="col">Slug</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <tr>
      <th scope="row"><?php echo e($post->id); ?></th>
      <td><?php echo e($post->title); ?></td>
      <td><?php echo e($post->user->name); ?></td>
      <td><?php echo e(date('Y-m-d', strtotime($post->created_at))); ?></td>
     <td><?php echo e($post->slug); ?></td>
      <td>
        <button type="button" class="btn btn-info" onclick="window.location='<?php echo e(url("posts/$post->id")); ?>'" >View</button>
        <button type="button" class="btn btn-primary"  onclick="window.location='<?php echo e(url("posts/$post->id/edit")); ?>'" >Edit</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo e($post->id); ?>">
  Launch demo modal
</button>
 <button targ="<?php echo e($post->id); ?>" class="btn btn-warning" > view Ajax </button>
        <form action="/posts/<?php echo e($post->id); ?>" method="post">
          <?php echo e(csrf_field()); ?>

<?php echo e(method_field('DELETE')); ?>

<button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure ?');">Delete</button>
</form>
        
      </td>
      
    </tr>

<!--modal show -->

<div class="modal fade" id="exampleModal<?php echo e($post->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo e($post->id); ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label><?php echo e($post->id); ?></label>
        <label><?php echo e($post->title); ?></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end -->

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

  </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
  
    <?php echo e($posts->links()); ?>

    
  </ul>
</nav>


</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>