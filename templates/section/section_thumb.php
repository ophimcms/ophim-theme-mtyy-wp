<div class="box-width tv4 wow fadeInUp">
    <div class="title top10">
        <h4 class="title-h cor4">
            <a target="_self" href="<?= $slug; ?>" class="ds-line22 more">
                <span><?= $title; ?></span>
                <span class="this-get">
                    <i class="this-hide">Xem thêm</i>
                    <i class="fa ds-jiantouyou"></i>
                </span></a>
        </h4>
    </div>
    <div class="flex wrap border-box public-r hide-b-16">
        <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++;
            get_template_part('templates/section/section_thumb_item');
        endwhile; ?>
    </div>
</div>