<?php
/**
 * The template for displaying all single posts.
 *
 * @package Clean Blog
 */

get_header(); ?>

	<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

		<?php do_action('cleanblog_single_top'); ?>

		<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'single' ); ?>

		<div class="postfooter">
			<?php cleanblog_entry_footer(); ?>
		</div>
		<!-- /.postfooter -->

		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;
		?>

		<?php endwhile; // End of the loop. ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

        <?php do_action( 'cleanblog_single_bottom' ); ?>
        

    

	</div>
    <!-- /.col-lg-8.col-lg-offset-2.col-md-10.col-md-offset-1 -->

    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 ">

<!-- <div class="col-lg-4 contact-form-2 footer-posts">

			<span class="form-2"><?php //echo do_shortcode( '[contact-form-7 id="52" title="Footer Contact form"]' ); ?></span>

</div> -->
    <?php 
 $args = array(

  'post_type' => 'post',
  'post_per_page' => 3
 );
$_posts = new WP_Query($args);
?>

<?php 
if ($_posts->have_posts() ): ?>

<div class="row mt-5 the-posts">
      <?php while ($_posts->have_posts()): $_posts->the_post(); ?>

<div class="col-lg-4 footer-posts card">

<?php if(has_post_thumbnail()): ?>

<img src="<?php  the_post_thumbnail(); ?>">

<?php endif; ?>

<a  href="<?php the_permalink();?>">
    <h4 ><?php the_title(); ?></h4>
</a>
<?php //the_excerpt(); ?>




</div>
<?php endwhile; ?>


</div>
<?php endif; ?>
    </div>
    

    

<?php get_footer(); ?>
