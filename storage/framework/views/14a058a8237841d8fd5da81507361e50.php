<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
            offset: 120
        });
    </script>
    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- GSAP for animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <style>     
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
            overflow: auto;
        }
        html {
            scrollbar-width: normal;
            scrollbar-color: rgb(70, 70, 77);
        }
        body {
            background-color: grey;
            color: rgb(0, 0, 0);
        }
        .layout-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .page-transition {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100vw;
            background: #000;
            z-index: 1000;
            transform: scaleX(0);
            transform-origin: left;
        }
        .transition-text {
            font-size: 4rem;
            font-weight: bold;
            color: #fff;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            z-index: 1001;
        }
        .transition-sub {
            font-size: 3rem;
            font-weight: bold;
            color: #fff;
            text-align: center;
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            z-index: 1001;
        }
        .content-wrapper {
            opacity: 0;
            transition: opacity 1s ease-in-out;
            position: relative;
            z-index: 2; /* nad videem */
        }
        .content-visible {
            opacity: 1;
        }
        [data-aos] {
            transition-property: transform, opacity;
        }
        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -2;
            object-fit: cover;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5); /* černý poloprůhledný filtr */
            z-index: -1;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="layout-wrapper">

        <!-- Video pozadí -->
        <video autoplay muted loop class="video-background">
            <source src="<?php echo e(asset('videos/background.mp4')); ?>" type="video/mp4">
            Váš prohlížeč nepodporuje HTML5 video.
        </video>

        <!-- Tmavé překrytí přes video -->
        <div class="overlay"></div>

        <!-- Page transition overlay -->
        <div class="page-transition">
            <div class="transition-text">Barvio</div>
            <div class="transition-sub">Ecologic colors without oil</div>
        </div>

        <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <main class="content-wrapper questions-page">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <?php echo $__env->make('components.floating-button', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Page Transition Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hasVisitedBefore = localStorage.getItem('hasVisitedBefore');
            const initAOS = () => {
                AOS.init({
                    duration: 800,
                    easing: 'ease-out-quad',
                    once: true,
                    offset: 120,
                    delay: 200
                });
            };

            if (!hasVisitedBefore) {
                const tl = gsap.timeline({
                    onComplete: () => {
                        document.querySelector('.content-wrapper').classList.add('content-visible');
                        document.body.style.overflow = 'auto';
                        initAOS();
                    }
                });

                tl.to('.page-transition', { scaleX: 1, duration: 1.5, transformOrigin: 'left' })
                  .to('.transition-text', { opacity: 1, y: -50, duration: 1.5, ease: "power3.out" }, 0)
                  .to('.transition-sub', { opacity: 1, y: -50, duration: 1.5, ease: "power3.out" }, 0.2)
                  .to('.transition-text', { opacity: 0, y: -80, duration: 0.5, ease: "power3.out" }, 1.5)
                  .to('.transition-sub', { opacity: 0, y: -80, duration: 0.5, ease: "power3.in" }, 1.5)
                  .to('.page-transition', { scaleX: 0, duration: 1.5, transformOrigin: 'right' });

                localStorage.setItem('hasVisitedBefore', 'true');
            } else {
                document.querySelector('.content-wrapper').classList.add('content-visible');
                document.body.style.overflow = 'auto';
                initAOS();
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\Aly\Documents\2Laravel\Eshop_laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>