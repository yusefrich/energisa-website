<section class="pt-3" id="footer">
        <div class="container py-5">
            <div class="row">
                <div class="col-6 col-md-2">
                    <img class="" src="img/logo-dark.png" width="200" alt="">
                </div>
                <div class="col-12 col-md-8">
                    <div class="d-sm-flex justify-content-sm-center my-3 my-sm-0">
                        <a class="nav-link link-light" href="#">Quem somos</a>
                        <a class="nav-link link-light" href="#">Produtos</a>
                        <a class="nav-link link-light" href="#">Projetos</a>
                        <a class="nav-link link-light" href="#">Novidades</a>
                        <a class="nav-link link-light" href="#">Ideias</a>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-light text-blue btn-round">
                            <ion-icon style="font-size: 20px;" class="pt-2" name="logo-twitter"></ion-icon>
                        </button>
                        <button class="btn btn-light text-blue btn-round">
                            <ion-icon style="font-size: 20px;" class="pt-2" name="logo-linkedin"></ion-icon>
                        </button>
                        <button class="btn btn-light text-blue btn-round">
                            <ion-icon style="font-size: 20px;" class="pt-2" name="logo-instagram"></ion-icon>
                        </button>

                    </div>
                </div>
                
                
                
            </div>
        </div>
        <div class="container-fluid footer-bottom text-center px-0 py-4">
            <small class="text-white ">© Copyright 2019 Energisa COCD.</small>
            <img class="" src="img/feito-com.png" alt="">
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="js/progressbar.min.js"></script>

    <!-- navbar top opacity -->
    <script>
        $(document).ready(function () {

            var setNavbarOpacity = function () {
                var o1 = $("#menu").offset();
                var o2 = $("body").offset();
                var dx = o1.left - o2.left;
                var dy = o1.top - o2.top;
                var distance = Math.sqrt(dx * dx + dy * dy);

                if (distance > 200) {
                    jQuery(".menu-bg").removeClass("hide");
                    jQuery(".brand-light").removeClass("d-none");
                    jQuery(".brand-dark").addClass("d-none");

                    jQuery(".navbar").addClass("navbar-light");
                    jQuery(".navbar").removeClass("navbar-dark");

                    jQuery(".search-toggle").removeClass("text-white");
                } else {
                    jQuery(".menu-bg").addClass("hide");
                    jQuery(".brand-light").addClass("d-none");
                    jQuery(".brand-dark").removeClass("d-none");

                    jQuery(".navbar").removeClass("navbar-light");
                    jQuery(".navbar").addClass("navbar-dark");

                    jQuery(".search-toggle").addClass("text-white");
                }
            }

            setNavbarOpacity();

            $(window).scroll(function () {
                setNavbarOpacity();
            });

        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- parallax -->
    <script>
        $(document).ready(function () {
            var scene = document.getElementById('parallax-detalhe-1');
            var parallaxInstance;
            if(scene){
                parallaxInstance = new Parallax(scene, {
                    relativeInput: true
                });
            }
            scene = document.getElementById('parallax-detalhe-2');
            if(scene){
                var parallaxInstance = new Parallax(scene, {
                    relativeInput: true
                });
            }
            scene = document.getElementById('parallax-detalhe-3');
            if(scene){
                var parallaxInstance = new Parallax(scene, {
                    relativeInput: true
                });
            }
            scene = document.getElementById('parallax-detalhe-4');
            if(scene){
                var parallaxInstance = new Parallax(scene, {
                    relativeInput: true
                });
            }
            scene = document.getElementById('parallax-detalhe-5');
            if(scene){
                var parallaxInstance = new Parallax(scene, {
                    relativeInput: true
                });
            }
            scene = document.getElementById('parallax-bush-1');
            if(scene){
                var parallaxInstance = new Parallax(scene, {
                    relativeInput: true
                });
                parallaxInstance.friction(0.1, 0);
            }
            scene = document.getElementById('parallax-hand-1');
            if(scene){
                var parallaxInstance = new Parallax(scene, {
                    relativeInput: true
                });
                parallaxInstance.friction(0.5, 0);
            }

        });
    </script>
    
    <script>
        window.onload = function onLoad() {
            if(document.getElementById("progress-funcoes")){

                var circle = new ProgressBar.Circle('#progress-funcoes', {
                    color: '#EA6724',
                    strokeWidth: 7,
                    
                    trailColor: '#cccccc',
                    trailWidth: 1,

                    duration: 3000,
                    easing: 'easeInOut'
                });
                circle.animate(.5);
            }
            if(document.getElementById("progress-att")){
                var circle = new ProgressBar.Circle('#progress-att', {
                    color: '#EA6724',
                    strokeWidth: 7,
                    
                    trailColor: '#cccccc',
                    trailWidth: 1,

                    duration: 3000,
                    easing: 'easeInOut'
                });
                circle.animate(.99);
            }
            if(document.getElementById("progress-pontos")){
                var circle = new ProgressBar.Circle('#progress-pontos', {
                    color: '#EA6724',
                    strokeWidth: 7,
                    
                    trailColor: '#cccccc',
                    trailWidth: 1,

                    duration: 3000,
                    easing: 'easeInOut'
                });
                circle.animate(.01);
            }
            /* como estamos graficos */
            if(document.getElementById("como-estamos-graph-1")){
                var circle = new ProgressBar.Circle('#como-estamos-graph-1', {
                    color: '#EA6724',
                    strokeWidth: 15,
                    
                    trailColor: '#cccccc',
                    trailWidth: 1,

                    duration: 3000,
                    easing: 'easeInOut'
                });
                circle.animate(.5);
            }
            if(document.getElementById("como-estamos-graph-2")){
                var circle = new ProgressBar.Circle('#como-estamos-graph-2', {
                    color: '#EA6724',
                    strokeWidth: 15,
                    
                    trailColor: '#cccccc',
                    trailWidth: 1,

                    duration: 3000,
                    easing: 'easeInOut'
                });
                circle.animate(.5);
            }
            if(document.getElementById("como-estamos-graph-3")){
                var circle = new ProgressBar.Circle('#como-estamos-graph-3', {
                    color: '#EA6724',
                    strokeWidth: 15,
                    
                    trailColor: '#cccccc',
                    trailWidth: 1,

                    duration: 3000,
                    easing: 'easeInOut'
                });
                circle.animate(.5);
            }
            if(document.getElementById("como-estamos-graph-4")){
                var circle = new ProgressBar.Circle('#como-estamos-graph-4', {
                    color: '#EA6724',
                    strokeWidth: 15,
                    
                    trailColor: '#cccccc',
                    trailWidth: 1,

                    duration: 3000,
                    easing: 'easeInOut'
                });
                circle.animate(.5);
            }
        };
    </script>

    <!-- graficos -->
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'pie',

            // The data for our dataset
            data: {
                labels: ['Cor Azul Claro', 'Cor Verde', 'Cor Azul Escuro'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: ['#089BC0', '#70BF54', '#0071A2'],
                    borderWidth: 0,
                    borderAlign: 'center',
                    segmentShowStroke: false,
                    borderColor: ['#089BC0', '#70BF54', '#0071A2'],
                    data: [60, 15, 25],
                    zeroLineBorderDashOffset: true,
                    hoverBorderWidth: 10
                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                tooltips: {
                    displayColors: false
                },
                elements: {
        arc: {
            borderWidth: 0
        }
    }
            }
        });

    </script>
    <script>
        var ctx = document.getElementById('chart2').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'pie',

            // The data for our dataset
            data: {
                labels: ['Cor Azul Claro', 'Cor Verde', 'Cor Azul Escuro'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: ['#089BC0', '#FF9900', '#EA6724'],
                    borderWidth: 0,
                    borderAlign: 'center',
                    segmentShowStroke: false,
                    borderColor: ['#089BC0', '#FF9900', '#EA6724'],
                    data: [60, 15, 25],
                    zeroLineBorderDashOffset: true,
                    hoverBorderWidth: 10,
                }]
            },

            // Configuration options go here
            options: {
                cutoutPercentage: 90,
                maintainAspectRatio : false,
                responsive: true,
                legend: {
                    display: false
                },
                tooltips: {
                    displayColors: false
                },
                elements: {
        arc: {
            borderWidth: 0
        }
    }
            }
        });

    </script>
