<?php
get_header('blog');
$categories = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'ids'));
// Function to estimate reading time
function get_reading_time($content, $wpm = 200) {
    $word_count = str_word_count(strip_tags($content));
    $minutes = ceil($word_count / $wpm);
    return $minutes;
}

// Get post content and calculate reading time
$reading_time = get_reading_time(get_the_content());
?>
<div class="blog-inside-wrapper">
    <!-- Hero SH -->
    <section class="in-hero-sec bg-light-yellow pt-5 pb-3">
        <div class="container">
            <div class="simplein-hero-sec position-relative">
                <?php if (has_post_thumbnail()) {
                    $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
                    echo '<figure class="blog-features-img"><img src="' . esc_url($thumbnail_url) . '" class="img-fluid" alt="' . esc_attr(get_the_title()) . '"></figure>';
                } ?>
                <h1 class="article__title text-white m-0"><?php the_title(); ?></h1>
            </div>
        </div>
    </section>
	<?php if( have_rows('content_stucture') ) { ?>
    <section class="article_content bg-light-yellow">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text d-none d-sm-block">
                    <div class="blog-detail-sidebar pe-0 pe-md-5">
                    <div class="blog-read-time d-flex align-items-center gap-1 pb-3">
                        <img src ="https://blacklisted.agency/wp-content/uploads/2025/02/SVG.svg" alt ="time">
                         <p class="m-0"><?php echo $reading_time; ?>min read</p>
                        </div>
                    <ol class="blog-sidebar-list mt-3" id="blog-sidebar-list">
                        <?php
                    // Loop through each flexible content layout and create dynamic list items for the sidebar
                    if (have_rows('content_stucture')): 
                        while (have_rows('content_stucture')): the_row();
                            // Fetch title or any identifier for the sections
                            if (get_row_layout() == 'single_heading') {
                                $heading = get_sub_field('heading');
                                ?>
                        <li class="commom-description"><a class="nav-link"
                                href="#<?php echo sanitize_title($heading); ?>"><?php echo esc_html($heading); ?></a>
                        </li>
                        <?php
                            }
                        endwhile;
                    endif;
                    ?>
                    </ol>
                    <!-- Display Post Categories as Buttons -->
                                        <?php 
                    $image = get_field('image');
                    if( !empty( $image ) ): ?>
                    <div class="blog-custom-card hero-common-section-spacing">
                        <img class="w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />					 
						<div class="blog-custom-body bg-theme-blue p-4 text-white">
							<?
                    $value = get_field( "title" );
                    if( !empty( $value ) ):
                        ?>
                        <h3><?php echo esc_html($value); ?></h3>
                    <?php endif;
                    $desci = get_field( "bio" );
                    if( !empty( $desci ) ):
                        ?>
                        <p class="common-description"><?php echo esc_html($desci); ?></p>
                    <?php endif;						

                    $hero = get_field('button');
                    if( !empty( $hero ) ): ?>
                    <a class="custom-btn-animation button-link btn rounded-0 text-white" href="<?php echo $hero; ?>">
					<span class="button-content-wrapper">
						<span class="button-text">let's talk<span class="btn-arrows"></span>
						</span>
					</span>
				   </a>
                    <?php endif; ?>
						</div>							

                    </div>
                    <?php endif;  ?>
                    <div class="post-categories hero-common-section-spacing pt-0">
                        <h4>Tags</h4>
                        <div class="category-buttons mb-3">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                 foreach ($categories as $category) {
                                    echo '<a class="category-btn" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                }
                            } else {
                                 echo '<p>No categories assigned</p>';
                                }
                                ?>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="blog-detail-content pt-5 pt-md-0" data-bs-spy="scroll" data-bs-target="#blog-sidebar-list" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy" tabindex="0">
                        <?php
                        $title_excerpt = get_field('title_excerpt');
                        if(!empty($title_excerpt)){
                           ?>
                    <div class="blog-tldr mb-5">
                         <h3 class="commom-description mb-3 fw-semibold"> <?php echo  wp_kses_post( $title_excerpt );?></h3>
                         <p class="commom-description m-0"><?php the_field('excerpt')?></p>
                    </div>
                       <?php
                        }else{
                             
                        }
                         ?>

                    <div class="blog-main-content commom-description"> <?php the_content();?></div>
                    <ul class="in-this-article-list my-5 list-unstyled">
                        <span class="commom-description in-this-article-heading mb-2">In This Article</span>
                        <?php
                    // Loop through each flexible content layout and create dynamic list items for the sidebar
                    if (have_rows('content_stucture')): 
                        while (have_rows('content_stucture')): the_row();
                            // Fetch title or any identifier for the sections
                            if (get_row_layout() == 'single_heading') {
                                $heading = get_sub_field('heading');
                                ?>
                        <li class="commom-description py-2 text-decoration-underline"><a class="nav-link"
                                href="#<?php echo sanitize_title($heading); ?>"><?php echo esc_html($heading); ?></a>
                        </li>
                        <?php
                            }
                        endwhile;
                    endif;
                    ?>
                    </ul>
                        <?php if( have_rows('content_stucture') ): ?>
                        <?php while( have_rows('content_stucture') ): the_row(); ?>
                        <div id="<?php echo sanitize_title(get_sub_field('heading')); ?>">
                            <!-- ID based on heading for link targeting -->
                            <?php
                                // Dynamically display the content based on the layout
                                switch (get_row_layout()) {

                                    case 'single_heading':
                                        ?>
                            <h2 class="single-heading hero-common-section-spacing pb-0">
                                <?php the_sub_field('heading'); ?>
                            </h2>
                            <?php
                                        break;

                                    case 'single_description':
                                        ?>
                            <p class="commom-description single-desc">
                                <?php the_sub_field('description', false, false); ?>
                            </p>
                            <?php
                                        break;

                                        case 'single_image':
                                            $image_single = get_sub_field('image_single'); // Use get_sub_field() for flexible content
                                            if (!empty($image_single)): ?>
                                                <div class="single-images py-3">
                                                    <img src="<?php echo esc_url($image_single['url']); ?>" 
                                                         alt="<?php echo esc_attr($image_single['alt']); ?>" 
                                                         class="single-image" />
                                                </div>                          
                                            <?php endif;
                                            break;

                                            case 'multi_image':
                                                $images = get_sub_field('multi_images'); // Fetch gallery field
                                                if (!empty($images) && is_array($images)): ?>
                                                    <div class="multi-image">
                                                    <div class="row g-3">
                                                        <?php foreach ($images as $index => $image): ?>                                                          
                                                            <div class="col-md-6">
                                                                <img src="<?php echo esc_url($image['sizes']['medium']); ?>"
                                                                     alt="<?php echo esc_attr($image['alt']); ?>" 
                                                                     class="points_image--truths" />
                                                            </div>                                                           
                                                        <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                <?php endif;
                                                break;
                                    case 'title_with_description':
                                        ?>
                            <div class="title-with-description">
                                <h4><?php the_sub_field('title'); ?></h4>
                                <p><?php the_sub_field('description',false, false); ?></p>
                            </div>
                            <?php
                                        break;

                                    case 'blog_author_details':
                                        ?>
                            <div class="blog-author-details">
                                <h4><?php the_sub_field('author_name'); ?></h4>
                                <p><?php the_sub_field('author_description',false, false); ?></p>
                                <span><?php the_sub_field('author_title'); ?></span>
                            </div>
                            <?php
                                        break;

                                    case 'cta_section':
                                        ?>
                           <div class="blog-cta-banner-section mt-3 mt-md-5 custom-border overflow-hidden">						   
                            <div class="blog-cta-banner hero-common-section-spacing d-flex">
                               <div class="row w-100 text-white zindexhigh">	
                                <span class ="low_brand text-uppercase"><?php the_sub_field('cta_title'); ?></span>						   
                                <h3 class="cta-section-heading"><?php the_sub_field('cta_description',false, false); ?></h3>                              
								<?php 
							$url = get_field('cta_link'); 
							if (!empty($url)) { ?>
								<a class="custom-btn-animation button-link btn rounded-0 text-white" href="<?php echo esc_url($url); ?>">
									<span class="button-content-wrapper">
										<span class="button-text">Learn More
											<span class="btn-arrows"></span>
										</span>
									</span>
								</a>
							<?php } ?>
                             </div>
                            </div>
                          </div>
                            <?php
                                        break;

                                    case 'testimonial':
                                        ?>
                            <div class="testimonial">
                                <p><?php the_sub_field('testimonial_text'); ?></p>
                                <h4><?php the_sub_field('testimonial_name'); ?></h4>
                                <p><?php the_sub_field('testimonial_title'); ?></p>
                            </div>
                            <?php
                                        break;

                                        case 'dynamic_table': ?>
                            <div class="dynamic-table table-responsive">
                                <?php if( have_rows('table_structure') ): ?>
                                <table class="table bg-light-yellow">
                                    <?php while( have_rows('table_structure') ): the_row(); ?>

                                    <?php if (get_row_layout() == 'thead_layout') : ?>
                                    <thead>
                                        <tr>
                                            <?php if( have_rows('thead_columns') ): ?>
                                            <?php while (have_rows('thead_columns')) : the_row(); ?>
                                            <th scope="col"><?php the_sub_field('column_text_'); ?></th>
                                            <?php endwhile; ?>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>

                                    <?php elseif (get_row_layout() == 'tbody_layout') : ?>
                                    <tbody>
                                        <?php if( have_rows('tbody_rows') ): ?>
                                        <?php while (have_rows('tbody_rows')) : the_row(); ?>
                                        <tr>
                                            <?php if( have_rows('tbody_columns') ): ?>
                                            <?php while (have_rows('tbody_columns')) : the_row(); ?>
                                            <td><?php the_sub_field('cell_text'); ?></td>
                                            <?php endwhile; ?>
                                            <?php endif; ?>
                                        </tr>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                    </tbody>
                                    <?php endif; ?>

                                    <?php endwhile; ?>
                                </table>
                                <?php endif; ?>
                            </div>
                            <?php break;
                                        case 'number_list':
                                            ?>
                            <div class="number_list">
                            <?php if( have_rows('items') ): ?>
                                <ol>
                                <?php while( have_rows('items') ): the_row(); ?>
                                    <li class="commom-description">
                                       <?php the_sub_field('text'); ?>
                                    </li>
                                    <?php endwhile; ?>
                                </ol>
                                <?php endif; ?>
                            </div>
                            <?php
                                            break;
                                            case 'bullets_points':
                                                ?>
                            <div class="bullets_list">
                            <?php if( have_rows('points') ): ?>
                                <ul>
                                <?php while( have_rows('points') ): the_row(); ?>
                                    <li class="commom-description">
                                        <span><?php the_sub_field('heading'); ?> </span><?php the_sub_field('items'); ?>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                            <?php
                                                break;
                                                case 'single_line_text':
                                                    ?>
                            <div class="single-line-text">
                                <p class="common-description"><?php the_sub_field('text'); ?></p>
                            </div>
                            <?php
                                                    break;
                                                    case 'sub_headings':
                                                        ?>
                            <div class="sub-headings">
                                <h4><?php the_sub_field('items'); ?></h4>
                            </div>
                            <?php
                                                        break;
                                    default:
                                        break;
                                      
                                      
                               }
                                ?>
                        </div>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <p>No content available.</p>
                        <?php endif; ?>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>
<?php } else { ?> 
	<section class="content-sec common-section-spacing bg-light-yellow">
        <div class="container">
            <div class="blog-block-main">
                <div class="blog-data-info article-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>	
	<?php } ?>

    <section class="common-section-spacing bg-light-yellow">
      <div class="container">		 
		  <div class="custom-divider">
			  <img src="https://blacklisted.agency/wp-content/uploads/2025/02/divider-image.webp" class="img-fluid" alt="divider-image">
		  </div>
		</div>
	</section>

	<section class="blog-detail-cta-section hero-common-section-spacing bg-light-yellow">
	    <div class="container">
	        <?php $image_bac = get_field('image_bg', 'option');
                if (!empty ($image_bac)){?>
	        <div class="blog-cta-section p-5" style="background-image: url(<?php echo esc_url($image_bac['url']); ?>);">
	            <div class="row gx-3 gy-3 d-flex align-items-center">
	                <div class="col-lg-9 col-sm-6">
	                    <span class="commom-description text-white text-uppercase d-block"> <?php the_field('sub_heading', 'option'); ?> </span>
	                    <h4 class="blog-cta-heading text-white"><?php the_field('heading', 'option'); ?></h4>
	                </div>
	                <div class="col-lg-3 col-sm-6">
						<div class="blog-cta-form blog-custom-btn">
							 <?php echo do_shortcode('[fluentform id="6"]');?>
						</div>	                   
	                </div>
	            </div>
	        </div>
	        <?php }?>
	    </div>
	</section>

    <section class="blog-articles realated-blogs-section common-section-spacing bg-light-yellow">
        <div class="container">
            <div class="section-header pb-5">
                <h2 class="commom-heading"><?php echo esc_html(get_field('related_blogs_title', 'option')); ?></h2>
                <span
                    class="common-subheading primary-color d-block mb-3"><?php echo esc_html(get_field('related_blogs_sub_title', 'option')); ?></span>
                <p class="commom-description"><?php echo esc_html(get_field('related_blogs_desc', 'option')); ?></p>
            </div>
            <div class="row gy-4 blog-listing">
                <?php
                // Get the categories of the current post
                $categories = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'ids'));

                // Arguments for related posts query
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3, // Number of related posts
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'post__not_in' => array(get_the_ID()), // Exclude the current post
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => $categories,
                        ),
                    ),
                );

                $related_posts_query = new WP_Query($args);

                if ($related_posts_query->have_posts()) {
                    while ($related_posts_query->have_posts()) {
                        $related_posts_query->the_post();
                        ?>
                <div class="col-xl-4 col-md-6">
                    <div class="blog_article_card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog-img-wrapper position-relative mb-4">
                                <?php if ( has_post_thumbnail() ) {
								$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
								$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full' )[0];
								echo '<img src="' . esc_url( $thumbnail_url ) . '" class="imgg" alt="' . esc_attr( get_the_title() ) . '">' ; 
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
                <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo 'No related posts found.';
                }
                ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer('blog'); ?>