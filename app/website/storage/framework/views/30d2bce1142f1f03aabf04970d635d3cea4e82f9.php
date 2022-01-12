<?php $__env->startSection('content'); ?>

      <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('message.add_user')); ?>

                </div>

                <div class="panel-body">
                    <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form action="<?php echo e(route('users.store')); ?>" method="POST" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label"><?php echo e(trans('message.username')); ?></label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="user-name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label"><?php echo e(trans('message.useremail')); ?></label>
                        <div class="col-sm-6">
                            <input type="text" name="email" id="user-email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i><?php echo e(trans('message.add')); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Current Tasks -->
        <?php if(isset($users)): ?>
            <?php if(count($users) > 0): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo e(trans('message.current_users')); ?>

                    </div>
                    <div class="panel-body">
                        <?php if(session('message')): ?>
                            <div class="alert alert-success"><?php echo e(session('message')); ?></div>
                        <?php endif; ?>
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger text-center"><?php echo e(session('error')); ?></div>
                        <?php endif; ?>
                        <table class="table table-striped task-table">
                            <thead>
                                <th><?php echo e(trans('message.username')); ?></th>
                                <th><?php echo e(trans('message.useremail')); ?></th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="table-text"><div><?php echo e($user->name); ?></div></td>
                                        <td class="table-text"><div><?php echo e($user->email); ?></div></td>
                                        <td>
                                            <form action="<?php echo e(route('users.edit', $user->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i><?php echo e(trans('message.edit')); ?>

                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i><?php echo e(trans('message.delete')); ?>

                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dinhmanh/laravel_quicktask/resources/views/users/index.blade.php ENDPATH**/ ?>