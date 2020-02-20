<?php $detalhes = get_post(208); ?>

<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div style="background-image: linear-gradient(0deg, rgba(67, 67, 67, 0.6), rgba(67, 67, 67, 0.6)), url(<?php bloginfo('template_url'); ?>/img/member-pic.png);" class="modal-header d-flex justify-content-end bg-header">

            <button type="button" class="btn btn-light btn-round py-1" data-dismiss="modal" aria-label="Close">
                <span class="text-gray" aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body p-5 m-4">
            <pre>
            <?php print_r($detalhes); ?>
                </pre>
            <div class="text-start my-2">
                <h3 class=" font-weight-bold">Bio</h3>
                <p class=" font-weight-light text-caption">Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit. Sagittis, sit
                    facilisi consequat tortor ullamcorper lacus, ullamcorper nisi ut. Eros, massa viverra ornare
                    mi,
                    donec. Senectus mauris hendrerit quam urna enim odio porttitor dui. Sit felis cras
                    adipiscing
                    aliquet. Feugiat ornare fames lacus purus. Viverra sit gravida malesuada lectus fermentum
                    placerat. Eu faucibus in amet, nec, gravida luctus neque proin aliquam. Neque id est at
                    consequat nunc, sed. Lorem non bibendum iaculis felis, suspendisse. Tempus odio purus, amet
                    sit.
                    Phasellus sed ornare nisl vivamus ultricies in eu, convallis integer.</p>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
