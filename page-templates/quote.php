<?php
/* Template Name: Quote */
get_header();
?>

<div class="bg-theme-noise" aria-hidden="true"></div>
<div class="quote-wrapper">

<section class="careers-hero-section seo-hero-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-12 col-md-10">
                <span class="hero-common-subheading secondary-color d-block fst-normal mb-3 position-relative">get a quote</span>
                <h1 class="career-common-heading text-white mb-3 fw-normal">Let’s Connect & Collaborate</h1>
                <p class="common-description text-white m-0">Have a question or an idea? We’re here to help—reach out, share your thoughts, and let’s make things happen together!</p>
                <div class="d-flex justify-content-center mt-5 custom-btn pt-5">
                    <a class="custom-btn-animation button-link btn rounded-0 text-white " href="#contact-form">
                        <span class="button-content-wrapper">
                            <span class="button-text">connect with us<span class="btn-arrows"></span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!---->
<section class="contact-detail-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="row">
            <?php if( have_rows('contact_list') ): while( have_rows('contact_list') ): the_row();  
            $type = get_sub_field('type');  
            if($type == 'email') {
            $type=  get_sub_field('email');
                $href= 'mailto:'. get_sub_field('email');
            } else if($type == 'phone') {
            
               $type=  get_sub_field('phone');
               $href= 'tel:'. get_sub_field('phone');
            }
            ?>
                    <div class="mb-4 col-lg-4 col-md-6 col-12">
                <div class="contact-detail h-100 text-center">
                    <div class="contact_detail_card">
                        <h3 class="contact-detail-heading text-uppercase mb-1"><?php echo acf_esc_html( get_sub_field('title') ); ?></h3>
                        <span class="commom-description m-0 d-block"><?php echo acf_esc_html( get_sub_field('desc') ); ?></span>
                    </div>
                        <div class="contact-link">
                        <a href="<?= $href; ?>" aria-label="Read more about"><?= $type; ?></a>
                        </div>

                </div>
            </div><?php endwhile;  endif; ?>
        </div>
    </div>
</section>

<section class="contact-section common-section-spacing bg-theme-dark" id="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="section-header pb-5 text-center">
                    <h2 class="commom-heading text-white"><?php the_field('form_title'); ?></h2>
                    <p class="common-description text-white"><?php the_field('form_desc'); ?></p>
                </div>
            </div>
        </div>

        <div class="row gy-5 gy-md-0">
            <div class="col-md-8 m-auto">
                <div class="form-section">
                    <div class="contact-details">
                        <?php echo do_shortcode('[fluentform id="1"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<?php get_footer(); ?>