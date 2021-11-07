<section class="contact__block text-center">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <h2><?php echo get_theme_mod('contact_block_heading') ?></h2>
                <p><?php echo get_theme_mod('contact_block_text') ?></p>
                <a class="btn btn-secondary" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact' ) ) ); ?>">Contact Us</a>
            </div>
        </div>
    </div>
</section>