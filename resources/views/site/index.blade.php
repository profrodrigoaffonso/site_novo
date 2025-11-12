@extends('layouts.site')

@section('content')

<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="/img/logo_code.png" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Rodrigo Affonso</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Analista Desenvolvedor - Professor de Programação</p>
        <p class="masthead-subheading font-weight-light mb-0"><a onclick="onClick({{ $links[0]['id'] }})" style="color: #fff" href="{{ $links[0]['link'] }}" target="_blank">{{ $links[0]['texto'] }}</a></p>
    </div>
</header>
<!-- Portfolio Section-->
<section class="page-section portfolio" id="tecnologias">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tecnologias</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            @foreach ($tecnologias as $tecnologia)
                <div class="col-md-6 col-lg-4 mb-5">
                    {{-- <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal"> --}}
                    <div class="portfolio-item mx-auto">

                        <img class="img-fluid" src="/img/tecnologias/{{ $tecnologia->imagem }}" title="{{ $tecnologia->nome }}" />
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>
<!-- About Section-->
<section class="page-section bg-primary-about text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">Sobre</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-12 text-center"><p class="lead">Profissional que trabalha a mais de 25 anos na área de desenvolvimento WEB.</p></div>
            {{-- <div class="col-lg-4 me-auto"><p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p></div> --}}
        </div>
        <!-- About Section Button-->
        {{-- <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/theme/freelancer/">
                <i class="fas fa-download me-2"></i>
                Free Download!
            </a>
        </div> --}}
    </div>
</section>
<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contato</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form method="post" action="{{ route('site.enviar') }}">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input required class="form-control" id="nome" name="nome" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Nome</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Preenchimento obrigatório.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input required class="form-control" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label for="email">E-mail</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Preenchimento obrigatório.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Formato de E-mail inválido.</div>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="celular" name="celular" type="tel" placeholder="(123) 456-7890" />
                        <label for="phone">Celular</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea required class="form-control" id="mensagem" name="mensagem" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Mensagem</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Preenchimento obrigatório.</div>
                    </div>
                    @if(session('mensagem'))
                        <h5 class="text-center" style="color: #f00">{{ session('mensagem') }}</h5>
                    @endif
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <button class="btn btn-primary btn-xl" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function onClick(id){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // código a ser executado em caso de sucesso
                // console.log(this.status)
            } else if (this.readyState == 4 && this.status != 200) {
                // código a ser executado em caso de erro
            }
        };
        xhttp.open("POST", "/api/contagem-link", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
    }

</script>
<!-- Contact Section-->
{{-- <section class="page-section" id="trabalhe">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Trabalhe conosco</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form method="post" action="{{ route('site.trabalhe') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input required class="form-control" id="nome" name="nome" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Nome</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Preenchimento obrigatório.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input required class="form-control" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label for="email">E-mail</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Preenchimento obrigatório.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Formato de E-mail inválido.</div>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="celular" name="celular" type="tel" placeholder="(123) 456-7890" />
                        <label for="phone">Celular</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea required class="form-control" id="mensagem" name="mensagem" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Mensagem</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Preenchimento obrigatório.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="curriculo" name="curriculo" type="file" placeholder="(123) 456-7890" />
                        <label for="message">Curriculo</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Preenchimento obrigatório.</div>
                    </div>
                    @if(session('mensagem-trabalhe'))
                        <h5 class="text-center" style="color: #f00">{{ session('mensagem-trabalhe') }}</h5>
                    @endif
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <button class="btn btn-primary btn-xl" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</section> --}}
@endsection
