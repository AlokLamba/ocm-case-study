<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ocm-page-body">
                <?php
                if ( have_posts() ):
                    while ( have_posts() ):
                        the_post();
                        echo '<h2>'.get_the_title(get_the_ID()).'</h2>';
                        echo '<p>'.get_the_content().'</p>';
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>

<?php
get_footer();
