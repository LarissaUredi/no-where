<?php

/*

 * Template Name: Artist Post Type

 * Template Post Type: post, page, product

 */





get_header(); ?>



	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

            <div id="artist-wrap">

                <?php

                // Start the loop.

                $strCategories = "";



                while ( have_posts() ) :

                    the_post();



                    $categories = get_post_meta($post->ID, 'category', true);

                    

                    if (!empty($categories)) {

                        foreach ( $categories as $key => $value ) {

                            $strCategories .= $value . ", ";

                        }

                    }



                    /* grab the url for the full size featured image */

                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');

                    //echo $featured_img_url;

                    //echo get_post_meta($post->ID, 'video', true);



                    $artist_name = (get_post_meta($post->ID, 'artist_name', true) != '' ? get_post_meta($post->ID, 'artist_name', true) : get_post_meta($post->ID, 'field_5b4579bdb68c8', true));

                    $director = (get_post_meta($post->ID, 'director', true) != '' ? get_post_meta($post->ID, 'director', true) : get_post_meta($post->ID, 'field_5b46789d2d155', true));

                    $websiteurl = (get_post_meta($post->ID, 'website', true) != '' ? get_post_meta($post->ID, 'website', true) : get_post_meta($post->ID, 'field_5b4678aa2d156', true));

                    $country = (get_post_meta($post->ID, 'country', true) != '' ? get_post_meta($post->ID, 'country', true) : get_post_meta($post->ID, 'field_5b4678b12d157', true));

                    $video = (get_post_meta($post->ID, 'video', true) != '' ? get_post_meta($post->ID, 'video', true) : get_post_meta($post->ID, 'field_5b4579d1b68c9', true));

                    $runtime = (get_post_meta($post->ID, 'run_time', true) != '' ? get_post_meta($post->ID, 'run_time', true) : get_post_meta($post->ID, 'field_5b4579e2b68ca', true));

                    $rating = (get_post_meta($post->ID, 'rating', true) != '' ? get_post_meta($post->ID, 'rating', true) : get_post_meta($post->ID, 'field_5b4678b72d158', true));

                    $language = (get_post_meta($post->ID, 'language', true) != '' ? get_post_meta($post->ID, 'language', true) : get_post_meta($post->ID, 'field_5b4678c62d159', true));

                    $aspectratio = (get_post_meta($post->ID, 'aspect_ratio', true) != '' ? get_post_meta($post->ID, 'aspect_ratio', true) : get_post_meta($post->ID, 'field_5b4678ce2d15a', true));

                    $awards = (get_post_meta($post->ID, 'awards', true) != '' ? get_post_meta($post->ID, 'awards', true) : get_post_meta($post->ID, 'field_5b4678d62d15b', true));

                    $filmshots1 = (get_post_meta($post->ID, 'still_image_1', true) != '' ? get_post_meta($post->ID, 'still_image_1', true) : get_post_meta($post->ID, 'field_5b4e9b9544941', true));

                    $filmshots2 = (get_post_meta($post->ID, 'still_image_2', true) != '' ? get_post_meta($post->ID, 'still_image_2', true) : get_post_meta($post->ID, 'field_5b4e9b9544942', true));

                    $filmshots3 = (get_post_meta($post->ID, 'still_image_3', true) != '' ? get_post_meta($post->ID, 'still_image_3', true) : get_post_meta($post->ID, 'field_5b4e9b9544943', true));
		
		 $buytickets = (get_post_meta($post->ID, 'buy_tickets', true ) !='' ? get_post_meta($post->ID, 'buy_tickets', true) : get_post_meta($post->ID, 'buy_tickets', true));

                    echo '<div id="header">';

                        echo '<h1>'.$artist_name.'</h1>';

                        echo '<h2>'.$post->post_title.'<br></h2>';

                    echo '</div>';

                    echo '<div id="left_col">';
		     echo '<img class="lPadding-15" src="'.$featured_img_url.'"/><br>';

                        //echo '<iframe width="800" height="500" src="'.get_post_meta($post->ID, 'field_5b4579d1b68c9', true).'?rel=0" frameborder="0"; encrypted-media" allowfullscreen></iframe>';

                        echo '<div class="text-white lPadding-15">';

                        echo '<b>Synopsis:</b><br>';

                        echo '<div style="padding-left: 10px;">'.$post->post_content.'</div>';
			
		     //echo '<a class="text-white lPadding-15" href="'.$buytickets.'"> Buy Tickets </a>';

				     
                        echo '</div>';

                        echo '</div>';

                        echo '<div id="right_col" class="text-white">';

                        echo '<b>Category: </b> '.$strCategories.'<br>';

                        echo '<b>Run Time: </b> '.$runtime.' min<br>';

                        echo '<b>Director: </b>'.$director.'<br>';

                        echo '<b>Web Site: </b>'.$websiteurl.'<br>';

                        echo '<b>Country: </b>'.$country.'<br>';

                        echo '<b>Rating: </b>'.$rating.'<br>';

                        echo '<b>Language: </b>'.$language.'<br>';

                        echo '<b>Aspect Ratio: </b>'.$aspectratio.'<br>';

                        echo '<b>Awards: </b>'.$awards.'<br>';

                        if (($filmshots1 !== '') || ($filmshots2 !== '') || ($filmshots3 !== '') ){

                            echo '<b>Shots from the film:</b><br>';

                            echo '<img height="300" width="300" src="'.$filmshots1.'"/>&nbsp;&nbsp;';

                            echo '<img height="300" width="300" src="'.$filmshots2.'"/>&nbsp;&nbsp;';

                            echo '<img height="300" width="300" src="'.$filmshots3.'"/>';

                        }

                        //echo '<b>Poster: </b><img src="'.$featured_img_url.'"/><br>';

                        //echo '<div style="text-align: center;">Facebook | Instagram | Twitter</div>';

                    echo '</div>';



                    // End the loop.

                endwhile;

                ?>

            </div>

		</main><!-- .site-main -->

	</div><!-- .content-area -->



<?php get_footer(); ?>