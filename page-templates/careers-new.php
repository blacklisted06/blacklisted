<?php
/* Template Name: Careers New */
get_header();
?>

<div class="bg-theme-noise" aria-hidden="true"></div>
<div class="careers-wrapper">

<section class="careers-hero-section seo-hero-section common-section-spacing bg-theme-dark">
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-lg-12 col-md-10">
            <span class="hero-common-subheading secondary-color d-block fst-normal mb-3 position-relative"><?= get_field('careers_title'); ?></span>
            <h1 class="career-common-heading text-white mb-3 fw-normal"><?= get_field('careers_sub_title'); ?></h1>
            <p class="common-description text-white m-0"><?= get_field('careers_desc'); ?></p>
            <div class="d-flex justify-content-center mt-5 custom-btn pt-5">
                <a class="custom-btn-animation button-link btn rounded-0 text-white " href="#current-openings">
                    <span class="button-content-wrapper">
                        <span class="button-text"><?= 'check openings'; ?>
                            <span class="btn-arrows"></span>
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
</section>
<!------------------  all-technologies Sh ------------------>
<section class="home-logo-section all-technologies common-section-spacing bg-theme-dark">
    <div class="container-fluid">
        <div class="marquee">
           <div class="marquee__group">
                    <?php
                    if (have_rows('technologies')): 
                        while (have_rows('technologies')): the_row(); 
                            $image = get_sub_field('technology'); 
                            if ($image): ?>
                                <div class="clients-logo">
                                    <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" class="img-fluid">
                                </div>
                            <?php endif; 
                        endwhile; 
                    endif; 
                    ?>
                </div>
            
            <div aria-hidden="true" class="marquee__group">
                   <?php
                    if (have_rows('technologies')): 
                        while (have_rows('technologies')): the_row(); 
                            $image = get_sub_field('technology'); 
                            if ($image): ?>
                                <div class="clients-logo">
                                    <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" class="img-fluid">
                                </div>
                            <?php endif; 
                        endwhile; 
                    endif; 
                    ?>
                </div>
        </div>
    </div>
</section>
<!------------------  all-technologies Eh ------------------>
<section class=" common-section-spacing bg-theme-dark pt-5">
    <div class="container">
       <div class="row justify-content-between g-4">
           <div class="col-lg-6">
               <div class="working-grid">
                    <?php
                if (have_rows('working_here_image')):
                    while (have_rows('working_here_image')): the_row();
                        $client = get_sub_field('image'); ?>
                   <div class="singleImg">
                       <img src="<?php echo $client['url']; ?>" alt="<?php echo $client['alt']; ?>" class="object-fit-cover h-100 w-100  custom-border">
                   </div>
                   <?php endwhile; endif; ?>
               </div>
           </div>
           <div class="col-lg-6">
               <div class="ps-lg-4">
                    <h2 class="commom-heading text-white">
                        <?= get_field('working_here_title'); ?>
                    </h2>
                    <span class="common-subheading secondary-color d-block pb-3"><?= get_field('working_here_sub_title'); ?></span>
                    <p class="common-description text-white"><?= get_field('working_here_desc'); ?></p>
                    <div class="d-flex flex-column work-perks">
                         <?php if (have_rows('working_here_list')): while (have_rows('working_here_list')): the_row(); ?>
                        <div class="single-perk meet-our-experts mb-3">
                            <div class="perk-card card">
                                <p class="common-description text-white mb-2"><?= get_sub_field('title'); ?></p>
                                <p class="common-description text-white mb-0"><?= get_sub_field('desc'); ?></p>
                            </div>
                        </div><?php endwhile; endif; ?>
                    </div>
               </div>
           </div>
       </div> 
    </div>
</section>


<section class="career-video-banner common-section-spacing my-5">
    <div class="container">
            <div class="section-header pb-5 text-center">
                 <h2 class="commom-heading text-white">We lead with experience and execute with talent!</h2>
                  <span class="common-subheading secondary-color d-block pb-3">Hear from the Team </span>  
            </div>
        <div class="custom-border overflow-hidden ratio ratio-16x9 position-relative">
            <video id="team_video" class="" poster="https://blacklisted.agency/wp-content/uploads/2025/03/video-cover-image.png" autoplay muted loop playsinline style="object-fit: cover;">
                <source src="https://blacklisted.agency/wp-content/uploads/2025/03/Team-Feed-Blacklisted.mp4?_=0" type="video/mp4">
            </video>
            <div class="controls">
                <span class="d-block position-absolute bottom-0 end-0 p-3 p-md-4" id="muteBtn"><i class="fas fa-volume-mute"></i></span>
            </div>
        </div>
    </div>
</section>

<section class="career-awards tour-section-dektop-padding bg-theme-dark">
    <div class="container">
        <div class="row g-4 align-items-center">
             <?php if (have_rows('proven_results_results_list')): while (have_rows('proven_results_results_list')): the_row(); ?>
            <div class="col-md-4">
                <div class="single-award text-center position-relative px-5">
                    <span class="award-leaf ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="49" viewBox="0 0 26 49" fill="none">
                          <path d="M6.70173 17.8674C6.70173 17.8674 8.59537 15.4267 7.3707 12.0371C6.14176 8.64964 3.27993 7.36304 3.27993 7.36304C3.27993 7.36304 1.13836 10.2718 2.33525 13.5738C3.52999 16.8779 6.70173 17.8674 6.70173 17.8674Z" fill="#006AFE"/>
                          <path d="M11.9573 19.5968C11.9573 19.5968 15.268 19.3318 17.1638 16.3718C19.0596 13.4139 17.6105 10.1055 17.6105 10.1055C17.6105 10.1055 14.537 10.7295 12.59 13.7665C10.645 16.8014 11.9573 19.5968 11.9573 19.5968Z" fill="#006AFE"/>
                          <path d="M12.2929 23.5074C10.7604 26.7709 12.4254 29.3741 12.4254 29.3741C12.4254 29.3741 15.6762 28.6773 17.168 25.4993C18.6577 22.317 16.7897 19.2266 16.7897 19.2266C16.7897 19.2266 13.8253 20.2439 12.2929 23.5074Z" fill="#006AFE"/>
                          <path d="M19.7755 26.1367C19.7755 26.1367 16.918 27.4319 15.6997 30.8215C14.4815 34.2175 16.3815 36.6497 16.3815 36.6497C16.3815 36.6497 19.549 35.6516 20.7373 32.3453C21.9235 29.0391 19.7755 26.1367 19.7755 26.1367Z" fill="#006AFE"/>
                          <path d="M22.1563 43.9863C22.1563 43.9863 24.9048 42.1162 25.0908 38.6091C25.2746 35.0997 22.3785 32.9412 22.3785 32.9412C22.3785 32.9412 20.0147 35.0036 19.8245 38.6026C19.6364 42.1996 22.1563 43.9863 22.1563 43.9863Z" fill="#006AFE"/>
                          <path d="M10.9227 11.334C10.9227 11.334 13.8529 10.3552 14.7121 6.85653C15.5734 3.35791 13.9085 0.699219 13.9085 0.699219C13.9085 0.699219 10.5145 1.93025 9.67453 5.34339C8.83671 8.75438 10.9227 11.334 10.9227 11.334Z" fill="#006AFE"/>
                          <path d="M6.69955 25.3071C6.69955 25.3071 7.78743 22.4154 5.61809 19.5409C3.44446 16.6642 0.332569 16.2773 0.332569 16.2773C0.332569 16.2773 -0.855763 19.6883 1.26015 22.4924C3.37607 25.2985 6.69955 25.3071 6.69955 25.3071Z" fill="#006AFE"/>
                          <path d="M9.12751 32.9341C9.12751 32.9341 9.54428 29.8736 6.79145 27.5526C4.03435 25.2294 0.913906 25.5457 0.913906 25.5457C0.913906 25.5457 0.512096 29.1363 3.19653 31.3996C5.88524 33.6607 9.12751 32.9341 9.12751 32.9341Z" fill="#006AFE"/>
                          <path d="M12.8251 39.2461C12.8251 39.2461 12.3014 36.2027 8.97152 34.8264C5.63949 33.4457 2.7627 34.6917 2.7627 34.6917C2.7627 34.6917 3.468 38.2352 6.71241 39.5817C9.95681 40.9217 12.8251 39.2461 12.8251 39.2461Z" fill="#006AFE"/>
                          <path d="M14.4408 41.8623C10.9698 40.892 8.25977 42.4714 8.25977 42.4714C8.25977 42.4714 9.38184 45.9038 12.763 46.8506C16.1485 47.7974 18.7945 45.7905 18.7945 45.7905C18.7945 45.7905 17.9118 42.8305 14.4408 41.8623Z" fill="#006AFE"/>
                          <path d="M11.2839 13.4228L9.74075 12.6641C9.65954 12.8329 1.72164 29.6934 24.0264 48.7595L25.1421 47.4536C3.90595 29.298 10.9718 14.0618 11.2839 13.4228Z" fill="#006AFE"/>
                        </svg>
                    </span>
                    <p class="award-subheading mb-0"><?= get_sub_field('title'); ?></p>
                    <h4 class="award-heading text-white mb-0"><?= get_sub_field('sub_title'); ?></h4>
                    <p class="award-subheading mb-0"><?= get_sub_field('desc'); ?></p>
                    <span class="award-leaf inverted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="49" viewBox="0 0 26 49" fill="none">
                          <path d="M18.5825 17.8674C18.5825 17.8674 16.6888 15.4267 17.9135 12.0371C19.1424 8.64964 22.0043 7.36304 22.0043 7.36304C22.0043 7.36304 24.1458 10.2718 22.9489 13.5738C21.7542 16.8779 18.5825 17.8674 18.5825 17.8674Z" fill="#006AFE"/>
                          <path d="M13.3268 19.5968C13.3268 19.5968 10.0162 19.3318 8.1204 16.3718C6.22463 13.4139 7.67371 10.1055 7.67371 10.1055C7.67371 10.1055 10.7471 10.7295 12.6942 13.7665C14.6391 16.8014 13.3268 19.5968 13.3268 19.5968Z" fill="#006AFE"/>
                          <path d="M12.9913 23.5074C14.5237 26.7709 12.8588 29.3741 12.8588 29.3741C12.8588 29.3741 9.60797 28.6773 8.11614 25.4993C6.62645 22.317 8.49444 19.2266 8.49444 19.2266C8.49444 19.2266 11.4589 20.2439 12.9913 23.5074Z" fill="#006AFE"/>
                          <path d="M5.50866 26.1367C5.50866 26.1367 8.36622 27.4319 9.58447 30.8215C10.8027 34.2175 8.90268 36.6497 8.90268 36.6497C8.90268 36.6497 5.73521 35.6516 4.54688 32.3453C3.36068 29.0391 5.50866 26.1367 5.50866 26.1367Z" fill="#006AFE"/>
                          <path d="M3.12792 43.9863C3.12792 43.9863 0.379363 42.1162 0.193419 38.6091C0.00961161 35.0997 2.90564 32.9412 2.90564 32.9412C2.90564 32.9412 5.26948 35.0036 5.4597 38.6026C5.64778 42.1996 3.12792 43.9863 3.12792 43.9863Z" fill="#006AFE"/>
                          <path d="M14.3615 11.334C14.3615 11.334 11.4313 10.3552 10.5721 6.85653C9.71073 3.35791 11.3757 0.699219 11.3757 0.699219C11.3757 0.699219 14.7697 1.93025 15.6097 5.34339C16.4475 8.75438 14.3615 11.334 14.3615 11.334Z" fill="#006AFE"/>
                          <path d="M18.5846 25.3071C18.5846 25.3071 17.4967 22.4154 19.6661 19.5409C21.8397 16.6642 24.9516 16.2773 24.9516 16.2773C24.9516 16.2773 26.1399 19.6883 24.024 22.4924C21.9081 25.2985 18.5846 25.3071 18.5846 25.3071Z" fill="#006AFE"/>
                          <path d="M16.1567 32.9341C16.1567 32.9341 15.7399 29.8736 18.4927 27.5526C21.2498 25.2294 24.3703 25.5457 24.3703 25.5457C24.3703 25.5457 24.7721 29.1363 22.0876 31.3996C19.3989 33.6607 16.1567 32.9341 16.1567 32.9341Z" fill="#006AFE"/>
                          <path d="M12.4591 39.2461C12.4591 39.2461 12.9828 36.2027 16.3127 34.8264C19.6447 33.4457 22.5215 34.6917 22.5215 34.6917C22.5215 34.6917 21.8162 38.2352 18.5718 39.5817C15.3274 40.9217 12.4591 39.2461 12.4591 39.2461Z" fill="#006AFE"/>
                          <path d="M10.8434 41.8623C14.3143 40.892 17.0244 42.4714 17.0244 42.4714C17.0244 42.4714 15.9023 45.9038 12.5211 46.8506C9.13568 47.7974 6.48972 45.7905 6.48972 45.7905C6.48972 45.7905 7.37242 42.8305 10.8434 41.8623Z" fill="#006AFE"/>
                          <path d="M14.0003 13.4228L15.5434 12.6641C15.6246 12.8329 23.5625 29.6934 1.25778 48.7595L0.14212 47.4536C21.3782 29.298 14.3123 14.0618 14.0003 13.4228Z" fill="#006AFE"/>
                        </svg>
                    </span>
                </div>
            </div><?php endwhile; endif; ?>
        </div>
    </div>
</section>

<section class="meetup-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="section-header pb-5 ">
            <h2 class="commom-heading text-white"><?= get_field('recent_meetups_title'); ?></h2>
            <span class="common-subheading secondary-color d-block pb-3"><?= get_field('recent_meetups_sub_title'); ?></span> 
            <p class="common-description text-white"><?= get_field('recent_meetups_desc'); ?></p>
        </div>
        <div class="row align-items-center gy-4">
            <?php if (have_rows('list')): while (have_rows('list')): the_row(); $image= get_sub_field('image'); ?>
            <div class="col-xl-4 col-md-6">
                <div class="meetup-card custom-border overflow-hidden d-block position-relative">
                    <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" />
                    <span class="common-subheading secondary-color meetup-card-text">
                        <?= get_sub_field('title'); ?>
                    </span>
                </div>
            </div><?php endwhile; endif; ?>
        </div>
    </div> 
</section>

<section class="current-openings common-section-spacing bg-theme-dark" id ="current-openings">
    <div class="container">
        <div class="section-header text-center pb-5 ">
            <h2 class="commom-heading text-white">
            <?= get_field('current_openings_title'); ?>
            </h2>
            <span class="common-subheading secondary-color d-block pb-3">
                <?= get_field('current_openings_sub_title'); ?>
            </span> 
            <p class="common-description text-white"><?= get_field('current_openings_desc'); ?></p>
        </div>
        <div class="accordion current-openings-acordion" id="accordionExample">
          <?php if (have_rows('current_opening_list')): $counter=1; while (have_rows('current_opening_list')): the_row(); ?>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $counter; ?>" aria-expanded="<?php echo ($counter == 1) ? 'true' : 'false'; ?>" aria-controls="collapseOne<?= $counter; ?>">
                <div>
                    <span class="common-description secondary-color d-block mb-3"><?= get_sub_field('title'); ?></span>
                    <div class="d-flex gap-3">
                        <div>
                            <span class="d-inline-block me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                  <path d="M12.5598 21.652C12.3966 21.7692 12.2007 21.8323 11.9998 21.8323C11.7988 21.8323 11.603 21.7692 11.4398 21.652C6.61078 18.21 1.48578 11.13 6.66678 6.01403C8.08912 4.61488 10.0046 3.83116 11.9998 3.83203C13.9998 3.83203 15.9188 4.61703 17.3328 6.01303C22.5138 11.129 17.3888 18.208 12.5598 21.652Z" stroke="white" stroke-opacity="0.85" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M12 12.832C12.5304 12.832 13.0391 12.6213 13.4142 12.2462C13.7893 11.8712 14 11.3625 14 10.832C14 10.3016 13.7893 9.79289 13.4142 9.41782C13.0391 9.04275 12.5304 8.83203 12 8.83203C11.4696 8.83203 10.9609 9.04275 10.5858 9.41782C10.2107 9.79289 10 10.3016 10 10.832C10 11.3625 10.2107 11.8712 10.5858 12.2462C10.9609 12.6213 11.4696 12.832 12 12.832Z" stroke="white" stroke-opacity="0.85" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="d-inline-block common-description text-white"><?= get_sub_field('location'); ?></span>
                        </div>
                        <div>
                            <span class="d-inline-block me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                  <path d="M19.7059 4.61546H15.7166V3.19225C15.7159 2.5665 15.475 1.96657 15.0467 1.5241C14.6184 1.08162 14.0378 0.832733 13.4321 0.832031H8.56791C7.96224 0.832733 7.38156 1.08162 6.95329 1.5241C6.52501 1.96657 6.2841 2.5665 6.28342 3.19225V4.61546H2.29412C1.95102 4.61587 1.62208 4.75686 1.37948 5.00751C1.13687 5.25816 1.0004 5.598 1 5.95247V11.4353C0.999929 11.6663 1.05808 11.8932 1.16873 12.0939C1.27937 12.2945 1.4387 12.462 1.63102 12.5797V19.3978C1.63158 19.778 1.77802 20.1425 2.03825 20.4113C2.29847 20.6801 2.65124 20.8314 3.01925 20.832H18.9807C19.3488 20.8314 19.7015 20.6801 19.9618 20.4113C20.222 20.1425 20.3684 19.778 20.369 19.3978V12.5801C20.5613 12.4628 20.7206 12.2957 20.8313 12.0954C20.942 11.895 21.0001 11.6683 21 11.4376V5.95247C20.9996 5.598 20.8631 5.25816 20.6205 5.00751C20.3779 4.75686 20.049 4.61587 19.7059 4.61546ZM7.03209 3.19225C7.03254 2.77157 7.19449 2.36824 7.48242 2.07077C7.77035 1.7733 8.16073 1.60598 8.56791 1.60551H13.4321C13.8393 1.60598 14.2297 1.7733 14.5176 2.07077C14.8055 2.36824 14.9675 2.77157 14.9679 3.19225V4.61546H14.2193V3.19225C14.219 2.97663 14.136 2.76991 13.9884 2.61745C13.8409 2.46498 13.6408 2.37923 13.4321 2.37899H8.56791C8.35921 2.37923 8.15913 2.46498 8.01155 2.61745C7.86398 2.76991 7.78098 2.97663 7.78075 3.19225V4.61546H7.03209V3.19225ZM13.4706 3.19225V4.61546H8.52941V3.19225C8.52978 3.18182 8.53396 3.17193 8.5411 3.16455C8.54824 3.15717 8.55782 3.15286 8.56791 3.15247H13.4321C13.4422 3.15286 13.4518 3.15717 13.4589 3.16455C13.466 3.17193 13.4702 3.18182 13.4706 3.19225ZM19.6203 19.3978C19.6201 19.573 19.5526 19.7409 19.4327 19.8648C19.3129 19.9886 19.1503 20.0583 18.9807 20.0586H3.01925C2.8497 20.0583 2.68715 19.9886 2.56726 19.8648C2.44736 19.7409 2.37991 19.573 2.37968 19.3978V12.821L6.52941 13.741C7.56867 13.9681 8.62272 14.1159 9.68299 14.183V14.7193C9.68328 15.0029 9.79244 15.2748 9.98654 15.4753C10.1806 15.6759 10.4438 15.7886 10.7183 15.7889H11.6702C11.9447 15.7886 12.2078 15.6759 12.4019 15.4753C12.596 15.2748 12.7052 15.0029 12.7055 14.7193V14.1569C13.6626 14.0819 14.6138 13.9398 15.5523 13.7317L19.6203 12.8241V19.3978ZM10.431 14.7193V12.9713C10.4311 12.8927 10.4613 12.8174 10.515 12.7619C10.5688 12.7064 10.6416 12.6752 10.7176 12.6751H11.6695C11.7455 12.6752 11.8184 12.7064 11.8721 12.7619C11.9259 12.8174 11.9561 12.8927 11.9561 12.9713V14.7193C11.9561 14.7978 11.9259 14.8731 11.8721 14.9287C11.8184 14.9842 11.7455 15.0154 11.6695 15.0155H10.7176C10.6416 15.0154 10.5688 14.9842 10.515 14.9287C10.4613 14.8731 10.4311 14.7978 10.431 14.7193ZM20.2513 11.4376C20.2517 11.5555 20.2158 11.6706 20.1489 11.7661C20.0819 11.8617 19.9873 11.9328 19.8787 11.9693C19.868 11.9727 19.8575 11.9768 19.8473 11.9814C19.8389 11.9843 19.8303 11.9864 19.8216 11.9876L15.3936 12.9757C14.5071 13.1734 13.6088 13.3101 12.7048 13.385V12.9713C12.7048 12.945 12.7022 12.9188 12.6971 12.893C12.6785 12.6245 12.5624 12.3731 12.372 12.1893C12.1816 12.0054 11.931 11.9027 11.6704 11.9016H10.7176C10.4571 11.9027 10.2065 12.0055 10.0161 12.1893C9.82572 12.3731 9.70957 12.6245 9.69091 12.893C9.68592 12.9188 9.68341 12.945 9.68342 12.9713V13.4115C8.6756 13.344 7.67384 13.2013 6.68599 12.9843L2.17326 11.9839C2.15577 11.9802 2.13854 11.9754 2.12171 11.9693C2.01288 11.9324 1.91815 11.8609 1.85112 11.765C1.78409 11.6691 1.74822 11.5537 1.74866 11.4353V5.95247C1.74883 5.80307 1.80636 5.65983 1.90861 5.55419C2.01087 5.44854 2.14951 5.38911 2.29412 5.38894H19.7059C19.8505 5.38911 19.9891 5.44854 20.0914 5.55419C20.1936 5.65983 20.2512 5.80307 20.2513 5.95247V11.4376Z" fill="white" fill-opacity="0.85" stroke="white" stroke-opacity="0.85" stroke-width="0.6"/>
                                </svg>
                            </span>
                            <span class="d-inline-block common-description text-white"><?= get_sub_field('experience'); ?></span>
                        </div>
                    </div>
                </div> 
              </button>
            </h2>
            <div id="collapseOne<?= $counter; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p class="common-description secondary-color d-block mb-3"><?= 'Job Description:'; ?></p>
                <p class="common-description text-white fw-light mb-3"><?= get_sub_field('job_description'); ?></p> 
                <p class="common-description secondary-color d-block mb-3"><?= 'Key Responsibilities:'; ?></p>
                <ol class="ps-3">
                    <?php if (have_rows('key_responsibilities')): while (have_rows('key_responsibilities')): the_row(); ?>
                    <li class="common-description text-white fw-light">
                       <?= get_sub_field('responsibility'); ?>
                    </li><?php endwhile; endif; ?>
                </ol>
                 
                <p class="common-description secondary-color d-block mb-3"><?= 'Required Skills and Qualifications:'; ?></p>
                <ol class="ps-3 mb-4 mb-lg-5">
                    <?php if (have_rows('required_skills_and_qualifications')): while (have_rows('required_skills_and_qualifications')): the_row(); ?>
                    <li class="common-description text-white fw-light">
                        <?= get_sub_field('skill'); ?>
                    </li><?php endwhile; endif; ?>
                </ol>
				  <?
				 // $field_value = get_sub_field('title'); 
				  $form_page_url = site_url('/apply-now/');
				?>
                <a class="custom-btn-animation button-link btn rounded-0 text-white" href="<?php echo esc_url($form_page_url); ?>" onclick="storeJobTitle('<?= get_sub_field('title'); ?>');">
                            <span class="button-content-wrapper">
                                <span class="button-text" ><?= 'Apply Now'; ?>
                                    <span class="btn-arrows"></span>
                                </span>
                            </span>
                        </a>
              </div>
            </div>
          </div><?php $counter++; endwhile; endif; ?>
        </div>
    </div>
</section>

<section class="founder-journey-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="section-header pb-5">
            <h2 class="commom-heading text-white">
            <?= get_field('journey_title'); ?>
            </h2>
            <span class="common-subheading secondary-color d-block pb-3">
               <?= get_field('journey_sub_title'); ?>
            </span> 
            <p class="common-description text-white"><?= get_field('journey_desc'); ?></p>
        </div>
        <?php $video_poster_image= get_field('video_poster_image'); ?>
        <div class="founder-journey-video custom-border position-relative mb-5">
            <img src="<?= $video_poster_image['url']; ?>" alt="<?= $video_poster_image['alt']; ?>" class="custom-border">
            <span class="play-icon text-center">
                <img src="<?= site_url('wp-content/uploads/2025/02/video-play-icon.svg'); ?>" class="rounded-circle">
                 <span class="common-subheading secondary-color d-block pb-3">
               coming soon  </span>
            </span>
           
        </div>
        <div class="text-center pt-lg-5">
            <a class="custom-btn-animation button-link btn rounded-0 text-white" href="<?= get_field('meet_the_founder_link'); ?>">
                <span class="button-content-wrapper">
                    <span class="button-text"><?= get_field('meet_the_founder_title'); ?>
                        <span class="btn-arrows"></span>
                    </span>
                </span>
            </a>
        </div>
    </div>
</section>
<section class="numbers-section common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="row g-4">
            <?php if (have_rows('counter_list')): while (have_rows('counter_list')): the_row(); ?>
            <div class="col-lg-3 singleNumb">
                <span class="common-subheading secondary-color d-block">
                   <?= get_sub_field('title'); ?>
                </span>
                <h3 class="total-number text-white"><?= get_sub_field('count'); ?></h3>
            </div><?php endwhile; endif; ?>
        </div>
    </div>
</section>

<!---->
<section class="seo-cta-section customised-section-home common-section-spacing bg-theme-dark">
        <div class="container">
            <div class="customised-section-inner blog-cta-banner text-white custom-border">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8 col-12">
                        <span class="low_brand secondary-color text-uppercase pb-2 d-block"><?= get_field('join_title'); ?></span>
                        <h2 class="customised-heading text-white m-0"><?= get_field('join_desc'); ?></h2>
                    </div>
                    <div class="col-lg-4 col-12 d-flex justify-content-center justify-content-lg-end">
                        <div class="blog-custom-btn quotation-form">
                            <a class="custom-btn-animation button-link btn rounded-0 text-white" href="<?= get_field('join_button_link'); ?>">
                                <span class="button-content-wrapper">
                                    <span class="button-text"><?= get_field('join_button_text'); ?> <span class="btn-arrows"></span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<section class="services-section career-services common-section-spacing bg-theme-dark">
    <div class="container">
        <div class="section-header pb-5 text-center">
            <h2 class="commom-heading text-white">
           <?= get_field('team_title'); ?>
            </h2>
            <span class="common-subheading secondary-color d-block pb-4">
               <?= get_field('team_desc'); ?>
            </span> 
        </div>
        <div class="row g-4">
            <?php if (have_rows('team_list')): while (have_rows('team_list')): the_row(); $image= get_sub_field('icon');?>
            <div class="col-mb-4 col-lg-4 col-6 service-contt">
                <div class="services_card_inner h-100">
                    <a href="#" aria-label="Read more about " class="servicecard_readmore">
    					<div class="services_card h-100 d-flex">
                            <span class="d-block services-card-icon">
                                <img src="<?= $image['url'];?>" alt="<?= $image['alt'];?>">
                            </span>
                            <h3 class="servicecard_title secondary-color"><?= get_sub_field('title'); ?></h3>
    						 <p class="commom-description text-white m-0">
    							  <?= get_sub_field('desc'); ?>
    						</p>								
                        </div>
    				</a>
                </div>
            </div><?php endwhile; endif; ?>
            
            <div class="col-lg-4 col-md-4 col-12 service-contt">
			   <div class="services_card_inner-social h-100">							
				   <div class="services_card h-100 w-100 text-center text-white m-0 p-5 d-flex flex-column justify-content-center gap-3">
                        <h3 class="commom-description m-0"> <?= get_field('learn_more_about_title'); ?></h3>	
					       <ul class="social-icons list-inline m-0 d-flex gap-3 justify-content-center">
							   <?php if (have_rows('footer_social_share', 'option')):
						 while (have_rows('footer_social_share', 'option')):
						 the_row(); ?>
							   <li class="icon-list list-inline-item">
								   <a href="<?= get_sub_field('link', 'option'); ?>" target="_blank" class="icons text-white fs-4 "
									  aria-label="Behance">
									   <i class="fab fa-<?= get_sub_field('title', 'option'); ?>"></i>
								   </a>
							   </li>
							   <?php endwhile; endif; ?>
					   </ul>
				   </div>								
			   </div>
		   </div> 
        </div>
    </div>
</section>


<section class="numbers-section full-video-section common-section-spacing bg-theme-dark">
    <div class="container-fluid p-0">
        <?php $dynamic_workspace_poster_image= get_field('dynamic_workspace_poster_image'); ?>
        <div class="position-relative ourspace-video">
            <img src="<?= $dynamic_workspace_poster_image['url']; ?>" alt="<?= $dynamic_workspace_poster_image['alt']; ?>" class="full-image">
            <span class="play-icon">
                <img src="<?= site_url('wp-content/uploads/2025/02/video-play-icon.svg'); ?>" class="rounded-circle">
            </span>
            <div class="video-text-area text-center position-absolute">
                <h2 class="commom-heading text-white">
                    <?= get_field('dynamic_workspace_title'); ?>
                </h2>
                <span class="common-subheading secondary-color d-block pb-4">
                   <?= get_field('dynamic_workspace_desc'); ?>
                </span> 
            </div>
        </div>
    </div>
</section>
<!---->
<section class="customised-section-home common-section-spacing bg-theme-dark">
    <div class="container-fluid p-0">
        <div class="customised-section-inner">
            <div class="container">
                <div class="blog-cta-banner blog-custom-btn">
                    <div class="row align-items-center g-4">
                        <div class="col-md-8">
                            <div class="home-cta-section-heading">
                                <span class="low_brand secondary-color text-uppercase pb-2 d-block">Join OUr TEAM</span>
                                <h2 class="customised-heading text-white m-0"><?= get_field('financial_services_title'); ?></h2>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center justify-content-md-end">
                            <div class="founder-info">
                            <a class="custom-btn-animation button-link btn rounded-0 text-white" href="/contact">
                                <span class="button-content-wrapper"><span class="button-text"><?= get_field('join_button_text'); ?><span class="btn-arrows"></span></span></span>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
<section class="gallery-slider-section common-section-spacing bg-theme-dark">
	 <?php echo do_shortcode('[gallery_list]'); ?>
</section>

</div>
<?php get_footer(); ?>