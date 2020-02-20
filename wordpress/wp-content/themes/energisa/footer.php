
<section class="pt-3" id="footer">
    <div class="container py-5">
        <div class="row">
            <div class="col-6 col-md-2">
                <img class="" src="<?php bloginfo('template_url'); ?>/img/logo-dark.png" width="200" alt="">

            </div>
            <div class="col-12 col-md-8">
                <div class="d-sm-flex justify-content-sm-center my-3 my-sm-0">
                    <a class="nav-link link-light" href="#">Quem somos</a>
                    <a class="nav-link link-light" href="<?php bloginfo('home'); ?>/produtos">Produtos</a>
                    <a class="nav-link link-light" href="<?php bloginfo('home'); ?>/projetos">Projetos</a>
                    <a class="nav-link link-light" href="<?php bloginfo('home'); ?>/novidades">Novidades</a>
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
        <a href="https://www.qualitare.com/home/" target="blank">
            <img class="" src="<?php bloginfo('template_url'); ?>/img/feito-com.png" alt="">
        </a>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<?php wp_footer(); ?>

<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>



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
<script src="<?php bloginfo('template_url'); ?>/js/jquery.mousewheel.min.js"></script>
<!-- <script>
    $("#sobre-scroll-left").mousewheel(function(evt, chg) {
        this.scrollLeft -= (chg * 30); //need a value to speed up the change
        evt.preventDefault();
    });
    $("#timeline-scroll").mousewheel(function(evt, chg) {
        this.scrollLeft -= (chg * 30); //need a value to speed up the change
        evt.preventDefault();
    });
    /* $('#timeline-scroll').on('mousewheel', function(event) {
        console.log(event);
    }); */

</script> -->

<!-- <script>
    window.onload = function onLoad() {
        if(document.getElementById("progress-1")){

            var circle = new ProgressBar.Circle('#progress-1', {
                color: '#EA6724',
                strokeWidth: 7,

                trailColor: '#cccccc',
                trailWidth: 1,

                duration: 3000,
                easing: 'easeInOut'
            });
            circle.animate(.5);
        }
        if(document.getElementById("progress-2")){
            var circle = new ProgressBar.Circle('#progress-2', {
                color: '#EA6724',
                strokeWidth: 7,

                trailColor: '#cccccc',
                trailWidth: 1,

                duration: 3000,
                easing: 'easeInOut'
            });
            circle.animate(.99);
        }
        if(document.getElementById("progress-3")){
            var circle = new ProgressBar.Circle('#progress-3', {
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


</body>

</html>
