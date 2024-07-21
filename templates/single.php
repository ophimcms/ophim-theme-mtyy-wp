<div class="ds-vod-detail rel">
    <div class="box-width rel">
        <?php if (op_get_showtime_movies()): ?>
        <div class="detail-score wow fadeInUp">
            <div class="play-sc cf">
                <p><strong>Lịch chiếu : </strong> <?= op_get_showtime_movies(); ?></p>
            </div>
        </div>
        <?php endif ?>
        <?php if (op_get_notify()) : ?>
        <div class="detail-score wow fadeInUp">
            <div class="play-sc cf">
                <p><strong>Thông báo : </strong> <?= op_get_notify() ?></p>
            </div>
        </div>
        <?php endif ?>
        <div class="this-bj">
            <div class="this-pic-bj"
                 style="background-image: url('<?= op_get_poster_url() ?>')"></div>
            <div class="large-t"></div>
            <div class="large-r"></div>
            <div class="large-l"></div>
            <div class="large-b"></div>
        </div>
        <div class="slide-desc-box">
            <div class="this-desc-title"><?php the_title() ?></div>
            <div class="this-desc-labels flex">
                <span class="this-tag this-b"><i class="focus-item-label-rank">Năm</i><?= op_get_year(' ') ?></span>
                <span class="focus-item-label-original this-tag bj2"><?= op_get_status() ?></span>
            </div>
            <div class="this-desc-info">
                <span class="this-desc-score cor6"><i class="ds-shoucang fa"></i> <?= op_get_rating() ?></span>
                <?php $slug = get_option('ophim_slug_regions') ?: 'regions';
                foreach (op_get_region() as $ct) :
                    echo "<span>" . $ct->name . "</span> ";
                endforeach; ?> <span><?= op_get_episode() ?></span>
            </div>
            <style>
                .play-sc {
                    cursor: pointer;
                    border-radius: 4px;
                    padding: 14px 20px;
                    width: 380px;
                    margin: 10px 0 15px 0;
                    font-weight: 700;
                    background: hsla(0, 0%, 100%, .1);
                }
            </style>
            <div class="detail-score wow fadeInUp">
                <div class="play-sc cf">
                    <div class="rating-content">
                        <div id="movies-rating-star" style="height: 18px;"></div>
                        <div style="margin-top: 5px">
                            (<?= op_get_rating(); ?>
                            sao
                            /
                            <?= op_get_rating_count() ?> đánh giá)
                        </div>
                        <div id="movies-rating-msg"></div>
                    </div>
                </div>
            </div>
            <div class="this-info"><strong class="r6">Đạo diễn:</strong> <?= op_get_directors(10, ', ') ?>
            </div>
            <div class="this-info">
                <strong class="r6">Diễn viên:</strong> <?= op_get_actors(10, ', ') ?>
            </div>
            <div class="this-desc">
                <div id="height_limit" class="text">
                    <strong class="r6">Nội dung:</strong>　
                    　<?php the_content() ?>
                </div>
                <div class="text-open">
                    <span class="tim-bnt"><i class="fa r6 ease"></i>Xem thêm</span>
                </div>
            </div>
            <div class="this-bnt flex">
                <?php if(watchUrl()) : ?>
                <a href="<?= watchUrl() ?>" class="vod-detail-bnt this-play this-bnt-a cr5"><i
                            class="fa r6 ds-bofang1"></i>Xem phim</a>
                <?php endif ?>
                <?php if (op_get_trailer_url()) :
                    parse_str(parse_url(op_get_trailer_url(), PHP_URL_QUERY), $my_array_of_vars);
                    $video_id = $my_array_of_vars['v'];
                    ?>
                    <a href="https://www.youtube.com/embed/<?= $video_id ?>"
                       class="this-play this-bnt-a cr5 fancybox fancybox.iframe"><i
                                class="fa r6 ds-bofang1"></i>Trailer</a>

                <?php endif ?>

            </div>
        </div>
    </div>
</div>

<div class="box-width tv4 wow fadeInUp wr-list">
    <div class="title top10">
        <h4 class="title-h cor4">Bình luận</h4>
    </div>
    <div class="flex wrap border-box public-r hide-b-12">
        <div style="width: 100%; background-color: #fff;margin-top: 10px">
            <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                 data-numposts="5" data-colorscheme="light" data-lazy="true">
            </div>
        </div>
    </div>
</div>
<div class="box-width tv4 wow fadeInUp wr-list">
    <div class="title top10">
        <h4 class="title-h cor4">Đề xuất</h4>
    </div>
    <div class="flex wrap border-box public-r hide-b-12">
        <div class="ds-r-hide list-swiper-b">
            <div class="swiper-wrapper">
                <?php
                $postType = 'ophim';
                $taxonomyName = 'ophim_genres';
                $taxonomy = get_the_terms(get_the_id(), $taxonomyName);
                if ($taxonomy) {
                    $category_ids = array();
                    foreach ($taxonomy as $individual_category) $category_ids[] = $individual_category->term_id;
                    $args = array('post_type' => $postType, 'post__not_in' => array(get_the_id()), 'posts_per_page' => 14, 'tax_query' => array(array('taxonomy' => $taxonomyName, 'field' => 'term_id', 'terms' => $category_ids,),));
                    $my_query = new wp_query($args);

                    if ($my_query->have_posts()):
                        while ($my_query->have_posts()):$my_query->the_post(); ?>
                            <div class="public-list-box public-pic-b swiper-slide">
                                <div class="public-list-div public-list-bj">
                                    <a target="_self" class="public-list-exp" href="<?php the_permalink(); ?>"
                                       title="<?php the_title() ?>">
                                        <img class="lazy lazy1 gen-movie-img mask-0" referrerpolicy="no-referrer"
                                             src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="
                                             alt="<?php the_title() ?>"
                                             data-src="<?= op_get_thumb_url() ?>">
                                        <span class="public-bg"></span>
                                        <span class="public-list-prb hide ft2"> <?= op_get_episode(); ?> </span>
                                        <span class="public-play"><i class="fa"></i></span>
                                    </a>
                                </div>
                                <div class="public-list-button">
                                    <a target="_self" class="time-title hide ft4" href="<?php the_permalink(); ?>"
                                       title="<?php the_title() ?>"><?php the_title() ?></a>
                                </div>
                            </div>
                        <?php
                        endwhile;
                    endif;
                    wp_reset_query();
                }
                ?>


            </div>
            <a class="swiper-button-prev fa ds-fanhui" href="javascript:"></a><a
                    class="swiper-button-next fa ds-jiantouyou" href="javascript:"></a></div>
    </div>
</div>

<?php add_action('wp_footer', function () { ?>
    <script src="<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/jquery.raty.js"></script>
    <link href="<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/jquery.raty.css" rel="stylesheet"
          type="text/css"/>
    <script>
        var rated = false;
        $('#movies-rating-star').raty({
            score: <?= op_get_rating(); ?>,
            number: 10,
            numberMax: 10,
            hints: ['quá tệ', 'tệ', 'không hay', 'không hay lắm', 'bình thường', 'xem được', 'có vẻ hay', 'hay',
                'rất hay', 'siêu phẩm'
            ],
            starOff: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-off.png',
            starOn: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-on.png',
            starHalf: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-half.png',
            click: function (score, evt) {
                if (rated) return
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php')?>',
                    type: 'POST',
                    data: {
                        action: "ratemovie",
                        rating: score,
                        postid: '<?php echo get_the_ID(); ?>',
                    },
                }).done(function (data) {
                    $('#movies-rating-msg').html(`Bạn đã đánh giá ${score} sao cho phim này!`);
                });
                rated = true;
                //$('#movies-rating-star').data('raty').readOnly(true);
            }
        });
    </script>
    <script src="<?= get_template_directory_uri() ?>/assets/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css"
          href="<?= get_template_directory_uri() ?>/assets/source/jquery.fancybox.css?v=2.1.5" media="screen"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".fancybox").fancybox({
                maxWidth: 800,
                maxHeight: 600,
                fitToView: false,
                width: '70%',
                height: '70%',
                autoSize: false,
                closeClick: false,
                openEffect: 'none',
                closeEffect: 'none'
            });
        });

    </script>
<?php }) ?>
