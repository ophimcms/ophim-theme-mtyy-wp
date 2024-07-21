<?php

function add_theme_widgets() {
    $activate = array(
        'widget-footer' => array(
            'wg_footer-0',
        )
    );
    update_option('widget_wg_footer', array(
        0 => array('footer' => '<div class="footer">
    <div class="box-width">
        <div class="footer-show">
            <div class="footer-title">Trải nghiệm tuyệt vời nhất, tất cả đều có tại oPhim</div>
            <div class="footer-desc"><span class="footer-n">ophim.cc</span><span>Xem miễn phí số lượng lớn tài nguyên có độ phân giải cực cao</span></div>
            <div class="footer-content">
                <a href="#" class="footer-phone"><span class="fa r6 ds-yinyue"></span><span>Mobile</span></a>
                <a href="#" class="footer-tv"><span class="fa r6 ds-yingyong"></span><span>Tivi</span></a>
                <a href="#" class="footer-computer"><span class="fa r6 ds-faxian"></span><span>Desktop</span></a>
            </div>
        </div>
        <div class="footer-line-top"></div>
        <div class="footer-copy">
            <p class="footer-link"><a href="" target="_blank" rel="nofollow">Telegram</a><a href="/gbook.html"
                                                                                             target="_blank">Đánh giá</a><a
                        href="" target="_blank">oPhim</a></p>
            <p class="copyright">� 2024 <a href="/"></a> All rights reservd.</p>
            <p class="copyright">Tất cả các tài nguyên đều đến từ Internet Nếu có bất kỳ hành vi xâm phạm quyền nào của bạn, vui lòng liên hệ với chúng tôi.</p>
        </div>
    </div>
</div>')
    ));
    update_option('sidebars_widgets',  $activate);

}

add_action('after_switch_theme', 'add_theme_widgets', 10, 2);