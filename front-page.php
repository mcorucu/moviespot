<?php
/**
 * Front Page Template
 *
 * This file is responsible for displaying the home page of the MovieSpot theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package WordPress
 * @subpackage MovieSpot
 * @since 1.0.0
 */

get_header(); ?>

<main id="primary" class="site-main">
    <section class="hero">
        <h1>Welcome to MovieSpot</h1>
        <p>Discover the latest movies and TV shows</p>
    </section>
    
    <section class="movies">
        <h2>Featured Movies</h2>
        <?php
            // Use the get_posts() function to retrieve the featured movies
            $featured_movies = get_posts(array(
                'post_type' => 'movies',
                'meta_key' => 'rating',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
                'posts_per_page' => 4
            ));

            if (!empty($featured_movies)) :
                foreach ($featured_movies as $movie) :
                    // Use the get_field() function to retrieve the movie's custom fields
                    $release_year = get_field('release_year', $movie->ID);
                    $genres = get_field('genres', $movie->ID);
                    $publisher = get_field('publisher', $movie->ID);
                    $rating = get_field('rating', $movie->ID); ?>
                    
                    <article class="movie">
                        <h3><?php echo esc_html($movie->post_title); ?></h3>
                        <?php if (!empty($release_year)) : ?>
                            <p>Release Year: <?php echo esc_html($release_year); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($genres)) : ?>
                            <p>Genres: <?php echo esc_html(implode(', ', $genres)); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($publisher)) : ?>
                            <p>Publisher: <?php echo esc_html($publisher); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($rating)) : ?>
                            <p>Rating: <?php echo esc_html($rating); ?></p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
