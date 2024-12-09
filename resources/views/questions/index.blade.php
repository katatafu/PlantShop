@extends('layouts.app')

@section('content')
<div class="h-20"> </div>
<div class="container mx-auto py-10">
    <h1 class="text-5xl font-semibold text-center mb-8 text-white">Časté dotazy</h1>
    <div class="space-y-6">
        <!-- První dotaz -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Jak dlouho trvá zpracování mé žádosti?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-gray-700 px-6">
                Zpracování žádosti obvykle trvá 1-2 pracovní dny. Budeme vás informovat e-mailem.
            </div>
        </div>

        <!-- Druhý dotaz -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Jak mohu kontaktovat podporu?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-gray-700 px-6">
                Podporu můžete kontaktovat prostřednictvím našeho e-mailu support@firma.cz nebo telefonicky na čísle 123 456 789.
            </div>
        </div>

        <!-- Třetí dotaz -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Nabízíte vrácení peněz?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-gray-700 px-6">
                Ano, nabízíme vrácení peněz do 30 dnů od zakoupení, pokud nejste s produktem spokojeni.
            </div>
        </div>
    </div>
</div>

<script>
function toggleAnswer(button) {
    const answer = button.nextElementSibling;
    const isHidden = answer.classList.contains('hidden');
    answer.classList.toggle('hidden');
    button.querySelector('span').textContent = isHidden ? '−' : '+';
}
</script>
@endsection
