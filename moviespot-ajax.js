jQuery(document).ready(function($) {
    // Listen for changes to the filter checkboxes
    $('input[name="genre[]"], input[name="publisher[]"], select[name="release_year"]').change(function() {
        // Get the selected filter values
        var genres = $('input[name="genre[]"]:checked').map(function() { return this.value; }).get().join(',');
        var publishers = $('input[name="publisher[]"]:checked').map(function() { return this.value; }).get().join(',');
        var releaseYear = $('select[name="release_year"]').val();
        
        // AJAX request to fetch filtered data
        $.ajax({
            url: moviespot_ajax_url,
            data: {
                action: 'moviespot_filter_movies',
                genres: genres,
                publishers: publishers,
                release_year: releaseYear
            },
            type: 'POST',
            beforeSend: function() {
                // Show loading indicator
                $('#movies-container').html('<div class="loading-indicator">Loading...</div>');
            },
            success: function(response) {
                // Update the movies container with the filtered data
                $('#movies-container').html(response);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
    
    // Listen for changes to the rating sort dropdown
    $('select[name="sort_by"]').change(function() {
        // Get the selected sort value
        var sortBy = $(this).val();
        
        // AJAX request to fetch sorted data
        $.ajax({
            url: moviespot_ajax_url,
            data: {
                action: 'moviespot_sort_movies',
                sort_by: sortBy
            },
            type: 'POST',
            beforeSend: function() {
                // Show loading indicator
                $('#movies-container').html('<div class="loading-indicator">Loading...</div>');
            },
            success: function(response) {
                // Update the movies container with the sorted data
                $('#movies-container').html(response);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});
