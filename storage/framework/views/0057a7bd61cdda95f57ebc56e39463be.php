<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['href', 'active']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['href', 'active']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $baseClass = 'px-3 py-2 rounded text-sm flex items-center gap-2 cursor-pointer transition';
    $activeClass = $active
        ? 'bg-white text-[var(--color-red-main)] font-semibold'
        : 'text-white hover:bg-[var(--color-dark-red)] hover:text-gray-200';
?>

<a href="<?php echo e($href); ?>" class="<?php echo e($baseClass); ?> <?php echo e($activeClass); ?>">
    <?php echo e($slot); ?>

</a><?php /**PATH C:\Users\WIN11\Documents\GitHub\telu-care\resources\views/components/nav-link.blade.php ENDPATH**/ ?>