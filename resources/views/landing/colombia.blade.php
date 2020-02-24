<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ setting('site.title') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">

    <script src="{{ asset('vendor/smooth-scroll.js') }}"></script>

    <style>
        .filter {
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
            z-index: 1 !important;
        }

        .active-img {
            z-index: 6 !important;
            border: 4px solid white !important;
        }
    </style>

</head>

<body ng-app="app" ng-controller="controlador">

    <!-- Masthead -->
    <header id="header" class="masthead text-white text-center">
        <div class="aviones"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-12 offset-xl-1">
                    <div class="logo img-fluid slide-left"></div>
                    <div class="row justify-content-center">
                        <div class="container align-middle">
                            <a data-scroll class="btn btn-block btn-dark">INSCRIBIRME</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 ml-auto">
                    <div class="video-thumbnail">
                        <div class="youtube" id="m6ciWfZt5JQ" src="./img/video-player.png"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row-reverse">
            <a data-scroll href="{{ url()->current() }}#bazinga">
                <div class="arrow ml-auto"></div>
            </a>
        </div>
        </a>
    </header>

    <!-- Description grid -->
    <section id="descrip" class="description bg-light text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="description-item mx-auto">
                        <h1>SPEED RUNNERS 2020</h1>
                        <p class="lead mb-0"> Sé PARTE DEL PROYECTO DE SPEED RUNNERS Y VIVE LA EXPERIENCIA COMO UN
                            CORREDOR PROFESIONAL. <br> ROMPE TU PROPIO RECORD EN CARRERAS INTERNACIONALES.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row">
                @if($section1->count() > 0)

                <div class="col-description col-lg-6 order-lg-1 align-self-start my-auto ">
                    @foreach ($section1 as $section)
                    <div class="description-img">
                        <div class="tryouts">
                            <img src="{{ asset('/storage/'.$section->image) }}" alt="">
                        </div>
                        <div class="city">
                            <img src="{{ asset('/storage/'.$section->image_over) }}" alt="">
                        </div>
                    </div>
                    @endforeach
                    <div class="description-text">
                        <h1>{{ $section->title }}</h1>
                        <p class=" lead mb-0">{{ $section->content }}</p>
                    </div>
                </div>

                @else
                <div class="col-description col-lg-6 order-lg-1 align-self-start my-auto ">
                    <div class="description-img">
                        <div class="tryouts">
                            <img src="../img/tryouts.png" alt="">
                        </div>
                        <div class="city">
                            <img src="../img/bogot.png" alt="">
                        </div>
                    </div>
                    <div class="description-text">
                        <h1>TRYOUTS</h1>
                        <p class="lead mb-0">PARTICIPARÁS EN DIFERENTES CARRERAS SEGÚN CUÁL SEA TU OBJETIVO.</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="row">
                @if($section2->count() > 0)
                @foreach ($section2 as $section)
                <div class="col-description col-description-2 col-lg-6 offset-lg-6">
                    <div class="description-img">
                        <div class="training">
                            <img src="{{ asset('/storage/'.$section->image) }}" alt="">
                        </div>
                        <div class="k">
                            <img src="{{ asset('/storage/'.$section->image_over) }}" alt="">
                        </div>
                    </div>
                    <div class="description-text">
                        <h1>{{ $section->title }}</h1>
                        <p class="lead mb-0">{{ $section->content }}</p>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-description col-description-2 col-lg-6 offset-lg-6">
                    <div class="description-img">
                        <div class="training">
                            <img src="../img/training.png" alt="">
                        </div>
                        <div class="k">
                            <img src="../img/42-k.png" alt="">
                        </div>

                        <div class="description-text">
                            <h1>TRAINING</h1>
                            <p class="lead mb-0">TENDRÁS ENTRENAMIENTOS ESPECIALES DE ADIDAS RUNNERS PARA QUE
                                LLEGUES DE
                                LA
                                MEJOR MANERA A LA COMPETENCIA.</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="row last-description">
                <div class="col-description col-description-3 col-lg-6 align-self-end my-auto ">
                    <div class="description-img objetives">
                        @if($section3_3->count() > 0)
                        @foreach ($section3_3 as $section)
                        <div id="objetive1" class="objetive-1 filter">
                            <img ng-click="objetive1()" id="objetive1" src="{{ asset('/storage/'.$section->image) }}"
                                alt="">
                        </div>
                        @endforeach
                        @else
                        <div id="objetive1" class="objetive-1 filter">
                            <img ng-click="objetive1()" id="objetive1" src="../img/group-10.png" alt="">
                        </div>
                        @endif
                        @if($section3_2->count() > 0)
                        @foreach ($section3_2 as $section)
                        <div id="objetive2" class="objetive-2 filter">
                            <img ng-click="objetive2()" id="objetive2" src="{{ asset('/storage/'.$section->image) }}"
                                alt="">
                        </div>
                        @endforeach
                        @else
                        <div id="objetive3" class="objetive-2 filter">
                            <img ng-click="objetive2()" id="objetive2" src="../img/group-11.png" alt="">
                        </div>
                        @endif
                        @if($section3_1->count() > 0)
                        @foreach ($section3_1 as $section)
                        <div id="objetive3" class="objetive-3 active-img">
                            <img ng-click="objetive3()" id="objetive3" src="{{ asset('/storage/'.$section->image) }}"
                                alt="">
                        </div>
                        @endforeach
                        @else
                        <div id="objetive3" class="objetive-3 active-img">
                            <img ng-click="objetive3()" id="objetive3" src="../img/group-12.png" alt="">
                        </div>
                        @endif
                    </div>
                    <div class="description-text">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                @if($section3_1->count() > 0)
                                @foreach ($section3_1 as $section)
                                <div id="obj1" style="display: none;" class="col-md-12 align-self-end filter">
                                    <h1>{{ $section->title }}</h1>
                                    <p class="lead mb-0">{{ $section->content }}</p>
                                </div>
                                @endforeach
                                @else
                                <div id="obj1" style="display: none;" class="col-md-12 align-self-end filter">
                                    <h1>OBJETIVOS</h1>
                                    <p class="lead mb-0">LOS GANADORES VIAJARÁN A LAS MEJORES CARRERAS DEL MUNDO.
                                    </p>
                                </div>
                                @endif
                                @if($section3_2->count() > 0)
                                @foreach ($section3_2 as $section)
                                <div id="obj2" style="display: none;" class="col-md-12 align-self-end filter">
                                    <h1>{{ $section->title }}</h1>
                                    <p class="lead mb-0">{{ $section->content }}</p>
                                </div>
                                @endforeach
                                @else
                                <div id="obj2" style="display: none;" class="col-md-12 align-self-end filter">
                                    <h1>OBJETIVOS</h1>
                                    <p class="lead mb-0">LOS GANADORES VIAJARÁN A LAS MEJORES CARRERAS DEL MUNDO.
                                    </p>
                                </div>
                                @endif
                                @if($section3_3->count() > 0)
                                @foreach ($section3_3 as $section)
                                <div id="obj3" class="col-md-12 align-self-end">
                                    <h1>{{ $section->title }}</h1>
                                    <p class="lead mb-0">{{ $section->content }}</p>
                                </div>
                                @endforeach
                                @else
                                <div id="obj3" class="col-md-12 align-self-end">
                                    <h1>OBJETIVOS</h1>
                                    <p class="lead mb-0">LOS GANADORES VIAJARÁN A LAS MEJORES CARRERAS DEL MUNDO.
                                    </p>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map -->
    <section class="map text-center">
        <div class="container">
            <h1>SPEED RUNNERS 2020, una carrera para romper marcas, hecha para los que entrenan duro y corren
                mas</h1>
        </div>
        <div class="map-image">
            <div class="container-fluid h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-12 ">
                        <ul class="timeline" id="timeline">
                            <li class="li complete full">
                                <div id="statuc" class="status">
                                    <h1>Ciudad</h1>
                                </div>
                                <div class="info">
                                    <p id="statud">Bogotá</p>
                                </div>
                            </li>
                            <li class="li complete ">
                                <div id="statuf" class="status">
                                    <h1 id="statug">Lugar</h1>
                                </div>
                                <div class="info ">
                                    <p id="statuh" class="site">Parque el virrey<br> Cra 15 #86a-50</p>
                                </div>
                            </li>
                            <li class="li complete full">
                                <div id="statu1" class="status">
                                    <h1 id="statu2">Fecha</h1>
                                </div>
                                <div class="info">
                                    <p id="statu3">10/02/2020</p>
                                </div>
                            </li>
                            <li class="li complete full">
                                <div id="statu4" class="status status-last">
                                    <h1 id="final1">Kilometros</h1>
                                </div>
                                <div class="info space">
                                    <p id="final2" class="d-inline px-3">10k</p>
                                    <p id="final3" class="d-inline px-3">21k</p>
                                    <p id="final4" class="d-inline px-3">42k</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="form">
        <form name="adidasForm">
            <div class="container container-incription" ng-if="!dataSend">
                <div class="row justify-content-center">
                    <div class="col-lg-8 title">
                        <h1 id="bazinga">Inscripción</h1>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-9 inputs">
                            <div class="form-row form-row-space justify-content-around">
                                <div class="form-group col-md-6">
                                    <label class="float-label" for="inputNames">NOMBRES</label>
                                    <input type="text" ng-model="names" required class="form-control" name="inputNames"
                                        id="inputNames" aria-describedby="namesHelp" placeholder="escriba sus nombres">
                                    <div ng-show="namesErr">
                                        <small id="namesHelp" class="form-text">Falta registrar los nombres
                                            *</small>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="float-label" for="inputLastnames">APELLIDOS</label>
                                    <input type="text" required ng-model="lastnames" class="form-control"
                                        name="inputLastnames" id="inputLastnames" aria-describedby="lastnamesHelp"
                                        placeholder="escriba sus apellidos">
                                    <div ng-show="lastErr">
                                        <small id="lastnamesHelp" class="form-text">Falta registrar los
                                            apellidos
                                            *</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-around break">
                                <div class="form-group col-md-6">
                                    <label class="float-label" for="inputEmail">EMAIL</label>
                                    <input type="email" required ng-model="email" class="form-control" name="inputEmail"
                                        id="inputEmail" aria-describedby="emailHelp" placeholder="escriba su email">
                                    <div ng-if="emailErr">
                                        <small id="emailHelp" class="form-text">Falta registrar el email
                                            *</small>
                                    </div>
                                </div>
                                <div class="form-group form-radio col-md-6">
                                    <label class="float-label-2">GÉNERO</label>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-light active" ng-click="selectGender('MASCULINO')">
                                            <input type="radio" name="options" id="male" checked> MASCULINO
                                        </label>
                                        <label class="btn btn-light" ng-click="selectGender('FEMENINO')">
                                            <input type="radio" name="options" id="female"> FEMENINO
                                        </label>
                                        <label class="btn btn-light" ng-click="selectGender('OTRO')">
                                            <input type="radio" name="options" id="other"> OTRO
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-around break">
                                <div class="form-group col-md-6">
                                    <label class="float-label" for="inputAge">FECHA DE NACIMIENTO</label>
                                    <input type="text" required name="inputAge" ng-model="age" class="form-control"
                                        id="inputAge" placeholder="AAAA/MM/DD">
                                    <div ng-if="ageErr">
                                        <small id="emailHelp" class="form-text">Falta registrar la edad
                                            *</small>
                                    </div>
                                </div>
                                <div class="form-group form-radio col-md-6">
                                    <label class="float-label-2">ZAPATILLAS</label>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-light active" ng-click="selectShoes('ADIDAS')">
                                            <input type="radio" name="options" id="shoes1" checked> ADIDAS
                                        </label>
                                        <label class="btn btn-light" ng-click="selectShoes('REEBOK')">
                                            <input type="radio" name="options" id="shoes2"> REEBOK
                                        </label>
                                        <label class="btn btn-light" ng-click="selectShoes('OTRAS')">
                                            <input type="radio" name="options" id="shoes3"> OTRAS
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-around break">
                                <div class="form-group form-radio col-md-6">
                                    <label class="float-label-2">TEAM</label>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-light active" ng-click="selectTeam('ADIDAS RUNNERS')">
                                            <input type="radio" name="options" id="team1" checked> ADIDAS
                                            RUNNERS
                                        </label>
                                        <label class="btn btn-light" ng-click="selectTeam('OTRO')">
                                            <input type="radio" name="options" id="team2"> OTRO
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group form-radio col-md-6 mt-auto col-inactive">
                                    <label class="float-label" for="inputTeam">TEAM</label>
                                    <input type="text" class="form-control" id="inputTeam"
                                        placeholder="escriba a que equipo pertenece">
                                </div>
                                <div class="form-group form-radio col-md-6">
                                    <label class="float-label-2">DISTANCIA</label>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-light active" ng-click="selectDistance('10 K')">
                                            <input type="radio" name="options" id="distance1" checked> 10 K
                                        </label>
                                        <label class="btn btn-light" ng-click="selectDistance('21 K')">
                                            <input type="radio" name="options" id="distance2"> 21 K
                                        </label>
                                        <label class="btn btn-light" ng-click="selectDistance('42 K')">
                                            <input type="radio" name="options" id="distance3"> 42 K
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-around">
                                <div class="form-group form-radio col-md-12">
                                    <label class="float-label-2">MI MEJOR TIEMPO</label>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-light active" ng-click="selectTime('30 MIN')">
                                            <input type="radio" name="options" id="time1"> 30 MIN
                                        </label>
                                        <label class="btn btn-light" ng-click="selectTime('60 MIN')">
                                            <input type="radio" name="options" id="time2"> 60 MIN
                                        </label>
                                        <label class="btn btn-light" ng-click="selectTime('90 MIN')">
                                            <input type="radio" name="options" id="time3"> 90 MIN
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10 terms">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="form-check">
                                        <input ng-model="accept" name="inputAccept" id="terms" type="checkbox">
                                        <label class="terms_conditions" for="terms">Acepto <a href="#">términos
                                                y condiciones</a>.</label>
                                        <span></span>
                                    </div>
                                    <div class="form-check">
                                        <input id="newsletter" type="checkbox">
                                        <label for="newsletter">Quiero recibir noticias sobre productos y
                                            servicios de
                                            adidas. <a href="#">¿Qué significa esto?</a></label>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 submit">
                                <div class="col-md-6 offset-md-3">
                                    <a type="button" ng-click="verify(true)" href="#info"
                                        class="btn btn-dark btn-lg btn-block">INSCRIBIRME</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 data-table" ng-if="dataCheck == true">
                        <div class="col-lg-12 information">
                            <div id="info" class="col-lg-12 title title-data">
                                <h1>Información registrada</h1>
                            </div>
                            <div class="col-lg-12 data">
                                <div class="container">
                                    <div class="row datatable">
                                        <div class="col-sm-6 col-md-1 form-title">
                                            Nombres:
                                        </div>
                                        <div class="col-sm-6 col-md-5 form-data"
                                            ng-bind="adidasForm.inputNames.$viewValue">
                                        </div>
                                        <div class="col-sm-6 col-md-1 form-title">
                                            Apellidos:
                                        </div>
                                        <div class="col-sm-6 col-md-5 form-data"
                                            ng-bind="adidasForm.inputLastnames.$viewValue">

                                        </div>
                                        <div class="col-sm-6 col-md-1 form-title">
                                            Email:
                                        </div>
                                        <div class="col-sm-6 col-md-5 form-data"
                                            ng-bind="adidasForm.inputEmail.$viewValue">

                                        </div>
                                        <div class="col-sm-6 col-md-1 form-title">
                                            Género:
                                        </div>
                                        <div class="col-sm-6 col-md-5 form-data" ng-bind="gender">

                                        </div>
                                        <div class="col-sm-6 col-md-1 form-title">
                                            Fecha:
                                        </div>
                                        <div class="col-sm-6 col-md-5 form-data" ng-bind="age">

                                        </div>
                                        <div class="col-sm-6 col-md-1 form-title">
                                            Zapatillas:
                                        </div>
                                        <div class="col-sm-6 col-md-5 form-data" ng-bind="shoes">

                                        </div>
                                        <div class="col-sm-6 col-md-1 form-title">
                                            Team:
                                        </div>
                                        <div class="col-sm-6 col-md-5 form-data" ng-bind="team">

                                        </div>
                                        <div class="col-sm-6 col-md-1 form-title">
                                            Distancia:
                                        </div>
                                        <div class="col-sm-6 col-md-5 form-data" ng-bind="distance">

                                        </div>
                                        <div class="col-sm-6 col-md-1 form-title form-last">
                                            Tiempo:
                                        </div>
                                        <div class="col-sm-6 col-md-11 form-data form-last" ng-bind="time">

                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-3 col-md-5">
                                            <button type="button" href="#bazinga" ng-click="verify(false)"
                                                class="btn btn-light btn-lg btn-block">Modificar</button>
                                        </div>
                                        <div class="col-sm-3 col-md-5">
                                            <button type="button" ng-click="sendData()"
                                                class="btn btn-dark btn-lg btn-block">Guardar</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container container-success" ng-if="dataSend">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="row justify-content-center text-left">
                            <div class="col-lg-4">
                                <div class="logo-bottom"></div>
                            </div>
                            <div class="col-lg-8 d-flex align-items-center">
                                <div>
                                    <h1 class="success-title">Hola @{{ adidasForm.inputNames.$viewValue }}
                                    </h1>
                                    <p class="success-message">
                                        Pronto estaremos enviando más información al email registrado.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="<?= asset('angular.min.js') ?>"></script>
    <script src="<?= asset('app.js') ?>"></script>
    <script src="<?= asset('angular-route.min.js') ?>"></script>

    <script>
        var scroll = new SmoothScroll('a[href*="#"], [data-scroll]');
    </script>

    <script>
        var i, c, y, v, s, n;
        var im = new Array();
        v = document.getElementsByClassName("youtube");

        for (n = 0; n < v.length; n++) {
            im[n] = v[n].hasAttribute("src") ? v[n].getAttribute("src") : "http://i.ytimg.com/vi/" + v[n].id + "/hqdefault.jpg";
        }

        if (v.length > 0) {
            s = document.createElement("style");
            s.type = "text/css";
            s.innerHTML = '.youtube{background-color:#000;max-width:100%;overflow:hidden;position:relative;cursor:hand;cursor:pointer}.youtube .thumb{bottom:0;display:block;left:0;margin:auto;max-width:100%;position:absolute;right:0;top:0;width:100%;height:auto}.youtube .play{filter:alpha(opacity=80);opacity:.8;height:77px;left:50%;margin-left:-38px;margin-top:-38px;position:absolute;top:50%;width:77px;background:url("https://lh3.ggpht.com/vo4W82YNfpJDsttqn-22YsLtEJjmOtIB-54yIxR5wQA0Ucs5leNIu-W8iEmyY8-Pf7RWHk4=w64") no-repeat}';
            document.body.appendChild(s);
        }

        for (n = 0; n < v.length; n++) {
            y = v[n];
            i = document.createElement("img");
            i.setAttribute("src", im[n]);
            i.setAttribute("class", "thumb");
            c = document.createElement("div");
            c.setAttribute("class", "play");
            y.appendChild(i);
            y.appendChild(c);
            y.onclick = function() {
                var t = document.createElement("iframe");
                t.setAttribute("src", "https://www.youtube.com/embed/" + this.id + param(this));
                t.style.width = this.style.width;
                t.style.height = this.style.height;
                this.parentNode.replaceChild(t, this);
            }
        };

        function param(x) {
            if (x.getAttribute("data-params") !== null) {
                return x.getAttribute("data-params");
            } else {
                return "?autoplay=1";

            }
        }
    </script>

</body>

</html>
