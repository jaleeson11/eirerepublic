<?php
/**
 * The template for displaying search results pages
 *
 * @package eirerepublic
 */

get_header();
?>

	<main class="site-main archive search">

		<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<div class="container">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'eirerepublic' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</div>

		</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/post', 'archive' );

			endwhile;

			the_posts_navigation();

			else :

			get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		
	</main><!-- #main -->

<?php
get_footer();
