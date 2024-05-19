@extends('layouts.escola')

@section('content')

<!-- Masthead-->
<header class="masthead bg-primary-escola text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="/img/logo_code.png" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Escola - Rodrigo Affonso</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Analista Desenvolvedor - Professor de Programação</p>
    </div>
</header>
<!-- Portfolio Section-->
<section class="page-section portfolio" id="aulas">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Aulas</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            @foreach ($aulas as $aula)
            <div class="col-md-6 col-lg-4 mb-5">
                {{-- <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal"> --}}
                    <div class="tutorial container text-center ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/{{ $aula->video }}?rel=0"
                        allowfullscreen>
                    </iframe>
                    </div>
            </div>

            @endforeach


        </div>
    </div>
</section>
<!-- About Section-->

<!-- Contact Section-->

@endsection
