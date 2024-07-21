<?php
get_header();
?>
<div style="display:none">Tìm kiếm : <?= $s ?></div>
<div class="box-width wow fadeInUp ec-casc-list animated" style="visibility: visible; animation-name: fadeInUp;">
    <div class="title flex between top20">
        <div class="title-left">
            <h4 class="title-h cor4">Tìm kiếm : <?= $s ?></h4>
        </div>
    </div>
    <div class="overflow">
    </div>
    <div class="flex wrap border-box public-r">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('templates/section/section_thumb_item');
            }
            wp_reset_postdata();
        } ?>

    </div>
    <?php ophim_pagination(); ?>
</div>
<?php
get_footer();
?>
