<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">

                  <p class="m0 center"><?php esc_html_e( 'We\'re sorry, but you\'re not allowed to view this area!', '_s' ); ?></p>

                </div><!-- .entry-content -->
              </article><!-- #post-## -->

            </main><!-- #main -->
          </div><!-- #primary -->

        </div>
      </div><!-- .row -->
    </div><!-- .container -->

  </div><!-- #content -->

<?php
get_footer();
