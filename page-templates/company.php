<?php 
/* Template Name: Company */
get_header(); 
$header_image = get_field('header_image');
?>

<div class="bg-theme-noise" aria-hidden="true"></div>
<div class="company-wrapper">
    <!-- Hero SH -->
    <section class="hero-sec common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-3 col-md-3 col-sm-12">
					<figure class="m-0 in-hero-img">
                        <img src="<?php echo $header_image['url'] ?>" alt="<?php echo $header_image['alt'] ?>" class="img-fluid">
                    </figure>                    
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="in-hero-data text-white">
                        <h1 class="page-heading"><?php echo esc_html(get_field('title')); ?></h1>
                        <p class="commom-description text-white"><?php echo esc_html( get_field('description')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="who-we-are-section common-section-spacing bg-theme-dark">
            <div class="container">
                <div class="section-header pb-5">
                    <h2 class="commom-heading text-white"><?php echo esc_html( get_field('who_we_are_title')); ?></h2>
                    <span class="common-subheading secondary-color d-block mb-3"><?php echo esc_html( get_field('who_we_are_sub_title')); ?></span>
                    <p class="commom-description text-white"><?php echo esc_html( get_field('who_we_are_desc')); ?></p>
                    <div class="image">
                        <?php $_who_we_are_image = get_field('_who_we_are_image'); ?>
                        <img src="<?php echo $_who_we_are_image['url']; ?>" alt="<?php echo $_who_we_are_image['alt']; ?>">
                    </div>
                </div>
            </div>
    </section>    
    
   <?php echo do_shortcode('[service_list]'); ?>
        
      <section class="founder-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row align-items-center g-0">
                <?php $founder_picture = get_field('founder_picture');  ?>
                <div class="col-lg-6">
                    <div class ="founder-image">
                        <img src="<?php echo $founder_picture['url']; ?>" alt="<?php echo $founder_picture['alt']; ?>" class="rounded">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="founder-info-company pe-5 text-white">
                        <h2 class="commom-heading text-white mb-3 text-capitalize"><?php echo esc_html( get_field('name') ); ?></h2>
                        <h5 class="common-subheading text-primary mb-4"><?php echo esc_html( get_field('role') ); ?></h5>
                        <p class="commom-description mb-4"><?php echo esc_html( get_field('about') ); ?></p>
						<div class="d-flex align-items-center justify-content-between pt-5">
							<div class="info-content">
								<div class="info-content">									
									<span class="experience-number text-white">10</span>
									<sup class="experience-symbol">+</sup>
									<small class="m-0">Years<br>Of Experience</small>								  
								</div>
<!-- 								<span class="experience"><?php echo get_field('experience'); ?></span>								 -->
							</div>
							<a class="custom-btn-animation button-link btn rounded-0 text-white" href="<?php echo esc_html( get_field('button_link') ); ?>">
								<span class="button-content-wrapper">
									<span class="button-text"><?php echo esc_html( get_field('button_text') ); ?>
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
    
    <section class="gallery-slider-section common-section-spacing bg-theme-dark">
            <div class="container">
                <div class="section-header pb-5">
                    <h2 class="commom-heading text-white"><?php echo esc_html( get_field('wizards_title')); ?></h2>
                    <span class="common-subheading primary-color d-block pb-4"><?php echo esc_html( get_field('wizards_sub_title')); ?></span>
                    <p class="commom-description text-white"><?php echo  get_field('wizards_desc'); ?></p>
                </div>
        </div>
                    <?php echo do_shortcode('[gallery_list]'); ?>
            
    </section>
        
</div>
<?php get_footer(); ?>