<?php
/*
 * Template Name: MovieSpot Template
 */
get_header();
?>

<div id="movies-container">
    <h1>MovieSpot</h1>
    <div id="filters-container">
        <h3>Filters</h3>
        <form id="filters-form">
            <div>
                <label for="release-year">Release Year:</label>
                <select name="release-year" id="release-year">
                    <option value="">All</option>
                    <?php
                    $release_years = get_terms([
                        'taxonomy' => 'release-year',
                        'hide_empty' => true,
                    ]);
                    foreach ($release_years as $year) {
                        echo '<option value="' . $year->slug . '">' . $year->name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="genre">Genre:</label>
                <select name="genre" id="genre">
                    <option value="">All</option>
                    <?php
                    $genres = get_terms([
                        'taxonomy' => 'genre',
                        'hide_empty' => true,
                    ]);
                    foreach ($genres as $genre) {
                        echo '<option value="' . $genre->slug . '">' . $genre->name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit">Filter</button>
        </form>
    </div>

    <div id="movies-list">
        <?php
        $args = array(
            'post_type' => 'movies',
            'posts_per_page' => -1,
            'meta_key' => 'rating',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part('template-parts/movie', 'card');
            }
        } else {
            echo '<p>No movies found</p>';
        }

        wp_reset_postdata();
        ?>
    </div>
</div>

<?php get_footer(); ?>
