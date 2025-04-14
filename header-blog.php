<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<?php echo get_field('gtm_script_before_head', 'option'); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?= get_field('schema', 'option'); ?>
   	<?php wp_head();
	$header_logo = get_field('header_logo_blog', 'option'); 
	?>
</head>
<body <?php body_class(); ?>>
  <?php echo get_field('gtm_script_body', 'option'); ?>
    <div class="main-lines" aria-hidden="true">
    <div class="container px-0 w-100 h-100">
        <div class="outer-lines  w-100 h-100">
            <div class="row justify-content-center w-100 h-100">
                <div class="col-5">
                  <div class="inner-lines position-relative  w-100 h-100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
	<header class="header transparent-header text-white w-100">
        <section class="top-header py-4 py-md-5 px-2 px-sm-0">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="<?php echo site_url(); ?>" aria-label="Button - - Header Logo" class="logo">
                       <img src="<?= $header_logo['url']; ?>" alt="<?= $header_logo['alt']; ?>">
                    </a>
                </div>
                <a class="head-menu-toggle">
                    <span class="toggleBars bar1"></span>
                    <span class="toggleBars bar2"></span>
                    <span class="toggleBars bar3"></span>
                </a>
            </div>
        </section>
        
        <section class="main-header web-menu-mn">
            <div class="container">
                <div class="row">
					<div class="col-12 col-lg-12">
						<div class="header__inline-menu">
							<ul class="list-menu d-flex flex-wrap list-unstyled">								
								<?php 
								$menu_id = 19; 
								$menu_items = wp_get_nav_menu_items($menu_id);

								if ($menu_items) {
									foreach ($menu_items as $item) {
										echo '<li class ="menu-items"><a class="header__menu-item nav-link" href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a></li>';
									}
								} else { echo 'No menu items found.';}
								?>

							</ul>
						</div>
					</div>
                </div>
                <div class="header-social mt-5">
                    <hr class="border-light">
                    <ul class="social-icons list-inline">
                       <?php if( have_rows('footer_social_share', 'option') ): while( have_rows('footer_social_share', 'option') ): the_row();  ?>
                        <li class="icon-list list-inline-item  overflow-hidden">
                            <a href="<?= get_sub_field('link', 'option'); ?>" target="_blank" class="icons"
                                aria-label="Behance">
                                <i class="fab fa-<?= get_sub_field('title', 'option'); ?>"></i>
                            </a>
                        </li>
                        <?php endwhile; endif; ?>
                    </ul>
                </div>
            </div>
        </section>
        
    </header>