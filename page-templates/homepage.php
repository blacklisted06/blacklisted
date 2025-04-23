<?php
/* Template Name: Home */
get_header();

$video = get_field('video');
$video_title = esc_html(get_field('video_title'));
$video_sub_title = esc_html(get_field('video_sub_title'));
$video_poster = get_field('video_poster');
?>

<div class="bg-theme-noise" aria-hidden="true"></div>
<section class="hero-banner">
    <div class="container-fluid p-0">
        <div class="ratio ratio-16x9 position-relative">
            <video id="home_page_video" class="" data-video="<?= $video['url']; ?>" poster="<?php echo $video_poster['url']; ?>" muted loop playsinline
                style="object-fit: cover;">
                <source src="" type="video/mp4">
            </video>
            <div class="video-overlay d-flex align-items-end justify-content-center pb-5">
                <div class="content-box z-1 text-white pb-1">
                    <h1 class="banner-heading">
                        <span class="off-white-text"><?php echo $video_title; ?></span>
                        <span class="heading-arrow"></span>
                        <br>
                        <?php echo $video_sub_title; ?>
                    </h1>
                    <div class="d-flex justify-content-center mt-4 custom-btn pt-4">
                        <a class="custom-btn-animation button-link btn rounded-0 text-white"
                            href="#looking-for-something">
                            <span class="button-content-wrapper">
                                <span class="button-text">explore
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
<!-- homepage logo section -->
<section class="logo-section common-section-spacing-bottom bg-theme-dark pt-5">
    <div class="container">
        <div class="row g-4 row-cols-3 justify-content-center align-items-center">
            <?php if (have_rows('video_logos')):
                while (have_rows('video_logos')):
                    the_row();
                    $logo = get_sub_field('logo'); ?>
                    <div class="col col-sm-4 col-md-2 text-center">
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"
                            class="home_logo-section img-fluid">
                    </div>
                <?php endwhile; endif; ?>
        </div>
    </div>
</section>
<!-- tour section sh -->
<section class="attention-section tour-section-dektop-padding bg-theme-dark position-relative" id="looking-for-something">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-8">
                <h2 class="commom-heading text-white">
                    <?php echo esc_html(get_field('screams_for_attention_title')); ?>
                </h2>
                <span
                    class="common-subheading secondary-color d-block pb-3"><?php echo esc_html(get_field('screams_for_attention_sub_title')); ?></span>
                <div class="d-flex justify-content-center mt-4 custom-btn">
                    <a class="custom-btn-animation button-link btn rounded-0 text-white" href="#our-work">
                        <span class="button-content-wrapper">
                            <span
                                class="button-text"><?php echo esc_html(get_field('screams_for_attention_button_text')); ?>
                                <span class="btn-arrows"></span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="circle left aos-init aos-animate d-none d-xl-block" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="circle right aos-init aos-animate d-none d-xl-block" data-aos="fade-up" data-aos-duration="1000"></div>
</section>
<!-- all client -->

<?= do_shortcode('[clients_list]'); ?>

<!-- meet section -->
<section class="meet-section scrolling-text-section-padding bg-theme-blue" id="custom-cursor-img">
    <a href="<?= site_url('contact'); ?>" target="_blank" class="external-link">
        <div class="container-fluid">
            <div class="team-imgs-slider" data-direction="left" data-speed="slow" data-animated="true">
                <div class="scroller__inner">
                    <?php if (have_rows('meet_slider')):
                        while (have_rows('meet_slider')):
                            the_row(); ?>

                            <div class="single-img-outer">
                                <p class="single-img">
                                    <?php echo acf_esc_html(get_sub_field('text')); ?>
                                </p>
                            </div>
                        <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </a>
</section>
<!-- portfolio section -->
<section class="portfolios-sec common-section-spacing bg-theme-dark" id="our-work">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section-header pb-5 text-center col-md-10 col-lg-8">
                <h2 class="commom-heading text-white">
                    <?php echo acf_esc_html(get_field('portfolio_title')); ?>
                </h2>
                <span class="common-subheading secondary-color d-block pb-3">
                    <?php echo acf_esc_html(get_field('portfolio_sub_title')); ?>
                </span>
                <p class="commom-description text-white">
                    <?php echo acf_esc_html(get_field('portfolio_desc')); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php if (have_rows('select_portfolio')):
                while (have_rows('select_portfolio')):
                    the_row();
                    $image = get_sub_field('image');
                    $classname = get_sub_field('class_name');
                    $portfolio = get_sub_field('portfolio');
                    ?>
                    <div class="col-lg-4 col-6 portfolio_design_cont">
                        <a href="<?php echo site_url() . '/portfolio/' . esc_html($portfolio->post_name); ?>">
                            <div class="portfolio_container">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="image">
                                <div class="portfolio_overlay_mb">
                                    <div class="portfolio_overlay">
                                        <span class="portfolio-brand d-block"><?= get_sub_field('portfolio_category'); ?></span>
                                    </div>
                                    <div class="portfolio_overlay-name">
                                        <p class="common-description text-white portfolio-name m-0">
                                            <?php echo esc_html($portfolio->post_title); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; endif; ?>
        </div>
        <div class="d-flex justify-content-center mt-4 custom-btn mt-5">
            <a class="custom-btn-animation button-link btn rounded-0 text-white" href="<?= site_url('portfolio'); ?>">
                <span class="button-content-wrapper"><span class="button-text"><?= 'view portfolio'; ?><span
                            class="btn-arrows"></span></span></span>
            </a>
        </div>
    </div>
</section>

<!-- AI and man-made customised section SH  -->
<section class="customised-section-home common-section-spacing bg-theme-dark">
    <div class="container-fluid p-0">
        <div class="customised-section-inner">
            <div class="container">
                <div class="blog-cta-banner blog-custom-btn">
                    <div class="row align-items-center g-4">
                        <div class="col-md-8">
                            <div class="home-cta-section-heading">
                                <span class="low_brand secondary-color text-uppercase pb-2 d-block">Join OUr TEAM</span>
                                <h2 class="customised-heading text-white m-0"><?= get_field('ai_title'); ?></h2>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center justify-content-md-end">
                            <a class="custom-btn-animation button-link btn rounded-0 text-white"
                                href="<?= get_field('ai_button_link'); ?>">
                                <span class="button-content-wrapper"><span
                                        class="button-text"><?= get_field('ai_button_text'); ?><span
                                            class="btn-arrows"></span></span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</section>
<!-- AI and man-made customised section EH -->
<!-- services we offer section SH -->
<?php echo do_shortcode('[service_list]'); ?>
<!-- services we offer section Eh -->
<!-- client’s chronicles section SH -->
<section class="clients-chronicles-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section-header pb-5 text-center col-md-10 col-lg-8">
                <h2 class="commom-heading text-white">
                    <?php echo acf_esc_html(get_field('clients_chronicles_title')); ?>
                </h2>
                <span class="common-subheading secondary-color d-block pb-3">
                    <?php echo acf_esc_html(get_field('clients_chronicles_sub_title')); ?>
                </span>
                <p class="commom-description text-white">
                    <?php echo acf_esc_html(get_field('clients_chronicles_desc')); ?>
                </p>
            </div>
        </div>
    </div>

    <?php echo do_shortcode('[testimonials_list]'); ?>

</section>
<!-- client’s chronicles section EH -->
<!-- founder section Eh -->
<?php $founder_image = get_field('founder_image'); ?>
<section class="founder-section common-section-spacing bg-theme-dark">
    <div class="founder-bg-animation position-relative">
        <div class="bg-overlay"> </div>
        <div class="container">
            <div class="custom-bg ps-0">
                <div class="row align-items-center g-0">
                    <div class="col-xl-5 col-12">
                        <div class="founder-image">
                            <img src="<?= $founder_image['url']; ?>" class="w-100" alt="<?= $founder_image['alt']; ?>"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xl-7 col-12">
                        <div class="founder-info p-4 pe-md-5">
                            <h2 class="commom-heading m-0"><?php echo get_field('founder_name'); ?></h2>
                            <span
                                class="common-subheading text-primary d-block mb-2"><?php echo get_field('founder_role'); ?></span>
                            <p class="commom-description mb-4">
                                <?php echo get_field('about_founder'); ?>
                            </p>
                            <div class="founder-experience d-flex pt-2 pt-md-3">
                                <div class="info-content">
                                    <span class="experience-number"><?= get_field('experience'); ?></span>
                                    <span class="experience-symbol"><?= '+'; ?></span>
                                    <p class="commom-description m-0"><?= 'Years Of Experience'; ?></p>
                                </div>
                                <div class="info-content projects">
                                    <span class="experience-number">350</span>
                                    <span class="experience-symbol"><?= '+'; ?></span>
                                    <p class="commom-description m-0">Projects Completed</p>
                                </div>
                                <div class="info-content awards">
                                    <span class="experience-number"><?= get_field('total_awards'); ?></span>
                                    <p class="commom-description m-0"><?= get_field('awards_title'); ?></p>
                                </div>
                            </div>
                                
                             <div class="d-flex justify-content-start mt-3 custom-btn ">
                                <a class="custom-btn-animation button-link btn rounded-0"
                                    href="<?= site_url('founder'); ?>">
                                    <span class="button-content-wrapper">
                                        <span class="button-text"><?= 'Meet the founder'; ?>
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
    </div>
</section>

<!-- gallery new section SH -->
<section class="gallery-slider-section common-section-spacing bg-theme-dark">
    <?php echo do_shortcode('[gallery_list]'); ?>

</section>
<!-- gallery new section EH -->


<!-- news & updates SH -->
<section class="blog-articles news-update-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="section-header pb-5">
            <h2 class="commom-heading text-white"><?php echo acf_esc_html(get_field('news_title')); ?></h2>
            <span
                class="common-subheading secondary-color d-block mb-4"><?php echo acf_esc_html(get_field('news_sub_title')); ?></span>
            <p class="commom-description text-white"><?php echo acf_esc_html(get_field('news_desc')); ?></p>
        </div>
        <div class="row gx-4 gy-5 blogs-article-list">
            <?php
            $posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
            ));
            if ($posts->have_posts()):
                while ($posts->have_posts()):
                    $posts->the_post();
                    $featured_image = get_field('custom_featured_image');
                    ?>
                    <div class="col-xl-4 col-md-6 blogs-item">
                        <div class="blog_article_card">
                            <a href="<?php the_permalink(); ?>">
                                <div class="blog-img-wrapper position-relative mb-4">
                                    <?php if (has_post_thumbnail()) {
                                        $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                        $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
                                        if($featured_image){
                                            echo '<img src="' . $featured_image["url"] . '" class="imgg" alt="' . esc_attr(get_the_title()) . '">';
                                        } else {
                                        echo '<img src="' . esc_url($thumbnail_url) . '" class="imgg" alt="' . esc_attr(get_the_title()) . '">';
                                        }
                                    } ?>
                                </div>
                                </a>
                                <div class="blog-tags pb-3">
                                    <?php $categories = get_the_terms(get_the_ID(), 'category');
                                    if (!empty($categories) && !is_wp_error($categories)) {
                                        $category_count = 0;
                                        foreach ($categories as $category) {
                                           echo '<span><a href="'.get_category_link($category->term_id).'">' . esc_html($category->name) . '</a></span>';
                                            $category_count++;
                                            if ($category_count == 3) {
                                                break;
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <a href="<?php the_permalink(); ?>">
                                <h4 class="blog_name"><?php the_title(); ?></h4>
                                <p class="blog-content"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            </a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                ?>
                <p><?php _e('No Services found.', 'text-domain'); ?></p>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-center mt-4 custom-btn pt-5">
            <a class="custom-btn-animation button-link btn rounded-0 text-white"
                href="<?php echo site_url('blogs'); ?>">
                <span class="button-content-wrapper">
                    <span class="button-text"><?= 'explore blogs'; ?>
                        <span class="btn-arrows"></span>
                    </span>
                </span>
            </a>
        </div>
    </div>
</section>
<!-- news & updates EH -->
<!-- get a quotation SH -->
<section class="get-quotation-section bg-theme-dark">
    <div class="container py-5">
        <div class="quotation-section">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="quotation-section-content">
                        <h2 class="commom-heading fw-bold">
                            <?php echo acf_esc_html(get_field('get_a_quotation_title')); ?>
                        </h2>
                        <p class="common-subheading">
                            <?php echo acf_esc_html(get_field('get_a_quotation_sub_title')); ?>
                        </p>
                        <p class="commom-description mb-4">
                            <?php echo acf_esc_html(get_field('get_a_quotation_desc')); ?>
                        </p>
                        <div class="quotation-form">
                            <?php echo do_shortcode('[fluentform id="4"]'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="quotation-image ratio ratio-1x1">
                        <?php $get_a_quotation_image = get_field('get_a_quotation_image'); ?>
                        <img src="<?= $get_a_quotation_image['url']; ?>" alt="<?= $get_a_quotation_image['alt']; ?>"
                            class="img-fluid object-fit-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- get a quotation EH -->


<?php get_footer(); ?>