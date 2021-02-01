<div id="carouselExampleIndicators" class="carousel slide mt-5 mb-5" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('images/rust.jpg') }}" alt="Première Slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/csgo.jpg') }}" alt="Deuxième slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/pubg.jpg') }}" alt="Troisième slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"> Précédent </span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"> Suivant </span>
    </a>
</div>