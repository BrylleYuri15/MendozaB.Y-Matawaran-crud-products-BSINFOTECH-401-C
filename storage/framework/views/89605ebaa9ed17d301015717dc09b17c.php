



<?php $__env->startSection('content'); ?>
    <h1>Edit Product</h1>
    <form action="<?php echo e(route('products.update', $product)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo e($product->name); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"><?php echo e($product->description); ?></textarea>
        </div>
        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control">
            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Current Image" class="img-thumbnail mt-2">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProductManagement\resources\views/products/edit.blade.php ENDPATH**/ ?>