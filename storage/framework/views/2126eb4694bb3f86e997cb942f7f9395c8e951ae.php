<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr class="ui-state-default sortable-item" data-category-id="<?php echo e($item->id); ?>">

        <td width="50"><i class="fa fa-bars" aria-hidden="true"></i></td>

        <td> <?php echo e($item->id); ?> </td>

        <td> <?php echo e($item->name); ?> </td>

        

        <td>

            <div class="clearfix">

                <a href="<?php echo e(url(getCurrentLocale() . '/manager/category/' . $item->id . '/edit')); ?>" class="btn btn-icon-only blue">

                    <i class="fa fa-edit"></i>

                </a>

                <!-- Button trigger modal -->

                <a href="javascript:;" class="btn btn-primary red del" data-toggle="modal" data-target="#delete-item" data-element-id="<?php echo e($item->id); ?>" data-delete-url="category/destroy">

                    <i class="fa fa-trash"></i>

                </a>

            </div>

        </td>

        <td>
            <input type="checkbox" class="make-switch show-hide-toggle" data-category-id="<?php echo e($item->id); ?>" data-on-color="primary" data-off-color="default" data-size="small" data-on-text="Show" data-off-text="Hide"<?php echo e($item->show ? ' checked' : ''); ?>>
        </td>

    </tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_category/category_items.blade.php ENDPATH**/ ?>