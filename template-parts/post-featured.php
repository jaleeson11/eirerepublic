<?php
/**
 * Template part for displaying featured post
 * 
 * @package eirerepublic
 */
?>

<?php
$posts = new WP_Query( array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'tag' => 'featured',
    'orderby' => 'rand'
));

while ($posts->have_posts()) {
    $posts->the_post();
    $tags = get_the_tags(); ?>

    <section class="featured-post" style="background-image: url(<?php echo the_post_thumbnail_url(); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="featured-post__article">
                        <span class="tag">
                            <?php echo $tags[0]->name; ?>
                        </span>
                        <div class="entry-title">
                            <h2><?php the_title(); ?></h2>
                        </div>
                        <div class="entry-content">
                            <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                        </div>
                        <a class="btn btn-primary d-inline-block" href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
?>