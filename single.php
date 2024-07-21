<?php
get_header();
?>
<div style="display:none"><?= single_tag_title(); ?></div>
<div class="box-width wow fadeInUp ec-casc-list animated" style="visibility: visible; animation-name: fadeInUp;">
    <div class="title flex between top20">
        <div class="title-left">
            <h4 class="title-h cor4"><?= single_tag_title(); ?></h4>
        </div>
    </div>
    <div class="overflow">
    </div>
    <div class="flex wrap border-box public-r" style="color:#FFF!important;">
        <?php
        while ( have_posts() ) : the_post();
            ?>
            <div class="group-film">
                <h1 style="margin: 20px"><?php the_title(); ?></h1>
                <div class="content">
                    <?php  the_content(); ?>
                </div>
            </div>
        <?php
        endwhile;
        ?>

    </div>
</div>
<?php
get_footer();
?>
