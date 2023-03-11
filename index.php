<?php get_header(); ?>

<main id="main" class="site-main" role="main">

  <section class="movies">
    <div class="container">
      <div class="row">
        <?php
          $args = array(
            'post_type' => 'movies',
            'posts_per_page' => 12
          );
          $query = new WP_Query($args);

          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
              <div class="col-md-4">
                <div class="movie">
                  <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail('medium'); ?>
                    </a>
                  <?php endif; ?>
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <p><strong>Release Year:</strong> <?php echo get_the_term_list($post->ID, 'release-year', '', ', '); ?></p>
                  <p><strong>Genres:</strong> <?php echo get_the_term_list($post->ID, 'genres', '', ', '); ?></p>
                  <?php $rating = get_post_meta(get_the_ID(), 'rating', true); ?>
                  <?php if ($rating) : ?>
                    <p><strong>Rating:</strong> <?php echo $rating; ?></p>
                  <?php endif; ?>
                </div>
              </div>
            <?php endwhile;
          endif;
          wp_reset_postdata();
        ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
