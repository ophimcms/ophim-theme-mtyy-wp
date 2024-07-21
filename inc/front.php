<?php

//ajax search
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
    ?>
    <script type="text/javascript">
        function fetch(){
            $("#result").html('');
            key = jQuery('#dsSoInput').val();
            if(!key){
                $("#result").html('');
                return;
            }
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: { action: 'search_film', keyword:key ,limit : 5 },
                success: function(res) {
                    $("#result").html('');
                    let data = JSON.parse(res);
                    $.each(data, function(key, value){
                        $('#result').append('<a href="'+value.slug+'"><div class="rowsearch"> <div class="column lefts"> <img src="'+value.image+'" width="50" /> </div> <div class="column rights"><p> '+value.title+' ' + '</p><p> '+value.original_title+'| '+value.year+' </p></div> </div></a>' )
                    });
                }
            });

        }
        document.body.addEventListener("click", function (event) {
            $("#result").html('');
        });
    </script>

    <?php
}

//search fim
function mySearchFilter($query) {
    if ($query->is_search) {
        $regions = oIsset($_GET,'regions');
        $genres = oIsset($_GET,'genres');
        $years = oIsset($_GET,'years');
        $categories = oIsset($_GET,'categories');
        $query->set('post_type', 'ophim');
        $args = array();
        if($categories) {
            $args[] = array(
                'taxonomy' => 'ophim_categories',
                'field' => 'slug',
                'terms' => $categories,
            );
        }
        if($years) {
            $args[] = array(
                'taxonomy' => 'ophim_years',
                'field' => 'slug',
                'terms' => $years,
            );
        }
        if($genres) {
            $args[] = array(
                'taxonomy' => 'ophim_genres',
                'field' => 'slug',
                'terms' => $genres,
            );
        }
        if($regions) {
            $args[] = array(
                'taxonomy' => 'ophim_regions',
                'field' => 'slug',
                'terms' => $regions,
            );
        }
        $query->set('tax_query',$args);
    };
    return $query;
};

add_filter('pre_get_posts','mySearchFilter');
