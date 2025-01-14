<style>
    #result {
        margin-top: 20px;
        background-color: #333333;
        list-style-type: none;
        width: 500px;
        position: fixed;
        top: 38px;
        right: 0;
        z-index: 9999;
        padding-left: 0;
        border-radius: 6px;
    }

    #result a {
        overflow: hidden;
        display: block;
        border-radius: 6px;
    }

    @media (max-width: 500px){
        #result {
            top: 32px;
            width: 100%;
            left: 0;
        }
    }

    .column {
        float: left;
        padding: 5px;
    }

    .lefts {
        text-align: center;
        width: 20%;
    }

    .rights {
        width: 80%;
    }

    .rowsearch:after {
        content: "";
        display: table;
        clear: both;
    }

    #result .rowsearch {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #result .rowsearch p {
        margin-bottom: 1px;
    }

    .rowsearch:hover {
        background-color: #2d2d2d;
    }

</style>
<div class="head head-c header_nav1" id="nav">
    <div class="this-pc flex between">
        <div class="left flex">
            <div class="logo">
                <a class="gen-left-list-mobile" href="javascript:"><em class="fa ds-menu"></em></a>
                <a class="logo-brand" href="/">
                    <?php op_the_logo('max-height:60px;width:100%') ?>
                </a>
            </div>
            <div class="head-nav ft4 roll bold0 pc-show1 wap-show0">
                <ul class="swiper-wrapper">
                    <?php
                    $menu_items = op_get_menu_array('primary-menu');
                    foreach ($menu_items as $key => $item) : ?>
                        <?php if (empty($item['children'])) { ?>
                            <li class="swiper-slide"><a target="_self" href="<?= $item['url'] ?>"
                                                        class=""><?= $item['title'] ?></a></li>
                        <?php } else { ?>
                            <li class="rel head-more-menu">
                                <a class="this-get" href="javascript:"><?= $item['title'] ?><em class="fa nav-more"
                                                                                                style="font-size:18px"></em></a>
                                <div class="head-more none box size" style="display: none;">
                                    <?php foreach ($item['children'] as $k => $child): ?>
                                        <a href="<?= $child['url'] ?>" class="nav-link"><?= $child['title'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </li>

                        <?php } ?>
                    <?php endforeach; ?>
                </ul>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
        <div class="right flex">
            <div class="search-min-box">
                <form id="search" name="s" method="get" action="/">
                    <input id="dsSoInput" type="text" name="s" value="<?php echo "$s"; ?>" placeholder="Tìm kiếm" onkeyup="fetch()"
                           autocomplete="off"
                           class="input">
                    <button id="dsSo" type="submit" class="fa ds-sousuo"></button>
                </form>
                <div class="" id="result"></div>
            </div>
        </div>
    </div>

    <div class="drawer-list drawer-show" style="display: none;">
        <div class="drawer-list-bg box-bg ease" style="display: block;"></div>
        <div class="drawer-list-box bj3">
            <div class="drawer-nav drawer-scroll bold0 wap-show0" style="width: 100%;overflow-y: scroll">
                <?php
                $menu_items = op_get_menu_array('primary-menu');
                foreach ($menu_items as $key => $item) : ?>
                    <?php if (($item['children'])) { ?>
                        <div style="color: #757474; padding: 10px 5px"><?= $item['title'];?></div>
                        <?php foreach ($item['children'] as $k => $child): ?>
                            <a href="<?= $child['url'] ?>" class="nav-link none2"><?= $child['title'] ?></a>
                        <?php endforeach; ?>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="this-wap roll bold0 pc-show1">
        <ul class="swiper-wrapper">
            <?php
            $menu_items = op_get_menu_array('primary-menu');
            foreach ($menu_items as $key => $item) : ?>
                <?php if (empty($item['children'])) { ?>
                    <li class="swiper-slide"><a target="_self" href="<?= $item['url'] ?>"
                                                class=""><?= $item['title'] ?></a></li>
                <?php } else { ?>
                <?php } ?>
            <?php endforeach; ?>
        </ul>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>
</div>