<?php
class WG_oPhim_SlidePoster extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'wg_slideposter', // Base ID
            __( 'Ophim Slide Poster', 'ophim' ), // Name
            array( 'description' => __( 'Danh sách phim', 'ophim' ), ) // Args
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
        global $post;
        extract($args);
        $title = $instance['title'];
        $slug = $instance['slug'];
        $postnum = $instance['postnum'];
        $orderby = $instance['orderby'];
        $status = $instance['status'];
        $featured = $instance['featured'];
        $categories = $instance['categories'];
        $years = $instance['years'];
        $genres = $instance['genres'];
        $regions = $instance['regions'];
        echo $before_widget;
        ob_start();
        ?>
        <?php
        $args = array(
            'post_type' => 'ophim',
            'post_status' => 'publish',
            'posts_per_page' => $postnum,
        );

        //danh mục
            if($categories != 'all') {
                $args['tax_query'][] = array(
                    'taxonomy' => 'ophim_categories',
                    'field' => 'slug',
                    'terms' => $categories,
                );
            }
            if($years != 'all') {
                $args['tax_query'][] = array(
                    'taxonomy' => 'ophim_years',
                    'field' => 'slug',
                    'terms' => $years,
                );
            }
            if($genres != 'all') {
                $args['tax_query'][] = array(
                    'taxonomy' => 'ophim_genres',
                    'field' => 'slug',
                    'terms' => $genres,
                );
            }
            if($regions != 'all') {
                $args['tax_query'][] = array(
                    'taxonomy' => 'ophim_regions',
                    'field' => 'slug',
                    'terms' => $regions,
                );
            }

        //status
        if($status != 'all') {
            $args['meta_query'][] = array(
                'key'    =>  'ophim_movie_status',
                'value'  =>  $status
            );
        }
        //featured
        if($featured == 'on') {
            $args['meta_query'][] = array(
                'key'    =>  'ophim_featured_post',
                'value'  =>  '1'
            );
        }
        //orderby
        if($orderby == 'update') {
            $args['orderby'] = 'modified';
        }
        if($orderby == 'new') {
            $args['orderby'] = 'publish_date';
            $args['order'] = 'DESC';
        }
        if($orderby == 'view') {
            $args['meta_key'] = 'ophim_view';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
        }
        if($orderby == 'rate') {
            $args['meta_key'] = 'ophim_rating';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
        }
        if($orderby == 'rand') {
            $args['orderby'] = 'rand';
        }
        $query = new WP_Query($args); ?>
        <?php if ($query->have_posts()) :
            include THEME_URL.'/templates/slide/slider_recommended.php';
        endif; ?>
        <?php wp_reset_postdata(); ?>

        <?php
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
            'status'		=> 'all',
            'orderby'		=> 'new',
            'categories'		=> 'all',
            'actors'		=> 'all',
            'directors'		=> 'all',
            'genres'		=> 'all',
            'regions'		=> 'all',
            'years'		=> 'all',
            'featured'		=> '',
        ) );
        extract($instance);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Tiêu đề', 'ophim') ?></label>
            <br />
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('slug'); ?>"><?php _e('Đường dẫn tĩnh', 'ophim') ?></label>
            <br />
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('slug'); ?>" name="<?php echo $this->get_field_name('slug'); ?>" value="<?php echo $instance['slug']; ?>" />
        </p>

        <p>
            <label><?php _e('Nổi bật', 'ophim') ?></label>
            <br>
            <input type="checkbox" name="<?php echo $this->get_field_name("featured"); ?>" <?php  if($featured == 'on') { echo 'checked'; }    ?> />
        </p>

        <p>
            <label><?php _e('Trạng thái', 'ophim') ?></label>
            <br>
            <?php
            $f = array( 'all' => __('Tất cả', 'ophim'),'trailer' => __('Sắp chiếu', 'ophim'), 'ongoing' => __('Đang chiếu', 'ophim'), 'completed' => __('Hoàn thành', 'ophim'));
            foreach ($f as $x => $n ) { ?>
                <label for="<?php echo $this->get_field_id("status"); ?>_<?php echo $x ?>">
                    <input id="<?php echo $this->get_field_id("status"); ?>_<?php echo $x ?>" class="<?php echo $x ?>" name="<?php echo $this->get_field_name("status"); ?>" type="radio" value="<?php echo $x ?>" <?php if (isset($status)) { checked( $x, $status, true ); } ?> /> <?php echo $n ?>
                </label>
            <?php } ?>
        </p>

        <p class="slider-category">
            <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Danh mục', 'ophim') ?></label>
            <select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
                <option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php _e('Tất cả', 'ophim') ?></option>
                <?php $categories = get_terms(array('taxonomy' => 'ophim_categories', 'hide_empty' => false,));?>
                <?php foreach($categories as $category) { ?>
                    <option value='<?php echo $category->name; ?>' <?php if ($category->name == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->name ; ?> [<?php echo $category->count ?>]</option>
                <?php } ?>
            </select>
        </p>

        <p class="slider-genre">
            <label for="<?php echo $this->get_field_id('genres'); ?>"><?php _e('Thể loại', 'ophim') ?></label>
            <select id="<?php echo $this->get_field_id('genres'); ?>" name="<?php echo $this->get_field_name('genres'); ?>" class="widefat genres" style="width:100%;">
                <option value='all' <?php if ('all' == $instance['genres']) echo 'selected="selected"'; ?>><?php _e('Tất cả', 'ophim') ?></option>
                <?php $genres = get_terms(array('taxonomy' => 'ophim_genres', 'hide_empty' => false,));?>
                <?php foreach($genres as $genre) { ?>
                    <option value='<?php echo $genre->name; ?>' <?php if ($genre->name == $instance['genres']) echo 'selected="selected"'; ?>><?php echo $genre->name ; ?> [<?php echo $genre->count ?>]</option>
                <?php } ?>
            </select>
        </p>

        <p class="slider-region">
            <label for="<?php echo $this->get_field_id('regions'); ?>"><?php _e('Quốc gia', 'ophim') ?></label>
            <select id="<?php echo $this->get_field_id('regions'); ?>" name="<?php echo $this->get_field_name('regions'); ?>" class="widefat regions" style="width:100%;">
                <option value='all' <?php if ('all' == $instance['regions']) echo 'selected="selected"'; ?>><?php _e('Tất cả', 'ophim') ?></option>
                <?php $regions = get_terms(array('taxonomy' => 'ophim_regions', 'hide_empty' => false,));?>
                <?php foreach($regions as $region) { ?>
                    <option value='<?php echo $region->name; ?>' <?php if ($region->name == $instance['regions']) echo 'selected="selected"'; ?>><?php echo $region->name ; ?> [<?php echo $region->count ?>]</option>
                <?php } ?>
            </select>
        </p>

        <p class="slider-year">
            <label for="<?php echo $this->get_field_id('years'); ?>"><?php _e('Năm', 'ophim') ?></label>
            <select id="<?php echo $this->get_field_id('years'); ?>" name="<?php echo $this->get_field_name('years'); ?>" class="widefat years" style="width:100%;">
                <option value='all' <?php if ('all' == $instance['years']) echo 'selected="selected"'; ?>><?php _e('Tất cả', 'ophim') ?></option>
                <?php $years = get_terms(array('taxonomy' => 'ophim_years', 'hide_empty' => false,));?>
                <?php foreach($years as $year) { ?>
                    <option value='<?php echo $year->name; ?>' <?php if ($year->name == $instance['years']) echo 'selected="selected"'; ?>><?php echo $year->name ; ?> [<?php echo $year->count ?>]</option>
                <?php } ?>
            </select>
        </p>




        <p>
            <label><?php _e('Sắp xếp', 'ophim') ?></label>
            <br>
            <?php
            $f = array('new' => __('Mới tạo', 'ophim'),'update' => __('Mới cập nhật', 'ophim'), 'view' => __('Lượt xem', 'ophim'), 'rate' => __('Đánh giá', 'ophim'), 'rand' => __('Random', 'ophim'));
            foreach ($f as $x => $n ) { ?>
                <label for="<?php echo $this->get_field_id("orderby"); ?>_<?php echo $x ?>">
                    <input id="<?php echo $this->get_field_id("orderby"); ?>_<?php echo $x ?>" class="<?php echo $x ?>" name="<?php echo $this->get_field_name("orderby"); ?>" type="radio" value="<?php echo $x ?>" <?php if (isset($orderby)) { checked( $x, $orderby, true ); } ?> /> <?php echo $n ?>
                </label>
            <?php } ?>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('postnum'); ?>"><?php _e('Số bài đăng hiển thị', 'ophim') ?></label>
            <br />
            <input type="number" class="widefat" style="width: 60px;" id="<?php echo $this->get_field_id('postnum'); ?>" name="<?php echo $this->get_field_name('postnum'); ?>" value="<?php echo $instance['postnum']; ?>" />
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
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['slug'] = ( ! empty( $new_instance['slug'] ) ) ? strip_tags( $new_instance['slug'] ) : '';
        $instance['postnum'] = $new_instance['postnum'];
        $instance['featured'] = $new_instance['featured'] ?? '';
        $instance['status'] = $new_instance['status'];
        $instance['orderby'] = $new_instance['orderby'];
        $instance['categories'] = $new_instance['categories'];
        $instance['genres'] = $new_instance['genres'];
        $instance['regions'] = $new_instance['regions'];
        $instance['years'] = $new_instance['years'];
        return $instance;
    }

}
function register_new_widget_SlidePoster() {
    register_widget( 'WG_oPhim_SlidePoster' );
}
add_action( 'widgets_init', 'register_new_widget_SlidePoster' );
