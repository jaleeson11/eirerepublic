<?php
/**
 * Template part for displaying archive posts
 * 
 * @package eirerepublic
 */
?>

<div class="container">
    <div class="row pb-5">
        <div class="col-12 col-md-4">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()): ?>
                <span class="entry-thumbnail has-image" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></span>
                <?php else: ?>
                <span class="entry-thumbnail">
                    <img class="logo" src="<?php echo get_custom_logo_url(); ?>">
                </span>
                <?php endif; ?>
            </a>        
        </div>
        <div class="col-12 col-md-8">
            <header class="entry-header">
                <?php
                the_title( '<h3 class="entry-title mt-0 mb-1"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );

                if ( 'post' === get_post_type() ) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        eirerepublic_posted_on();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
				</header><!-- .entry-header -->
            </header>
            <div class="entry-content">
                <p>
                    <?php the_excerpt(); ?>
                </p>
            </div>
        </div>
    </div>
</div>