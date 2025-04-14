<?php get_header(); ?>
<div class="bg-theme-noise" aria-hidden="true"></div>
<main class="wrap">
	<section class="content-area content-thin">
		<div class="container">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="article-loop page-title">
				<?php the_content(); ?>
			</article>
			<?php endwhile; else : ?>
			<article>
				<p>Sorry, no posts were found!</p>
			</article>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>