<?php
/**
* The template for displaying 404 pages (not found)
*
* @package YourThemeName
*/
get_header(); ?>
<div class="bg-theme-noise" aria-hidden="true"></div>
<section class="error-404 not-found">
<div class="container">
	<div class="error-block d-flex justify-content-center align-items-center">
		<div class="error-content text-center">
		    <div class="error-banner position-relative">
		    <img src="https://blacklisted.agency/wp-content/uploads/2025/03/404-banner-image1.svg" class="img-fluid" alt="banner-image">
		    <div class="error-page-icons position-absolute top-50 start-50 translate-middle">
		          <img src="https://blacklisted.agency/wp-content/uploads/2025/03/broken-arrow.svg" class="img-fluid" alt="arrow-image">
		    </div>
		    </div>
			<h1 class="error-heading secondary-color">404</h1>
			<p class="commom-description text-white m-0"><?php esc_html_e( "The page you requested cannot be found. The page you are looking for might have been removed, had its name changed, or is temporarily unavailable." ); ?></p>
			<div class="d-flex justify-content-center mt-4 custom-btn">
                    <a class="custom-btn-animation button-link btn rounded-0 text-white" id="home_url" href="<?php echo site_url(); ?>">
                        <span class="button-content-wrapper">
                            <span class="button-text"><?php esc_html_e( "Back to Home"); ?>
                                <span class="btn-arrows"></span>
                            </span>
                        </span>
                    </a>
               </div>
		</div>
	</div>
</div>
</section>
<?php
get_footer();