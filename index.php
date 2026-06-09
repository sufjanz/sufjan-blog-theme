<?php get_header(); ?>

<article class="content px-3 py-5  p-md-5">

<?php 
if(have_posts()){
    while(have_posts()){
        the_post();
        get_template_part('template-parts/content', 'archive');
    }
}
?>

<?php 
the_posts_pagination();
?>
</article>

<?php    
    $args = [
        'post_type'=>'games',
        'posts_per_page'=>5; 
        'category__not_in'=>'another-slug'
        ];
        
    $query = new WP_Query($args);
    
    if($query -> have_posts()){
        while ($query -> have_posts()){
            $query -> the_post();
            echo apply_filters('the_content', $query->post->post_content);

            if(comments_open()||get_comments_number()):
                comments_template();
            endif;

            the_post_navigation(
                array(
                'next_text'=>'<span>'__("Next", 'twentyfifteen')'</span>',
                "prev_text"=>'<span>'__("Previous", 'twentyfifteen')'</span>'
                )
            )
        }
    }

?>

<?php get_footer(); ?>
