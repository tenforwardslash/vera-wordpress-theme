<?php
/**
 * The homepage template file.
 *
 */

get_header();

// Get container type from Wordpress Customizer
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<main class="site-main" id="main">

			<?php the_post(); // no loop here because it's the front page ?>

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<div class="row">

					<div class="col-md-12">
						<!-- <?php the_title( '<h2 class="entry-title">', '</a></h2>' ); ?> -->
						<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

					</div>

				</div><!-- .entry-header -->
				<div class="section-main">
					<div class="row header-main">
						<div class="col-md-12">
							<h3><?php the_field('header'); ?></h3>
						</div>
					</div><!-- .section-header -->
					<div class="row body-main">
						<div class="col-md-12">
							<?php the_content(); ?>
							<a href class="more">Learn More About Us</a>
						</div>
					</div><!-- .section-body -->
				</div><!-- .section-main -->

				<div class="section-concerts">
					<div class="row header-concerts">
						<div class="col-md-12">
							<div class="label">Concerts</div>
							<h2><b>On Stage</b></h2>
						</div>
					</div>
					<div class="row body-concerts">
						<div class="col-md-8">
							<div class="featured-concert">
								<div class="label">Featured Concert</div>
								<div class="presented-by">Soundgig Presents</div>
								<div class="featured-title">Peach Kelli Pop</div>
								<div class="featured-details">
									The Vera Project&nbsp;&nbsp;|&nbsp;&nbsp;7PM Doors
									<br>
									$10 ADV&nbsp;&nbsp;|&nbsp;&nbsp;$12 DOS
								</div>
								<a href class="more">Learn More</a>
							</div>
						</div>
						<div class="col-md-4">
							<div class="concerts-list">
								<div class="list-title">Upcoming Shows</div>
								<ul class="list-body">
									<li class="list-item">
										<div class="event-date">Sat, Dec 16, 2017</div>
										<div class="event-title">Freak Heat Waves</div>
										<div class="event-icon icon-ticket"></div>
									</li>
									<li class="event-item">
										<div class="event-date">Sat, Dec 16, 2017</div>
										<div class="event-title">Bright Moments & the Camas High School Choir</div>
										<div class="event-icon icon-ticket"></div>
									</li>
									<li class="event-item">
										<div class="event-date">Sat, Dec 16, 2017</div>
										<div class="event-title">La Luz, Savila, Anchient Forest</div>
										<div class="event-icon icon-ticket"></div>
									</li>
									<li class="event-item">
										<div class="event-date">Sat, Dec 16, 2017</div>
										<div class="event-title">La Luz, Savila, Anchient Forest</div>
										<div class="event-icon icon-ticket"></div>
									</li>
								</ul>
								<div class="list-more">View All</div>
							</div>
						</div><!-- .shows-block -->
					</div><!-- .col-md-12 -->
				</div><!-- .row -->

				<div class="row">
				</div>
			</article><!-- #post-## -->
	
		</main><!-- #main -->

	</div><!-- #content -->

</div><!-- .wrapper -->

<?php get_footer(); ?>