<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	
	<header class="site-header">
		<nav class="navbar navbar-light navbar-expand-lg">
			<div class="container">
				<a class="navbar-brand" href="/"><img src="<?php echo get_custom_logo_url(); ?>"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<?php
					$menuLocations = get_nav_menu_locations();
					$menuId = $menuLocations['menu-1'];
					$primaryNav = wp_get_menu_array($menuId);
					?>

					<ul class="navbar-nav">
						<?php
							wp_get_nav_menu_items($menuId);
							global $wp;
							$current_url = home_url( add_query_arg( array(), $wp->request ));

							foreach ($primaryNav as $menu_key => $menu_value) {
								$active = substr($menu_value['url'], 0, -1) === $current_url ? 'active' : '';
								$dropdown_active = '';

								if ($menu_value['children']) {
									foreach ($menu_value['children'] as $sub_menu_key => $sub_menu_value) {
										if ($current_url === substr($sub_menu_value['url'], 0, -1)) {
											$dropdown_active = 'active';
										}
									}
								}
								if (sizeof($menu_value['children']) > 0) {
									echo "
										<li class='nav-item dropdown'>
											<a class='nav-link dropdown-toggle " . $dropdown_active . "' href='" . $menu_value['url'] . "' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
												" . $menu_value['title'] . "
											</a>
											<div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";
											foreach ($menu_value['children'] as $sub_menu_key => $sub_menu_value) {
												echo "<a class='dropdown-item' href='" . $sub_menu_value['url'] . "'>" . $sub_menu_value['title'] . "</a>";
											}
											echo "
											</div>
										</li>";
								} else {
									echo "
										<li class='nav-item'>
											<a class='nav-link " . $active . "' href='" . $menu_value['url'] . "'>" . $menu_value['title'] . "</a>
										</li>";
								}
							}
						?>
					</ul>
				</div>
			</div>
		</nav>
	</header>

