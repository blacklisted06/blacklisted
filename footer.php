<div class="footer-group">
    <?php 
$page_bg_class = 'bg-theme-dark';  ?>
    <!----------------- footer text-scrolling section sh -----------------------  -->
    <section class="footer-scrolling-text-section common-section-spacing <?= $page_bg_class; ?>">
        <div class="container-fluid">
            <div class="team-imgs-slider mb-4" data-direction="left" data-speed="slow" data-animated="true">
                <div class="scroller__inner">
                    <?php if (have_rows('footer_text_slider', 'option')):
                        while (have_rows('footer_text_slider', 'option')):
                            the_row(); ?>
                            <div class="single-img-outer">
                                <p class="single-img"><?php echo acf_esc_html(get_sub_field('text', 'option')); ?></p>
                            </div>
                        <?php endwhile; endif; ?>
                </div>
            </div>
            <div class="team-imgs-slider mb-4" data-direction="right" data-speed="slow" data-animated="true">
                <div class="scroller__inner">
                    <?php if (have_rows('footer_text_slider', 'option')):
                        while (have_rows('footer_text_slider', 'option')):
                            the_row(); ?>
                            <div class="single-img-outer">
                                <p class="single-img"><?php echo acf_esc_html(get_sub_field('text', 'option')); ?></p>
                            </div>
                        <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!----------------- footer text-scrolling section EH ------------------------->
    <!---------------- footer image with btn section SH  ------------------------->
    <?php $creativity_driven_banner = get_field('creativity_driven_banner', 'option'); ?>
    <section class="footer-image-btn-section common-section-spacing-bottom <?= $page_bg_class; ?>">
        <div class="container-fluid p-0">
            <div class="full-image">
                <img src="<?php echo $creativity_driven_banner['url']; ?>" class="img-fluid"
                    alt="<?php echo $creativity_driven_banner['alt']; ?>">
            </div>
        </div>
        <div class="container">
            <div class="text-typing-effect text-change-container fw-bold">
                <?php echo acf_esc_html(get_field('creativity_driven_text', 'option')); ?>
                <div class="text-change"></div>
            </div>
            <div class="text-change-container">
                <div class="text-change"></div>
            </div>
        </div>
    </section>
    <!-- ----------------------- middle-footer --------------------->
    <?php $footer_logo = get_field('footer_logo', 'option');
    $footer_background_image = get_field('footer_background_image', 'option');
    ?>
    <footer class="footer main-footer footer-section-padding bg-theme-dark">
        <div class="container">
            <div class="row footer__blocks-wrapper">
                <div class="col-md-4 col-lg-3 mb-3">
                    <div class="footer-block mb-3 mb-md-0">
                        <a href="<?= site_url(); ?>" aria-label="Button - Footer LOGO" class="footer-logo">
                            <img src="<?= $footer_logo['url']; ?>" alt="<?= $footer_logo['alt']; ?>">
                        </a>
                    </div>
                </div>
                <?php if (have_rows('contact_list', 'option')):
                    while (have_rows('contact_list', 'option')):
                        the_row();
                        $contact_title = get_sub_field('contact_title', 'option');
                        $contact_email = get_sub_field('contact_email', 'option');
                        $contact_number = get_sub_field('contact_number', 'option');
                        $contact_location = get_sub_field('contact_location', 'option');
                        ?>
                <div class="col-md-4 col-lg-3 mb-3">
                    <div class="footer-block">
                        <span class="footer-heading text-lowercase secondary-color mb-3 d-block">
                            <?= get_sub_field('title', 'option'); ?>
                        </span>
                        <ul class="footer-details-content list-unstyled">
                            <?php if (!empty($contact_title)): ?>
                            <li class="text-white">
                                <?= $contact_title ?>
                            </li>
                            <?php endif; ?>
                            <?php if (!empty($contact_email)): ?>
                            <li class="text-white">
                                <a href="mailto:<?= $contact_email ?>" class="text-light">
                                    <?= $contact_email ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (!empty($contact_number)): ?>
                            <li class="text-white">
                                <a href="tel:<?= $contact_number ?>" class="text-white">
                                    <?= $contact_number ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (!empty($contact_location)): ?>
                            <li class="text-white">
                                <?= $contact_location ?>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <?php endwhile; endif; ?>
            </div>  
            <div class="container text-center my-3 py-3 py-md-5">
                <span class="social-heading text-white mb-4 text-lowercase d-block">Engage and Follow</span>
                <ul class="social-icons list-inline m-0 m-md-auto">
                    <?php if (have_rows('footer_social_share', 'option')):
                        while (have_rows('footer_social_share', 'option')):
                            the_row(); ?>
                    <li class="icon-list list-inline-item">
                        <a href="<?= get_sub_field('link', 'option'); ?>" target="_blank" class="icons"
                            aria-label="Behance">
                            <i class="fab fa-<?= get_sub_field('title', 'option'); ?>"></i>
                        </a>
                    </li>
                    <?php endwhile; endif; ?>
                </ul>
            </div>
        </div>     
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-links d-flex justify-content-between align-items-center py-md-4 py-2">
                    <div><a href="<?= site_url('founder') ?>">
                            <p class="founder-link mb-0 text-white fw-medium text-lowercase">
                                <?= 'Founded by <span class="primary-color text-capitalize"> Mohit Sharma <span>'; ?>
                            </p>
                        </a>
                    </div>
                    <div class="policy-list">
                        <?php
                        $footer_pages = get_field('footer_pages', 'option');
                        if ($footer_pages):
                            $total_pages = count($footer_pages);
                            $counter = 0;
                            echo '<ul class="list-inline m-0">';
                            foreach ($footer_pages as $post):
                                setup_postdata($post);
                                $counter++;
                                ?>
                        <li class="policy-link list-inline-item">
                            <a href="<?php the_permalink(); ?>" class="text-white">
                                <?php the_title(); ?>
                            </a>
                        </li>
                        <?php
                            endforeach;
                            echo '</ul>';
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--  -->
</div>
<?php wp_footer(); ?>

</body>
</html>