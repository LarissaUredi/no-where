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
                     $day = (get_post_meta($post->ID, 'day', true) != '' ? get_post_meta($post->ID, 'day', true) : get_post_meta($post->ID, 'field_5b93d6a11c6c6', true));
                    $time = (get_post_meta($post->ID, 'time', true) != '' ? get_post_meta($post->ID, 'time', true) : get_post_meta($post->ID, 'field_5b93d6f41c6c7', true));
			$date_day = substr($day, -2);
			$date_month = substr($day, -4, 2);
			$date_year = substr($day, 0, 4);

                    $filmshots1 = wp_get_attachment_image_src( $attachment_id = (get_post_meta($post->ID, 'still_image_1', true)));
                    $filmshots1_url = "";
                    if ( $filmshots1 ) {
                        $filmshots1_url = $filmshots1[0];
                    } else {
                        /* If not Poster is set on the form get the Featured URL of the post */
                        $filmshots1_url = (get_post_meta($post->ID, 'still_image_1', true) != '' ? get_post_meta($post->ID, 'still_image_1', true) : get_post_meta($post->ID, 'field_5b570f3150854', true));
                    }

                    $filmshots2 = wp_get_attachment_image_src( $attachment_id = (get_post_meta($post->ID, 'still_image_2', true)));
                    $filmshots2_url = "";
                    if ( $filmshots2 ) {
                        $filmshots2_url = $filmshots2[0];
                    } else {
                        /* If not Poster is set on the form get the Featured URL of the post */
                        $filmshots2_url = (get_post_meta($post->ID, 'still_image_2', true) != '' ? get_post_meta($post->ID, 'still_image_2', true) : get_post_meta($post->ID, 'field_5b570f5250855', true));
                    }

                    $filmshots3 = wp_get_attachment_image_src( $attachment_id = (get_post_meta($post->ID, 'still_image_3', true)));
                    $filmshots3_url = "";
                    if ( $filmshots3 ) {
                        $filmshots3_url = $filmshots3[0];
                    } else {
                        /* If not Poster is set on the form get the Featured URL of the post */
                        $filmshots3_url = (get_post_meta($post->ID, 'still_image_3', true) != '' ? get_post_meta($post->ID, 'still_image_3', true) : get_post_meta($post->ID, 'field_5b570f6450856', true));
                    }
                                        
                    // $filmshots1 = (get_post_meta($post->ID, 'still_image_1', true) != '' ? get_post_meta($post->ID, 'still_image_1', true) : get_post_meta($post->ID, 'field_5b570f3150854', true));
                    // $filmshots2 = (get_post_meta($post->ID, 'still_image_2', true) != '' ? get_post_meta($post->ID, 'still_image_2', true) : get_post_meta($post->ID, 'field_5b570f5250855', true));
                    // $filmshots3 = (get_post_meta($post->ID, 'still_image_3', true) != '' ? get_post_meta($post->ID, 'still_image_3', true) : get_post_meta($post->ID, 'field_5b570f6450856', true));
		
		            //$buytickets = (get_post_meta($post->ID, 'buy_tickets', true ) !='' ? get_post_meta($post->ID, 'buy_tickets', true) : get_post_meta($post->ID, 'buy_tickets', true));

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
                        echo '<h4>'.$date_month.'/'.$date_day.'/'.$date_year.' | '.$time.'</h4>';

                        echo '<p class="returnToSchedule"><a href="http://www.kansasfilm.com/schedule">Return to Schedule</a></p>';
                        echo '<b>Category: </b> '.$strCategories.'<br>';

                        echo '<b>Run Time: </b> '.$runtime.' min<br>';

                        echo '<b>Director: </b>'.$director.'<br>';

                        if (strpos($websiteurl, 'http://') !== false || strpos($websiteurl, 'https://') !== false) {
                            $websiteurl = '<a target="_blank" href="'.$websiteurl.'">'.$websiteurl.'</a>';
                        }
                        echo '<b>Web Site: </b>'.$websiteurl.'<br>';

                        echo '<b>Country: </b>'.$country.'<br>';

                        echo '<b>Rating: </b>'.$rating.'<br>';

                        echo '<b>Language: </b>'.$language.'<br>';

                        //echo '<b>Aspect Ratio: </b>'.$aspectratio.'<br>';

                        echo '<b>Awards: </b>'.$awards.'<br>';

                        if (($filmshots1_url !== '') || ($filmshots2_url !== '') || ($filmshots3_url !== '') ){

                            echo '<b>Shots from the film:</b><br>';

                            echo '<img class="stillImage" src="'.$filmshots1_url.'"/>&nbsp;&nbsp;';

                            echo '<img class="stillImage" src="'.$filmshots2_url.'"/>&nbsp;&nbsp;';

                            echo '<img class="stillImage" src="'.$filmshots3_url.'"/>';

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
