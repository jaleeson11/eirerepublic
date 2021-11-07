<?php get_header(); ?>

<main class="site-main front-page">

    <?php get_template_part('template-parts/post-featured'); ?>

    <?php get_template_part('template-parts/post-recent'); ?>

    <!-- <section class="hero py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 offset-md-2 pr-3">
                    <h1><?php echo get_theme_mod('home_hero_heading'); ?></h1>
                    <p><?php echo get_theme_mod('home_hero_text'); ?></p>
                    <a class="btn btn-primary d-inline-block" href="#">View our categories</a>
                </div>
                <div class="d-none d-sm-block col-md-3 col-lg-2">
                    <img src="<?php echo wp_get_attachment_url(get_theme_mod('home_hero_image')) ?>">
                </div>
            </div>
        </div>
    </section> -->

    <?php get_template_part('template-parts/block-contact'); ?>

</main>

<?php get_footer(); ?>