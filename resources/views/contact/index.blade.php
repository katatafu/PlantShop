@extends('layouts.app')

@section('content')
<div class="h-20"> </div>
<div class="container mx-auto py-10">
    <h1 class="text-5xl font-semibold text-center mb-8 text-white">Kontaktujte nás</h1>
    <p class="text-center text-gray-600 text-xl mb-12">
        Máte otázky? Vyplňte formulář níže a my se vám co nejdříve ozveme!
    </p>
</div>
@include('components.contact-form')
@endsection