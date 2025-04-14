<?php
/* Template Name: Services */
get_header();
$header_image = get_field('header_image');

?>
<div class="bg-theme-noise" aria-hidden="true"></div>
<div class="services-wrapper">
    <!-- Hero SH -->
    <section class="page-hero-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-12 col-md-10">
                    <span class="hero-common-subheading secondary-color d-block fst-normal mb-3 position-relative">
                        services
                    </span>
                    <h1 class="seo-common-heading text-white mb-3"><?php echo esc_html(get_field('title')); ?></h1>
                    <p class="common-description text-white m-0">
                        <?php echo esc_html(get_field('description')); ?>
                    </p>
                    <div class="d-flex justify-content-center mt-0 mt-md-5 custom-btn pt-5">
                        <a class="custom-btn-animation button-link btn rounded-0 text-white" href="#services">
                            <span class="button-content-wrapper">
                                <span class="button-text"><?= 'Explore Services'; ?>
                                    <span class="btn-arrows"></span>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------------- service founder section -------------------->
    <section class="founder-journey-section service-founder common-section-spacing bg-theme-dark">
        <div class="container">
            <?php $service_founder_video_poster_image = get_field('service_founder_video_poster_image'); ?>
            <div class="founder-journey-video custom-border position-relative mb-5">
                <img src="<?= $service_founder_video_poster_image['url']; ?>" alt="<?= $service_founder_video_poster_image['alt']; ?>"
                    class="custom-border">
                <span class="play-icon text-center">
                    <img src="<?= site_url(); ?>/wp-content/uploads/2025/02/video-play-icon.svg"
                        class="rounded-circle">
                </span>
                <div class="video-over-text text-center position-absolute top-100 start-50 translate-middle z-1 w-100">
                    <h2 class="commom-heading text-white"><?= get_field('service_founder_title'); ?></h2>
                    <p class="commom-description secondary-color fst-italic"><?= get_field('service_founder_desc'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!--- Revenue section ------------>
    <section class="stats-section tour-section-dektop-padding bg-theme-dark">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <h2 class="commom-heading text-white"><?= get_field('digital_section_title'); ?></h2>
                    <p class="commom-description text-white pe-0 pe-md-5"><?= get_field('digital_section_desc'); ?></p>
                </div>
                <div class="col-lg-6">
                    <?php if( have_rows('digital_section_list') ): while( have_rows('digital_section_list') ): the_row(); ?>
                        <div class="stat-box pb-5">
                        <p
                            class="stats-content common-subheading secondary-color align-items-center pb-4 text-uppercase">
                            <?php echo acf_esc_html( get_sub_field('title') ); ?> <span class="dots position-relative"></span></p>
                        <div class="stat-number"><?php echo acf_esc_html( get_sub_field('desc') ); ?></div>
                    </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </section>

    <!--our-approach-section sh -->
    <section class="our-approach-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row align-items-center gy-4">
                <?php $approach_image = get_field('approach_image');  ?>
                <div class="col-lg-6">
                    <h2 class="commom-heading text-white"><?= get_field('approach_title'); ?></h2>
                    <p class="commom-description text-white"><?= get_field('approach_desc'); ?></p>
                    <hr class="primary-color pb-3 mt-5 mb-0">
                    <div class="row">
                        <?php if( have_rows('approach_list') ): while( have_rows('approach_list') ): the_row(); ?>
                        <div class="col-md-4">
                            <div class="stats-number secondary-color"><?php echo get_sub_field('title'); ?>
                            </div>
                            <p class="commom-description stats-text text-white"><?php echo get_sub_field('desc'); ?></p>
                        </div><?php endwhile; ?>
                    <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-6 ps-0 ps-md-5">
                    <img src="<?= $approach_image['url']; ?>"
                        class="img-fluid custom-border" alt="<?= $approach_image['alt']; ?>">
                </div>
            </div>
        </div>
    </section>

    <?php echo do_shortcode('[service_list]'); ?>

    <!-- who we are section sh -->
    <section class="bussiness-strategies-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6 col-md-6">
                    <div class="bussiness-strategie-left-content">
                        <h2 class="commom-heading text-white"><?= get_field('supporting_your_business_title'); ?></h2>
                        <span class="common-subheading secondary-color d-block pb-4"><?= get_field('supporting_your_business_sub_title'); ?></span>
                        <p class="commom-description text-white"><?= get_field('supporting_your_business_desc'); ?></p>
                    </div>
                </div>

                <div class="col-lg-6 ps-0 ps-md-5 col-md-6">
                    <div class="row g-3 g-md-0">
                        <?php if( have_rows('supporting_your_business_list') ): 
                            $counter = 0; // Initialize a counter
                            while( have_rows('supporting_your_business_list') ): the_row(); 
                                $image = get_sub_field('image');
                                $title = get_sub_field('title');
                                $desc = get_sub_field('desc');
                                $counter++; // Increment the counter
                        ?>

                        <?php if ($counter % 2 != 0): // Check if it's the first iteration ?>
                            <!-- First iteration -->
                            <div class="col-md-6">
                                <div class="bussiness-strategie-right h-100 d-flex">
                                    <img src="<?= $image['url']; ?>" class="img-fluid flex-grow-1" alt="<?= $image['alt']; ?>">
                                    <div class="strategies-section-content text-center">
                                        <span class="common-subheading secondary-color d-block fst-normal"><?= $title; ?></span>
                                        <p class="commom-description text-white"><?= $desc; ?></p>
                                    </div>
                                </div>
                            </div>
                    
                        <?php else: // Check if it's the second iteration ?>
                            <!-- Second iteration -->
                            <div class="col-md-6">
                                <div class="bussiness-strategie-right h-100 d-flex">
                                    <div class="strategies-section-content text-center">
                                        <span class="common-subheading secondary-color d-block fst-normal"><?= $title; ?></span>
                                        <p class="commom-description text-white"><?= $desc; ?></p>
                                    </div>
                                    <img src="<?= $image['url']; ?>" class="img-fluid flex-grow-1" alt="<?= $image['alt']; ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                    
                    <?php endwhile; endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---- contribution section SH --->
    <section class="contribution-section common-section-spacing bg-theme-dark">
        <?php $challenges_businesses_image= get_field('challenges_businesses_image'); ?>
        <div class="container">
            <div class="section-header pb-5">
                <h2 class="commom-heading text-white"><?= get_field('challenges_businesses_title'); ?></h2>
                <span class="common-subheading secondary-color d-block pb-4"><?= get_field('challenges_businesses_desc'); ?></span>
            </div>
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="<?= $challenges_businesses_image['url']; ?>"
                        class="img-fluid custom-border" alt="<?= $challenges_businesses_image['alt']; ?>">
                </div>
                <div class="col-lg-6">
                    <h2 class="commom-heading text-white"><?= get_field('hurdles_title'); ?></h2>
                    <p class="commom-description text-white"><?= get_field('hurdles_desc'); ?></p>
                    <ul class="text-white ps-0">
                        <?php if( have_rows('hurdles_list') ): while( have_rows('hurdles_list') ): the_row(); ?>
                        <li class="commom-description list-group-item d-flex align-items-center mb-3">
                            <i class="fa-regular fa-circle-check me-3 secondary-color"></i>
                           <?php echo get_sub_field('title'); ?>
                        </li><?php endwhile;  endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--  benefit section-->
    <section class="service-benefit-section tour-section-dektop-padding bg-theme-dark">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-2 g-lg-3 gy-3">
                <?php if( have_rows('benefits') ): while( have_rows('benefits') ): the_row(); $image= get_sub_field('image'); ?>
                <div class="col service-benefit">
                    <div class="benefit-list text-center d-flex flex-column align-items-center gap-3">
                        <img src="<?= $image['url']; ?>"
                            class="img-fluid" alt="benefit-icon- <?= $image['alt']; ?>">
                        <p class="commom-description secondary-color text-center"><?= get_sub_field('title'); ?> <span
                                class="d-block"><?= get_sub_field('desc'); ?></span> </p>
                    </div>
                </div><?php endwhile;  endif; ?>
            </div>
    </section>

    <!--- best choice section --->
    <section class="service-choice-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="section-header pb-5 text-center">
                <h2 class="commom-heading text-white"><?= get_field('business_strategies_title'); ?></h2>
                <span class="common-subheading secondary-color d-block pb-3"><?= get_field('business_strategies_sub_title'); ?></span>
                <p class="common-description text-white"><?= get_field('business_strategies_desc'); ?></p>
            </div>
            <div class="row g-5">
                <?php if( have_rows('business_strategies') ): while( have_rows('business_strategies') ): the_row(); $icon= get_sub_field('icon'); ?>
                <div class="mb-4 col-lg-4 col-6">
                    <div class="strategies_card_inner">
                        <div
                            class="strategies_card d-flex flex-column align-items-center justify-content-between gap-2">
                            <span class="d-block strategies_card_icon mb-3">
                                <img src="<?= $icon['url']; ?>"
                                    class="img-fluid" alt="strategies-img <?= $icon['alt']; ?>">
                            </span>
                            <h3 class="strategies_title secondary-color text-center"><?= get_sub_field('title'); ?></h3>
                            <p class="commom-description text-white m-0 text-center"><?= get_sub_field('desc'); ?> </p>
                        </div>
                    </div>
                </div><?php endwhile;  endif; ?>
            </div>
        </div>
    </section>

    <!----- clients testimonial section --------------->
    <section class="clients-chronicles-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="section-header pb-5 text-center col-md-10 col-lg-8">
                    <h2 class="commom-heading text-white">
                        <?= get_field('clients_chronicles_title'); ?>
                    </h2>
                    <span class="common-subheading secondary-color d-block pb-3">
                        <?= get_field('clients_chronicles_sub_title'); ?>
                    </span>
                    <p class="commom-description text-white">
                        <?= get_field('clients_chronicles_desc'); ?>
                    </p>
                </div>
            </div>
        </div>
        <?php echo do_shortcode('[testimonials_list]'); ?>
    </section>

    <!---------------- how we help section ----------->
    <section class="how-we-help-section tour-section-dektop-padding bg-theme-dark">
        <div class="container">
            <div class="section-header pb-5 text-center">
                <h2 class="commom-heading text-white"> <?= get_field('structured_approach_title'); ?> </h2>
                <span class="common-subheading secondary-color d-block pb-3">
                    <?= get_field('structured_approach_sub_title'); ?>
                </span>
                <p class="common-description text-white"><?= get_field('structured_approach_desc'); ?>
                </p>
            </div>
            <div class="row gy-3">
                 <?php if( have_rows('structured_approach_list') ): $count=1; while( have_rows('structured_approach_list') ): the_row();  ?>
                <div class="col-md-6 col-lg-3">
                    <div class="how-we-help-inner custom-border h-100">
                        <span class="our-process custom-border d-block p-3 bg-theme-blue">0<?= $count; ?></span>
                        <h3 class="commom-description secondary-color"><?= get_sub_field('title'); ?></h3>
                        <p class="commom-description text-white m-0">
                            <?= get_sub_field('desc'); ?>
                        </p>
                    </div>
                </div><?php $count++; endwhile;  endif; ?>
            </div>
        </div>
    </section>

    <!-----------------HOW WE HELP SECTION Eh --------------->
    <!-------------- cta section SH-------------------->
    <section class="seo-cta-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="customised-section-inner blog-cta-banner text-white custom-border">
                <div class="row align-items-center g-4">
                    <div class="col-md-8">
                        <p class="common-description"><?= get_field('struggling_to_grow_title'); ?></p>
                        <h2 class="customised-heading text-white">
                           <?= get_field('struggling_to_grow_desc'); ?>
                        </h2>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <div class="blog-custom-btn">
                            <a class="custom-btn-animation button-link btn rounded-0 text-white" href="<?= get_field('struggling_to_grow_button_link'); ?>">
                                <span class="button-content-wrapper">
                                    <span class="button-text"><?= get_field('struggling_to_grow_button_text'); ?>
                                        <span class="btn-arrows"></span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------------- cta section eH-------------------->

    <!-- map section sh -->
    <?php $expanding_businesses_image= get_field('expanding_businesses_image'); ?>
    <section class="service-page-map-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7 col-md-6">
                    <div class="map-image">
                        <img src="<?= $expanding_businesses_image['url'];?>" class="img-fluid"
                            alt="<?= $expanding_businesses_image['url'];?>">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <h2 class="commom-heading text-white"><?php echo esc_html(get_field('expanding_businesses_title')); ?>
                    </h2>
                    <span class="common-subheading secondary-color d-block pb-3">
                       <?php echo esc_html(get_field('expanding_businesses_sub_title')); ?>
                    </span>
                    <p class="common-description text-white"><?php echo esc_html(get_field('expanding_businesses_desc')); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- map section eh -->

    <!-- form section sh  -->
    <section class="seo-form-section common-section-spacing bg-theme-dark" id="seo_form">
        <div class="container">
            <div class="section-header pb-5 m-0">
                <h2 class="commom-heading text-white"><?php echo esc_html(get_field('form_title')); ?></h2>
                <span class="common-subheading secondary-color d-block pb-4"><?php echo esc_html(get_field('form_desc')); ?></span>
            </div>
            <div class="seo-form">
                <?php echo do_shortcode('[fluentform id="8"]'); ?>
            </div>
        </div>
    </section>

    <!--------------------   faq section sh --------------------->
    <section class="faq-sec common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="section-header col-lg-12 col-md-12 col-sm-12 mb-5">
                    <h2 class="commom-heading text-white">
                        <?php echo esc_html(get_field('faq_title')); ?>
                    </h2>
                    <span class="common-subheading secondary-color d-block pb-4">
                        <?php echo esc_html(get_field('faq_sub_title')); ?>
                    </span>
                    <p class="commom-description text-white">
                        <?php echo esc_html(get_field('faq_desc')); ?>
                    </p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="list row">
                        <div class="accordion" id="accordionExample">
                            <?php if (have_rows('faq_list')): ?>
                            <?php
                            $counter = 1; // Initialize counter
                            while (have_rows('faq_list')):
                                the_row();
                                ?>
                            <div class="accordion-item rounded-0">
                                <h2 class="accordion-header" id="headingOne_<?php echo $counter; ?>">
                                    <button class="accordion-button <?php echo ($counter == 1) ? '' : 'collapsed'; ?>"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne_<?php echo $counter; ?>" aria-expanded="<?php echo ($counter === 1) ? 'true' : 'false'; ?>
                             " aria-controls="collapseOne_<?php echo $counter; ?>">
                                        <?php echo esc_html(get_sub_field('title')); ?>
                                    </button>
                                </h2>
                                <div id="collapseOne_<?php echo $counter; ?>" class="accordion-collapse collapse <?php echo ($counter === 1) ? 'show' : ''; ?>
                            " aria-labelledby="headingOne_<?php echo $counter; ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-0 mb-5">
                                        <?php echo get_sub_field('content'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $counter++; // Increment counter
                            endwhile;
                            ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php get_footer(); ?>