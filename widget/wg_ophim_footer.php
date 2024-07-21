<?php
class WG_oPhim_Footer extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'wg_footer', // Base ID
            __( 'Ophim Footer', 'ophim' ), // Name
            array( 'description' => __( 'Mẫu footer', 'ophim' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract($args);
        ob_start();
        echo $instance['footer'] ?? '';
        echo $after_widget;
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title' 	=> '',
            'slug' 	=> '#',
            'postnum' 	=> 5,
            'style'		=> '1',
            'status'		=> 'all',
            'orderby'		=> 'new',
            'categories'		=> 'all',
            'actors'		=> 'all',
            'directors'		=> 'all',
            'genres'		=> 'all',
            'regions'		=> 'all',
            'years'		=> 'all',
        ) );
        extract($instance);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('footer'); ?>"><?php _e('Footer', 'ophim') ?></label>
            <br />
            <textarea class="widefat" rows="10" id="<?php echo $this->get_field_id('footer'); ?>" name="<?php echo $this->get_field_name('footer'); ?>"  ><?php if(isset($instance['footer']) && $instance['footer']){ echo $instance['footer'];}else{ ?> <div class="footer">
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
                    </div><?php } ?></textarea>
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['footer'] = $new_instance['footer'];
        return $instance;
    }

}
function register_new_widget_Footer() {
    register_widget( 'WG_oPhim_Footer' );
}
add_action( 'widgets_init', 'register_new_widget_Footer' );
