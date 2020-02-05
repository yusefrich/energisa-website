<?php wp_footer(); ?>

<section class="pt-3" id="footer">
    <div class="container py-5">
        <div class="d-flex justify-content-between">
            <img class="" src="<?php bloginfo('template_url'); ?>/img/logo-dark.png" width="200" alt="">
            <div class="d-flex justify-content-center">
                <a class="nav-link link-light" href="#">Quem somos</a>
                <a class="nav-link link-light" href="<?php bloginfo('home'); ?>/produtos">Produtos</a>
                <a class="nav-link link-light" href="#">Projetos</a>
                <a class="nav-link link-light" href="#">Novidades</a>
                <a class="nav-link link-light" href="#">Ideias</a>
            </div>
            <div>
                <button class="btn btn-light text-blue btn-round"><ion-icon style="font-size: 20px;" class="pt-2" name="logo-twitter"></ion-icon></button>
                <button class="btn btn-light text-blue btn-round"><ion-icon style="font-size: 20px;" class="pt-2" name="logo-linkedin"></ion-icon></button>
                <button class="btn btn-light text-blue btn-round"><ion-icon style="font-size: 20px;" class="pt-2" name="logo-instagram"></ion-icon></button>

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
    $(document).ready(function(){
        var scene = document.getElementById('parallax-detalhe-1');
        var parallaxInstance = new Parallax(scene, {
            relativeInput: true
        });
        scene = document.getElementById('parallax-detalhe-2');
        parallaxInstance = new Parallax(scene, {
            relativeInput: true
        });
        scene = document.getElementById('parallax-detalhe-3');
        parallaxInstance = new Parallax(scene, {
            relativeInput: true
        });
        scene = document.getElementById('parallax-detalhe-4');
        parallaxInstance = new Parallax(scene, {
            relativeInput: true
        });
        scene = document.getElementById('parallax-detalhe-5');
        parallaxInstance = new Parallax(scene, {
            relativeInput: true
        });
        scene = document.getElementById('parallax-bush-1');
        parallaxInstance = new Parallax(scene, {
            relativeInput: true
        });
        parallaxInstance.friction(0.1, 0);
        scene = document.getElementById('parallax-hand-1');
        parallaxInstance = new Parallax(scene, {
            relativeInput: true
        });
        parallaxInstance.friction(0.5, 0);

    });
</script>
</body>

</html>
