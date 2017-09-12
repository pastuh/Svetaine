@extends('layouts.main')
@section('title', '| Fallow Deer')

@section('stylesheet')
    <link href="{{  url('js\fullscreen\jquery.fullPage.css') }}" rel="stylesheet" type="text/css" media="all"> {{--Fullscreen veikimas--}}
    <link href="{{  url('css\info.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

@section('content')
    <!--SVG navigacijai -->
    <div class="svg-wrap" style="display: none;">
        <svg width="64" height="64" viewBox="0 0 64 64">
            <path id="arrow-left-1" d="M46.077 55.738c0.858 0.867 0.858 2.266 0 3.133s-2.243 0.867-3.101 0l-25.056-25.302c-0.858-0.867-0.858-2.269 0-3.133l25.056-25.306c0.858-0.867 2.243-0.867 3.101 0s0.858 2.266 0 3.133l-22.848 23.738 22.848 23.738z" />
        </svg>
        <svg width="64" height="64" viewBox="0 0 64 64">
            <path id="arrow-right-1" d="M17.919 55.738c-0.858 0.867-0.858 2.266 0 3.133s2.243 0.867 3.101 0l25.056-25.302c0.858-0.867 0.858-2.269 0-3.133l-25.056-25.306c-0.858-0.867-2.243-0.867-3.101 0s-0.858 2.266 0 3.133l22.848 23.738-22.848 23.738z" />
        </svg>
    </div>

    <div id="fullpage" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="section " id="section0">
            <div class="fp-bg"
                 style='background-image: url("{{ url('../img/background/fallow_deer.jpg') }}"); background-size: cover; background-position: top center; height: 100%'>
                <div class="block__inner">
                    <div class="container">
                        <div class="row">
                            <div class="fix-padding col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                                <div class="block__header">
                                    <h2 class="heading heading--medium">
                                        Fallow Deer</h2>
                                </div>
                                <div class="block__location">
                                    <p class="block__location-text">Lietuviškai: Danielius</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="fix-padding col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                                <div class="block__features-text features-text-fix">
                                    Danieliaus pagrindinė išplitimo vietovė yra Vakarų Europa. Naujaisiais amžiais buvo
                                    introdukuoti į dar tolimesnius Europos arealus bei kitus žemynus.<br>
                                    Vardas kilęs iš elniams būdingos šviesiai rudos spalvos.<br>Vasarą kailis
                                    gelsvai rusvas su baltomis dėmėmis ant kūno šonų. Papilvė ir kojų vidinė pusė
                                    baltos.<br>
                                    Žiemą viršutinė kūno dalis rusvai pilka, apatinė liemens dalis ir kojos – pelenų
                                    spalvos.<br>
                                    Pirmieji ragai yra kriaušės formos, storu pamatu, staigiai smailėjančia viršūne.<br>
                                    Vėliau auga į plačius kaušo formos ragus su keliais mažesniais atsikišimais.<br>
                                    Ragai visiškai susiformuoja nuo penkerių metų, bet geriausi trofėjiniai ragai būna
                                    7-8
                                    metų danielių.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section1">
            <div class="fp-bg"
                 style='background-image: url("{{ url('../img/background/fallow_deer2.jpg') }}"); background-size: cover; background-position: top center; height: 100%'>
                <div class="block__product">
                    <div class="container">
                        <div class="row">
                            <div class="fix-padding col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                                <div class="block__header">
                                    <h2 class="heading">
                                        Apžvalga</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="padding-bottom: 50px;">
                        <div class="row">
                            <div class="fix-padding col-lg-12">
                                <div class="col-lg-12">
                                    <div class="block__features-description">Mityba</div>
                                    <div class="block__features-text">
                                        Minta augaliniu maistu: medžių ir krūmų šakelėmis, ūgliais, žolėmis ir lauko
                                        kultūromis.
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="block__features-description">Ekologija</div>
                                    <div class="block__features-text">
                                        Gyvena mišriuose eglės ir lapuočių miškuose su tankiu krūmų traku ir gausia
                                        žoline augalija
                                    </div>
                                </div>
                            </div>
                            <div class="fix-padding col-lg-6">

                                <div class="col-lg-12">
                                    <div class="block__features-description">Jutimas</div>
                                    <div class="block__features-text">
                                        Gerai jaučia aplinką, beveik nepriekaištingas regėjimas
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="block__features-description">Bendravimas</div>
                                    <div class="block__features-text">
                                        Mėgstantis būti kartu su vidutiniu arba dideliu būriu
                                    </div>
                                </div>

                            </div>
                            <div class="fix-padding col-lg-6">

                                <div class="col-lg-11 col-lg-offset-1">
                                    <div class="block__features-description">Aktyvumas</div>
                                    <div class="block__features-text">
                                        Aušros ir sutemų metu
                                    </div>
                                </div>


                                <div class="col-lg-11 col-lg-offset-1">
                                    <div class="block__features-description">Rūšis</div>
                                    <div class="block__features-text">
                                        Dama dama
                                    </div>
                                </div>

                            </div>
                            <div class="fix-padding col-lg-6">

                                <div class="col-lg-12">
                                    <div class="block__features-description">Patinas</div>
                                    <div class="block__features-text">
                                        Sveria nuo 60 iki 100 Kg. Su ragais
                                    </div>
                                </div>

                            </div>
                            <div class="fix-padding col-lg-6">

                                <div class="col-lg-11 col-lg-offset-1">
                                    <div class="block__features-description">Patelė</div>
                                    <div class="block__features-text">
                                        Sveria nuo 30 iki 50 Kg. Be ragų
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section2">
            <div class="fp-bg"
                 style='background-image: url("{{ url('../img/background/fallow_deer3.jpg') }}"); background-size: cover; background-position: top center; height: 100%'>
                <div class="block__product">
                    <div class="container">
                        <div class="row">
                            <div class="fix-padding col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                                <div class="block__header">
                                    <h2 class="heading">
                                        Rezervatai</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="padding-bottom: 50px;">

                        <div class="row">

                            <div class="fix-padding col-lg-12">

                                <div class="col-lg-2">
                                    <figure class="block__features-wrap">
                                        <img style="max-height: 140px;" class="block__features-image"
                                             src="{{ url('img/maps/HIRSCHFELDEN_HUNTING_RESERVE.png') }}"
                                             alt="Water resistant">
                                    </figure>
                                </div>
                                <div class="col-lg-10">
                                    <div class="block__features-text">
                                        Hirschfelden - įkvėptas Vokietijos fermų laukymių.<br>
                                        Rezervatas gausus įvairių miškų, kirtaviečių, atvirų pievų, kukurūzų pasėlių
                                        ir
                                        įvairiausių fermų laukų.<br>
                                        Yra keletas upių ir upelių, daug ežerų prie kurių ypač dažnai buriasi
                                        danieliai.<br>
                                        Rezervatas primena rudens atmosferą, todėl rudas atspalvis pasunkina šio
                                        gyvūno
                                        radimą.<br>
                                        Aptikus patelę būtina apsižvalgyti, nes šalia dažnai vaikšto ir patinas.<br>
                                        Rekomenduotina ieškoti tarp laukymių arba eglučių plantacijų, jose be
                                        didelio vargo
                                        sumedžiosite puikų laimikį.
                                    </div>
                                </div>
                            </div>
                            <nav class="nav-slit">

                                <a class="prev simple-next" href="/item3">
                                    <span class="icon-wrap"><svg class="icon" width="22" height="22" viewBox="0 0 64 64"><use xlink:href="#arrow-left-1"></svg></span>
                                    <div>
                                        <h3>Street Hills</h3>
                                        <img src="{{ url('js/minmenu/img/6.png') }}" alt="Next thumb"/>
                                    </div>
                                </a>

                                <a class="next simple-next" href="/item3">
                                    <span class="icon-wrap"><svg class="icon" width="22" height="22" viewBox="0 0 64 64"><use xlink:href="#arrow-right-1"></svg></span>
                                    <div>
                                        <h3>Street Hills</h3>
                                        <img src="{{ url('js/minmenu/img/6.png') }}" alt="Next thumb"/>
                                    </div>
                                </a>
                            </nav>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    <script type="text/javascript" src="{{  url('js\fullscreen\scrolloverflow.js') }}"></script>
    <script type="text/javascript" src="{{  url('js\fullscreen\jquery.fullPage.js') }}"></script>
    <script type="text/javascript" src="{{  url('js\fullscreen\jquery.fullpage.extensions.min.js') }}"></script>

    <script type="text/javascript">
        /* Fullscreen scroolas */
        $(document).ready(function () {

            $('#fullpage').fullpage({
                verticalCentered: true,
                navigation: true,
                navigationPosition: 'right',
                scrollingSpeed: 1000,
                scrollOverflow: true,
                autoScrolling: true,
                fitToSection: true
            });
        });
    </script>

    <script>
        /* Linku ant arrow blokavimas */
        [].slice.call( document.querySelectorAll('nav > a span') ).forEach( function(el) {
            el.addEventListener( 'click', function(ev) { ev.preventDefault(); } );
        } );
    </script>

@endsection