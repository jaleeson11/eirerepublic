<?php
/**
 * The template for displaying archive pages
 *
 * @package eirerepublic
 */

get_header();

$term = get_queried_object();
$image = get_field('image', $term);
?>

	<main class="site-main archive category">

		<?php if ( have_posts() ) : ?>

			<header class="page-header text-center mb-5 <?php echo !$image ? 'no-image' : 'has-image'; ?>">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
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
get_template_part('template-parts/block-contact');
get_footer()
?>

<?php if ($image) : ?>
<style>
	.page-header {
		background-image: url(<?php echo $image['url'] ?>);
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>
<? endif; ?>
