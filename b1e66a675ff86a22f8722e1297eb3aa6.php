

<?php $__env->startSection('content'); ?>
<div class="h-24"></div>

<div class="container mx-auto px-4">
    <h1 class="text-3xl text-center font-bold text-white mb-10">🧾 Shrnutí objednávky</h1>

    <div class="bg-gray-900 text-white rounded-lg shadow-md p-6 max-w-md mx-auto">
        <?php if(session('cart') && count(session('cart')) > 0): ?>
            <ul class="space-y-4">
                <?php $total = 0; ?>
                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $total += $item['price'] * $item['quantity']; ?>
                    <li class="flex justify-between items-center border-b border-gray-700 pb-2">
                        <div>
                            <strong><?php echo e($item['name']); ?></strong><br>
                            <span class="text-sm text-gray-400"><?php echo e($item['price']); ?> Kč × <?php echo e($item['quantity']); ?></span>
                        </div>
                        <span class="font-semibold"><?php echo e($item['price'] * $item['quantity']); ?> Kč</span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <div class="flex justify-between items-center mt-6 border-t border-gray-700 pt-4">
                <span class="text-lg font-semibold">Celková cena:</span>
                <span class="text-lg font-bold text-green-400"><?php echo e($total); ?> Kč</span>
            </div>

            <form action="<?php echo e(route('checkout.confirm')); ?>" method="POST" class="mt-6 text-center">
                <?php echo csrf_field(); ?>
                <button
                    type="submit"
                    onclick="this.disabled=true; this.innerText='Odesílám...'; this.form.submit();"
                    class="bg-green-600 hover:bg-green-700 px-6 py-2 rounded text-white font-semibold transition"
                >
                    Potvrdit objednávku
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="<?php echo e(route('products.index')); ?>" class="text-indigo-400 hover:underline">
                    ← Zpět na produkty
                </a>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-400">Košík je prázdný 😢</p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Aly\Documents\2Laravel\Eshop_laravel\resources\views/checkout.blade.php ENDPATH**/ ?>