<?php $__env->startSection('content'); ?>

<div class ="container-fluid" >
 <form >
  <fieldset>
    <legend>Post Info</legend>
    <table>

    	<tr>
    <td>Title:</td>
    <td> <?php echo e($post->title); ?></td>
        </tr>

        <tr>
        	<td>Description:</td>
        	<td><?php echo e($post->description); ?></td>
        </tr>

        
    </table>
  </fieldset>
</form> 

<br>
<br>

 <form>
  <fieldset>
    <legend>Post Creator Info</legend>
    <table>

        <tr>
    <td>Name:</td>
    <td> <?php echo e($post->user->name); ?></td>
        </tr>
  
        <tr>
            <td>Email:</td>
            <td><?php echo e($post->user->email); ?></td>
        </tr>
         <tr>
            <td>Date:</td>
            <td><?php echo e($post->creat_date); ?></td>
        </tr>

        
    </table>
  </fieldset>
</form> 

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>