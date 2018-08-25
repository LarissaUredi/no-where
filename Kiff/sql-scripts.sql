http://no-where.net/KIFF/?p=195

SELECT SQL_CALC_FOUND_ROWS wp_posts.ID 
FROM wp_posts 
INNER JOIN wp_postmeta ON ( wp_posts.ID = wp_postmeta.post_id ) 
INNER JOIN wp_postmeta AS mt1 ON ( wp_posts.ID = mt1.post_id ) 
WHERE 1=1 AND ( ( wp_postmeta.meta_key = 'field_5b4579e2b68ca' AND wp_postmeta.meta_value >= '60' ) AND ( mt1.meta_key = 'field_5b4579e2b68ca' AND mt1.meta_value <= '90' ) ) AND wp_posts.post_type IN ('short_film_artists', 'artists') AND (wp_posts.post_status = 'publish' OR wp_posts.post_author = 3 AND wp_posts.post_status = 'private') GROUP BY wp_posts.ID ORDER BY wp_posts.post_date ASC LIMIT 0, 10

SELECT * FROM `wp_postmeta` WHERE `post_id` = 156 or `post_id` = 126 and `meta_key` like 'field_%'

SELECT * FROM `wp_postmeta` WHERE `meta_key` = 'field_5b4678b72d158'

UPDATE `wp_postmeta` SET `meta_value`= 'G' WHERE `post_id` IN ('138','150','137') and meta_key = 'field_5b4678b72d158' 

Select wp_posts.* FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id AND (wp_posts.post_type = 'artists') AND ((wp_postmeta.meta_key = 'field_5b4579ecb68cb') AND (wp_postmeta.meta_value = 'Animation')) AND ((wp_postmeta.meta_key = 'field_5b4579ecb68cb' OR wp_postmeta.meta_key = 'runtime') OR (wp_postmeta.meta_key = 'runtime' OR wp_postmeta.meta_key = 'field_5b4579e2b68ca') AND (wp_postmeta.meta_value >= 30 AND wp_postmeta.meta_value <= 60)) AND ((wp_postmeta.meta_key = 'field_5b4678b72d158' OR wp_postmeta.meta_key = 'rating') AND (wp_postmeta.meta_value = 'PG')) AND wp_posts.post_status = 'publish' GROUP BY wp_posts.ID ORDER BY wp_posts.post_date DESC

SELECT * FROM `wp_postmeta` WHERE (`post_id` = 149 OR `post_id` = 199) and `meta_key` in ('field_5b4579ecb68cb', 'field_5b4579e2b68ca', 'field_5b4678b72d158') order by `post_id`

Select wp_posts.post_type, wp_postmeta.*, wp_posts.id FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id and `meta_key` in ('field_5b4579ecb68cb', 'field_5b4579e2b68ca', 'field_5b4678b72d158') order by `post_id`

Select wp_postmeta.*, wp_posts.id FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id  
AND (wp_posts.post_type = 'artists') 
AND ((wp_postmeta.meta_key = 'field_5b4579ecb68cb') AND (wp_postmeta.meta_value = 'Drama')) 
AND ((wp_postmeta.meta_key = 'field_5b4579e2b68ca' OR wp_postmeta.meta_key = 'runtime') AND (wp_postmeta.meta_value >= 30 AND wp_postmeta.meta_value <= 60))
AND ((wp_postmeta.meta_key = 'field_5b4678b72d158' OR wp_postmeta.meta_key = 'rating') AND (wp_postmeta.meta_value = 'G')) 
     AND wp_posts.post_status = 'publish' GROUP BY wp_posts.ID ORDER BY wp_posts.post_date DESC

SELECT `ID`, `post_id`, `post_type`, `post_title`,`meta_key`, `meta_value` FROM `wp_posts` wp
  inner join `wp_postmeta` wpt on wpt.post_id = wp.id
  WHERE (`post_type` = 'short_film_artists' OR `post_type` = 'artists')
   AND (`meta_key` = 'field_5b4579ecb68cb' OR `meta_key` = 'field_5b4579e2b68ca')
   and (`meta_value` >= 60 AND `meta_value` <= 90)
   
   SELECT * FROM `wp_postmeta` WHERE `meta_key` = 'field_5b4579e2b68ca' AND `post_id` in ('125','127','129','131')
   UPDATE `wp_postmeta` SET `meta_value`='30' WHERE `meta_key` = 'field_5b4579e2b68ca' AND `post_id` in ('150')
   
   SELECT * FROM `wp_postmeta` WHERE `meta_key` = 'field_5b4579e2b68ca' AND `post_id` in ('134','137','138','136')
   UPDATE `wp_postmeta` SET `meta_value`='45' WHERE `meta_key` = 'field_5b4579e2b68ca' AND `post_id` in ('147')
   
   SELECT * FROM `wp_postmeta` WHERE `meta_key` = 'field_5b4579e2b68ca' AND `post_id` in ('147','149')
   UPDATE `wp_postmeta` SET `meta_value`='60' WHERE `meta_key` = 'field_5b4579e2b68ca' AND  `post_id` in ('149')
   
   SELECT * FROM `wp_postmeta` WHERE `meta_key` = 'field_5b4579e2b68ca' AND `post_id` in ('150','152')
   UPDATE `wp_postmeta` SET `meta_value`='90' WHERE `meta_key` = 'field_5b4579e2b68ca' AND  `post_id` in ('150','152')
   
   SELECT * FROM `wp_postmeta` WHERE `meta_key` = 'field_5b4579e2b68ca' AND `post_id` in ('133', '185')
   UPDATE `wp_postmeta` SET `meta_value`='90' WHERE `meta_key` = 'field_5b4579e2b68ca' AND  `post_id` in ('133', '185')