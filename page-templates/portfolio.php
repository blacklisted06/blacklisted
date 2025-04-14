<?php 
/* Template Name: Portfolio */
get_header(); 
$header_image = get_field('header_image');

?>

<div class="bg-theme-noise" aria-hidden="true"></div>
<div class="portfolio-wrapper">
    <!-- Hero SH -->
    <section class="seo-hero-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10">
                 <div class="hero-section-header text-center">
                <span class="hero-common-subheading secondary-color d-block fst-normal mb-3 position-relative">
                   <?php echo esc_html(get_field('title')); ?>
                </span>
                <h1 class="seo-common-heading text-white mb-3"><?php echo esc_html(get_field('sub_title')); ?></h1>
                <p class="common-description text-white m-auto">
                    <?php echo esc_html( get_field('description')); ?>
                </p>
                </div>
                <div class="d-flex justify-content-center mt-5 custom-btn pt-5">
                    <a class="custom-btn-animation button-link btn rounded-0 text-white" href="#ExploreOurportfolios">
                        <span class="button-content-wrapper">
                            <span class="button-text">Explore Our portfolios
                                <span class="btn-arrows"></span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--    <section class="hero-sec common-section-spacing bg-theme-dark ">-->
<!--        <div class="container">-->
<!--            <div class="row align-items-center">-->
<!--                <div class="col-lg-3 col-md-3 col-sm-12">-->
<!--                    <figure class="m-0 in-hero-img">-->
<!--                        <img src="<?php echo $header_image['url'] ?>" alt="<?php echo $header_image['alt'] ?>"-->
<!--                            class="img-fluid">-->
<!--                    </figure>-->
<!--                </div>-->
<!--                <div class="col-lg-9 col-md-9 col-sm-12">-->
<!--                    <div class="in-hero-data text-white">-->
<!--                        <h1 class="page-heading"><?php echo esc_html(get_field('title')); ?></h1>-->
<!--                        <p class="commom-description text-white"><?php echo esc_html( get_field('description')); ?></p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

    <section class="portfolios-sec common-section-spacing bg-theme-dark" id="ExploreOurportfolios">
        <div class="container">
            <div class="portfolio-category-tabs tab-section-block">
                <?php  
            $portfolio_categories = get_terms(array(
                'taxonomy' => 'portfolio-category',
                'hide_empty' => false,
            ));
            ?>
                <ul class="nav nav-pills gap-4 d-none" id="faq-tab" role="tablist">
                    <!-- All Projects Tab -->
                    <li class="nav-item d-flex" role="presentation">
                        <button class="nav-link active" id="pil-all-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all"
                            aria-selected="true">
                            All Projects
                        </button>
                    </li>

                    <?php 
                $first_category = false; // "All Projects" is already the first tab
                foreach ($portfolio_categories as $category) {
                    $category_slug = esc_attr($category->slug);
                    $category_name = esc_html($category->name);
                ?>
                    <li class="nav-item d-flex" role="presentation">
                        <button class="nav-link" id="pil-<?php echo $category_slug; ?>-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-<?php echo $category_slug; ?>" type="button" role="tab"
                            aria-controls="pills-<?php echo $category_slug; ?>" aria-selected="false">
                            <?php echo $category_name; ?>
                        </button>
                    </li>
                    <?php } ?>
                </ul>

                <div class="tab-content mt-5" id="pills-tabContent">
                    <!-- All Projects Tab Content -->
                    <div class="tab-pane show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        <div class="row">
                            <?php
                        $all_portfolio_posts = new WP_Query(array(
                            'post_type' => 'portfolio',
                            'posts_per_page' => -1, 
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ));
                        if ($all_portfolio_posts->have_posts()) :
                            while ($all_portfolio_posts->have_posts()) : $all_portfolio_posts->the_post();
                        ?>
                            <div class="col-lg-4 col-6 portfolio_design_cont">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="portfolio_container">
                                        <?php if ( has_post_thumbnail() ) {
                				 $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
                					
                					echo '<img src="' . esc_url( $image[0] ) . '" alt="' . esc_attr( get_the_title() ) . '">' ; } ?>
                					<div class="portfolio_overlay_mb">
										<div class="portfolio_overlay">
								<span class="portfolio-brand"><?= 'branding & identity'; ?></span>                                                                                    
							</div>
							<div class="portfolio_overlay-name">
								<p class="common-description text-white portfolio-name m-0"><?php the_title(); ?></p>  										
										</div>
										</div>
                                    </div>
									
                                </a>
                            </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                            <p><?php _e('No portfolio found.', 'text-domain'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php 
                foreach ($portfolio_categories as $category) {
                    $category_slug = esc_attr($category->slug);
                ?>
                    <div class="tab-pane fade" id="pills-<?php echo $category_slug; ?>" role="tabpanel"
                        aria-labelledby="pills-<?php echo $category_slug; ?>-tab">
                        <div class="row">
                            <?php
                        $portfolio_posts = new WP_Query(array(
                            'post_type' => 'portfolio',
                            'posts_per_page' => -1, 
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'portfolio-category',
                                    'field' => 'slug',
                                    'terms' => $category_slug,
                                ),
                            ),
                        ));
                        if ($portfolio_posts->have_posts()) :
                            while ($portfolio_posts->have_posts()) : $portfolio_posts->the_post();
                        ?>
                            <div class="col-lg-4 col-6 portfolio_design_cont">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="portfolio_container">
                                        <?php if ( has_post_thumbnail() ) {
                				 $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
                					
                					echo '<img src="' . esc_url( $image[0] ) . '" alt="' . esc_attr( get_the_title() ) . '">' ; } ?>
                                        <div class="portfolio_overlay">
                                            <span><?= 'branding & identity'; ?></span>
                                            <p><?php the_title(); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                            <p><?php _e('No portfolio found in this category.', 'text-domain'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>