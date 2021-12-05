<?php
/**
 * Template part for displaying recent posts
 * 
 * @package eirerepublic
 */
?>

<section class="recent-posts">
    <div class="container">
        <div class="row">

            <h2>Recent Articles</h2>

            <?php
            $featured = get_term_by('name', 'featured', 'post_tag')->term_id;

            $posts = new WP_Query( array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'tag__not_in' => array($featured)
            ));

            while ($posts->have_posts()) {
                $posts->the_post(); 
                $category = get_the_category(); ?>
                
                <div class="col-12 col-sm-6 col-md-4">
                    <a href="<?php echo get_category_link($category[0]->cat_ID); ?>">
                        <span class="category">
                            <?php echo $category[0]->name; ?>
                        </span>
                    </a>
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()): ?>
                        <span class="entry-thumbnail has-image" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></span>
                        <?php else: ?>
                        <span class="entry-thumbnail">
                            <img class="logo" src="<?php echo get_custom_logo_url(); ?>">
                        </span>
                        <?php endif; ?>
                    </a>
                    <div class="entry-title">
                        <a href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                        </a>
                    </div>
                    <div class="entry-content">
                        <?php
                        $readMore = "... <a href='" . get_the_permalink() . "'>Read More</a>";
                        ?>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20, $readMore); ?></p>
                    </div>
                </div>
            <?php } 
            ?>

        </div>    
    </div>
</section>