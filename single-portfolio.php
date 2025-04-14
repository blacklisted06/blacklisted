<?php
get_header();
$content = get_the_content();
$stripped_content = strip_tags($content, '<br><a>');
$banner = get_field('banner');
$post_id = get_the_ID();
$taxonomy = 'portfolio-tags'; 
$terms = get_the_terms($post_id, $taxonomy);
$client_video= get_field('client_video');
$client_video_image= get_field('client_video_image');
?>

<div class="bg-theme-noise" aria-hidden="true"></div>
<div class="portfolio-inside-wrapper">
     <!--hero section-->
    <section class="portfolio-hero-section hero-section-spacing bg-theme-dark"
        style="background: url('<?= $banner['url']; ?>') no-repeat center top/cover; z-index: 1;
    position: relative;">
        <div class="container">
            <div class="portfolio-banner-content text-center text-white py-5">
                <div class="blog-block-main">
                    <span class="hero-common-subheading secondary-color d-block fst-normal mb-3 position-relative">portfolio</span>
                    <h1 class="portfolio-commom-heading"><?php the_title(); ?></h1>
                    <p class="commom-description"><?= $stripped_content; ?></p>
                </div>
            </div>
            <?php if(get_field('brand') || get_field('brand') || $terms) { ?>
            <div class="row align-items-center pt-5 g-4">
                <?php if(get_field('client_name')) { ?>
                <div class="col-md-3">
                    <h6 class="common-subheading secondary-color fst-normal info-title mb-1"><?= 'Client Name'; ?></h6>
                    <p class="text-white mb-0"><?= get_field('client_name'); ?></p> 
                </div>
                <?php } if(get_field('brand')) { ?>
                <div class="col-md-3">
                    <h6 class="common-subheading secondary-color fst-normal info-title mb-1"><?= 'Brand'; ?></h6>
                    <p class="text-white mb-0"><?= get_field('brand'); ?></p>
                </div><?php } if ($terms && !is_wp_error($terms)) {?>
                <div class="col-md-6">
                    <div class="row mt-3">
                        <div class="portfolio-tags col d-flex gap-2 justify-content-md-end">
                            <?php
                                    foreach ($terms as $term) {
                                        $term_link = get_term_link($term); // Get term URL
                                        echo '<a href="' . esc_url($term_link) . '" class="tag">' . esc_html($term->name) . '</a><br>';
                                    }
                            ?>
                        </div> <?php } ?>
                    </div>
                </div>
            </div> <?php } ?>
        </div>
    </section>
    
    <!-- video section -->
    <?php  if($client_video_image) { ?>
    <section class="client-testament-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="client-testament-video-section">
            <div class="section-header pb-3">
                <h2 class="commom-heading text-white">
                    Check Client testament
                </h2>
            </div>
            <div class="client-journey-video custom-border position-relative mb-5">
                <img src="<?= $client_video_image['url']; ?>" alt="<?= $client_video_image['alt']; ?>"
                    class="custom-border w-100">
                <span class="play-icon position-absolute top-50 start-50 translate-middle" onclick="playVideo()">
                    <img src="<?= site_url(); ?>/wp-content/uploads/2025/02/video-play-icon.svg"
                        class="rounded-circle" style="width: 60px; height: 60px;">
                </span>
                <div id="videoContainer" class="ratio ratio-16x9 mb-5" style="display: none;">
                    <iframe src="<?= $client_video; ?>"
                        title="Founder Journey Video" allowfullscreen>
                    </iframe>
                </div>
            </div>
            </div>
        </div>
    </section>
<?php } ?>

    <section class="potfolio-commom-section common-section-spacing-bottom bg-theme-dark">
        <div class="container">
            <div class="portfolio-main <?php  if(!$client_video_image) { ?>client-testament-video-section<?php }?>">
            <h2 class="commom-heading text-white mb-3 ">
                  showcasing <?php the_title(); ?>
                </h2>
            <div class="row g-0">
                <div class="col-lg-12 col-12 mb-4 mb-lg-0">
                    <div class="project-image">
                        <?php if (have_rows('portfolio')):
                            while (have_rows('portfolio')):
                                the_row();
                                $tye = get_sub_field('type');
                                if ($tye == 'Image') {
                                    $image = get_sub_field('image');
                                    if ($image) { ?>
                                        <img src="<?= $image['url']; ?>" class="img-fluid" alt="<?= $image['alt']; ?>">
                                    <?php }
                                }
                                if ($tye == 'Text') { ?>
                                    <?php if (get_sub_field('text')): ?>
                                        <h2 class="project-heading text-white text-center m-0 py-3">
                                            <?= get_sub_field('text'); ?>
                                        </h2> <?php endif; ?>
                                    <?php if (get_sub_field('content')): ?>
                                        <p class="commom-description text-white">
                                            <?= get_sub_field('content'); ?>
                                        </p> <?php endif; ?>
                                <?php }
                                if ($tye == 'Video') { ?>
                                    <div class="ratio ratio-16x9">
                                        <iframe width="100%" height="315" src="<?= get_sub_field('video_url'); ?>"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    </div>
                                <?php } ?>
                            <?php endwhile; endif; ?>
                    </div>
                </div>

                <div class="col-lg-12 col-12 ">
                    <div class="portfolio-sidebar portfolio-brief">
                        <div class="project-details text-white">
                            <h2 class="commom-heading text-white"><?= 'Project Brief:'; ?></h2>
                            <?php if (have_rows('project_brief_list')):
                                while (have_rows('project_brief_list')):
                                    the_row(); ?>
                                    <p class="commom-description"><?= get_sub_field('text'); ?></p>
                                <?php endwhile; endif; ?>
                            <hr>
                            <div class="technologies my-4 gap-4">
                                <h3 class="commom-heading text-white pb-3"> Tech Stack Used</h3>
                                <div class="potfolio-tech-image d-flex gap-3">
                                    <?php if (have_rows('technologies')):
                                        while (have_rows('technologies')):
                                            the_row();
                                            $image = get_sub_field('technology'); ?>
                                            <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>"
                                                class="technologies-img">
                                        <?php endwhile; endif; ?>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>


    <section class="portfolios-sec related-portfolio-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="section-header pb-5">
                <h2 class="commom-heading text-white"><?= get_field('portfolio_related_projects_title', 'option'); ?>
                </h2>
                <span
                    class="common-subheading secondary-color d-block pb-4"><?= get_field('portfolio_related_projects_sub_title', 'option'); ?></span>
                <p class="commom-description text-white"><?= get_field('portfolio_related_projects_desc', 'option'); ?>
                </p>
            </div>
            <div class="row portfolio-listing">
                <?php
                // Get the categories of the current post
                $categories = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'ids'));

                // Arguments for related posts query
                $args = array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => 6, // Number of related posts
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'post__not_in' => array(get_the_ID()), // Exclude the current post
                );

                $related_posts_query = new WP_Query($args);

                if ($related_posts_query->have_posts()) {
                    while ($related_posts_query->have_posts()) {
                        $related_posts_query->the_post();
                        ?>

                        <div class="col-lg-4 col-6 portfolio_design_cont">
                            <a href="<?php the_permalink(); ?>">
                                <div class="portfolio_container">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="Portfolio Image">
                                    <? } ?>
                                    <div class="portfolio_overlay_mb">
                                        <div class="portfolio_overlay">
                                            <span class="portfolio-brand"><?= 'branding & identity'; ?></span>
                                        </div>
                                        <div class="portfolio_overlay-name">
                                            <p class="common-description text-white portfolio-name m-0"><?php the_title(); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo 'No related posts found.';
                }
                ?>
            </div>
            <div class="d-flex justify-content-center mt-4 custom-btn mt-5">
                <a class="custom-btn-animation button-link btn rounded-0 text-white"
                    href="<?= site_url('portfolio'); ?>">
                    <span class="button-content-wrapper">
                        <span class="button-text"><?= 'visit portfolio'; ?>
                            <span class="btn-arrows"></span>
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </section>
</div>

            <script>
                function playVideo() {
                    document.querySelector('.client-journey-video img').style.display = 'none';
                    document.querySelector('.play-icon').style.display = 'none';
                    document.getElementById('videoContainer').style.display = 'block';
                }
            </script>

  

<?php get_footer(); ?>