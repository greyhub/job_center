<?php $__env->startSection('main_content'); ?>
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Quản lý người dùng</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin')); ?>">Admin</a></li>
            <li class="breadcrumb-item active"><?php echo e($name); ?></li>
        </ol>
        <?php if(session('message')): ?>
        <div class="alert alert-success"><?php echo e(session('message')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
        <div class="alert alert-danger text-center"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                <?php if($name == 'user' ): ?>
                Danh sách người dùng
                <?php else: ?>
                Danh sách Admin
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="d-flex">
                                <th class="col-1">STT</th>
                                <th class="col-2">Email</th>
                                <th class="col-2">Tên</th>
                                <th class="col-3">Họ và tên đệm</th>
                                <th class="col-2">Ngày sinh</th>
                                <th class="col-2">Giới tính</th>
                                <th class="col-2">Thành phố</th>
                                <th class="col-2">Ngành nghề</th>
                                <th class="col-2">Ngày đăng ký</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr class="d-flex">
                                <th class="col-1">STT</th>
                                <th class="col-2">Email</th>
                                <th class="col-2">Tên</th>
                                <th class="col-3">Họ và tên đệm</th>
                                <th class="col-2">Ngày sinh</th>
                                <th class="col-2">Giới tính</th>
                                <th class="col-2">Thành phố</th>
                                <th class="col-2">Ngành nghề</th>
                                <th class="col-2">Ngày đăng ký</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="d-flex">
                                <td class="col-1"><?php echo e($i++); ?></th>
                                <td class="col-2"><?php echo e($user->email); ?></th>
                                <td class="col-2"><?php echo e($user->first_name); ?></th>
                                <td class="col-3"><?php echo e($user->last_name ?? ''); ?></th>
                                <td class="col-2"><?php echo e($user->birthday ?? ''); ?></th>
                                <td class="col-2"><?php echo e($user->gender ?? ''); ?></th>
                                <td class="col-2"><?php echo e($user->city->name ?? ''); ?></th>
                                <td class="col-2"><?php echo e($user->sector ?? ''); ?></th>
                                <td class="col-2"><?php echo e($user->created_at ?? ''); ?></th>
                                <td class="col-2">
                                    <form class="delete" action="<?php echo e(route('admin.edit', $user->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <?php if($name == 'user'): ?>
                                        <input type="text" name="role" value="<?php echo e('admin'); ?>" hidden="true">
                                        <button id="btn-delete" class="btn btn-success float-left" type="submit">
                                            +A
                                        </button>
                                        <?php else: ?>
                                        <input type="text" name="role" value="<?php echo e('user'); ?>" hidden="true">
                                        <button id="btn-delete" class="btn btn-success float-left" type="submit">
                                            -A
                                        </button>
                                        <?php endif; ?>
                                    </form>
                                    <form class="delete" action="<?php echo e(route('user.delete', $user->id)); ?>" method="POSt">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button id="btn-delete" class="btn btn-danger float" type="submit">
                                        <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php echo e($users->links()); ?>

            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dinhmanh/Desktop/JOB_TKHTTT/resources/views/admin/user.blade.php ENDPATH**/ ?>