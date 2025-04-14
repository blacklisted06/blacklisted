<?php 
/* Template Name: Founder & CEO */ 
get_header(); 

?>
<div class="bg-theme-noise" aria-hidden="true"></div>
<div class="foundation-wrapper">

    <section class="careers-hero-section seo-hero-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-12 col-md-10">
                    <span
                        class="hero-common-subheading secondary-color d-block fst-normal mb-3 position-relative"><?php echo esc_html( get_field('founder_title') ); ?></span>
                    <h1 class="career-common-heading text-white mb-3 fw-normal"><?php echo esc_html( get_field('founder_sub_title') ); ?></h1>
                    <p class="common-description text-white m-0"><?php echo esc_html( get_field('about_founder') ); ?></p>
                    <div class="d-flex justify-content-center mt-5 custom-btn pt-5">
                        <a class="custom-btn-animation button-link btn rounded-0 text-white " href="#founder">
                            <span class="button-content-wrapper">
                                <span class="button-text"><?php echo 'learn more'; ?>
                                    <span class="btn-arrows"></span>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="founder-journey-section common-section-spacing bg-theme-dark">
        <div class="container">
            <?php $video_poster_image = get_field('video_poster_image'); ?>
            <div class="founder-journey-video custom-border position-relative mb-5">
                <img src="<?= $video_poster_image['url']; ?>"
                    alt="<?= $video_poster_image['alt']; ?>" class="custom-border">
                <span class="play-icon text-center">
                    <img src="<?= site_url('wp-content/uploads/2025/02/video-play-icon.svg'); ?>"
                        class="rounded-circle">
                    <span class="common-subheading secondary-color d-block pb-3">
                        coming soon </span>
                </span>
            </div>
        </div>
    </section>

    <section class="numbers-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="row gy-4">
                        <?php if( have_rows('stats') ): while( have_rows('stats') ): the_row(); ?>
                            <div class="col-lg-4 singleNumb">
                                <span class="common-subheading secondary-color d-block">
                                    <?php echo acf_esc_html( get_sub_field('title') ); ?></span>
                                <h3 class="total-number text-white"><?php echo acf_esc_html( get_sub_field('desc') ); ?></h3>
                            </div>
                            <?php endwhile; endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-------  founder Inception sectoin Sh ------>
    <section class="founder-inception-section common-section-spacing bg-theme-dark" id="founder">
        <div class="container">
            <div class="container">
                <div class="row gx-5 align-items-start">
                    <div class="col-lg-6 mb-4">
                        <div class="founder-blacklisted p-4 custom-border">
                            <?php $founder_logo = get_field('founder_logo'); ?>
                            <span class="common-subheading secondary-color mb-3 d-block fst-normal"><?php echo esc_html( get_field('founder_title') ); ?></span>
                            <span class="blacklisted-logo-image d-block text-center w-100 py-5"><img src="<?= $founder_logo['url']; ?>" alt="<?= $founder_logo['alt']; ?>"></span>
                            <p class="commom-description text-white"><?php echo esc_html( get_field('company_name') ); ?></p>
                            <p class="commom-description text-white"><?php echo esc_html( get_field('company_time') ); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div>
                            <h2 class="commom-heading text-white"><?php echo esc_html( get_field('journey_title') ); ?></h2>
                            <p class="commom-description secondary-color"><?php echo esc_html( get_field('journey_sub_title') ); ?>
                            </p>
                            <p class="work-year common-description text-white"><?php echo esc_html( get_field('journey__desc') ); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mt-5">
                    <?php if( have_rows('_journey_list') ): while( have_rows('_journey_list') ): the_row(); $logo = get_sub_field('logo');  ?>
                    <div class="col mb-3">
                        <div class="founder-in custom-border">
                            <p class="commom-description secondary-color"><?= get_sub_field('title'); ?></p>
                            <div class="founder-sec-logos d-block text-center py-3  w-100"><img
                                    src="<?= $logo['url']; ?>"
                                    alt="<?= $logo['alt']; ?>" class="img-fluid"></div>
                            <div class="about-founder w-100">
                                <p class="worked-in commom-description text-white pb-3"><?= get_sub_field('sub_title'); ?></p>
                                <p class="work-year commom-description text-white m-0"><?= get_sub_field('time'); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!----- founder-Inception Eh ------>

    <!--  educational-section sh -->
    <section class="educational-section common-section-spacing bg-theme-dark pt-0">
        <div class="container">
            <div class="section-header pb-5">
                <h2 class="commom-heading text-white"><?= get_field('educational_accreditation_title'); ?></h2>
                <span class="common-subheading secondary-color d-block pb-3"><?= get_field('educational_accreditation_sub_title'); ?></span>
                <p class="common-description text-white"><?= get_field('educational_accreditation_desc'); ?></p>
            </div>
            <div class="row g-4">
                 <?php if( have_rows('educational_accreditation_list') ):  while( have_rows('educational_accreditation_list') ): the_row(); $icon= get_sub_field('logo'); ?>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="educational-studies custom-border">
                        <div class="educational-logos d-block  py-3 w-100 mb-5"><img
                                src="<?= $icon['url']; ?>"
                                alt="<?= $icon['alt']; ?>" class="img-fluid"></div>
                                <div class="educational-section-content">
                        <div class="about-educational w-100">
                            <p class="commom-description text-uppercase text-white"><?= get_sub_field('title'); ?></p>
                        </div>
                          <div class="about-educational w-100">
                            <span class="common-subheading text-white d-block pb-3"><?= get_sub_field('desc'); ?></span>
                        </div>
                        </div>
                    </div>
                </div><?php endwhile; ?><?php endif; ?>
            </div>
        </div>
    </section>
    <!--  educational-section Eh -->

    <!-- recognisable work sh -->
    <section class="recognisable-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="row section-header pb-5">
                <div class="col-lg-12 mb-12">
                <h2 class="commom-heading text-white"><?php echo esc_html( get_field('recognisable_work_title')); ?></h2>
                 <span class="common-subheading secondary-color d-block pb-3">Projects in VFX, Direction & Art</span>
                <p class="commom-description text-white"><?php echo  get_field('recognisable_work_desc'); ?></p>
                </div>
            </div>            
                <?php if( have_rows('recognisable_work_list') ): ?>
                <div class="recognisable_work_list row gy-4">
                <?php while( have_rows('recognisable_work_list') ): the_row(); ?>
					<div class="work-list mb-3">
						  <h3 class="work-list-heading subheading secondary-color m-0"><?php echo acf_esc_html( get_sub_field('category_name') ); ?></h3>
					</div>
                  
                   <?php $category_type= get_sub_field('category_type');  
                    if($category_type == 'Video') { ?>
                     <?php if( have_rows('video_type') ): while( have_rows('video_type') ): the_row(); $image= get_sub_field('image'); 
                        $title=  get_sub_field('title'); 
                        $slug = strtolower(str_replace(' ', '', $title));
                     ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="card video-card rounded bg-transparent overflow-hidden">
                                <div class="video-wrap position-relative">
                                    <img src="<?php echo $image['url']; ?>"
                                        alt="<?php echo esc_html( get_sub_field('title')); ?>">
                               
                                        <button class="play-button">
                                        <a href="<?php echo esc_html(get_sub_field('video_url')); ?>" target="_blank">
                                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2025/02/video-play-icon.svg"
                                        alt="Play Button -  <?php echo esc_html(get_sub_field('title')); ?>" class="img-fluid">
                                        </a>
                                        </button>
                                </div>
                                <div class="video-caption p-3 bg-grey">
                                        <p class="secondary-color common-description m-0"><?php echo esc_html( get_sub_field('title')); ?></p>
                                        <p class="common-description text-white"><?php echo esc_html( get_sub_field('description')); ?></p>
                                </div>
                            </div>
                        </div><?php endwhile; ?><?php endif; ?>
                    <?php } if($category_type == 'Digital') { ?>
                     <?php if( have_rows('digital') ): while( have_rows('digital') ): the_row(); 
                            $image = get_sub_field('image'); 
                            $popup = get_sub_field('popup'); 
                            $link = get_sub_field('link'); 
                            $title = get_sub_field('title'); 
                            $title_copy = get_sub_field('title_copy');
                        ?>
                            <div class="col-xl-4 col-md-6">
                                <div class="card image-card rounded bg-transparent overflow-hidden">
                                    <div class="image-wrap">
                                        <?php if( !empty($link) ){ ?>
                                            <a href="<?php echo esc_url( $link ); ?>" target="_blank">
                                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                                            </a>
                                        <?php } elseif(!empty($popup) ) { ?>
                                        <a target="_blank" href="<?php echo esc_url( $popup['url'] ); ?>">
                                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                                         </a>
                                        <?php } else  { ?>
                                       
                                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                                        <?php } ?>
                                    </div>
                                    <div class="image-caption p-3 bg-grey">
                                        <p class="secondary-color common-description m-0">
                                            <?php if( !empty($link) ): ?>
                                                <a class="secondary-color" href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a>
                                            <?php else: ?>
                                                <?php echo esc_html( $title ); ?>
                                            <?php endif; ?>
                                        </p>
                                        <p class="text-white"><?php echo esc_html( $title_copy ); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; endif; ?>
                    <?php } ?>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
            
            <?php if( have_rows('recognisable_work_list') ):  while( have_rows('recognisable_work_list') ): the_row();   
            $category_type= get_sub_field('category_type'); 
            if($category_type == 'Video') {   ?>
            <?php if( have_rows('video_type') ):  while( have_rows('video_type') ): the_row();   
             
                $title=  get_sub_field('title'); 
                $slug = strtolower(str_replace(' ', '', $title));
             ?>
            <div class="modal fade video-modal" id="videoModal_<?php echo $slug; ?>" tabindex="-1" aria-labelledby="videoModalLabel_<?php echo $slug; ?>"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content position-relative">
                        <div class="modal-body p-0">
                             <button type="button"
                                class="position-absolute video_close-icon z-1"
                                data-bs-dismiss="modal" aria-label="Close">
                                ✖
                            </button>
                            <div class="ratio ratio-16x9">
                                <iframe class="youtubeVideo" width="560" height="315"
                                     src="<?php echo esc_html(get_sub_field('video_url')); ?>?autoplay=1"  data-src="<?php echo esc_html(get_sub_field('video_url')); ?>"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div><?php endwhile; endif; ?>
            <?php }  endwhile; endif; ?>
        </div>
    </section>  
    <!-- recognisable work Eh -->

    <section class="seo-form-section common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="section-header pb-5 m-0">
                <h2 class="commom-heading text-white">have a project? we would love to help</h2>
                <span class="common-subheading secondary-color d-block pb-4">Tell Us What You Need</span>
            </div>
            <div class="seo-form">
                <?php echo do_shortcode('[fluentform id="8"]'); ?>
            </div>
        </div>
    </section>

</div>
<?php get_footer(); ?>