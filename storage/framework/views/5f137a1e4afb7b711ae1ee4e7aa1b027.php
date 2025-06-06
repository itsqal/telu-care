<?php $__env->startSection('title', 'Tambah Laporan Kerusakan'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto bg-white p-0 md:p-8 rounded-2xl shadow-xl flex flex-col md:flex-row gap-8 mt-6">
    <!-- QR Code Scanner Section -->
    <div
        class="md:w-1/2 w-full flex flex-col items-center justify-center p-6 border-b md:border-b-0 md:border-r border-gray-100">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Scan QR Fasilitas</h2>
        <div class="relative w-full aspect-square overflow-hidden rounded-lg border border-gray-200 bg-gray-50">
            <div id="qr-reader" class="w-full h-full"></div>
            <div class="absolute top-0 left-0 w-full h-px bg-red-500 animate-scan-line"></div>
        </div>
        <div id="qr-reader-status" class="mt-3 text-sm text-gray-500"></div>
    </div>
    <!-- Form Section -->
    <div class="md:w-1/2 w-full p-6">
        <h1 class="text-2xl font-bold text-red-700 mb-8 tracking-tight">Tambah Laporan Kerusakan</h1>
        <form action="<?php echo e(route('reports.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-7">
            <?php echo csrf_field(); ?>
            <div>
                <label for="facility_id" class="block text-sm font-semibold text-gray-700 mb-1">Nama Fasilitas</label>
                <select id="facility_id" name="facility_id" required
                    class="mt-1 block w-full border-0 ring-1 ring-gray-300 focus:ring-2 focus:ring-red-600 rounded-lg px-4 py-2 bg-gray-50 text-gray-800 shadow-sm transition">
                    <option value="">-- Pilih Fasilitas --</option>
                    <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($facility->id); ?>" <?php echo e(old('facility_id')==$facility->id ? 'selected' : ''); ?>>
                        <?php echo e($facility->name); ?> (<?php echo e($facility->location); ?>)
                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['facility_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label for="location" class="block text-sm font-semibold text-gray-700 mb-1">Lokasi Kerusakan</label>
                <input type="text" id="location" name="location" value="<?php echo e(old('location')); ?>" required
                    class="mt-1 block w-full border-0 ring-1 ring-gray-300 focus:ring-2 focus:ring-red-600 rounded-lg px-4 py-2 bg-gray-50 text-gray-800 shadow-sm transition">
                <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi
                    Kerusakan</label>
                <textarea id="description" name="description" rows="4" required
                    class="mt-1 block w-full border-0 ring-1 ring-gray-300 focus:ring-2 focus:ring-red-600 rounded-lg px-4 py-2 bg-gray-50 text-gray-800 shadow-sm transition"><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label for="media" class="block text-sm font-semibold text-gray-700 mb-1">Unggah Foto/Video
                    (Opsional)</label>
                <input type="file" id="media" name="media" accept="image/*,video/*"
                    class="mt-1 block w-full text-gray-700 file:rounded-lg file:border-0 file:bg-red-50 file:text-red-700 file:font-semibold file:px-4 file:py-2 file:mr-4 file:shadow-sm file:transition hover:file:bg-red-100">
                <?php $__errorArgs = ['media'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="flex justify-end gap-4 mt-8">
                <a href="<?php echo e(route('reports.index')); ?>"
                    class="inline-block px-6 py-2 rounded-lg border border-gray-300 text-gray-600 bg-white hover:bg-gray-50 font-semibold transition">Batal</a>
                <button type="submit"
                    class="inline-block px-8 py-2 rounded-lg bg-gradient-to-r from-red-600 to-red-700 text-white font-bold shadow hover:from-red-700 hover:to-red-800 transition">Kirim
                    Laporan</button>
            </div>
        </form>
        <div id="qr-fail-message"
            class="mt-6 p-3 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm font-semibold items-center gap-2 hidden">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span>QR Code tidak valid. Pastikan Anda memindai QR fasilitas yang benar.</span>
            </div>
        </div>
    </div>
</div>
<!-- QR Code Scanner Script -->
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('html5-qrcode/qrcode-scanner.min.js')); ?>"></script>
<script>
    document.addEventListener('DOMContentLoaded', async function () {
        const status = document.getElementById('qr-reader-status');
        const reader = new Html5Qrcode("qr-reader");
        const facilitySelect = document.getElementById('facility_id');
        const locationInput = document.getElementById('location');
        const failMessage = document.getElementById('qr-fail-message');

        function showFailMessage() {
            failMessage.classList.remove('hidden');
            failMessage.classList.add('flex');
        }
        function hideFailMessage() {
            failMessage.classList.remove('flex');
            failMessage.classList.add('hidden');
        }

        try {
            const cameras = await Html5Qrcode.getCameras();
            if (cameras && cameras.length) {
                const cameraId = cameras[0].id;

                reader.start(
                    cameraId,
                    {
                        fps: 10,
                    },
                    qrCodeMessage => {
                        hideFailMessage();
                        let data;
                        try {
                            data = JSON.parse(qrCodeMessage);
                        } catch (e) {
                            status.textContent = "QR tidak valid.";
                            showFailMessage();
                            return;
                        }
                        // Autofill facility select
                        if (data.id) {
                            for (let i = 0; i < facilitySelect.options.length; i++) {
                                if (facilitySelect.options[i].value === data.id) {
                                    facilitySelect.selectedIndex = i;
                                    facilitySelect.dispatchEvent(new Event('change'));
                                    break;
                                }
                            }
                        }
                        // Autofill location
                        if (data.location) {
                            locationInput.value = data.location;
                        }
                        status.textContent = "QR Code berhasil terdeteksi";
                    },
                    errorMessage => {
                        console.warn(errorMessage);
                    }
                );
            } else {
                status.textContent = "Tidak ada kamera yang ditemukan.";
            }
        } catch (err) {
            console.error("Gagal mengakses kamera", err);
            status.textContent = "Gagal mengakses kamera: " + err;
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\WIN11\Documents\GitHub\telu-care\resources\views/reports/create.blade.php ENDPATH**/ ?>