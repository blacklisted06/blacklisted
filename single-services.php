<?php 
get_header(); 
$banner = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
?>
<div class="bg-theme-noise" aria-hidden="true"></div>
<div class="sevice-inside-wrapper">
	<section class="content-sec common-section-spacing bg-theme-dark">
		<div class="container">
			<div class="blog-block-main">
				<h2 class="detail-commom-heading text-white"><?php the_title(); ?></h2>
				<p class="commom-description text-white"><?php echo esc_html( get_field('service_desciption')); ?></p>
			</div>
		</div>
	</section>  	
    <section class="banner-sec-parallax common-section-spacing bg-theme-dark" style="background-image: url('<?= $banner[0]; ?>');"></section>
    
	<section class="services-section common-section-spacing bg-theme-dark">
		<div class="container">
			<div class="row justify-content-center">		   
				<div class="blog-block-main col-md-12 text-center pb-3">
					<h2 class="commom-heading text-white"><?php echo esc_html( get_field('services_title')); ?></h2>
					<span class="common-subheading primary-color mb-3 d-block"><?php echo esc_html( get_field('services_sub_title')); ?></span>
					<p class="commom-description text-white"><?php echo esc_html( get_field('services_desc')); ?><p>
				</div>
			</div>

			<div class="row g-4">
				<?php if( have_rows('services_list') ): ?>
				<?php while( have_rows('services_list') ): the_row(); 
				$image = get_sub_field('icon');
				?>
				<div class="col-md-6 col-sm-6 col-lg-6">
					<div class="service-list d-flex">
						<figure class="img w-25">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" >
						</figure>
						<div class="text_wrapper w-75">
							<span class="heading text-white"><?php echo acf_esc_html( get_sub_field('text') ); ?></span>
							<p class="commom-description text-white"><?php echo acf_esc_html( get_sub_field('desc') ); ?></p>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
    
	<section class="how-we-do-section common-section-spacing bg-theme-dark">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-lg-4">
					<span class="commom-heading text-white"><?php echo esc_html( get_field('how_do_we_do_title')); ?></span>
				</div>

				<div class="col-md-8 col-lg-8 border-start">
					<div class="strategies ps-0 ps-md-5">					
						<p class="commom-description text-white"><?php echo get_field('how_do_we_do_desc'); ?></p>
						<div class="how_do_we_do_list row">
							<?php if( have_rows('how_do_we_do_list') ): ?>
							<?php while( have_rows('how_do_we_do_list') ): the_row(); 
							$image = get_sub_field('icon');
							?>
							<div class="col-md-6 col-sm-6 col-lg-6">
								<div class="process-text-wrapper">
									<span class="common-subheading primary-color mb-3 d-block"><?php echo acf_esc_html( get_sub_field('title') ); ?></span>
									<p class="commom-description text-white"><?php echo acf_esc_html( get_sub_field('desc') ); ?></p>
								</div>
							</div>
							<?php endwhile;endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>    
	</section>
	
    <?php echo do_shortcode('[service_list]'); ?>
    
	<section class="all-clients common-section-spacing bg-theme-dark">
	    <div class="container-fluid">
		<?php
        if (have_rows('clients', 'option')):
            $image_count = 0; // Counter to keep track of images
            $direction = 'left'; // Initial direction set to 'left'
        
            while (have_rows('clients', 'option')):
                the_row();
                $image = get_sub_field('client', 'option');
                $image_url = is_array($image) ? $image['url'] : $image; // Handle image array properly
        
                // Check if we need to start a new container
                if ($image_count % 25 === 0) {
                    // Close previous container if not the first set
                    if ($image_count > 0) {
                        echo '</div></div></div>'; // Close .scroller__inner and .team-imgs-slider
                        // Switch direction AFTER the first container is created
                        $direction = ($direction === 'right') ? 'left' : 'right';
                    }

                    // Start a new container
                    echo '<div class="team-imgs-slider mb-4" data-direction="' . $direction . '" data-speed="slow" data-animated="true">';
                    echo '<div class="scroller__inner"><div class="row">';
                }

                // Image content
                echo '<div class="col">';
                echo '<div class="Major-Clients-img border border-primary p-3 p-lg-4"><img src="' . esc_url($image_url) . '" alt="gallery-image" class="single-img object-fit-cover"></div>';
                echo '</div>';

                $image_count++;
            endwhile;

            // Close the last open container
            echo '</div></div></div>'; // Close .scroller__inner and .team-imgs-slider
        endif;
?>
        </div>
	</section>
      
    <!------------ client’s chronicles section SH  ------------------->
	<section class="clients-chronicles-section common-section-spacing bg-theme-dark">
		<div class="container">
			<div class="row justify-content-center">
				<div class="section-header pb-5 text-center col-md-8">
					<h2 class="commom-heading text-white"><?php echo acf_esc_html( get_field('service_post_testimonial_title', 'option') ); ?></h2>
					<span class="common-subheading primary-color d-block pb-3"><?php echo acf_esc_html( get_field('service_post_testimonial_sub_title', 'option') ); ?></span>
					<p class="commom-description text-white"><?php echo acf_esc_html( get_field('service_post_testimonial_desc', 'option') ); ?></p>
				</div>
			</div>
		</div>
		
    <?php echo do_shortcode('[testimonials_list]'); ?>
    
	</section>
        <!------------ client’s chronicles section EH  ------------------->        
	<section class="faq-sec common-section-spacing bg-theme-dark">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h2 class="commom-heading text-white"><?php echo esc_html(get_field('faq_title')); ?></h2>
					<span class="common-subheading primary-color mb-3 d-block"><?php echo esc_html( get_field('_faq_sub_title')); ?></span>
					<p class="commom-description text-white"><?php echo esc_html( get_field('_faq_desc')); ?></p>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="list row">
						<div class="accordion" id="accordionExample">
							<?php if( have_rows('faq_list') ): ?>
							<?php 
							$counter = 1; // Initialize counter
							while( have_rows('faq_list') ): the_row();
							?>
							<div class="accordion-item rounded-0">
								<h2 class="accordion-header" id="headingOne_<?php echo $counter; ?>">
									<button class="accordion-button <?php echo ($counter == 1) ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne_<?php echo $counter; ?>" aria-expanded="<?php echo ($counter == 1) ? 'true' : 'false'; ?>
                             " aria-controls="collapseOne_<?php echo $counter; ?>">
										<?php echo esc_html( get_sub_field('title')); ?>
										
									</button>
								</h2>
								<div id="collapseOne_<?php echo $counter; ?>" class="accordion-collapse collapse <?php echo ($counter == 1) ? 'show' : ''; ?>
																					 " aria-labelledby="headingOne_<?php echo $counter; ?>" data-bs-parent="#accordionExample">
									<div class="accordion-body"><?php echo get_sub_field('desc'); ?> </div>
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