<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

  <div id="content" class="site-content">

    <div class="container">
      <div class="row">
        <div class="col-xs-12">

          <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">

                  <p class="m0 center"><?php esc_html_e( 'We\'re sorry, but you\'re not allowed to view this area!', '_s' ); ?></p>

                </div><!-- .entry-content -->
              </article><!-- #post-## -->

            </main><!-- #main -->
          </div><!-- #primary -->

        </div><!-- #content -->

      </div>
    </div><!-- .row -->
  </div><!-- .container -->

<?php get_footer();
