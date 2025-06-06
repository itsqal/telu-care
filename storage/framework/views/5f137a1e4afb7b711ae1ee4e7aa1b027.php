<?php $__env->startSection('title', 'Tambah Laporan Kerusakan'); ?>

<?php $__env->startSection('content'); ?>
<div class="ml-64 px-8 py-10"> 
    <h1 class="text-2xl font-bold text-red-700 flex items-center gap-2 mb-8">
        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Tambah Laporan Kerusakan
    </h1>

    <form action="<?php echo e(route('reports.store')); ?>" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php echo csrf_field(); ?>

        
        <div>
            <label for="facility_id" class="block text-sm font-medium text-gray-700">Pilih Fasilitas <span class="text-red-600">*</span></label>
            <select id="facility_id" name="facility_id" required
                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Fasilitas --</option>
                <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($facility->id); ?>" <?php echo e(old('facility_id') == $facility->id ? 'selected' : ''); ?>>
                        <?php echo e($facility->name); ?> (<?php echo e($facility->location); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['facility_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Lokasi Kerusakan <span class="text-red-600">*</span></label>
            <input type="text" id="location" name="location" value="<?php echo e(old('location')); ?>" required
                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="col-span-1 md:col-span-2">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Kerusakan <span class="text-red-600">*</span></label>
            <textarea id="description" name="description" rows="4" required
                placeholder="Contoh: AC tidak dingin, suara bising dari mesin, dll."
                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"><?php echo e(old('description')); ?></textarea>
            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="col-span-1 md:col-span-2">
            <label for="media" class="block text-sm font-medium text-gray-700">Unggah Foto/Video (Opsional)</label>
            <input type="file" id="media" name="media" accept="image/*,video/*"
                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500">
            <?php $__errorArgs = ['media'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="col-span-1 md:col-span-2 flex justify-end gap-4">
            <a href="<?php echo e(route('reports.index')); ?>"
               class="text-gray-600 hover:text-red-600 font-medium transition duration-200">Batal</a>
            <button type="submit"
                class="bg-red-700 text-white px-6 py-2 rounded-md hover:bg-red-800 transition duration-200">
                Kirim Laporan
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\WIN11\Documents\GitHub\telu-care\resources\views/reports/create.blade.php ENDPATH**/ ?>