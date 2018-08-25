<?php

// =============================================================================
// TEMPLATE NAME: Layout - Portfolio - Artists
// -----------------------------------------------------------------------------
// Handles output the portfolio index page.
//
// Content is output based on which Stack has been selected in the Customizer.
// To view and/or edit the markup of your Stack's index, first go to "views"
// inside the "framework" subdirectory. Once inside, find your Stack's folder
// and look for a file called "template-archive-x-portfolio.php," where you'll
// be able to find the appropriate output.
// =============================================================================

get_header(); 

$type = $_GET['type'];
$runtime = $_GET['rt'];
$rating = $_GET['rating'];
$cat = $_POST['cat'];
$category = "";
if(isset($_GET['cat'])){
    $category = " IN (";
    foreach($_GET['cat'] as $cat){
        $category .= "'".$cat."',";
        $cat .= "".$cat.",";
    }
    $category=rtrim($category,", ");
    $category .= ")";
}

if ($category == '--') {
    $category = '';
}

if ($runtime == '--') {
    $runtime = '';
}

if ($rating == '--') {
    $rating = '';
}

if ($type == '--') {
    $type = '';
}

//$runtime = '';
//$rating = '';

$get_all = 'all';

$basequerystr = "Select $wpdb->posts.* FROM $wpdb->posts, $wpdb->postmeta WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id";
$whereclause = "";
$postquerystr = " AND $wpdb->posts.post_status = 'publish' GROUP BY $wpdb->posts.ID ORDER BY $wpdb->posts.post_date DESC";

$typewhereclause = " AND ($wpdb->posts.post_type = 'artists' OR $wpdb->posts.post_type = 'short_film_artists')";

if ($type != '') {
    $typewhereclause = " AND ($wpdb->posts.post_type = '$type')";
}

$beforeParen = " AND (";
$afterParen = ")";

if ($category != '') {
    $whereclause .= " ($wpdb->postmeta.meta_key = 'field_5b4579ecb68cb' AND $wpdb->postmeta.meta_value $category)";
}

if ($runtime != '') {
    $low_rt = '';
    $high_rt = '';

    switch ($runtime) {
        case "30-60":
            $low_rt = '30';
            $high_rt = '60';
            break;
        case "60-90":
            $low_rt = '60';
            $high_rt = '90';
            break;
        case "90":
            $low_rt = '90';
            $high_rt = '999';
            break;
    }
    if ($whereclause <> "") {
        $whereclause .= " OR ";
    }
    $whereclause .= " ($wpdb->postmeta.meta_key = 'field_5b4579e2b68ca' AND ($wpdb->postmeta.meta_value >= $low_rt AND $wpdb->postmeta.meta_value <= $high_rt))";
} 

if ($rating != '') { 
    if ($whereclause <> "") {
        $whereclause .= " OR ";
    } 
    $whereclause .= " ($wpdb->postmeta.meta_key = 'field_5b4678b72d158' AND $wpdb->postmeta.meta_value = '$rating')";
} 

$querystr = $basequerystr.$typewhereclause;

if ($whereclause <> "") {
    $querystr .= $beforeParen.' '.$whereclause.' '.$afterParen;
}

$querystr .= $postquerystr;

//echo '<span style="padding-left: 15px; color:#fff">'.$querystr.'</span><br>';

$pageposts = $wpdb->get_results($querystr, OBJECT);
?>
<div id="portfolio" class="group"> 
 
    <h2>2018 Films</h2>
    <div class="form_controls">
        <form action="/artists-portfolio/">
            <select name="type" class="typedd">
                <option value="--" <?php echo ($type == '--')?"selected":"" ?>>-- Select a Film Type --</option>
                <option value="artists" <?php echo ($type == 'artists')?"selected":"" ?>>Feature Length Film</option>
                <option value="short_film_artists" <?php echo ($type == 'short_film_artists')?"selected":"" ?>>Short Film</option>
            </select> 
            
            <input type="checkbox" name="cat[]" <?php if (strpos($cat, 'Animation') !== false) { echo 'checked'; } ?> value="Animation" />Animation &nbsp;
            <input type="checkbox" name="cat[]" <?php if (strpos($cat, 'Documentary') !== false) { echo 'checked'; } ?> value="Documentary" />Documentary &nbsp;
            <input type="checkbox" name="cat[]" <?php if (strpos($cat, 'Drama') !== false) { echo 'checked'; } ?> value="Drama" />Drama &nbsp;
            <input type="checkbox" name="cat[]" <?php if (strpos($cat, 'Horror') !== false) { echo 'checked'; } ?> value="Horror" />Horror &nbsp;
            <input type="checkbox" name="cat[]" <?php if (strpos($cat, 'Local') !== false) { echo 'checked'; } ?> value="Local" />Local &nbsp;
            <input type="checkbox" name="cat[]" <?php if (strpos($cat, 'Narrative') !== false) { echo 'checked'; } ?> value="Narrative" />Narrative &nbsp;
            
            <select name="rating" class="ratingdd">
                <option value="--" <?php echo ($rating == '--')?"selected":"" ?>>-- Select a Rating --</option>
                <option value="G" <?php echo ($rating == 'G')?"selected":"" ?>>G</option>
                <option value="PG" <?php echo ($rating == 'PG')?"selected":"" ?>>PG</option>
                <option value="PG13" <?php echo ($rating == 'PG13')?"selected":"" ?>>PG13</option>
                <option value="R" <?php echo ($rating == 'R')?"selected":"" ?>>R</option>
                <option value="NR" <?php echo ($rating == 'NR')?"selected":"" ?>>NR</option>
            </select> 
            <select name="rt" class="rtdd">
                <option value="--" <?php echo ($runtime == '--')?"selected":"" ?>>-- Select a Runtime --</option>
                <option value="30-60" <?php echo ($runtime == '30-60')?"selected":"" ?>>30-60</option>
                <option value="60-90" <?php echo ($runtime == '60-90')?"selected":"" ?>>60-90</option>
                <option value="90" <?php echo ($runtime == '90')?"selected":"" ?>>90+</option>
            </select> 
            <input type="submit">
        </form>
    </div>

    <div class="group">
        <?php if ($pageposts): ?>
            <?php global $post; ?>
            <?php foreach ($pageposts as $post): ?>
                <?php setup_postdata($post); ?>
                
                <div class="item">
                    <div class="img"><a href='<?php echo esc_url( get_permalink() ); ?>'><?php echo the_post_thumbnail('thumbnail'); ?></a></div>
                    <p><strong><a href='<?php echo esc_url( get_permalink() ); ?>'><?php echo the_title(); ?></a>:</strong> <br><?php echo excerpt(20); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h2 class="center">No Films Found. Please try again!</h2>
        <?php endif; ?>
    </div>
 
</div>
 
<?php get_footer(); ?>