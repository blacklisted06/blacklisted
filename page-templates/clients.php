<?php 
/* Template Name: Clients */
get_header(); 
$header_image = get_field('header_image');

?>

<div class="bg-theme-noise" aria-hidden="true"></div>
<div class="clients-wrapper">
    <!-- Hero SH -->
<section class="seo-hero-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10">
                 <div class="hero-section-header text-center">
                <span class="hero-common-subheading secondary-color d-block fst-normal mb-3 position-relative"><?php echo get_field('banner_title'); ?></span>
                <h1 class="seo-common-heading text-white mb-3"><?php echo get_field('banner_sub_title'); ?></h1>
                <p class="common-description text-white m-auto"><?php echo get_field('banner_desc'); ?></p>
                </div>
                <div class="d-flex justify-content-center mt-5 custom-btn pt-5">
                    <a class="custom-btn-animation button-link btn rounded-0 text-white" href="<?php echo get_field('banner_button_link'); ?>">
                        <span class="button-content-wrapper">
                            <span class="button-text"><?php echo get_field('banner_button_text'); ?>
                                <span class="btn-arrows"></span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero Eh-->
    
 <!--  clients-stats sh -->
<section class="trusted-section common-section-spacing bg-theme-dark" id ="Discover-Our-Journey">
    <div class="container">  
      <div class="trusted-clients-gallery">
          <ul class="clients-main-gallery p-0 d-flex gap-3">
              <?php
            if (have_rows('clients')):
                while (have_rows('clients')):
                    the_row();
                    $client = get_sub_field('client');
                    $clients[] = $client;
                endwhile;
            endif;
            
            $totalClients = count($clients);
            $grouped = [];
            
            if ($totalClients >= 6) {
                // First 3
                $grouped[] = array_slice($clients, 0, 3);
            
                $middleStart = 3;
                $middleEnd = $totalClients - 3;
            
                for ($i = $middleStart; $i < $middleEnd; $i += 2) {
                    $grouped[] = array_slice($clients, $i, 2);
                }
            
                // Last 3
                $grouped[] = array_slice($clients, $totalClients - 3, 3);
            } else {
                for ($i = 0; $i < $totalClients; $i += 3) {
                    $grouped[] = array_slice($clients, $i, 3);
                }
            }
            foreach ($grouped as $group): ?>
                <li>
                    <ul class="main-gallery-list p-0 d-flex flex-column gap-3">
                        <?php foreach ($group as $client): ?>
                            <li><img src="<?= $client['url']; ?>" alt="<?= $client['alt']; ?>" class="gallery-img custom-border"></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>

          </ul>
      </div>
    
      <div class="trusted-text text-center">
            <h2 class="commom-heading text-white"><?php echo get_field('clients_bottom_text_1'); ?></h2>
            <p class="common-subheading secondary-color mb-3 d-block"><?php echo get_field('clients_bottom_text_2'); ?></p>
        </div>
    </div>
</section>


<!--  clients-stats sh -->
<section class="clients-stats stats-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <h2 class="commom-heading text-white"><?php echo get_field('digital_title'); ?></h2>
                    <p class="commom-description text-white pe-0 pe-md-5"><?php echo get_field('digital_desc'); ?></p>
                </div>
                <div class="col-lg-6">
                    <?php 
                     if (have_rows('stats')): while (have_rows('stats')): the_row(); ?>
                    <div class="stat-box pb-5">
                        <p class="stats-content common-subheading secondary-color align-items-center pb-4 text-uppercase">
                            <?= get_sub_field('title'); ?> <span class="dots position-relative"></span></p>
                        <div class="stat-number"><?= get_sub_field('desc'); ?></div>
                    </div>
                    <?php   endwhile; endif;?>
                </div>
            </div>
        </div>
</section>
<!--  clients-stats EH -->
    
<?= do_shortcode('[clients_list]'); ?>
        
<section class="clients-chronicles-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section-header pb-5">
                <h2 class="commom-heading text-white"><?php echo esc_html( get_field('client_chronicles_title')); ?></h2>
                <span class="common-subheading secondary-color mb-3 d-block"><?php echo esc_html( get_field('client_chronicles_sub_title')); ?></span>
                <p class="commom-description text-white"><?php echo esc_html( get_field('client_chronicles_desc')); ?></p>
            </div>
        </div>
        </div>
        <?php echo do_shortcode('[testimonials_list]'); ?>
</section>  

<section class="industries-slider-section tour-section-dektop-padding bg-theme-dark">
    <div class="container">
             <div class="section-header text-center pb-5">
                <h2 class="commom-heading text-white"><?= get_field('industries_title'); ?></h2>
                <span class="common-subheading secondary-color mb-3 d-block"><?= get_field('industries_desc'); ?></span>
            </div>
    </div>
    <div class="wrapper">
        
       <?php if (have_rows('industries')): while (have_rows('industries')): the_row(); ?>

    <div class="<?= get_sub_field('class_name'); ?>">
        <?php 
            $industry_html = '';

            if (have_rows('industry')): 
                while (have_rows('industry')): the_row(); 
                    $industry_html .= '<div class="industries-text"><span>' . get_sub_field('title') . '</span></div>';
                endwhile;
            endif;
        ?>

        <div class="marquee__group">
            <?= $industry_html; ?>
        </div>
        <div aria-hidden="true" class="marquee__group">
            <?= $industry_html; ?>
        </div>
    </div>

<?php endwhile; endif; ?>

        
    </div>
</section>
        
<!-------- cta section --------->
<section class="customised-section-home common-section-spacing bg-theme-dark">
    <div class="container-fluid p-0">
        <div class="customised-section-inner">
            <div class="container">
                <div class="blog-cta-banner blog-custom-btn">
                    <div class="row align-items-center g-4">
                        <div class="col-md-12">
                            <div class="home-cta-section-heading">
                                <h2 class="customised-heading text-white m-0"><?= get_field('cta_text'); ?></span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
	
</div>
<?php get_footer(); ?>