<?php 
add_theme_support('post-thumbnails');
add_filter( 'use_block_editor_for_post', '__return_false' );

function allow_svg_uploads($mimes) {
    // Add SVG to the list of allowed file types
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

// Optional: Sanitize SVG files using a plugin like SVG Sanitizer
function sanitize_svg($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    if ($filetype['ext'] === 'svg') {
        // Sanitize SVG content before uploading
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
        $data['proper_filename'] = $filename;
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'sanitize_svg', 10, 4);

// Register a new navigation menu
function add_Main_Nav() {
  register_nav_menu('header-menu',__( 'Header Menu' )); 
  register_nav_menu('footer-menu',__( 'Footer Menu' )); 
}

add_action( 'init', 'add_Main_Nav' );

function seopress_theme_slug_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'seopress_theme_slug_setup' );

function theme_name_enqueue_styles() {
	
	$version = date('YmdHis');
	$template_directory_uri = get_stylesheet_directory_uri();
    $base_style_version = filemtime(get_stylesheet_directory() . '/assets/css/custom-style.css');
    $responsive = filemtime(get_stylesheet_directory() . '/assets/css/responsive.css');
    wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'bootstrap' );
    wp_register_style( 'font-awesome','//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'typekit-fonts', get_template_directory_uri() . '/assets/css/vsh0gby.css', array(), null );
    wp_enqueue_style( 'aos-css', '//cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), null );
    wp_enqueue_style( 'swiper-css', '//cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null );
	wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css', array(), null );
	wp_enqueue_style( 'slick-theme-css', '//cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css', array(), null );
    wp_enqueue_style('custom-style', $template_directory_uri . '/assets/css/custom-style.css', array(), $base_style_version);
    wp_enqueue_style('responsive', $template_directory_uri . '/assets/css/responsive.css', array(), $responsive);

	wp_enqueue_script('jquery');
    wp_localize_script('jquery', 'ajaxurl', admin_url('admin-ajax.php'));
    wp_localize_script( 'custom-ajax-script', 'ajax_params', array('ajax_url' => admin_url( 'admin-ajax.php' ), ));
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js',array(),$version, true );
    // Enqueue AOS script
    wp_enqueue_script('aos','https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(),  null, true );
    // Add inline script to initialize AOS
    wp_add_inline_script('aos', 'AOS.init();');
    // Enqueue Sentry script
    //wp_enqueue_script('sentry','https://js.sentry-cdn.com/c77ea5176d967147afe3707be612f8e1.min.js',array(), null, true );
    // Enqueue Swiper script
    wp_enqueue_script('swiper','https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(),null, true );
	wp_enqueue_script('slick','https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js', array(),null, true );
    // Enqueue custom script
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), $version,true);
    
    
	
}
add_action( 'wp_enqueue_scripts', 'theme_name_enqueue_styles' );

function service_listing_custom_shortcode() { ?> 
<section class="services-section common-section-spacing bg-theme-dark" id="services">
            <div class="container">
                <div class="section-header pb-5">
                    <h2 class="commom-heading text-white"><?php echo acf_esc_html(
                        get_field("services_we_offer_title", "option")
                    ); ?></h2>
                    <span class="common-subheading secondary-color d-block pb-4"><?php echo acf_esc_html(
                        get_field("services_we_offer_sub_title", "option")
                    ); ?></span>
                    <p class="commom-description text-white"><?php echo acf_esc_html(
                        get_field("services_we_offer_desc", "option")
                    ); ?></p>
                </div>
                       <div class="row">
                        <?php
                         $services_posts = new WP_Query([
                            "post_type" => "services",
                            "posts_per_page" => -1,
                            "post_status" => "publish",
                            "orderby" => "date",
                            "order" => "ASC",
                            "tax_query" => [
                                [
                                    "taxonomy" => "service_category",
                                    "field"    => "slug",
                                    "terms"    => ["seo"], // Replace with actual slug of SEO category
                                    "operator" => "NOT IN", // Exclude SEO category
                                ]
                            ]
                        ]);
                        if ($services_posts->have_posts()):
                            while ($services_posts->have_posts()): $services_posts->the_post(); 
                            $icon = get_field('icon');
                            $page_url = get_field('page_url');
                            ?>
                            <div class="col-xl-3 mb-4 col-lg-4 col-6 service-contt">
								<div class="services_card_inner h-100">								
                                <a href="<?php echo !empty($page_url) ? esc_url($page_url) : esc_url(get_permalink()); ?>" aria-label="Read more about <?php the_title(); ?>" class="servicecard_readmore">
								<div class="services_card h-100 d-flex">
                                    <span class="service_icon d-flex align-items-center justify-content-center">
                                        <img src="<?= $icon['url']; ?>" alt="<?= get_the_title() . ' - Service'; ?>">
                                    </span>
                                    <h3 class="servicecard_title"><?php if(get_field('title')) { echo get_field('title'); }  else { the_title(); } ?></h3>
									 <p class="service-description commom-description text-white m-0">
										 <? echo wp_trim_words(get_field('service_desciption'), 6, '...');?>
									</p>								
                                </div>
								</a>
								</div>
                            </div> 						   
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else:
                             ?>
                            <p><?php _e("No Services found.", "text-domain"); ?></p>
                            <?php
                        endif;
                        ?>
						   <div class="col-xl-6 mb-4 col-lg-6 col-12 service-contt">
							   <div class="services_card_inner-social h-100">							
									   <div class="services_card h-100 w-100 text-center text-white m-0 p-5 d-flex flex-column justify-content-center gap-3">
                                            <h3 class="commom-description m-0"> Learn more about Blacklisted <br> and stay updated on our activities:</h3>	
										       <ul class="social-icons list-inline m-0 d-flex gap-3 justify-content-center">
												   <?php if (have_rows('footer_social_share', 'option')):
											 while (have_rows('footer_social_share', 'option')):
											 the_row(); ?>
												   <li class="icon-list list-inline-item">
													   <a href="<?= get_sub_field('link', 'option'); ?>" target="_blank" class="icons text-white fs-4 "
														  aria-label="Behance">
														   <i class="fab fa-<?= get_sub_field('title', 'option'); ?>"></i>
													   </a>
												   </li>
												   <?php endwhile; endif; ?>
										   </ul>
									   </div>								
							   </div>
						   </div>  
                    </div>

                <?php if (is_page("7191")) { ?>
                <div class="d-flex justify-content-center mt-4 custom-btn mt-5">
                    <a class="custom-btn-animation button-link btn rounded-0 text-white" href="<?= site_url(
                        "services"
                    ) ?>">
                        <span class="button-content-wrapper">
                            <span class="button-text"><?= 'view all services'; ?>
                                 <span class="btn-arrows"></span>
                            </span>
                        </span>
                    </a>
                </div><?php } ?>
                 </div>
        </section>
<?php
            return ob_get_clean();
 }
add_shortcode('service_list', 'service_listing_custom_shortcode');

add_filter('fluentform/rendering_field_html_button', function ($html, $data, $form) {
 $btn = $form->fields['submitButton']['settings']['button_ui']['text']; 
$html = '<button type="submit" class="custom-btn-animation button-link btn rounded-0 text-white">
        <span class="button-content-wrapper">
            <span class="button-text">'.$btn.'
                <span class="btn-arrows"></span>
            </span>
        </span>
    </button>';

return $html;

}, 10, 3);

function add_category_body_class($classes) {
    if (is_category()) {
        $classes[] = 'page-template-blogs-new';
    }
    return $classes;
}
add_filter('body_class', 'add_category_body_class');

function custom_post_rewrite_rules($rules) {
    $new_rules = array();
    
    // Add custom rewrite rule for single posts
    $new_rules['blogs/([^/]+)/?$'] = 'index.php?post_type=post&name=$matches[1]';
    
    // Merge with existing rules
    return $new_rules + $rules;
}
add_filter('rewrite_rules_array', 'custom_post_rewrite_rules');

function custom_post_link($permalink, $post) {
    if ($post->post_type === 'post') {
        return home_url('/blogs/' . $post->post_name . '/');
    }
    return $permalink;
}
add_filter('post_link', 'custom_post_link', 10, 2);

function flush_custom_rewrite_rules() {
    flush_rewrite_rules();
}
add_action('init', 'flush_custom_rewrite_rules');


add_action( 'wp_enqueue_scripts', 'theme_name_enqueue_styles' );

function gallery_listing_custom_shortcode() { ?> 

    <div class="wrapper">
           <?php if (have_rows('gallery', 'option')): ?>
            <?php $count = 0; ?>
            <div class="marquee">
                <div class="marquee__group">
                    <?php while (have_rows('gallery', 'option')): the_row(); 
                        $image = get_sub_field('image', 'option');
                        if ($count % 2 == 0): $class = ($count / 2 % 2 == 0) ? 'images-odd' : 'images-even mt-3';  ?>
                            <div class="gallery-image">
                        <?php endif; ?>
                            <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" class="img-fluid">
        
                        <?php if ($count % 2 == 1 || get_row_index() == count(get_field('gallery', 'option'))): ?>
                            </div> 
                        <?php endif; ?>
        
                        <?php $count++; ?>
                    <?php endwhile; ?> 
                </div>
                
                <div aria-hidden="true" class="marquee__group">
                    <?php while (have_rows('gallery', 'option')): the_row(); 
                        $image = get_sub_field('image', 'option');
                        if ($count % 2 == 0): $class = ($count / 2 % 2 == 0) ? 'images-odd' : 'images-even mt-3';  ?>
                            <div class="gallery-image">
                        <?php endif; ?>
                            <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" class="img-fluid">
        
                        <?php if ($count % 2 == 1 || get_row_index() == count(get_field('gallery', 'option'))): ?>
                            </div> 
                        <?php endif; ?>
        
                        <?php $count++; ?>
                    <?php endwhile; ?> 
                </div>
        
            </div>
        <?php endif; ?>
        </div>
<?php
            return ob_get_clean();
 }
add_shortcode('gallery_list', 'gallery_listing_custom_shortcode');

function testimonials_listing_custom_shortcode() { ?> 
<div class="clients-testimonial">
        <div class="container-fluid">
            <div class="cardSlider__section position-relative">
                <div class="swiper cardSlider">
                    <div class="swiper-wrapper testimonial-slider clients-testimonial-mb-scroll">
                        <?php if (have_rows('testimonials_list', 'option')):
                            $counter = 1;
                            while (have_rows('testimonials_list', 'option')):
                                the_row();

                                $client = get_sub_field('client_image', 'option');
                                $video_image = get_sub_field('company_logo', 'option');
                                ?>
                                <div class="swiper-slide cardItem">
                                    <div class="card testimonial-card">
                                        <div class="position-relative video-card">
                                            <img src="<?php echo $client['url']; ?>"
                                                alt="<?php echo esc_html(get_sub_field('client_name', 'option')); ?>">
                                            <button class="play-button" data-bs-toggle="modal"
                                                data-bs-target="#videoModal<?php echo $counter; ?>"
                                                data-video="<?php echo esc_html(get_sub_field('video_link', 'option')); ?>">
                                                <img src="<?php echo site_url(); ?>/wp-content/uploads/2025/02/video-play-icon.svg"
                                                    alt="Play Button -  <?php echo esc_html(get_sub_field('client_name', 'option')); ?>" class="img-fluid">
                                            </button>
                                        </div>
                                        <div class="testimonial-caption">
                                            <div class="testimonial-description mb-3">
                                                <p>
                                                    <?php echo esc_html(get_sub_field('about', 'option')); ?>
                                                </p>
                                            </div>
                                            <div class="testimonial-info d-flex align-items-center">
                                                <div class="about-info">
                                                    <span class="client_name">
                                                        <?php echo esc_html(get_sub_field('client_name', 'option')); ?>
                                                    </span>
                                                    <small>
                                                        <?php echo esc_html(get_sub_field('designation', 'option')); ?>
                                                    </small>
                                                </div>
                                                <div class="testimonial-logo">
                                                    <?php if($video_image) { ?>
                                                    <img src="<?php echo $video_image['url']; ?>"
                                                        alt="<?php echo $video_image['alt']; ?>" class="img-fluid"><?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $counter++; endwhile; endif; ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <!-- Video Modals -->
    <?php if (have_rows('testimonials_list', 'option')):
        $counter = 1;
        while (have_rows('testimonials_list', 'option')):
            the_row(); ?>
            <div class="modal fade video-modal" id="videoModal<?php echo $counter; ?>" tabindex="-1"
                aria-labelledby="videoModalLabel<?php echo $counter; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="popup-close-btn">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-0">
                            <div class="ratio ratio-16x9">
                                <iframe class="youtubeVideo" width="560" height="315"
                                    src="<?php echo esc_html(get_sub_field('video_link', 'option')); ?>?autoplay=1"  data-src="<?php echo esc_html(get_sub_field('video_link', 'option')); ?>"
                                    title="YouTube video player" frameborder="0"
                                    allow="autoplay" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $counter++; endwhile; endif; ?>
   
<?php
            return ob_get_clean();
 }
add_shortcode('testimonials_list', 'testimonials_listing_custom_shortcode');  


function clients_listing_custom_shortcode() { ?> 

<section class="all-clients common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="row section-header pb-5">
            <h2 class="commom-heading text-white"><?php echo esc_html(get_field('client_heading', 'option')); ?></h2>
            <span
                class="common-subheading secondary-color mb-3 d-block"><?php echo esc_html(get_field('client_sub_heading', 'option')); ?></span>
            <p class="commom-description text-white"><?php echo esc_html(get_field('client_desc', 'option')); ?></p>
        </div>
        <div class="clients-overlay position-relative">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center g-3">
                <?php
            if (have_rows('clients', 'option')):
                $clients = [];
            
                while (have_rows('clients', 'option')):
                    the_row();
                    $clients[] = [
                        'client' => get_sub_field('client', 'option'),
                    ];
                endwhile;
            
            
                // Display sorted clients
                $count = 0;
                foreach ($clients as $clientData):
                   if ( is_front_page() ) : if ($count >= 35) break; endif;
                    $client = $clientData['client'];
                    ?>
                    <div class="col">
                        <div class="clients-logo-image custom-dark-bg border custom-border-primary py-3 text-center h-100 d-flex align-items-center justify-content-center">
                            <img src="<?php echo esc_url($client['url']); ?>" alt="<?php echo esc_attr($client['alt']); ?>">
                        </div>
                    </div>
                    <?php
                    $count++;
                endforeach;
            endif;
            ?>

            </div>
        </div>
        <?php  if ( is_front_page() ) :?>
        <div class="d-flex justify-content-center pt-2 pt-md-4">
            <a class="custom-btn-animation button-link btn rounded-0 text-white"
                href="<?php echo site_url('clients'); ?>">
                <span class="button-content-wrapper">
                    <span class="button-text"><?= 'view all clients' ?>
                        <span class="btn-arrows"></span>
                    </span>
                </span>
            </a>
        </div><?php endif; ?>
    </div>
</section>

<?php
            return ob_get_clean();
 }
add_shortcode('clients_list', 'clients_listing_custom_shortcode');