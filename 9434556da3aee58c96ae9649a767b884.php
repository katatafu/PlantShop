<?php $__env->startSection('content'); ?>
<div class="h-20"></div>

<div class="container mx-auto mt-8 px-4">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Produkty vlevo -->
        <div class="lg:w-3/4">
            <h1 class="text-3xl font-semibold text-white mb-6">Naše Produkty</h1>

            <!-- Filtrování -->
            <form action="<?php echo e(route('products.index')); ?>" method="GET" class="flex flex-col md:flex-row gap-4 mb-6">
                <select name="category" class="px-4 py-2 rounded bg-gray-800 text-white">
                    <option value="Všechny">Všechny</option>
                    <option value="Kaktusy">Kaktusy</option>
                    <option value="Sukulenty">Sukulenty</option>
                    <option value="Palmy">Palmy</option>
                    <option value="Bylinky">Bylinky</option>
                </select>
                <button type="submit" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                    Filtrovat
                </button>
            </form>

            <!-- Grid s produkty -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-black bg-opacity-50 rounded-lg shadow-md overflow-hidden hover:scale-105 transition transform duration-300">
                        <img src="<?php echo e($product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300'); ?>" class="w-full h-48 object-cover">
                        <div class="p-4 text-white text-center">
                            <h2 class="text-xl font-bold mb-2"><?php echo e($product->name); ?></h2>
                            <p class="text-sm text-gray-300"><?php echo e($product->description); ?></p>
                            <p class="text-indigo-400 font-bold mt-2">Cena: <?php echo e($product->price); ?> Kč</p>

                            <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST" class="mt-4">
                                <?php echo csrf_field(); ?>
                                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                    Přidat do košíku
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Košík vpravo -->
        <div class="lg:w-1/4 bg-gray-900 text-white rounded-lg shadow-md p-4 h-fit sticky top-24">
            <h2 class="text-xl font-bold mb-4">🛒 Tvůj košík</h2>

            <?php if(session('cart') && count(session('cart')) > 0): ?>
                <ul class="space-y-4">
                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="bg-gray-800 p-3 rounded flex justify-between items-center">
                            <div>
                                <strong><?php echo e($item['name']); ?></strong><br>
                                <span class="text-sm text-gray-300">Cena: <?php echo e($item['price']); ?> Kč × <?php echo e($item['quantity']); ?></span>
                            </div>
                            <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button class="text-red-400 hover:underline">Odebrat</button>
                            </form>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <!-- Tlačítko Pokračovat k platbě -->
                <div class="mt-6 text-center">
                    <a href="<?php echo e(route('checkout')); ?>"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded font-semibold transition">
                        Pokračovat k platbě
                    </a>
                </div>
            <?php else: ?>
                <p class="text-gray-400">Košík je prázdný.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Aly\Documents\2Laravel\Eshop_laravel\resources\views/products/index.blade.php ENDPATH**/ ?>