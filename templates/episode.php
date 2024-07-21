<div class="box-width">
    <div class="player-style-2">
        <div class="player-top box radius">
            <style>.MacPlayer {
                    width: 100%;
                    height: 100%;
                }

                #jwplayer {
                    height: 100% !important;
                }

                .active-server {
                    background: #505054 !important;
                }
            </style>
            <div class="MacPlayer">
                <div id="player-wrapper" style="height: 100%!important;"></div>
            </div>
        </div>
    </div>
    <div class="player-info cor4">
        <div class="fun flex between radius">
            <a class="play-tips-bnt item cor5 load-icon-on"><i class="fa r6"></i>Chọn Server</a>
        </div>
        <div class="tips-box radius none">
            <div class="video-info-aux">
                <a onclick="chooseStreamingServer(this)" data-type="m3u8" id="streaming-sv"
                   data-id="<?= episodeName() ?>"
                   data-link="<?= m3u8EpisodeUrl() ?>" class="streaming-server tag-link "
                   style="background: #303033;color: #FFF;padding: 10px;border-radius: 10px;margin: 5px">
                    Nguồn #1
                </a>
                <a onclick="chooseStreamingServer(this)" data-type="embed" id="streaming-sv"
                   data-id="<?= episodeName() ?>" data-link="<?= embedEpisodeUrl() ?>"
                   class="streaming-server tag-link"
                   style="background: #303033;color: #FFF;padding: 10px;border-radius: 10px;margin: 5px">
                    Nguồn #2
                </a>
            </div>
        </div>
        <div class="player-info-text cor4 top20 slide-desc-box">
            <div class="title">
                <h2 class="title-h cor4">
                    <a target="_self" href="<?php the_permalink(); ?>" class="ds-line22 more">
                        <span><?php the_title() ?></span>
                        <span class="this-get"><i class="this-hide">Chi tiết</i><i class="fa ds-jiantouyou"></i></span>
                    </a>Tập <?= episodeName() ?> </h2>
            </div>
            <div class="this-desc-labels flex">
                <span class="this-tag this-b"><i class="focus-item-label-rank">Năm</i><?= op_get_year(' ') ?></span>
            </div>
            <div class="this-desc-info">
                <span class="this-desc-score cor6"><i class="ds-shoucang fa"></i> <?= op_get_rating() ?></span>
                <span><?= op_get_regions(' <span></span>') ?></span>
                <span><?= op_get_directors(10, '<span></span>') ?></span>
            </div>
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
            <div class="this-desc-tags" style="margin-top: 10px">
                <span> <?= op_get_tags(' ') ?></span>
            </div>

            <div class="this-desc">
                <div id="height_limit" class="text">
                    <em class="cor5">Nội dung：</em>　<?php the_content() ?>
                </div>
                <div class="text-open">
                    <span class="tim-bnt"><i class="fa r6 ease"></i>Xem thêm</span>
                </div>
            </div>
            <div class="wow fadeInUp wr-list animated" style="visibility: visible; animation-name: fadeInUp;">
                <div class="actor-new public-r">
                    <div class="ds-r-hide actor-roll swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                        <ul class="swiper-wrapper">
                            <?php $slug = get_option('ophim_slug_actors') ?: 'actors';
                            foreach (op_get_actor() as $ct) :
                                ?>

                                <li class="public-list-box public-pic-e swiper-slide swiper-slide-active"
                                    style="width: 146.556px; margin-right: 30px;" role="group" aria-label="1 / 5">
                                    <div class="public-list-div">
                                        <a target="_self" class="public-list-exp"
                                           href="<?= home_url($slug . "/" . $ct->slug) ?>"
                                           title="<?php the_title() ?>">
                                            <img class="lazy lazy3 mask-1 br-100 entered loaded"
                                                 alt="<?php the_title() ?>"
                                                 referrerpolicy="no-referrer"
                                                 src=""
                                                 data-src=""
                                                 data-ll-status="loaded">
                                        </a>
                                    </div>
                                    <div class="public-list-button">
                                        <a target="_self" class="time-title hide ft4"
                                           href="<?= home_url($slug . "/" . $ct->slug) ?>"
                                           title="<?= $ct->name ?>"><?= $ct->name ?></a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <script>
                new Swiper('.actor-roll', {
                    slidesPerView: 6,
                    slidesPerGroup: 6,
                    observer: true,
                    spaceBetween: 8,
                    navigation: {nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev',},
                    breakpoints: {
                        1692: {slidesPerView: 11, slidesPerGroup: 11, spaceBetween: 30,},
                        1330: {slidesPerView: 9, slidesPerGroup: 9, spaceBetween: 30,},
                        993: {slidesPerView: 7, slidesPerGroup: 7, spaceBetween: 30,},
                        560: {slidesPerView: 5, slidesPerGroup: 5, spaceBetween: 15,},
                    }
                });
            </script>
        </div>
        <div class="title flex between top20">
            <div class="title-left">
                <h4 class="title-h cor4">Danh sách tập</h4>
            </div>
        </div>
        <?php foreach (episodeList() as $key => $server) { ?>
            <div class="anthology-tab nav-swiper top10 swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode">
                <div class="swiper-wrapper"
                     style="transition-duration: 300ms; transform: translate3d(0px, 0px, 0px);">
                    <a data-form="<?= $key ?>"
                       class="vod-playerUrl swiper-slide on nav-dt <?php if ($key == episodeSV()) : ?> swiper-slide-active <?php endif ?>"
                       role="group"
                       aria-label="1 / 2"><i class="fa"></i><?= $server['server_name'] ?></a>

                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
            <div class="player-list-box top20">
                <div class="anthology-list select-a">
                    <div class="anthology-list-box none dx">
                        <ul class="anthology-list-play size">
                            <?php foreach ($server['server_data'] as $list) : ?>
                                <li class="box border on ecnav-dt">
                                    <a class="hide cor4" href="<?= $list['getUrl'] ?>">
                                        <span><?= $list['name'] ?></span>
                                        <?php if ($list == getEpisode()) {
                                            echo '<em class="play-on"><i></i><i></i><i></i><i></i></em>';
                                        } ?> </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="ds-comments top20">
            <div class="title top10">
                <h4 class="title-h cor4">Bình luận</h4>
            </div>
            <div style="width: 100%; background-color: #fff;margin-top: 10px">
                <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                     data-numposts="5" data-colorscheme="light" data-lazy="true">
                </div>
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
<?php
add_action('wp_footer', function () { ?>

    <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-core.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-hlsjs.min.js"></script>
    <?php op_jwpayer_js(); ?>
    <script>
        var episode_id = '<?= episodeName() ?>';
        const wrapper = document.getElementById('player-wrapper');
        const vastAds = "<?= get_option('ophim_jwplayer_advertising_file') ?>";

        function chooseStreamingServer(el) {
            const type = el.dataset.type;
            const link = el.dataset.link.replace(/^http:\/\//i, 'https://');
            const id = el.dataset.id;

            episode_id = id;


            Array.from(document.getElementsByClassName('streaming-server')).forEach(server => {
                server.classList.remove('active-server');
            })
            el.classList.add('active-server');
            renderPlayer(type, link, id);
        }

        function renderPlayer(type, link, id) {
            if (type == 'embed') {
                if (vastAds) {
                    wrapper.innerHTML = `<div id="fake_jwplayer"></div>`;
                    const fake_player = jwplayer("fake_jwplayer");
                    const objSetupFake = {
                        key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                        aspectratio: "16:9",
                        width: "100%",
                        file: "<?= get_template_directory_uri() ?>/assets/player/1s_blank.mp4",
                        volume: 100,
                        mute: false,
                        autostart: true,
                        advertising: {
                            tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                            client: "vast",
                            vpaidmode: "insecure",
                            skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?: 5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                            skipmessage: "Bỏ qua sau xx giây",
                            skiptext: "Bỏ qua"
                        }
                    };
                    fake_player.setup(objSetupFake);
                    fake_player.on('complete', function (event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adSkipped', function (event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adComplete', function (event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });
                } else {
                    if (wrapper) {
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                    }
                }
                return;
            }

            if (type == 'm3u8' || type == 'mp4') {
                wrapper.innerHTML = `<div id="jwplayer"></div>`;
                const player = jwplayer("jwplayer");
                const objSetup = {
                    key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                    aspectratio: "16:9",
                    width: "100%",
                    image: "<?= op_get_poster_url() ?>",
                    file: link,
                    playbackRateControls: true,
                    playbackRates: [0.25, 0.75, 1, 1.25],
                    sharing: {
                        sites: [
                            "reddit",
                            "facebook",
                            "twitter",
                            "googleplus",
                            "email",
                            "linkedin",
                        ],
                    },
                    volume: 100,
                    mute: false,
                    autostart: true,
                    logo: {
                        file: "<?= get_option('ophim_jwplayer_logo_file') ?>",
                        link: "<?= get_option('ophim_jwplayer_logo_link') ?>",
                        position: "<?= get_option('ophim_jwplayer_logo_position') ?>",
                    },
                    advertising: {
                        tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                        client: "vast",
                        vpaidmode: "insecure",
                        skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?: 5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                        skipmessage: "Bỏ qua sau xx giây",
                        skiptext: "Bỏ qua"
                    }
                };

                if (type == 'm3u8') {
                    const segments_in_queue = 50;

                    var engine_config = {
                        debug: !1,
                        segments: {
                            forwardSegmentCount: 50,
                        },
                        loader: {
                            cachedSegmentExpiration: 864e5,
                            cachedSegmentsCount: 1e3,
                            requiredSegmentsPriority: segments_in_queue,
                            httpDownloadMaxPriority: 9,
                            httpDownloadProbability: 0.06,
                            httpDownloadProbabilityInterval: 1e3,
                            httpDownloadProbabilitySkipIfNoPeers: !0,
                            p2pDownloadMaxPriority: 50,
                            httpFailedSegmentTimeout: 500,
                            simultaneousP2PDownloads: 20,
                            simultaneousHttpDownloads: 2,
                            // httpDownloadInitialTimeout: 12e4,
                            // httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpDownloadInitialTimeout: 0,
                            httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpUseRanges: !0,
                            maxBufferLength: 300,
                            // useP2P: false,
                        },
                    };
                    if (Hls.isSupported() && p2pml.hlsjs.Engine.isSupported()) {
                        var engine = new p2pml.hlsjs.Engine(engine_config);
                        player.setup(objSetup);
                        jwplayer_hls_provider.attach();
                        p2pml.hlsjs.initJwPlayer(player, {
                            liveSyncDurationCount: segments_in_queue, // To have at least 7 segments in queue
                            maxBufferLength: 300,
                            loader: engine.createLoaderClass(),
                        });
                    } else {
                        player.setup(objSetup);
                    }
                } else {
                    player.setup(objSetup);
                }


                const resumeData = 'OPCMS-PlayerPosition-' + id;
                player.on('ready', function () {
                    if (typeof (Storage) !== 'undefined') {
                        if (localStorage[resumeData] == '' || localStorage[resumeData] == 'undefined') {
                            console.log("No cookie for position found");
                            var currentPosition = 0;
                        } else {
                            if (localStorage[resumeData] == "null") {
                                localStorage[resumeData] = 0;
                            } else {
                                var currentPosition = localStorage[resumeData];
                            }
                            console.log("Position cookie found: " + localStorage[resumeData]);
                        }
                        player.once('play', function () {
                            console.log('Checking position cookie!');
                            console.log(Math.abs(player.getDuration() - currentPosition));
                            if (currentPosition > 180 && Math.abs(player.getDuration() - currentPosition) >
                                5) {
                                player.seek(currentPosition);
                            }
                        });
                        window.onunload = function () {
                            localStorage[resumeData] = player.getPosition();
                        }
                    } else {
                        console.log('Your browser is too old!');
                    }
                });

                player.on('complete', function () {
                    <?php if(nextEpisodeUrl()){ ?>
                    window.location.href = "<?= nextEpisodeUrl() ?>";
                    <?php }?>
                    if (typeof (Storage) !== 'undefined') {
                        localStorage.removeItem(resumeData);
                    } else {
                        console.log('Your browser is too old!');
                    }
                })

                function formatSeconds(seconds) {
                    var date = new Date(1970, 0, 1);
                    date.setSeconds(seconds);
                    return date.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");
                }
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const episode = '<?= episodeName() ?>';
            let playing = document.querySelector(`[data-id="${episode}"]`);
            if (playing) {
                playing.click();
                return;
            }

            const servers = document.getElementsByClassName('streaming-server');
            if (servers[0]) {
                servers[0].click();
            }
        });
    </script>
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

<?php }) ?>