<?php

add_action('wp_ajax_ratemovie', 'ratemovie_init');
add_action('wp_ajax_nopriv_ratemovie', 'ratemovie_init');
function ratemovie_init()
{
    $rate = $_POST['rating'];
    $key = 'ophim_votes';
    $post_id = $_POST['postid'];
    $count = (int)get_post_meta($post_id, $key, true);
    $count++;
    update_post_meta($post_id, $key, $count);

    $rate = $_POST['rating'];
    $key = 'ophim_rating';
    $post_id = $_POST['postid'];
    $rating = (int)get_post_meta($post_id, $key, true);

    $updaterate = $rating + ((int)$rate - $rating) / ($count);
    update_post_meta($post_id, $key, $updaterate);


    $result = array('status' => 'success', 'rating_star' => number_format($rate, 1), 'rating_count' => $count,);
    header('Content-Type: application/json');
    echo json_encode($result);
    die();

}

add_action('wp_ajax_reportbug', 'reportbug_init');
add_action('wp_ajax_nopriv_reportbug', 'reportbug_init');
function reportbug_init()
{
    $result = array('status' => true);
    header('Content-Type: application/json');
    echo json_encode($result);
    die();
}

