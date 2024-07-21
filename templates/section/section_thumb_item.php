<div class="public-list-box public-pic-b ">
    <div class="public-list-div public-list-bj">
        <a target="_self" class="public-list-exp" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <img class="lazy lazy1 gen-movie-img mask-0" referrerpolicy="no-referrer"
                 src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="
                 alt="<?php the_title(); ?> <?= op_get_original_title() ?>" data-src="<?= op_get_thumb_url() ?>">
            <span class="public-bg"></span>
            <span class="public-list-prb hide ft2">
                <?= op_get_lang() ?>     <?= op_get_quality() ?>         </span>
            <span class="public-play"><i
                        class="fa ds-bofang1"></i></span>
        </a>
    </div>
    <div class="public-list-button">
        <a target="_self" class="time-title hide ft4" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </div>
</div>