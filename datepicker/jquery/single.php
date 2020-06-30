<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div class="Containerblue">
<div class="Containt">
<section>


<div>

<div class="textheading">
Blog




</div>

<div class="cls"></div>

</div>

</section>

</div>
</div>

<div class="Containerwight1">
<div class="Containt">
<section>

			
            
            
<div class="blog_post">
<style>
#blog_sidebar_cat_172, #blog_sidebar_cat_166{
	display: none;
}
ul.chess-courses {
    overflow-y: scroll;
	 height: 233px;
}
.department p {
    padding: 10px 10px 6px 7px;
    font-size: 15px;}
.department.problem_day ul li a {
    width: 73%;
    float: left;
}
.department.problem_day ul li img {
    width: 20%;
    height: 65px;
    float: left;
}
</style>
<div class="left_category">


   <!-- Subscription -->
  	<div class="categorybox">
		<div class="categoryheading">Free Course</div>
		<div class="categorycontant">
			<div class="categorybg">
				<div class="department">
                	<a href="http://secrets.chess-teacher.in"><img src="http://chess-teacher.com/wp-content/uploads/2015/12/Widget-banner3a.jpg"></a>
                   <!-- <p>Whether you’re a professional, amature, or hobbyist, or looking for a new career</p>
                    <form id="subscription_form" action="https://app.mailerlite.com/webforms/submit/d5g5u3" data-code="d5g5u3" name="subscription" method="POST">
                        <input id="subscriber_name" type="text" class="inputbox" placeholder="Your Name" name="fields[name]">
						<input id="subscriber_email" type="text" class="inputbox" placeholder="Your Email Address" name="fields[email]">
						<input id="ml_submit" type="hidden" name="ml-submit" value="1">
                        <input type="submit" class="submit" value="Subscribe">
                    </form>	-->	
         		 </div>
			</div>
		</div>
		<div class="cls"></div>
	</div>
   <!-- Total Subscription -->
  	<div class="categorybox">
		<div class="categoryheading">
				<?php dynamic_sidebar("subscribe_count"); ?>
         </div>
		<div class="categorycontant">
			<div class="categorybg">
				<div class="department">
                	
                </div>
			</div>
		</div>
		<div class="cls"></div>
	</div> 
   <!-- Search Panel -->
  	<div class="categorybox">
		<div class="categoryheading">
        	 <?php dynamic_sidebar("product_search"); ?>
         </div>
		<div class="categorycontant">
			<div class="categorybg">
				<div class="department">
            	</div>
			</div>
		</div>
		<div class="cls"></div>
	</div> 
   <!-- Most Popular Post -->
	<div class="categorybox">
		<div class="categoryheading">Most Popular Post</div>
		<div class="categorycontant">
			<div class="categorybg">
				<div class="department">
					<?php
						
						$query     = new WP_Query(array(
							'meta_key' =>
							'post_views_count',
							'orderby' =>
							'meta_value_num'
						));
						// The Query
						$the_query = new WP_Query($query);

						
						if ($the_query->have_posts()) {
							$i = 0;	
							echo '<ul>';
							while ($the_query->have_posts()) {
								$the_query->the_post();
								if($i == 5) { break; }
								$i++;
					?>
								<li><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
					<?php
							}
							echo '</ul>';
						} 
						else {
							// no posts found
						}
						/* Restore original Post Data */
						wp_reset_postdata();
					?>
	  
				</div>
			</div>
		</div>
		<div class="cls"></div>
	</div> 
   <!-- Our Courses -->
  	<div class="categorybox">
		<div class="categoryheading">Our Courses</div>
		<div class="categorycontant">
			<div class="categorybg">
				<div class="department chess-courses">
                	<?php dynamic_sidebar("course_slider"); ?>
                </div>
			</div>
		</div>
		<div class="cls"></div>
	</div>
    <!-- About Igor Smirnov -->
    <div class="categorybox">
        <div class="categoryheading">About Igor Smirnov</div>
        <div class="categorycontant">
            <div class="categorybg">
                <div class="department">
                   <img src="http://chess-teacher.com/wp-content/uploads/2015/12/Igor.jpg">
                
                     <ul class="list-inline social">
                        <li><a target="_blank" href="https://www.facebook.com/RemoteChessAcademy"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a target="_blank" href="https://www.youtube.com/user/GMIgorSmirnov"><i class="fa fa-youtube-square"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/GM_Smirnov"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a target="_blank" href="https://plus.google.com/+GMIgorSmirnov/posts"><i class="fa fa-google-plus-square"></i></a></li>
                     </ul>
                 
             
             <p>Connect With Me</p>  
                </div>
            </div>
        </div>
        <div class="cls"></div>
    </div>
	<!-- Category -->
	<div class="categorybox">
		<div class="categoryheading">Category</div>
		<div class="categorycontant">
		  <div class="categorybg">
			<div class="department">
				<?php
					$categories = get_categories();
					$category   = "";
					$separator  = '';
					
					$args = array(
						'orderby' =>
						'name',
						'order' =>
						'ASC',
						'taxonomy' =>
						'categories'
						
					);

					echo "<ul>";
					if ($categories) {
						foreach ($categories as $category) {
							$output .= '<li id="blog_sidebar_cat_'.$category->term_id.'">';
								$output .= '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("View all posts in %s"), $category->name)) . '">';
									$output .= $category->cat_name;
								$output .= '</a>';
							$output .= '</li>';
						}
						echo trim($output, $separator);
					}
					echo "</ul>";
				?>
	  
	  
				</div>
			</div>
		</div>
		<div class="cls"></div>
	</div>  
  
  <!-- Problem Of the Day -->
	<div class="categorybox">
		<div class="categoryheading">Problem Of the Day</div>
		<div class="categorycontant">
			<div class="categorybg">
				<div class="department problem_day">
					<ul>
						<?php
							$argus = array(
								'post_type' =>
								'post',
								'post_status' =>
								'publish',
								'category_name' =>
								'problems'
							);
							$the_query = new WP_Query($argus);

							if ($the_query->have_posts()) {
								while ($the_query->have_posts()) {
									$the_query->the_post();
						?>
									<li>
                                    <?php echo the_post_thumbnail(); ?>
                                    <a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
						<?php
								}
							}
						?>
					</ul>
  
				</div>
			</div>
		</div>
		<div class="cls"></div>
	</div>
  	<!-- Bannerr2 -->
	<div class="categorybox">
		
		<div class="categorycontant">
		  <div class="categorybg">
                <div class="department">
                <a href="http://chess-teacher.com/free-training-course/">
                <img src="http://chess-teacher.com/wp-content/uploads/2015/12/Widget-banner2b.jpg"></a>
                </div>
			</div>
		</div>
		<div class="cls"></div>
	</div>
  <!-- Connect on Facebook? -->
  	<div class="categorybox">
		<div class="categoryheading">Connect on Facebook?</div>
		<div class="categorycontant">
			<div class="categorybg">
				<div class="department">
                	<ul>
                    	<?php dynamic_sidebar( 'facebook_like' ); ?>
                    </ul>
                </div>
			</div>
		</div>
		<div class="cls"></div>
	</div>
   
   	<!-- Bannerr3 -->
	<div class="categorybox">
		
		<div class="categorycontant">
		  <div class="categorybg">
                <div class="department">
                <a href="http://chess-teacher.cf/Chess-training-mini-course/">
                <img src="http://chess-teacher.com/wp-content/uploads/2015/12/Widget-banner1a.jpg"></a>
                </div>
			</div>
		</div>
		<div class="cls"></div>
	</div> 
   <!-- Join Our Team -->
	<div class="categorybox">
		<div class="categoryheading">Join Our Team</div>
		<div class="categorycontant">
			<div class="categorybg">
				<div class="department">
					<ul>
						<li><a href="#">PartnerShip</a></li>
						<li><a href="#">Career</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="cls"></div>
	</div>
   
  
</div>            

<?php while ( have_posts() ) : the_post(); ?>
<div class="blog_des">
<?php
/* Code for comment bubble at inner page */

 $id = get_the_ID();
									 
global $wpdb;
$result = $wpdb->get_results ("SELECT *FROM `wp_posts` WHERE `ID` =$id ");
foreach ( $result as $print )  
{
$cnt = $print->comment_count;
} 
 echo '<div class="blog_date">'.get_the_date(). '</div>';
echo '<div class="blog_com">COMMENTS <span>'.$cnt.'</span></div>';
?>
<h1 style="padding-bottom:18px;"><?php the_title(); ?></h1>


 <li class="Auth" style="margin-bottom:5px;">
 Grand Master Igor Smirnov, Chess Coach, Author and Publisher.
</li>
<!--<div class="posted_date"><div class="fl">Posted on : <span><?php echo get_the_date(); ?></span></div></div>-->

</div>	
			<div class="blog_right">
 <!--<div class="Blog_left">
            <?php
            if ( has_post_thumbnail() ) {
				
				?>
				<div class="single_thumb"><?php the_post_thumbnail(); ?></div>
                <?Php
			}else{
				?>
            <div class="single_thumb">    <img src="<?php echo get_template_directory_uri(); ?>/img/no-image.jpeg" /></div>
                  <?Php
			}
				?>
				   </div>-->
				<div class="post_desc">
				
				
<div  class="post_contant"><?php echo the_content();  ?></div></div>
				
			 
				<?php //get_template_part( 'content', get_post_format() );
				
				
				 $pgn_id= get_post_meta($post->ID,'add_pgn_file',true);
				 if($pgn_id!=''){
					?>
					<script src="http://fritzserver.info/cbjschess/jquery/jquery-last.min.js"></script>
                                        <script id="idcbjschess" src="http://fritzserver.info/cbjschess/jquery.chessbase.min.js" data-notation-options="{notationLocalization: GlyphLocalization}" data-adv-options="{method: AdvMethod.STATIC_LINK}"></script>

                                         <link href="http://fritzserver.info/cbjschess/res/jschessuser.css" rel="Stylesheet" />
				<?php 
				 }
				 $pgn_file= get_post_meta($pgn_id,'_wp_attached_file',true);
				 $upload_dir = wp_upload_dir(); 
                                 $upload_url= $upload_dir['baseurl'];
				?>
                                  <div class="cbreplay" data-url="<?php echo $upload_url .'/'.$pgn_file; ?>"></div>
				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->
                                       <div class="comment_temp">
				<?php comments_template( '', true );
				
				
				?>
				</div>
</div>
<div class="cls"></div>
</div>
			<?php endwhile; // end of the loop. ?>
</section>
		</div><!-- #content -->
	</div><!-- #primary -->


<script>
	
		
		$("#subscription_form").submit(function(event) {
		
			$('#submit-waiting').show();
		
			var name = $("#subscriber_name").val();
			var email = $("#subscriber_email").val();
			var ml_submit = $("#ml_submit").val();
			
			var dataString = 'fields[name]='+ name + '&fields[email]='+ email + '&ml-submit='+ ml_submit;
			
			if(name==''||email=='')
			{
				$('.subscribe_msg').html("<span class='subscribe-error'>Please Fill All Fields.</span>");
				$('#submit-waiting').hide();
			}
			else
			{
			
				$.ajax({
					type: "POST",
					url: "https://app.mailerlite.com/webforms/submit/d5g5u3",
					data: dataString,
					cache: false,
					success: function(result){
						window.location = "http://chess-teacher.com/thank-you-for-subscribtion/";
					},
					error: function(){
				alert('failure');
			  }
				});
			
			}
			
			
			return false;
			
		});
</script>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
