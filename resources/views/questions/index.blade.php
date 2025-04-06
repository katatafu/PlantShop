<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- GSAP for animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <!-- Custom Styles -->
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
            overflow: scroll; /* Allow scrolling */
        }
        html {
            scrollbar-width: normal;
            scrollbar-color: blue;
        }
        body {
            background-color: grey;
            color: aqua;
        }
        .layout-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Black overlay and transition */
        .page-transition {
            position: absolute;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100vw;
            background: #000;
            z-index: 1000;
            transform: scaleX(0);
            transform-origin: left;
        }

        /* Text "Barvio" within the black overlay */
        .transition-text {
            font-size: 4rem;
            font-weight: bold;
            color: #fff;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;  /* Start hidden */
            z-index: 1001;  /* Above the black overlay */
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
            opacity: 0;  /* Start hidden */
            z-index: 1001;  /* Above the black overlay */
        }

        /* Main content wrapper */
        .content-wrapper {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        /* When the transition ends, content becomes visible */
        .content-visible {
            opacity: 1;
        }

        /* Hover effect on buttons */
        .question-button {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 15px;
            background-color: #2d2846;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .question-button:hover {
            transform: scale(1.05);
            background-color: #22263a;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        /* Fade-in and slide-up for answers */
        .answer {
            height: 0;
            overflow: hidden;
            opacity: 0;
            transition: height 0.5s ease, opacity 0.5s ease;
        }

        .answer.show {
            height: auto; /* Automatická výška podle obsahu */
            opacity: 1;
        }

        /* Scroll animations */
        .scroll-animate {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .scroll-animate.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Button text fade animation */
        .question-button span {
            transition: transform 0.3s ease;
        }

        .question-button.show span {
            transform: rotate(45deg);
        }

        /* Animace pro zobrazení odpovědi */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Skrytí odpovědi */
        .answer {
            display: none;
        }

        /* Zobrazení odpovědi s animací */
        .show {
            display: block;
            animation: fadeIn 0.5s ease-out;
        }

        .question-section {
            margin-bottom: 2rem;
        }

        .question-section button {
            width: 100%;
            text-align: left;
            padding: 15px;
            background-color: #333958;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .toggle-icon {
        font-weight: bold;
        font-size: 24px;
        margin-left: 1rem;
            transition: transform 0.3s ease;
        }

        .question-section button:focus {
            outline: none;
        }
        .faq-box {
        background-color: #1e1e2e;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
        max-height: 600px;
        overflow-y: scroll;
        scrollbar-width: thin;
        scrollbar-color: #6c63ff transparent;
}

.faq-box::-webkit-scrollbar {
    width: 8px;
}
.faq-box::-webkit-scrollbar-thumb {
    background-color: #6c63ff;
    border-radius: 6px;
}
.faq-box::-webkit-scrollbar-track {
    background: transparent;
}

/* Lepší rozložení pro tlačítko otázky */
.question-button {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.question-text {
    flex: 1;
    text-align: left;
}

.toggle-icon {
    margin-left: 1rem;
    font-size: 24px;
    font-weight: bold;
    transition: transform 0.3s ease;
}

    </style>
</head>
<body class="font-sans antialiased">
    <div class="layout-wrapper bg-gray-100 dark:bg-gray-900">
        <!-- Page transition overlay with "Barvio" text -->
        <div class="page-transition">
            <div class="transition-text">Barvio</div>
            <div class="transition-sub">Ecologic colors without oil</div>
        </div>

        @include('layouts.navigation')

        <main class="content-wrapper">
            <div class="container mx-auto py-10">
                <h1 class="text-5xl font-semibold text-center mb-8 text-white scroll-animate">Časté dotazy</h1>
                <div class="space-y-6">
                    <!-- Dotazy a odpovědi -->
        <div class="question-section">
            <button class="question-button" onclick="toggleAnswer(this)">
                <span class="question-text">Co nabízíte?</span>
                <span class="toggle-icon">+</span>
            </button>
            <div class="answer hidden mt-2 text-purple-400 px-6">
                Popis vašich produktů, služeb nebo činností.
            </div>
        </div>

        <div class="question-section">
            <button class="question-button" onclick="toggleAnswer(this)">
                <span class="question-text">Jak mohu vrátit produkt nebo zrušit objednávku?</span>
                <span class="toggle-icon">+</span>
            </button>
            <div class="answer hidden mt-2 text-purple-400 px-6">
                Vysvětlení podmínek pro vracení zboží nebo zrušení služby.
            </div>
        </div>

        <div class="question-section">
            <button class="question-button" onclick="toggleAnswer(this)">
                <span class="question-text">Jaké metody platby akceptujete?</span>
                <span class="toggle-icon">+</span>
            </button>
            <div class="answer hidden mt-2 text-purple-400 px-6">
                Seznam všech dostupných platebních metod (např. kreditní karty, PayPal, bankovní převod).
            </div>
        </div>

        <div class="question-section">
            <button class="question-button" onclick="toggleAnswer(this)">
                <span class="question-text">Máte nějaké slevy nebo akce?</span>
                <span class="toggle-icon">+</span>
            </button>
            <div class="answer hidden mt-2 text-purple-400 px-6">
                Informace o aktuálních slevách, kupónech nebo speciálních nabídkách.
            </div>
        </div>

        <div class="question-section">
            <button class="question-button" onclick="toggleAnswer(this)">
                <span class="question-text">Reklamace</span>
                <span class="toggle-icon">+</span>
            </button>
            <div class="answer hidden mt-2 text-purple-400 px-6">
                Reklamační řízení může být zahájeno, jestliže zákazník předloží kompletní reklamové zboží, prokáže nákup reklamovaného zboží dokladem o nákupu (prodejkou, fakturou) a doloží vyplněný list.
            </div>
        </div>

        <div class="question-section">
            <button class="question-button" onclick="toggleAnswer(this)">
                <span class="question-text">Jaké máte otevírací hodiny?</span>
                <span class="toggle-icon">+</span>
            </button>
            <div class="answer hidden mt-2 text-purple-400 px-6">
                Otevírací doba v týdnu, víkendy a svátky.
            </div>
        </div>

        <div class="question-section">
            <button class="question-button" onclick="toggleAnswer(this)">
                <span class="question-text">Jaké jsou podmínky pro vrácení zboží?</span>
                <span class="toggle-icon">+</span>
            </button>
            <div class="answer hidden mt-2 text-purple-400 px-6">
                Podmínky pro vrácení zboží a proces pro jeho vrácení.
            </div>
        </div>

        <div class="question-section">
            <button class="question-button" onclick="toggleAnswer(this)">
                <span class="question-text">Jak mohu změnit svou objednávku?</span>
                <span class="toggle-icon">+</span>
            </button>
            <div class="answer hidden mt-2 text-purple-400 px-6">
                Pokyny pro úpravu objednávky po jejím zadání.
            </div>
        </div>

                </div>
            </div>
        </main>

        @include('components.floating-button')
        @include('components.footer')
    </div>

    <!-- Page Transition Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hasVisitedBefore = localStorage.getItem('hasVisitedBefore');
            if (!hasVisitedBefore) {
                const pageTransition = document.querySelector('.page-transition');
                const contentWrapper = document.querySelector('.content-wrapper');
                const transitionText = document.querySelector('.transition-text');
                const transitionSub = document.querySelector('.transition-sub');

                const tl = gsap.timeline({
                    onComplete: () => {
                        contentWrapper.classList.add('content-visible');
                        document.body.style.overflow = 'auto';
                    }
                });

                tl.to(pageTransition, { scaleX: 1, duration: 1.5, transformOrigin: 'left' })
                  .to(transitionText, { opacity: 1, y: -50, duration: 1.5, ease: "power3.out" })
                  .to(transitionSub, { opacity: 1, y: -50, duration: 1.5, ease: "power3.out" })
                  .to(transitionText, { opacity: 0, y: -50, duration: 0.5, ease: "power3.out" })
                  .to(transitionSub, { opacity: 0, y: -50, duration: 0.5, ease: "power3.in" })
                  .to(pageTransition, { scaleX: 0, duration: 1.5, transformOrigin: 'right' });

                localStorage.setItem('hasVisitedBefore', 'true');
            } else {
                document.querySelector('.content-wrapper').classList.add('content-visible');
                document.body.style.overflow = 'auto';
            }
        });

        window.addEventListener('scroll', () => {
            const scrollElems = document.querySelectorAll('.scroll-animate');
            scrollElems.forEach(elem => {
                const rect = elem.getBoundingClientRect();
                if (rect.top <= window.innerHeight) {
                    elem.classList.add('show');
                }
            });
        });

        function toggleAnswer(button) {
            const answer = button.nextElementSibling;
            const isHidden = answer.classList.contains('hidden');
            answer.classList.toggle('hidden');
            answer.classList.toggle('show');
            button.querySelector('.toggle-icon').textContent = isHidden ? '−' : '+';
        }
    </script>
</body>
</html>
