<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" href="<?php echo e(asset('appicon.ico')); ?>" type="image/x-icon">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="flex min-h-screen">
    <aside class="p-4 space-y-2 rounded-tr-lg rounded-br-lg w-1/6 bg-[var(--color-red-main)] h-full fixed inset-y-0 left-0 flex flex-col justify-between z-50">
        <div class="flex items-center justify-start gap-2 mb-6">
            <img class="w-8" src="<?php echo e(asset('images/logo.png')); ?>" alt="">
            <span class="text-white text-lg font-semibold">Tel-U Care</span>
        </div>
    
        <?php if (isset($component)) { $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df = $attributes; } ?>
<?php $component = App\View\Components\NavLink::resolve(['href' => '/admin/facilities'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\NavLink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-current group-hover:text-white" viewBox="0 0 1024 1024">
                <path fill="currentColor" d="M992 1024H32q-13 0-22.5-9.5T0 992t9.5-22.5T32 960h32q27 0 45.5-19t18.5-45V64q0-26 19-45t45-19h640q27 0 45.5 19T896 64v832q0 27 19 45.5t45 18.5h32q13 0 22.5 9.5t9.5 22.5t-9.5 22.5t-22.5 9.5zM384 160q0-13-9.5-22.5T352 128h-64q-13 0-22.5 9.5T256 160v64q0 13 9.5 22.5T288 256h64q13 0 22.5-9.5T384 224v-64zm0 192q0-13-9.5-22.5T352 320h-64q-13 0-22.5 9.5T256 352v64q0 13 9.5 22.5T288 448h64q13 0 22.5-9.5T384 416v-64zm0 192q0-13-9.5-22.5T352 512h-64q-13 0-22.5 9.5T256 544v64q0 13 9.5 22.5T288 640h64q13 0 22.5-9.5T384 608v-64zm192-384q0-13-9.5-22.5T544 128h-64q-13 0-22.5 9.5T448 160v64q0 13 9.5 22.5T480 256h64q13 0 22.5-9.5T576 224v-64zm0 192q0-13-9.5-22.5T544 320h-64q-13 0-22.5 9.5T448 352v64q0 13 9.5 22.5T480 448h64q13 0 22.5-9.5T576 416v-64zm0 192q0-13-9.5-22.5T544 512h-64q-13 0-22.5 9.5T448 544v64q0 13 9.5 22.5T480 640h64q13 0 22.5-9.5T576 608v-64zm32 224H416q-13 0-22.5 9.5T384 800v128q0 13 9.5 22.5T416 960h192q13 0 22.5-9.5T640 928V800q0-13-9.5-22.5T608 768zm160-608q0-13-9.5-22.5T736 128h-64q-13 0-22.5 9.5T640 160v64q0 13 9.5 22.5T672 256h64q13 0 22.5-9.5T768 224v-64zm0 192q0-13-9.5-22.5T736 320h-64q-13 0-22.5 9.5T640 352v64q0 13 9.5 22.5T672 448h64q13 0 22.5-9.5T768 416v-64zm0 192q0-13-9.5-22.5T736 512h-64q-13 0-22.5 9.5T640 544v64q0 13 9.5 22.5T672 640h64q13 0 22.5-9.5T768 608v-64z"/>
            </svg>
            Fasilitas
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $attributes = $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $component = $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>
        
        <?php if (isset($component)) { $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df = $attributes; } ?>
<?php $component = App\View\Components\NavLink::resolve(['href' => '/admin/reports'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\NavLink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <svg class="w-4 h-4 text-current group-hover:text-white" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.5 2C0.5 1.46957 0.710714 0.960859 1.08579 0.585786C1.46086 0.210714 1.96957 0 2.5 0C2.5 0.795649 2.81607 1.55871 3.37868 2.12132C3.94129 2.68393 4.70435 3 5.5 3H7.5C8.29565 3 9.05871 2.68393 9.62132 2.12132C10.1839 1.55871 10.5 0.795649 10.5 0C11.0304 0 11.5391 0.210714 11.9142 0.585786C12.2893 0.960859 12.5 1.46957 12.5 2V8H7.914L9.207 6.707C9.38916 6.5184 9.48995 6.2658 9.48767 6.0036C9.4854 5.7414 9.38023 5.49059 9.19482 5.30518C9.00941 5.11977 8.7586 5.0146 8.4964 5.01233C8.2342 5.01005 7.9816 5.11084 7.793 5.293L4.793 8.293C4.60553 8.48053 4.50021 8.73484 4.50021 9C4.50021 9.26516 4.60553 9.51947 4.793 9.707L7.793 12.707C7.9816 12.8892 8.2342 12.99 8.4964 12.9877C8.7586 12.9854 9.00941 12.8802 9.19482 12.6948C9.38023 12.5094 9.4854 12.2586 9.48767 11.9964C9.48995 11.7342 9.38916 11.4816 9.207 11.293L7.914 10H12.5V13C12.5 13.5304 12.2893 14.0391 11.9142 14.4142C11.5391 14.7893 11.0304 15 10.5 15H2.5C1.96957 15 1.46086 14.7893 1.08579 14.4142C0.710714 14.0391 0.5 13.5304 0.5 13V2ZM12.5 8H14.5C14.7652 8 15.0196 8.10536 15.2071 8.29289C15.3946 8.48043 15.5 8.73478 15.5 9C15.5 9.26522 15.3946 9.51957 15.2071 9.70711C15.0196 9.89464 14.7652 10 14.5 10H12.5V8Z" fill="currentColor"/>
            </svg>
            Laporan Kendala
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $attributes = $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $component = $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>

        <form action="/logout" method="POST" class="mt-auto">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="w-full px-3 py-2 rounded hover:bg-[var(--color-dark-red)] hover:text-gray-200 text-white text-sm flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4 stroke-white group-hover:stroke-white" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 13L5 9M5 9L9 5M5 9H19M14 13V14C14 14.7956 13.6839 15.5587 13.1213 16.1213C12.5587 16.6839 11.7956 17 11 17H4C3.20435 17 2.44129 16.6839 1.87868 16.1213C1.31607 15.5587 1 14.7956 1 14V4C1 3.20435 1.31607 2.44129 1.87868 1.87868C2.44129 1.31607 3.20435 1 4 1H11C11.7956 1 12.5587 1.31607 13.1213 1.87868C13.6839 2.44129 14 3.20435 14 4V5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Keluar
            </button>
        </form>
    </aside>
    
    <div class="flex flex-col w-full">
        
        <nav class="bg-white p-4 shadow-md text-right items-center sticky z-10 top-0">
            <div class="flex flex-col text-right">
                <span class="font-medium font-poppins text-sm"><a href="#"></a><?php echo e(Auth::user()->email); ?></span>
                <span class="font-normal font-poppins text-sm text-[#64748B]"><?php echo e(Auth::user()->name); ?></span>
            </div>
        </nav>

        
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>

</html><?php /**PATH C:\Users\WIN11\Documents\GitHub\telu-care\resources\views/layouts/main.blade.php ENDPATH**/ ?>