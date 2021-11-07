<?php
/**
 * The template for displaying the footer
 *
 * @package eirerepublic
 */

?>

	<footer class="site-footer d-flex justify-content-center align-items-center">
		<?php if (is_active_sidebar('footer')) : ?>
			<?php dynamic_sidebar('footer') ?>
		<?php endif; ?>	
	</footer>

<?php wp_footer(); ?>
</body>
</html>
