<?php
/** 
 **  Template Name: SEO Internal 
 ** Template Post Type: Services
 **/

get_header();
?>
<!-- SEO hero section  -->
<div class="bg-theme-noise" aria-hidden="true"></div>
<section class="page-hero-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-12 col-md-10">
                <span class="hero-common-subheading secondary-color d-block fst-normal mb-3 position-relative">
                    <?= get_field('banner_title'); ?>
                </span>
                <h1 class="seo-common-heading text-white mb-3"><?= get_field('banner_sub_title'); ?></h1>
                <p class="common-description text-white m-0">
                    <?= get_field('banner_desc'); ?>
                </p>
                <div class="d-flex justify-content-center mt-5 custom-btn pt-5">
                    <a class="custom-btn-animation button-link btn rounded-0 text-white" href="#seo_form">
                        <span class="button-content-wrapper">
                            <span class="button-text">let's talk!
                                <span class="btn-arrows"></span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- seo worked with section -->
<section class="seo-worked-with-section bg-theme-dark">
    <div class="container">
        <div class="row d-flex align-items-center py-5">
            <div class="col-md-2 seo-worked-heading position-relative py-3">
                <span class="commom-description text-white m-0">Worked With:</span>
            </div>
            <div class="col-md-10 slide-wrapper">
                <div class="home-logo-section all-technologies bg-theme-dark">
                    <div class="container-fluid">
                        <div class="marquee">
                            <div class="marquee__group">
                                <?php
                                if (have_rows('clients', 'option')):
                                    while (have_rows('clients', 'option')):
                                        the_row();
                                        $image = get_sub_field('client', 'option');
                                        if ($image): ?>
                                            <div class="clients-logo">
                                                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>"
                                                    class="img-fluid">
                                            </div>
                                        <?php endif;
                                    endwhile;
                                endif;
                                ?>
                            </div>

                            <div aria-hidden="true" class="marquee__group">
                                <?php
                                if (have_rows('clients', 'option')):
                                    while (have_rows('clients', 'option')):
                                        the_row();
                                        $image = get_sub_field('client', 'option');
                                        if ($image): ?>
                                            <div class="clients-logo">
                                                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>"
                                                    class="img-fluid">
                                            </div>
                                        <?php endif;
                                    endwhile;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!---- seo-page-testimonials  -->
<section class="clients-chronicles-section common-section-spacing bg-theme-dark">
    <div class="container-fluid">
        <?php echo do_shortcode('[testimonials_list]'); ?>
    </div>
</section>
<!-- Meet Our Experts SH  -->
<section class="meet-our-experts common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="section-header pb-5">
            <h2 class="commom-heading text-white"><?php the_field('meet_our_experts_title'); ?></h2>
            <span
                class="common-subheading secondary-color mb-3 d-block"><?php the_field('meet_our_experts_sub_title'); ?></span>
            <p class="commom-description text-white"><?php the_field('meet_our_experts_desc'); ?></p>
        </div>
        <div class="row g-4 align-items-center">
            <div class="col-lg-4 col-sm-12">
                <div class="row g-4">
                    <div class="col-12">
                        <?php $left_image = get_field('left_image'); ?>
                        <div class="custom-card position-relative overflow-hidden custom-border">
                            <img src="<?= $left_image['url']; ?>" class="card-img-top"
                                alt="<?= get_field('left_image_title'); ?>">
                            <div class="card-body position-absolute bottom-0">
                                <p class="card-over-text secondary-color"><?= get_field('left_image_title'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div
                            class="card text-center bg-dark text-white d-flex align-items-center justify-content-center">
                            <div class="custom-card-content">
                                <span
                                    class="stats__number d-block fs-1 text-white"><?= get_field('experts_under_count'); ?></span>
                                <p class="common-description"><?= get_field('experts_under_title'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-sm-12">
                <div class="row g-4 align-items-center">
                    <div class="col-md-7">
                        <div class="row g-4 mb-4">
                            <?php if (have_rows('seo_team_success_list')): ?>
                                <?php while (have_rows('seo_team_success_list')):
                                    the_row(); ?>
                                    <div class="col-md-6">
                                        <div class="card text-center bg-dark text-white d-flex align-items-center justify-content-center"
                                            style="min-height: 100%;">
                                            <div class="custom-card-content">
                                                <span
                                                    class="stats__number d-block fs-1 secondary-color"><?php echo acf_esc_html(get_sub_field('count')); ?></span>
                                                <p class="common-description">
                                                    <?php echo acf_esc_html(get_sub_field('title')); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                        <div class="col-md-12">
                            <?php $center_seo_team_image = get_field('center_seo_team_image'); ?>
                            <div class="custom-card position-relative overflow-hidden">
                                <img src="<?= $center_seo_team_image['url']; ?>" class="card-img-top"
                                    alt="<?= get_field('seo_team_image_title'); ?>">
                                <div class="card-body position-absolute bottom-0">
                                    <p class="card-over-text secondary-color"><?= get_field('seo_team_image_title'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="custom-card position-relative overflow-hidden">
                                    <?php $right_seo_image = get_field('right_seo_image');
                                    ; ?>
                                    <img src="<?= $right_seo_image['url']; ?>" class="card-img-top"
                                        alt="<?= get_field('right_seo_image_title'); ?>">
                                    <div class="card-body position-absolute bottom-0">
                                        <p class="card-over-text secondary-color">
                                            <?= get_field('right_seo_image_title'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="services_card_inner-social">
                                    <div
                                        class="services_card h-100 w-100 text-center text-white m-0 p-5 d-flex flex-column justify-content-center gap-3">
                                        <h3 class="commom-description m-0"><?= get_field('stay_connected_title'); ?>
                                        </h3>
                                        <ul class="social-icons list-inline m-0 d-flex gap-3 justify-content-center">
                                            <?php if (have_rows('footer_social_share', 'option')):
                                                while (have_rows('footer_social_share', 'option')):
                                                    the_row(); ?>
                                                    <li class="icon-list list-inline-item">
                                                        <a href="<?= get_sub_field('link', 'option'); ?>" target="_blank"
                                                            class="icons text-white fs-4 " aria-label="Behance">
                                                            <i class="fab fa-<?= get_sub_field('title', 'option'); ?>"></i>
                                                        </a>
                                                    </li>
                                                <?php endwhile; endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- seo worked with section -->
<section class="home-logo-section all-technologies common-section-spacing bg-theme-dark">
    <div class="container-fluid">
        <div class="marquee">
            <div class="marquee__group">
                <?php
                if (have_rows('seo_software')):
                    while (have_rows('seo_software')):
                        the_row();
                        $image = get_sub_field('image');
                        if ($image): ?>
                            <div class="clients-logo">
                                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" class="img-fluid">
                            </div>
                        <?php endif;
                    endwhile;
                endif;
                ?>
            </div>

            <div aria-hidden="true" class="marquee__group">
                <?php
                if (have_rows('seo_software')):
                    while (have_rows('seo_software')):
                        the_row();
                        $image = get_sub_field('image');
                        if ($image): ?>
                            <div class="clients-logo">
                                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" class="img-fluid">
                            </div>
                        <?php endif;
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<!-----SeO services -->
<section class="services-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="section-header pb-5">
            <h2 class="commom-heading text-white"><?php echo acf_esc_html(
                get_field("services_we_offer_title")
            ); ?></h2>
            <span class="common-subheading secondary-color d-block pb-4"><?php echo acf_esc_html(
                get_field("services_we_offer_sub_title")
            ); ?></span>
            <p class="commom-description text-white"><?php echo acf_esc_html(
                get_field("services_we_offer_desc")
            ); ?></p>
        </div>
        <div class="row">
            <?php if( have_rows('service_list') ): ?>
    <?php while( have_rows('service_list') ): the_row(); $image = get_sub_field('icon');       ?>
			<div class="col-xl-3 mb-4 col-lg-4 col-6 service-contt">
                        <div class="services_card_inner h-100">
                            <div class="services_card h-100 d-flex">
                                <span class="d-block">
                                    <img src="<?= $image['url']; ?>" alt="<?= get_sub_field('title') . ' - Service'; ?>">
                                </span>
                                <h3 class="servicecard_title">
                                    <?php echo get_sub_field('title'); ?>
                                </h3>
                                <p class="service-description commom-description text-white m-0">
                                   <?php echo get_sub_field('desc'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
    <?php endwhile; ?>
<?php endif; ?>
        </div>
    </div>
</section>

<!-- SE0 traffic cta sh  -->
<section class="seo-traffic-section common-section-spacing bg-theme-dark">
    <div class="container-fluid p-0">
        <div class="customised-section-inner blog-cta-banner text-white">
            <div class="container">
                <div class="row align-items-center py-5 g-3 g-md-0">
                    <div class="col-lg-9 col-md-6">
                        <p class="common-description"><?= get_field('we_pride_ourselves_title'); ?></p>
                        <h2 class="customised-heading text-white"><?= get_field('we_pride_ourselves_desc'); ?> </h2>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex justify-content-center justify-content-md-end">
                        <div class="blog-custom-btn">
                            <a class="custom-btn-animation button-link btn rounded-0 text-white"
                                href="<?= get_field('we_pride_ourselves_btn_link'); ?>">
                                <span class="button-content-wrapper">
                                    <span class="button-text"><?= get_field('we_pride_ourselves_btn_text'); ?>
                                        <span class="btn-arrows"></span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--- SEO Strategy section Sh ---->
<section class="seo-strategy common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-10 m-auto">
                <div class="section-header pb-5 text-center">
                    <h2 class="commom-heading text-white"><?= get_field('seo_strategy_title'); ?></h2>
                    <span
                        class="common-subheading secondary-color mb-3 d-block"><?= get_field('seo_strategy_sub_title'); ?></span>
                    <p class="commom-description text-white"><?= get_field('seo_strategy_desc'); ?></p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <?php if (have_rows('seo_strategy_list')):
                $i = 0; // Counter to track iterations
                while (have_rows('seo_strategy_list')):
                    the_row();
                    $image = get_sub_field('image');
                    $i++;
                    ?>

                    <?php if ($i % 2 != 0): ?>
                        <!-- First Layout -->
                        <div class="col-md-4">
                            <div class="row g-4 h-100">
                                <div class="col-12">
                                    <div
                                        class="card h-100 text-center bg-dark text-white d-flex align-items-center justify-content-center">
                                        <div class="custom-card-content p-4">
                                            <span
                                                class="seo-strategy-heading d-block secondary-color mb-1"><?php echo acf_esc_html(get_sub_field('title')); ?></span>
                                            <p class="common-description"><?php echo acf_esc_html(get_sub_field('desc')); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="custom-card w-100 custom-border overflow-hidden">
                                        <img src="<?= esc_url($image['url']); ?>" class="card-img-top img-fluid"
                                            alt="<?= esc_attr($image['alt']); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php else: ?>
                        <!-- Second Layout -->
                        <div class="col-md-4">
                            <div class="row g-4 h-100">
                                <div class="col-12 d-flex">
                                    <div class="custom-card w-100 custom-border overflow-hidden">
                                        <img src="<?= esc_url($image['url']); ?>" class="card-img-top img-fluid"
                                            alt="<?= esc_attr($image['alt']); ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div
                                        class="card h-100 text-center bg-dark text-white d-flex align-items-center justify-content-center">
                                        <div class="custom-card-content p-3">
                                            <span
                                                class="seo-strategy-heading d-block secondary-color mb-1"><?php echo acf_esc_html(get_sub_field('title')); ?></span>
                                            <p class="common-description"><?php echo acf_esc_html(get_sub_field('desc')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<!---- seo-stats-section ----->
<section class="seo-stats-section hero-common-section-spacing bg-secondary-color">
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center g-4">
                <?php if (have_rows('seo_stats')):
                    while (have_rows('seo_stats')):
                        the_row();
                        ?>
                <div class="col-6 col-md-3 stats-box border-end">
                    <p class="common-description mb-1">
                        <?php echo acf_esc_html(get_sub_field('title')); ?>
                    </p>
                    <span class="fw-bolder stats-number">
                        <?php echo acf_esc_html(get_sub_field('stat')); ?>
                        </h2>
                </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Our SEO Process SH -->
<section class="seo-process-header common-section-spacing bg-theme-dark ">
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="section-header pb-5 text-center">
                    <h2 class="commom-heading text-white">
                        <?php echo acf_esc_html(get_field('our_seo_process_title')); ?>
                    </h2>
                    <span
                        class="common-subheading secondary-color mb-3 d-block"><?php echo acf_esc_html(get_field('our_seo_process_sub_title')); ?></span>
                    <p class="commom-description text-white">
                        <?php echo acf_esc_html(get_field('our_seo_process_desc')); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="seo-process-section common-section-spacing pt-0 bg-theme-dark">
    <div class="container">
        <div class="section-timeline bg-theme-dark">
            <div class="container">
                <div class="timeline-component">
                    <div class="timeline-progress">
                        <div class="timeline-progress-bar"></div>
                    </div>
                    <?php if (have_rows('our_seo_process')):
                        while (have_rows('our_seo_process')):
                            the_row(); $icon= get_sub_field('icon'); ?>
                            <div data-w-id="51610ca7-5ff6-bcbc-6f53-a72cb96c0d56" class="timeline-item">
                                <div id="w-node-_51610ca7-5ff6-bcbc-6f53-a72cb96c0d57-608c65e4" class="timeline-left">
                                    <div class="timeline-text">
                                        <div class="timeline-icon">
                                    <img src="<?= $icon['url']; ?>" alt="Icon - <?= get_sub_field('title'); ?>">
                                </div>
                                        <h3 class="process-h3"><?= get_sub_field('title'); ?></h3>
                                    </div>
                                </div>
                                <div id="w-node-_51610ca7-5ff6-bcbc-6f53-a72cb96c0d5a-608c65e4" class="timeline_centre">
                                    <div class="timeline-circle"></div>
                                </div>
                                <div id="w-node-_51610ca7-5ff6-bcbc-6f53-a72cb96c0d5c-608c65e4" class="timeline-right">
                                    <h4 class="secondary-color mb-3"><?= get_sub_field('sub_title'); ?></h4>
                                    <ul>
                                        <?php if (have_rows('content')):
                                            while (have_rows('content')):
                                                the_row(); ?>
                                                <li class="common-description timeline-p"><?= get_sub_field('desc'); ?></li>
                                            <?php endwhile; endif; ?>
                                    </ul>

                                </div>
                            </div>
                        <?php endwhile; endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- Our SEO Process EH -->
<?php /* ?>
<!---- CASE STUDIES ----->
<section class="case-studies-section common-section-spacing bg-theme-dark" id="case-studies">
<div class="container">
   <div class="section-header pb-3 m-0">
       <h2 class="commom-heading text-white">
           <?php echo acf_esc_html(get_field('case_title')); ?>
       </h2>
   </div>
   <div class="row g-4 case-studies-list">
       <?php if (have_rows('case_studies_list')):
           while (have_rows('case_studies_list')):
               the_row();
               ?>
       <div class="col-md-6 case-list">
           <div class="case-study-block position-relative">
               <div class="case-study-image">
                   <?php $image = get_sub_field('image'); ?>
                   <img src="<?= $image['url']; ?>" class="img-fluid custom-border" alt="<?= $image['alt']; ?>">
               </div>
               <div class="case-study-content position-absolute">
                   <span class="common-subheading text-white d-block text-uppercase fst-normal m-0">
                       <?= 'case study'; ?>
                   </span>
                   <h3 class="case-study-heading pb-3 pb-lg-5 secondary-color text-uppercase">
                       <?php echo acf_esc_html(get_sub_field('title')); ?>
                   </h3>
                   <a href="<?php echo acf_esc_html(get_sub_field('button_link')); ?>">
                       <?php echo acf_esc_html(get_sub_field('button_text')); ?>
                   </a>
               </div>
           </div>
       </div>
       <?php endwhile; endif; ?>
   </div>
</div>
</section> <?php */ ?>

<!-- seo form section sh  -->
<section class="seo-form-section common-section-spacing bg-theme-dark" id="seo_form">
    <div class="container">
        <div class="section-header pb-5 m-0">
            <h2 class="commom-heading text-white"><?php echo acf_esc_html(get_field('have_a_project_title')); ?></h2>
            <span
                class="common-subheading secondary-color d-block pb-4"><?php echo acf_esc_html(get_field('have_a_project_sub_title')); ?></span>
        </div>
        <div class="seo-form">
            <?php echo do_shortcode('[fluentform id="8"]'); ?>
        </div>
    </div>
</section>
<!-- Social Media Strategies cta section -->
<section class="seo-cta-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="customised-section-inner blog-cta-banner text-white">
            <div class="row align-items-center g-4">
                <div class="col-md-8">
                    <p class="common-description"><?php echo acf_esc_html(get_field('improve_brand_title')); ?></p>
                    <h2 class="customised-heading text-white">
                        <?php echo acf_esc_html(get_field('improve_brand_desc')); ?>
                    </h2>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <div class="blog-custom-btn">
                        <a class="custom-btn-animation button-link btn rounded-0 text-white"
                            href="<?php echo acf_esc_html(get_field('improve_brand_btn_link')); ?>">
                            <span class="button-content-wrapper">
                                <span
                                    class="button-text"><?php echo acf_esc_html(get_field('improve_brand_btn_text')); ?>
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

<!-----------  seo page Faq section  Sh -->
<section class="faq-sec seo-faq-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="section-header col-lg-12 col-md-12">
            <h2 class="commom-heading text-white"><?php echo acf_esc_html(get_field('faqs_title')); ?></h2>
            <span
                class="common-subheading secondary-color d-block pb-4"><?php echo acf_esc_html(get_field('faq_desc')); ?>
            </span>
        </div>
        <div class="row g-4">
            <?php if (have_rows('faq_seo_list')): ?>
                <div class="accordion row" id="accordionExample">
                    <?php
                    $total_faqs = count(get_field('faq_seo_list')); // Get total number of FAQs
                    $counter = 0; // Initialize counter
                    while (have_rows('faq_seo_list')):
                        the_row();
                        // Calculate the current item index
                        $current_index = $counter % 3; // This will give us 0, 1, or 2 for each set of 3
                        $is_first_item = ($counter % 3 === 0); // Check if it's the first item in the group
                        $is_first_faq = ($counter === 0); // Check if it's the first FAQ overall
                        ?>

                        <?php if ($current_index === 0): // Start a new column for every 3 items ?>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="list">

                                    <!-- Unique ID for each accordion -->
                                <?php endif; ?>

                                <div class="accordion-item rounded-0">
                                    <span class="accordion-header" id="headingOne_<?php echo $counter; ?>">
                                        <button class="accordion-button <?php echo $is_first_faq ? '' : 'collapsed'; ?>"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne_<?php echo $counter; ?>"
                                            aria-expanded="<?php echo $is_first_faq ? 'true' : 'false'; ?>"
                                            aria-controls="collapseOne_<?php echo $counter; ?>">
                                            <h3 class="seo-faq-question"> <?php echo acf_esc_html(get_sub_field('title')); ?>
                                            </h3>
                                        </button>
                                    </span>
                                    <div id="collapseOne_<?php echo $counter; ?>"
                                        class="accordion-collapse collapse <?php echo $is_first_faq ? 'show' : ''; ?>"
                                        aria-labelledby="headingOne_<?php echo $counter; ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-0 mb-5">
                                            <p class="commom-description text-white">
                                                <?php echo acf_esc_html(get_sub_field('desc')); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $counter++; // Increment the counter
                                if ($current_index === 2 || $counter === $total_faqs): // Close the column after 3 items or at the end
                                    ?>
                                </div> <!-- Close accordion -->
                            </div> <!-- Close list -->
                            <!-- Close col -->
                        <?php endif; ?>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>