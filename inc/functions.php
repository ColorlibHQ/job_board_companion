<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * @Packge     : Job_Board Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author     URI : http://colorlib.com/wp/
 *
 */


/*===========================================================
	Get elementor templates
============================================================*/
function get_elementor_templates() {
	$options = [];
	$args = [
		'post_type' => 'elementor_library',
		'posts_per_page' => -1,
	];

	$page_templates = get_posts($args);

	if (!empty($page_templates) && !is_wp_error($page_templates)) {
		foreach ($page_templates as $post) {
			$options[$post->ID] = $post->post_title;
		}
	}
	return $options;
}

// Section Heading
function job_board_section_heading( $title = '', $subtitle = '' ) {
	if( $title || $subtitle ) :
	?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-heading text-center">
						<?php
						// Sub title
						if ( $subtitle ) {
							echo '<p>' . esc_html( $subtitle ) . '</p>';
						}
						// Title
						if ( $title ) {
							echo '<h2>' . esc_html( $title ) . '</h2>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'job_board_companion_frontend_scripts', 99 );
function job_board_companion_frontend_scripts() {

	wp_enqueue_script( 'job_board-companion-script', plugins_url( '../js/loadmore-ajax.js', __FILE__ ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'job_board-common-js', plugins_url( '../js/common.js', __FILE__ ), array( 'jquery' ), '1.0', true );

}
// 
add_action( 'wp_ajax_job_board_job_board_ajax', 'job_board_job_board_ajax' );

add_action( 'wp_ajax_nopriv_job_board_job_board_ajax', 'job_board_job_board_ajax' );
function job_board_job_board_ajax( ){

	ob_start();

	if( !empty( $_POST['elsettings'] ) ):


		$items = array_slice( $_POST['elsettings'], $_POST['postNumber'] );

	    $i = 0;
	    foreach( $items as $val ):

	    $tagclass = sanitize_title_with_dashes( $val['label'] );
	    $i++;
	?>
	<div class="single_gallery_item <?php echo esc_attr( $tagclass ); ?>">
	    <?php 
	    if( !empty( $val['img']['url'] ) ){
	        echo '<img src="'.esc_url( $val['img']['url'] ).'" />';
	    }
	    ?>
	    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
	        <div class="port-hover-text text-center">
	            <?php 
	            if( !empty( $val['title'] ) ){
	                echo job_board_heading_tag(
	                    array(
	                        'tag'  => 'h4',
	                        'text' => esc_html( $val['title'] )
	                    )
	                );
	            }

	            if( !empty( $val['sub-title-url'] ) &&  !empty( $val['sub-title'] ) ){
	                echo '<a href="'.esc_url( $val['sub-title-url'] ).'">'.esc_html( $val['sub-title'] ).'</a>';
	            }else{
	                echo '<p>'.esc_html( $val['sub-title'] ).'</p>';
	            }
	            ?>
	            
	        </div>
	    </div>
	</div>

	<?php 

	if( !empty( $_POST['postIncrNumber'] ) ){

	    if( $i == $_POST['postIncrNumber'] ){
	        break;
	    }
	}
	    endforeach;
	endif;
	echo ob_get_clean();
	die();
}

	// Update the post/page by your arguments
	function job_board_update_the_followed_post_page_status( $title = 'Hello world!', $type = 'post', $status = 'draft', $message = false ){

		// Get the post/page by title
		$target_post_id = get_page_by_title( $title, OBJECT, $type);

		// Post/page arguments
		$target_post = array(
			'ID'    => $target_post_id->ID,
			'post_status'   => $type,
		);

		if ( $message == true ) {
			// Update the post/page
			$update_status = wp_update_post( $target_post, true );
		} else {
			// Update the post/page
			$update_status = wp_update_post( $target_post, false );
		}

		return $update_status;
	}


	
// Job - Custom Post Type
function job_custom_posts() {	
	$labels = array(
		'name'               => _x( 'Job', 'post type general name', 'job_board-companion' ),
		'singular_name'      => _x( 'Job', 'post type singular name', 'job_board-companion' ),
		'menu_name'          => _x( 'Jobs', 'admin menu', 'job_board-companion' ),
		'name_admin_bar'     => _x( 'Jobs', 'add new on admin bar', 'job_board-companion' ),
		'add_new'            => _x( 'Add New', 'job_board', 'job_board-companion' ),
		'add_new_item'       => __( 'Add New Job', 'job_board-companion' ),
		'new_item'           => __( 'New Job', 'job_board-companion' ),
		'edit_item'          => __( 'Edit Job', 'job_board-companion' ),
		'view_item'          => __( 'View Job', 'job_board-companion' ),
		'all_items'          => __( 'All Jobs', 'job_board-companion' ),
		'search_items'       => __( 'Search Job', 'job_board-companion' ),
		'parent_item_colon'  => __( 'Parent Job:', 'job_board-companion' ),
		'not_found'          => __( 'No Job found.', 'job_board-companion' ),
		'not_found_in_trash' => __( 'No Job found in Trash.', 'job_board-companion' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'job_board-companion' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'job' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'			 => 'dashicons-businessperson',
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' )
	);

	register_post_type( 'job', $args );

}
add_action( 'init', 'job_custom_posts' );

/*=========================================================
    Job Section
========================================================*/
function job_board_get_jobs( $job_order = 'DESC', $item_per_page = 5 ){ 
	$jobs = new WP_Query( array(
		'post_type' => 'job',
		'post_status' => 'publish',
		'posts_per_page' => $item_per_page,
		'order'		=> $job_order
	) );
	$counter = 3;

	function job_board_get_single_job( $job_img, $job_category, $dynamic_class, $counter ){
		?>
		<div class="<?php echo esc_attr($dynamic_class)?>">
			<div class="single_Portfolio wow fadeInUp" data-wow-duration="1s" data-wow-delay=".<?php echo esc_attr($counter++)?>s">
				<?php
					if( $project_img ) {
						?>
						<div class="portfolio_thumb">
							<?php echo $project_img?>
						</div>
						<?php
					}
				?>
				<div class="portfolio_hover">
					<div class="title">
						<?php 
							if ($project_category!='') {
								echo '<span>'.esc_html($project_category).'</span>';
							}
							echo '<h3>'.get_the_title().'</h3>';
						?>
						<a class="boxed-btn3" href="<?php the_permalink()?>">View</a>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	if( $projects->have_posts() ) {
		while ( $projects->have_posts() ) {
			$projects->the_post();
			if (job_board_meta( 'job_board-grid' ) == 1) {
				$job_board_grid = 'job_board_project_img_754x450';
				$dynamic_class = 'col-lg-8 col-md-12';

			}elseif (job_board_meta( 'job_board-grid' ) == 2) {
				$job_board_grid = 'job_board_project_img_362x450';
				$dynamic_class = 'col-lg-4 col-md-6 col-lg-4';
			} else {
				$job_board_grid = 'medium';
				$dynamic_class = 'col-lg-4 col-md-6 col-lg-4';
			}
			$project_img = get_the_post_thumbnail( get_the_ID(), $job_board_grid, '', array( 'alt' => get_the_title() ) );
			$project_category = !empty( job_board_meta( 'project_category' ) ) ? job_board_meta( 'project_category' ) : '';
			job_board_get_single_project( $project_img, $project_category, $dynamic_class, $counter );
		}
	}
}

/*=========================================================
    Blog Section
========================================================*/
function job_board_get_recent_blog_posts( $item_per_page = 4, $project_order = 'DESC' ){ 
	$blogs = new WP_Query( array(
		'post_type' => 'post',
		'posts_per_page' => $item_per_page,
		'order'		=> $project_order
	) );

	function job_board_get_single_blog_post( $blog_img ){
		?>
		<div class="single_blog">
			<?php
				if( $blog_img ) {
					?>
					<div class="thumb">
						<a href="<?php the_permalink()?>">
							<?php echo $blog_img?>
						</a>
					</div>
					<?php
				}
			?>
			<div class="blog_content">
				<a href="#">
					<span class="date"><?php the_date('M d, Y')?></span>
				</a>
				<a href="<?php the_permalink()?>">
					<h3><?php the_title()?></h3>
				</a>
				<div class="owner_info">
					<div class="author_thumb">
						<!-- <img src="img/creative_blog/author2.png" alt=""> -->
						<?php echo $blog_img?>
					</div>
					<div class="info">
						<a href="#"><h4>Mesica Chouhan</h4></a>
						<p>Business Owner</p>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	if( $blogs->have_posts() ) {
		while ( $blogs->have_posts() ) {
			$blogs->the_post();			
			$blog_img = get_the_post_thumbnail( get_the_ID(), 'job_board_home_blog_558x380', '', array( 'alt' => get_the_title() ) );
			job_board_get_single_blog_post( $blog_img );
		}
	}
}
