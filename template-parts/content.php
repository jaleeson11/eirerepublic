<?php
/**
 * Template part for displaying posts
 * 
 * @package eirerepublic
 */
?>

<div class="container">
	<div class="row">
		<div class="col-12 col-lg-8 offset-lg-2">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php eirerepublic_post_thumbnail(); ?>
	
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
							eirerepublic_posted_on();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php
					the_content();
					?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->
		</div>
	</div>
</div>
