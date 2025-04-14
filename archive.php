<?php 
get_header('blog'); 

$current_category_id = get_queried_object_id();
$current_category = get_queried_object();
$taxonomy = 'category';
$title = get_field('sub_title', $taxonomy . '_' . $current_category_id);
$header_sub_title = get_field('category_header_sub_heading', $taxonomy . '_' . $current_category_id);
$title = isset($title) && !empty($title) ? esc_html($title) : (isset($current_category->name) ? esc_html($current_category->name) : '');
$current_category_description = category_description($current_category_id);

$category_header_heading = get_field('category_header_heading', $taxonomy . '_' . $current_category_id);

?>
<!-- blog listing heading  -->
<section class="blog-hero-sec hero-common-section-spacing pb-0 bg-light-yellow">
    <div class="container">
        <div class="row section-header m-0 justify-content-center">
            <div class="col-md-7 d-flex justify-content-center flex-column align-items-center m-auto">
                <span class="common-subheading primary-color mb-3 d-block fst-normal text-uppercase"><?= $category_header_heading; ?></span>
                <h1 class="commom-heading text-center"><?= $header_sub_title; ?></h1>
                <p class="commom-description text-center m-0"><?= preg_replace('/<\/?p>/', '', $current_category_description); ?></p>
                <hr class="blog-custom-hr-line">
            </div>
            <div class="row  justify-content-center">
                <div class="blog-form-section col-md-6">
                    <h2 class="blog-form-heading text-center mb-4 text-uppercase">Subscribe To Our Blogs</h2>
                    <?php echo do_shortcode('[fluentform id="6"]'); ?>
                </div>
            </div>
        </div>  
		 <hr class="custom-border-grey m-0 hero-common-section-spacing pt-0">
    </div>
</section>

<!--  blog lists tab section Sh  -->
<section class="blog_lists-sec hero-common-section-spacing bg-light-yellow">
    <div class="container">
        <div class="row">        
            <div class="blog-listing-slider swiper">
                <div class="swiper-wrapper">
                    <?php 
                        $categories = get_categories(array(
        						'orderby' => 'id',
        						'order'   => 'ASC'
        					));
        					?>
                    <div class="swiper-slide">
                        <a href="<?= site_url('blogs'); ?>" aria-label="Link - All Blogs">
                            <div class="Blog_category-tabs">
                                <img src="<?= site_url('/wp-content/uploads/2025/02/all_blog-icon-1.svg'); ?>" alt="All">
                                <span>
                                    <?= 'All'; ?>
                                </span>
                                <!-- <img src="./tabler_arrow-up.svg" alt=""> -->
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.25 5.5H16.2H19V8.3V14.25H16.2L16.2 8.3H10.25V5.5ZM5 11.0977H10.95H13.75V13.8977V19.8477H10.95L10.95 13.8977H5V11.0977Z"
                                        fill="#006AFE" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <?php 
        			 foreach ($categories as $category) {   $image = get_field('icon', 'category_' . $category->term_id);   
        			 $active_class = ($category->term_id === $current_category_id) ? 'active-blog-tab' : '';
        			 ?>
                    <div class="swiper-slide <?= $active_class; ?>">
                        <a href="<?= get_category_link($category->term_id); ?>"
                            aria-label="Link <?= $category->name; ?>">
                            <div class="Blog_category-tabs">
                                <img src="<?= $image['url'];?>" alt="<?= $category->name; ?>">
                                <span>
                                    <?= $category->name; ?>
                                </span>
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.25 5.5H16.2H19V8.3V14.25H16.2L16.2 8.3H10.25V5.5ZM5 11.0977H10.95H13.75V13.8977V19.8477H10.95L10.95 13.8977H5V11.0977Z"
                                        fill="#006AFE"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
	</div>
</section>

<section class="blog-articles hero-common-section-spacing pt-0 bg-light-yellow">
    <div class="container blog-listing-cont">
			<div class="row">
				<div class="col-12 latest-articles">
					<h2 class="articles_heading commom-heading text-capitalize"><?= $title; ?></h2>
				</div>
			</div>
			<div class="row gx-4 gy-5">
            <?php 
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'post_status'    => 'publish',
                'cat'            => $current_category_id
            ); 
            $custom_posts_query = new WP_Query( $args );

            if ( $custom_posts_query->have_posts() ) {
                while ( $custom_posts_query->have_posts() ) {
                    $custom_posts_query->the_post();  
                     $featured_image = get_field('custom_featured_image');
            ?>
            <div class="col-xl-4 col-md-6">
					<div class="blog_article_card">
					    <a href="<?php the_permalink(); ?>">
						<div class="blog-img-wrapper position-relative mb-4">
							<?php if ( has_post_thumbnail() ) {
								$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
								$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full' )[0];
								if($featured_image){
                                            echo '<img src="' . $featured_image["url"] . '" class="imgg" alt="' . esc_attr(get_the_title()) . '">';
                                        } else {
                                      echo '<img src="' . esc_url( $thumbnail_url ) . '" class="imgg" alt="' . esc_attr( get_the_title() ) . '">' ; 
                                            
                                        }
								
							} ?>
						 <div class="growth_icon position-absolute d-none">
							<svg width="40" height="40" viewBox="0 0 24 25" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M10.25 5.5H16.2H19V8.3V14.25H16.2L16.2 8.3H10.25V5.5ZM5 11.0977H10.95H13.75V13.8977V19.8477H10.95L10.95 13.8977H5V11.0977Z"
									fill="#fff" />
							</svg>
						</div>
						</div>
							<div class="blog-tags pb-3">
									<?php  $categories = get_the_terms(get_the_ID(), 'category');
										if (!empty($categories) && !is_wp_error($categories)) {
											$category_count = 0;
											foreach ($categories as $category) {
												echo '<span>' . esc_html($category->name) . '</span>';
												$category_count++;
												if ($category_count == 3) {
													break; 
												}
											}
										}
										?>
								</div>
						<h4 class="blog_name"><?php the_title(); ?></h4>
						<p class="blog-content"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
						</a>
					</div>
				</div>									
            <?php }
                wp_reset_postdata();
            } else {
                echo 'No custom posts found.';
            }
            ?>
				</div>
        </div>
</section>

<?php get_footer('blog'); ?>