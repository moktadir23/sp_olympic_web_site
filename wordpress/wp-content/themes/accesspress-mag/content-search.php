<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AccessPress Mag
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
    		<div class="entry-meta">
                <?php 
                    echo wp_kses( get_the_category_list(), array(
                        'ul' => array(
                            'class' => array()
                        ),
                        'li' => array(),
                        'a' => array(
                            'href' => array(),
                            'rel' => array()
                        )
                    ) );
    			    accesspress_mag_posted_on();
                    do_action('accesspress_mag_post_meta');
                ?>
    		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
    
    <div class="entry-content">
        <?php
            $archive_template = of_get_option( 'global_archive_template', 'archive-default' );
            switch ( $archive_template ) {
            	case 'archive-default':
            		$image_size = 'accesspress-mag-singlepost-default';
            		break;
            
            	case 'archive-style1':
            		$image_size = 'accesspress-mag-singlepost-style1';
                    break;
                    
            	default:
            		$image_size = 'accesspress-mag-singlepost-default';
            		break;
            }
            $image_id = get_post_thumbnail_id();
            $image_path = wp_get_attachment_image_src( $image_id, $image_size , true );
            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
            if( has_post_thumbnail() ){ 
         ?>
                <div class="post-image non-zoomin">
                    <a href="<?php the_permalink();?>"><img src="<?php echo esc_url( $image_path[0] );?>" alt="<?php echo esc_attr( $image_alt );?>" /></a>
                    <a class="big-image-overlay" href="<?php the_permalink();?>"><i class="fa fa-external-link"></i></a>
                </div><!-- .post-image -->
        <?php 
            }

            if( has_excerpt() ) {
                the_excerpt();
            } else {
                accesspress_mag_excerpt();   
            }
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-mag' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="clearfix"> </div>
	<footer class="entry-footer">
		<?php accesspress_mag_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
