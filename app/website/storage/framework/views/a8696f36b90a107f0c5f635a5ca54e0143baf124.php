<?php $__env->startSection('main_content'); ?>
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Quản lý việc làm </h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin')); ?>">Admin</a></li>
            <li class="breadcrumb-item active"><?php echo e($status); ?></li>
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
                Danh sách việc làm
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="d-flex">
                                <th class="col-1">STT</th>
                                <th class="col-3">Tên</th>
                                <th class="col-2">Thành phố</th>
                                <th class="col-2">Ngành nghề</th>
                                <th class="col-2">Công ty</th>
                                <th class="col-2">Lương</th>
                                <th class="col-1">Trạng thái</th>
                                <th class="col-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="d-flex">
                                <td class="col-1"><?php echo e($i++); ?></td>
                                <td class="col-3"><?php echo e($job->title); ?></td>
                                <td class="col-2"><?php echo e($job->city->name); ?></td>
                                <td class="col-2"><?php echo e($job->sector); ?></td>
                                <td class="col-2"><?php echo e($job->company_name); ?></td>
                                <td class="col-2"><?php echo e($job->salary); ?></td>
                                <td class="col-1">
                                    <?php echo e($job->status); ?>

                                </td>
                                <td class="col-3">
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('job-show', ['slug' => $job->slug])); ?>">
                                            <button class="btn btn-info float-left" type="submit" title="Show">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <?php if($job->status != 'Hiển thị'): ?>
                                        <form class="delete" action="<?php echo e(route('admin.job.show', $job->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <button id="btn-delete" class="btn btn-success float-left btn-delete" type="submit" title="Hiển thị">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <?php endif; ?>
                                        <?php if($job->status != 'Ẩn'): ?>
                                        <form class="delete" action="<?php echo e(route('admin.job.hidden', $job->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <button id="btn-delete" class="btn btn-secondary float-left btn-delete" type="submit" title="Hidden">
                                            <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <?php endif; ?>
                                        <form class="delete" action="<?php echo e(route('admin.job.destroy', $job->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button id="btn-delete" class="btn btn-danger float-left btn-delete" type="submit" title="<?php echo e(trans('app.delete')); ?>">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php echo e($jobs->links()); ?>

            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dinhmanh/Desktop/JOB_TKHTTT/resources/views/admin/job.blade.php ENDPATH**/ ?>