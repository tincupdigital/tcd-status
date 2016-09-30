<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>

  <div id="content" class="site-content">

    <div class="container">
      <div class="clearfix">
        <div class="col-12">

          <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-header">
                  <h1 class="entry-title center mt1 mb3 regular"><?php the_title(); ?></h1>
                </div>

                <div class="entry-content">
                  <?php
                    the_content();

                    /* Phases */
                    if ( have_rows( 'project_phases' ) ) { ?>

                      <div class="project-phases">
                        <?php // loop through rows
                        while ( have_rows( 'project_phases' ) ): the_row(); ?>
                          <div class="project-phase project-phases__phase">
                            <h3 class="phase-title h2 project-phase__title mt0 mb2"><?php the_sub_field( 'phase_title' ); ?></h3>

                            <?php // set repeater to variable
                            $repeater = get_sub_field( 'phase_rounds' );

                            // check if array exists
                            if ( $repeater ) {
                              // set a round number
                              $round = 1;

                              // add round number to $repeater rows
                              // hat-tip: http://goo.gl/ZcRik0
                              foreach ( $repeater as &$row ) {
                                $row['round_number'] = $round;
                                $round++;
                              }

                              // reverse the array
                              $repeater = array_reverse( $repeater ); ?>

                              <div class="project-rounds">
                                <?php // loop through rows
                                foreach ( $repeater as $row ) { ?>
                                  <div class="project-round mb2">
                                    <?php /* Date */
                                    if ( $row['round_date'] ) {
                                      $date = DateTime::createFromFormat( 'Ymd', $row['round_date'] ); ?>

                                      <div class="round-date">
                                        <span class="txt-light txt-small"><?php echo $date->format( 'F j, Y' ); ?></span>
                                      </div>
                                    <?php } ?>

                                    <h4 class="round-number h3 project-round__title">Round <?php echo str_pad( $row['round_number'], 2, '0', STR_PAD_LEFT ); ?></h4>

                                    <?php /* Content */
                                    if ( $row['round_content'] ) {
                                      echo wpautop( $row['round_content'] );
                                    } ?>
                                  </div>
                                <?php } ?>
                              </div>
                            <?php } ?>
                          </div>
                        <?php endwhile; ?>
                      </div><!-- .project-phases -->

                    <?php }

                    wp_link_pages( array(
                      'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
                      'after'  => '</div>',
                    ) );
                  ?>
                </div><!-- .entry-content -->
              </article><!-- #post-## -->

            <?php endwhile; // End of the loop. ?>

            </main><!-- #main -->
          </div><!-- #primary -->

        </div>
      </div><!-- .row -->
    </div><!-- .container -->

  </div><!-- #content -->

<?php get_footer();
