<div x-data="{ open: false }" @click.outside="open = false" <?php echo e($attributes); ?>>
    <div @click="open = ! open">
        <?php echo e($trigger); ?>

    </div>

    <div x-show="open">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\Users\Aly\Documents\2Laravel\Eshop_laravel\vendor\blade-ui-kit\blade-ui-kit\src/../resources/views/components/navigation/dropdown.blade.php ENDPATH**/ ?>