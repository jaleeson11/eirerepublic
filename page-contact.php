<?php
/**
 * The template for displaying the contact page
 *
 * @package eirerepublic
 */

    $response = "";

    function contact_form_generate_response($type, $message)
    {
        global $response;

        if ($type == "success") {
            $response = "<div class='alert alert-success'>" . $message . "</div>";
        } else {
            $response = "<div class='alert alert-danger'>" . $message . "</div>";
        }
    }

    // Response messages 
    $not_human = "Human verification has failed. Pleased check the value you entered is correct and try again";
    $missing_content = "There appears to be information missing from the form. Please check you have entered information for all the required fields and try gain";
    $email_invalid = "You have entered an invalid email address. Please edit the email addres and try again";
    $message_unsent = "Unfortunately your message has not been sent. Please check the information you have entered is correct and try again";
    $message_sent = "Thanks for getting in touch! Your message has been sent.";

    // User posted variables 
    $name = $_POST['message_name'];
    $email = $_POST['message_email'];
    $message = $_POST['message_text'];
    $human = $_POST['message_human'];

    // PHP mailer variables
    $to = get_option('admin_email');
    $subject = "New message from " . get_bloginfo('name');
    $headers = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

    if (!$human == 0) {
        if ($human != 2) {
            contact_form_generate_response("error", $not_human);
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                contact_form_generate_response("error", $email_invalid);
            } else {
                if (empty($name) || empty($message)) {
                    contact_form_generate_response("error", $missing_content);
                } else {
                    $sent = wp_mail($to, $subject, strip_tags($message), $headers);
                    if ($sent) {
                        contact_form_generate_response("success", $message_sent);
                    } else {
                        contact_form_generate_response("error", $message_unsent);
                    }
                }
            }
        }
    } else if ($_POST['submitted']) {
        contact_form_generate_response("error", $missing_content);
    }

get_header();
?>

<main class="site-main contact">

        <header class="contact-form-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 offset-md-2 mt-5 text-center">
                        <h1><?php echo get_theme_mod('contact_page_heading'); ?></h1>
                        <p><?php echo get_theme_mod('contact_page_text'); ?></p>
                        <p class="admin-email d-flex align-items-center justify-content-center">
                            <span class="circle"></span>
                            <?php echo get_option('admin_email'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 offset-md-2">
                        <?php echo $response; ?>
                        <form action="<?php the_permalink(); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Your Name: <br></label>
                                    <input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="message_email">Your Email: <br></label>
                                    <input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
                                </div>
                                <div class="col-12">
                                    <label for="message_text">Message: <br></label>
                                    <textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="message_human">Please Verify You're Human: <br></label>
                                    <input type="text" style="width: 60px;" name="message_human"> + 3 = 5
                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn-lg">
                                </div>
                            </div>
                            <input type="hidden" name="submitted" value="1">
                        </form> 
                    </div>
                </div>
            </div> 
        </section>  

        <?php get_template_part('template-parts/post-recent'); ?>

	</main><!-- #main -->

<?php get_footer() ?>