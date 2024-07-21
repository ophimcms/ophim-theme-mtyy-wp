<?php
get_header();
op_set_post_view();
if (isEpisode()) {
    get_template_part('templates/episode');
} else {
    get_template_part('templates/single');
}
get_footer();
?>

