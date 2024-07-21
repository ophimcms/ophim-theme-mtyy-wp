<div class="slide-a slide-b overflow slid-d rel" style="background-color:rgb(17, 19, 25)">
    <div class="slide-time-list mySwiper2 hader1">
        <div class="swiper-wrapper">
            <?php $key = 0;
            while ($query->have_posts()) : $query->the_post();
                $key++ ?>
                <div class="slide-time-bj swiper-slide">
                    <a href="<?php the_permalink(); ?>">
                        <div class="slide-time-img3 mask-1"
                             style="background-image: url(<?= op_get_poster_url() ?>);"></div>
                        <div class="large-t"></div>
                        <div class="large-r"></div>
                        <div class="large-l"></div>
                        <div class="box-width flex">
                            <div class="slide-desc-box">
                                <div class="this-desc-title"><?php the_title(); ?></div>
                                <div class="this-desc-labels flex">
                                    <span class="this-tag this-b"><i class="focus-item-label-rank">TOP <?= $key ?></i>HOT</span>
                                    <span class="focus-item-label-original this-tag bj2"><?= op_get_status() ?></span>
                                </div>
                                <div class="this-desc-info">
                                    <span class="this-desc-score cor6"><i
                                                class="ds-shoucang fa"></i> <?= op_get_rating() ?></span>
                                    <span><?= op_get_year(' ') ?></span>
                                    <?php if(op_get_region()) : foreach (op_get_region() as $ct) :
                                        echo "<span>" . $ct->name . "</span> ";
                                    endforeach; endif ?>
                                    <span><?= op_get_episode() ?></span>
                                </div>
                                <div class="this-desc-tags">
                                    <?php if(op_get_actor()) : foreach (op_get_actor() as $ct) :
                                        echo "<span>" . $ct->name . "</span> ";
                                    endforeach; endif ?>
                                </div>
                                <div class="this-desc-item">　　
                                    <?php the_excerpt() ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endwhile; ?>
        </div>
        <div class="box-width this-button">
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>