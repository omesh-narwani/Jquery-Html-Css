<?php 
/**
 * Template Name: More News
*/ 
 
?>
<?php get_header(); 
$args = array(
			'post_type' =>'events',
  			'post_status' => 'publish',
  			'posts_per_page' => 10
			);
$query = new WP_Query($args);
?>

<div class="col-md-9">
		<table>
        	<tbody>
            	<tr>
                	<td>#</td>
                    <td>Article Title</td>
                </tr>
                <?php $i=1; while ( $query->have_posts() ) : $query->the_post(); ?>
                <tr>
                	<td><?= $i?></td>
                    <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                </tr>
                
              <?php $i++; endwhile; ?>
              
			<tr>
            	<td>
                	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
<div class="back_left"><?php next_posts_link('&laquo; Older') ?></div>
<div class="next_right"><?php previous_posts_link('Newer &raquo;') ?></div>
<?php } ?>
                </td>
            </tr>
            </tbody>
        </table>
</div>
 
   <aside class="sidebar-right col-md-3">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-home') ) : ?><?php endif; //$px_xmlObject->sidebar_layout->px_sidebar_right ?>
    </aside>
       
<?php get_footer(); ?>