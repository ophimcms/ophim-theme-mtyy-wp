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
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
                <div class="row" style="margin: 20px;">
                    <div class="col-md-12 blogShort">

                        <a href="<?php the_permalink(); ?>"><img style="width: 150px;margin-right: 15px" src="<?= op_remove_domain(get_the_post_thumbnail_url()) ?>"
                                                                 alt="<?php the_title(); ?>" class="pull-left img-responsive thumb margin10 img-thumbnail"></a>
                        <br>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <article>
                            <p>
                                <?php the_excerpt(); ?>
                            </p></article>
                        <a class="btn btn-blog pull-right marginBottom10" href="<?php the_permalink(); ?>">Xem thêm</a>
                    </div>

                </div>
            <?php }
            wp_reset_postdata();
        } ?>

    </div>
    <?php ophim_pagination(); ?>
</div>
<?php
get_footer();
?>
