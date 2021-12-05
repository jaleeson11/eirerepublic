<?php
/**
 * Template part for displaying posts
 * 
 * @package eirerepublic
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="entry-header__block">
							<?php
							if ( is_singular() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif;

							if ( 'post' === get_post_type() ) : ?>
								<div class="entry-meta mb-3">
									<?php eirerepublic_posted_on() ?>
								</div><!-- .entry-meta -->
							<?php endif; ?>

							<p class="entry-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
							
							<span class="circle"></span>
						</div>						
					</div>
				</div>
			</div><!-- .container -->
		</header><!-- .entry-header -->
		<div class="entry-content">
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-6 offset-lg-3">
						<?php the_content(); ?>
					</div>
					<!-- <div class="col-12 col-lg-3">
						<?php if (is_active_sidebar('about')) : ?>
							<?php dynamic_sidebar('about') ?>
						<?php endif; ?>	
					</div> -->
				</div>
			</div><!-- .container -->
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->

	<?php if (has_post_thumbnail()): ?>
	<style>
		.entry-header {
			background-image: url(<?php the_post_thumbnail_url(); ?>);
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
	<? endif; ?>