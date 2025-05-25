@section('page-class', 'questions-page')
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
            color: rgb(0, 0, 0);
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
            position: relative;
            z-index: 2;
            padding-top: 30vh; /* výchozí velké odsazení pro hlavní stránku */

    /* SPECIFICKY pro questions stránku menší padding */
        .content-wrapper.questions-page {
            padding-top: 2rem !important;
            margin-top: 0 !important;
        }
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
            object-position: center top; /* Přidáno - posune video nahoru */
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
            padding: 0.8rem 1.2rem;
            background: linear-gradient(90deg, #1f2937, #374151); /* tmavě modro-šedá */
            color: #e5e7eb; /* světlejší bílá */
            font-size: 16px;
            font-weight: 500;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.4s ease, transform 0.3s ease;
            box-shadow: 0 2px 8px rgba(31, 41, 55, 0.4);
}


.questions-page {
    padding-top: 6rem; /* nebo kolik chceš - třeba 4rem, 5rem */
}


.question-button:hover {
    background: linear-gradient(90deg, #374151, #4b5563); /* lehce světlejší modro-šedá */
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(75, 85, 99, 0.4);
}

        /* Fade-in and slide-up for answers */
        .answer {
            position: relative;
        background: linear-gradient(135deg, #1f2937, #374151); /* tmavá elegance */
        color: #d1d5db;
        border-radius: 12px;
        margin-top: 1rem;
        padding: 1.5rem;
        font-size: 15px;
        overflow: hidden;
        display: none;
}

.answer.show {
    display: block;
    animation: fadeIn 0.5s ease-out, breatheGlow 6s ease-in-out infinite;
}

/* Efekt "breathe" - světlo se jemně zvětšuje a zmenšuje */
@keyframes breatheGlow {
    0% {
        box-shadow: 0 0 10px rgba(75, 85, 99, 0.4), 0 0 20px rgba(75, 85, 99, 0.3);
    }
    50% {
        box-shadow: 0 0 20px rgba(107, 114, 128, 0.5), 0 0 30px rgba(107, 114, 128, 0.4);
    }
    100% {
        box-shadow: 0 0 10px rgba(75, 85, 99, 0.4), 0 0 20px rgba(75, 85, 99, 0.3);
    }
}

/* Jemné pulsování gradientu na pozadí odpovědi */
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

/* Animující gradient pozadí */
@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Pokud chceš aby odpovědi trošku "dýchaly" barevně */
.answer {
    background-size: 300% 300%;
    animation: gradientShift 12s ease infinite;
}

    </style>
</head>
<body class="font-sans antialiased">
    <div class="layout-wrapper bg-gray-100 dark:bg-gray-900">

        @include('layouts.navigation')

        <!-- OBSAH STRÁNKY -->
        <main class="content-wrapper questions-page">

            <!-- Tohle zabalíme do menšího containeru -->
            <div class="container mx-auto max-w-4xl pt-0 pb-10">
                <div class="space-y-6">
        
                    <!-- JEDNOTLIVÉ DOTAZY -->
                    <div class="space-y-6">

                        <div class="container mx-auto max-w-5xl pt-10 pb-20 space-y-16">    
    <!-- KATEGORIE: Péče o rostliny -->
    <div>
        <h2 class="text-3xl font-bold text-indigo-400 mb-6">🌱 Péče o rostliny</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Jednotlivé otázky -->
            <div class="question-section">
                <button class="question-button" onclick="toggleAnswer(this)">
                    Jak pečovat o pokojové rostliny?
                    <span class="toggle-icon">+</span>
                </button>
                <div class="answer hidden mt-2 px-6">
                    Pravidelná zálivka, dostatek světla a občasné hnojení jsou základem správné péče.
                </div>
            </div>

            <div class="question-section">
                <button class="question-button" onclick="toggleAnswer(this)">
                    Jak často mám zalévat rostliny?
                    <span class="toggle-icon">+</span>
                </button>
                <div class="answer hidden mt-2 px-6">
                    Záleží na druhu, většinou 1x týdně. V létě častěji, v zimě méně.
                </div>
            </div>

            <div class="question-section">
                <button class="question-button" onclick="toggleAnswer(this)">
                    Jak zachránit přelitou rostlinu?
                    <span class="toggle-icon">+</span>
                </button>
                <div class="answer hidden mt-2 px-6">
                    Nechte půdu vyschnout a případně přesadit do suchého substrátu.
                </div>
            </div>

            <div class="question-section">
                <button class="question-button" onclick="toggleAnswer(this)">
                    Jak poznám škůdce na rostlinách?
                    <span class="toggle-icon">+</span>
                </button>
                <div class="answer hidden mt-2 px-6">
                    Sledujte drobné tečky, pavučinky nebo deformace listů.
                </div>
            </div>
        </div>
    </div>

    <!-- KATEGORIE: Objednávky a doručení -->
    <div>
        <h2 class="text-3xl font-bold text-indigo-400 mb-6">📦 Objednávky a doručení</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="question-section">
                <button class="question-button" onclick="toggleAnswer(this)">
                    Jak je rostlina balená při doručení?
                    <span class="toggle-icon">+</span>
                </button>
                <div class="answer hidden mt-2 px-6">
                    Rostliny pečlivě balíme do ochranného obalu, aby se při přepravě nepoškodily.
                </div>
            </div>

            <div class="question-section">
                <button class="question-button" onclick="toggleAnswer(this)">
                    Kdy obdržím svou objednávku?
                    <span class="toggle-icon">+</span>
                </button>
                <div class="answer hidden mt-2 px-6">
                    Objednávky odesíláme do 2 pracovních dnů, doručení trvá obvykle 1–3 dny.
                </div>
            </div>
        </div>
    </div>

    <!-- KATEGORIE: Tipy a rady -->
    <div>
        <h2 class="text-3xl font-bold text-indigo-400 mb-6">💬 Tipy a rady</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="question-section">
                <button class="question-button" onclick="toggleAnswer(this)">
                    Jaké rostliny čistí vzduch v interiéru?
                    <span class="toggle-icon">+</span>
                </button>
                <div class="answer hidden mt-2 px-6">
                    Například lopatkovec, břečťan nebo tchynin jazyk jsou skvělé na čištění vzduchu.
                </div>
            </div>

            <div class="question-section">
                <button class="question-button" onclick="toggleAnswer(this)">
                    Jaké světlo je ideální pro rostliny?
                    <span class="toggle-icon">+</span>
                </button>
                <div class="answer hidden mt-2 px-6">
                    Ideální je světlé místo bez přímého poledního slunce – například u východního okna.
                </div>
            </div>

            <div class="question-section">
                <button class="question-button" onclick="toggleAnswer(this)">
                    Proč má moje rostlina žluté listy?
                    <span class="toggle-icon">+</span>
                </button>
                <div class="answer hidden mt-2 px-6">
                    Může jít o přelití, stres nebo nedostatek živin. Zkontrolujte podmínky pěstování.
                </div>
            </div>

        </div>
    </div>

</div>

</main> 

        @include('components.floating-button')
        @include('components.footer')

    </div>

    <!-- Skript pro animace -->
    <script>
        function toggleAnswer(button) {
            const answer = button.nextElementSibling;
            const isHidden = answer.classList.contains('hidden');
            answer.classList.toggle('hidden');
            answer.classList.toggle('show');
            button.querySelector('.toggle-icon').textContent = isHidden ? '−' : '+';
        }
    </script>

    <!-- Page Transition Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hasVisitedBefore = localStorage.getItem('hasVisitedBefore');
            const pageTransition = document.querySelector('.page-transition');
            const contentWrapper = document.querySelector('.content-wrapper');
            const transitionText = document.querySelector('.transition-text');
            const transitionSub = document.querySelector('.transition-sub');

            if (!hasVisitedBefore) {
                const tl = gsap.timeline({
                    onComplete: () => {
                        contentWrapper.classList.add('content-visible');
                        document.body.style.overflow = 'auto';
                    }
                });
                tl.to(pageTransition, { scaleX: 1, duration: 1.5, transformOrigin: 'left' })
                  .to(transitionText, { opacity: 1, y: -50, duration: 1.5 })
                  .to(transitionSub, { opacity: 1, y: -50, duration: 1.5 })
                  .to(transitionText, { opacity: 0, y: -50, duration: 0.5 })
                  .to(transitionSub, { opacity: 0, y: -50, duration: 0.5 })
                  .to(pageTransition, { scaleX: 0, duration: 1.5, transformOrigin: 'right' });
                localStorage.setItem('hasVisitedBefore', 'true');
            } else {
                contentWrapper.classList.add('content-visible');
                document.body.style.overflow = 'auto';
            }
        });

        window.addEventListener('scroll', () => {
            document.querySelectorAll('.scroll-animate').forEach(elem => {
                const rect = elem.getBoundingClientRect();
                if (rect.top <= window.innerHeight) {
                    elem.classList.add('show');
                }
            });
        });
    </script>
</body>
