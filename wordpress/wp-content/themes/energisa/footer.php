

<!-- Modal Designer do Produto -->
<div style="position:relative;" class="modal fade" id="designProdutoModal" tabindex="-1" role="dialog" aria-labelledby="designProdutoModalLabel"
        aria-hidden="true">
</div>
<!-- Modal -->
<div class="modal fade" id="equipeModal" tabindex="-1" role="dialog" aria-labelledby="equipeModalLabel"
        aria-hidden="true">
</div>
<!-- Modal detalhes do treinamento -->
<div class="modal fade" id="OQueFazemosModal" tabindex="-1" role="dialog" aria-labelledby="OQueFazemosModalLabel"
        aria-hidden="true">

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<?php wp_footer(); ?>

<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/vendors/scrolloverflow.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fullpage.js"></script>

<!-- navbar top opacity -->
<script>
    $(document).ready(function () {
        if ($(window).width() >= 1000){
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
        }else {
            jQuery(".menu-bg").removeClass("hide");
            jQuery(".brand-light").removeClass("d-none");
            jQuery(".brand-dark").addClass("d-none");

            jQuery(".navbar").addClass("navbar-light");
            jQuery(".navbar").removeClass("navbar-dark");

            jQuery(".search-toggle").removeClass("text-white");

        }


    });
</script>

<?php if (is_front_page() || is_singular( 'produtos' ) || is_singular( 'projetos' ))  : ?> <!-- is_singular( 'projetos' ) || is_singular( 'produtos' ) || -->
    <script>
        new fullpage('#fullpage', {
        navigation: false,
        responsiveWidth: 700,
        parallax: true,
        scrollOverflow: true,
        slideSelector: "fullpage-slide",
        scrollOverflowEndPrevent: { delay: 500, reversal: false },
        /* normalScrollElements: '.timeline', */
        /* scrollOverflowOptions: {
            disableMouse: true
        }, */
        onLeave: function(origin, destination, direction){
            console.log("Leaving section" + origin.index);
            if(origin.index == 0){
                if ($(window).width() >= 1000){
                    jQuery(".menu-bg").removeClass("hide");
                    jQuery(".brand-light").removeClass("d-none");
                    jQuery(".brand-dark").addClass("d-none");
                    
                    jQuery(".navbar").addClass("navbar-light");
                    jQuery(".navbar").removeClass("navbar-dark");
                    
                    jQuery(".search-toggle").removeClass("text-white");
                    
                }
            }else if (destination.index == 0){
                if ($(window).width() >= 1000){

                    jQuery(".menu-bg").addClass("hide");
                    jQuery(".brand-light").addClass("d-none");
                    jQuery(".brand-dark").removeClass("d-none");
                    
                    jQuery(".navbar").removeClass("navbar-light");
                    jQuery(".navbar").addClass("navbar-dark");
                    
                    jQuery(".search-toggle").addClass("text-white");
                }
            }
        },
        afterLoad: function(){
            $('.fp-table.active .aos-init').addClass('aos-animate');
        },

    });

    
    
    
    </script>
<?php endif; ?>
<script>
    const slider = document.querySelector('.timeline');
    let isDown = false;
    let startX;
    let scrollLeft;

    /* slider.addEventListener('mouseover', changeDefOver);
    slider.addEventListener('mouseout', changeDefOut);

    function changeDefOver(e) {
        fullpage_api.destroy();
    }

    function changeDefOut(e) {
        fullpage_api.reBuild();
    } */
    $(".timeline").click(function(){
        /* alert('clicked'); */
        /* fullpage_api.setAllowScrolling(false); */
        /* $(this).addClass('timeline-scroll'); */
    });

    slider.addEventListener('mousedown', (e) => {
    /* $(".timeline").mousedown(function(){ */
        
        console.log("in");

        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mouseup', () => {
        
        
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
       
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 3; //scroll-fast
        slider.scrollLeft = scrollLeft - walk;
        /* console.log(walk); */
    });
</script>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<!-- parallax -->
<script>
    $(document).ready(function () {
        /* if ($(window).width() < 1000){
            return;
        }  */
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

<script>

$('#design-produto-slider').on('slide.bs.carousel', function (e) {

  
var $e = $(e.relatedTarget);
var idx = $e.index();
var itemsPerSlide = 3;
var totalItems = $('.carousel-item').length;

if (idx >= totalItems-(itemsPerSlide-1)) {
    var it = itemsPerSlide - (totalItems - idx);
    for (var i=0; i<it; i++) {
        // append slides to end
        if(i == 1){
            $('.carousel-item').eq(i).addClass('.carousel-item-zoom');
        }
        if (e.direction=="left") {
            $('.carousel-item').eq(i).appendTo('.carousel-inner');
        }
        else {
            $('.carousel-item').eq(0).appendTo('.carousel-inner');
        }
    }
}
});





$(document).ready(function() {
/* show lightbox when clicking a thumbnail */
$('a.thumb').click(function(event){
  event.preventDefault();
  var content = $('.modal-body');
  content.empty();
    var title = $(this).attr("title");
    $('.modal-title').html(title);        
    content.html($(this).html());
    $(".modal-profile").modal({show:true});
});

});
</script>
<script>
    $("#left-arrow").click(function () {
    var leftPos = $('#timeline-scroll').scrollLeft();
    $("#timeline-scroll").animate({scrollLeft: leftPos - 200}, 800);
    });

    $("#right-arrow").click(function () {
    var leftPos = $('#timeline-scroll').scrollLeft();
    $("#timeline-scroll").animate({scrollLeft: leftPos + 200}, 800);
    });

    $("#left-arrow").click(function () {
    var leftPos = $('#sobre-scroll-left').scrollLeft();
    $("#sobre-scroll-left").animate({scrollLeft: leftPos - 200}, 800);
    });

    $("#right-arrow").click(function () {
    var leftPos = $('#sobre-scroll-left').scrollLeft();
    $("#sobre-scroll-left").animate({scrollLeft: leftPos + 200}, 800);
    });

</script>

</body>

</html>
