<?php
/* Template Name: Apply Now */
get_header();
?>

<div class="bg-theme-noise" aria-hidden="true"></div>
<div class="apply-now-wrapper">
    
     <section class="apply-hero-section page-hero-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10">
                 <div class="hero-section-header text-center">
                <span class="hero-common-subheading secondary-color d-block fst-normal mb-3 position-relative">
                   <?php the_title(); ?>
                </span>
                <h1 class="seo-common-heading text-white mb-3"><?php echo esc_html(get_field('title')); ?></h1>
                <p class="common-description text-white m-auto">
                    <?php echo esc_html( get_field('desc')); ?>
                </p>
                </div>
            </div>
        </div>
    </div>
</section>


	<section class="apply-section-form common-section-spacing bg-theme-dark">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">				
					<div class="section-header pb-5 text-center">
						<h2 class="commom-heading text-white"><?php echo esc_html(get_field('form_title')); ?></h2>
						<p class="commom-description text-white"><?php echo esc_html(get_field('form_desc')); ?></p>
					</div>
					<div class="form">
						<?php echo do_shortcode('[fluentform id="3"]'); ?>
					</div>
				</div>				
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>