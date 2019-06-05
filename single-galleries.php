<?php
/**
 *
 * Template for single gallery page
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper single-gallery-page" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?> p-0">

        <main class="site-main" id="main" role="main">
			<?php the_post(); ?>

            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

            <?php
                $title = get_the_title();
                //TODO: add additional info section after Jessica gets back to me
                //TODO: will galleries always have an image? (probs yes)

                $tag = ( get_field('current_gallery') ? 'current show' : (get_field('up_next_gallery') ? 'up next' : ''));

                $subtitle = get_field('description');

                include( locate_template( 'partial-templates/half-or-block-header.php'));

                //get artist information
                $artist = get_field('artist');

                //TODO: put artist at the top for mobile
                //TODO: move title to above image on mobile
                //TODO: limit image to be banner, line up columns side by side


            //TODO: keep tablet half half (Jessi will work on decreasing size for tablet + mobile), make sure this looks good on tablet

				?>
                <div id="content" class="entry-content container">
                    <div class="row p-4 py-sm-4 px-sm-0 ml-1 no-gutters">
                        <div class="col-sm-9 pb-3 blog-contents gallery-contents">
							<?php the_content()?>
                        </div>
                        <div class="col-sm-3">
                            <div class="card m-auto" style="width: 18rem;">
                                <?php

                                if (trim($artist['photo']) !== '') {
                                    echo "<img class=\"card-img-top\" src=\"" . $artist['photo'] . "\" alt=\"" . $artist['title'] . "\">";
                                }

                                ?>

                                <div class="card-footer">
                                    <h1 class="card-title mb-2"><?php echo $artist['title']; ?></h1>
                                    <p class="card-text mt-2"><?php echo $artist['bio']; ?></p>
                                    <div class="artist-social vera-bordered-social-icons">
                                        <?php if (!empty($artist['social'])) {
                                            foreach($artist['social'] as $social) {
                                                echo "<a href=\"" . $social['link'] . "\" target=\"_blank\">";

	                                            switch ($social['type']) {
		                                            case 'Facebook':
                                                        echo "<i class=\"fa fa-facebook-f text-primary\"></i>";
			                                            break;
		                                            case 'Instagram':
			                                            echo "<i class=\"fa fa-instagram text-primary\"></i>";
			                                            break;
		                                            case 'Twitter':
			                                            echo "<i class=\"fa fa-twitter text-primary\"></i>";
			                                            break;
	                                            }

	                                            echo "</a>";
                                            }
                                        } ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </article><!-- #post-## -->

        </main><!-- #main -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>