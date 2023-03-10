<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Benevolent
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header post-right">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title post-right">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title post-right"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta post-right">
			<?php benevolent_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
    
    <?php 
        if( has_post_thumbnail() ){
            echo ( is_single() ) ? '<div class="post-thumbnail ">' : '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">';
            ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'benevolent-with-sidebar', array( 'itemprop' => 'image' ) ) : the_post_thumbnail( 'benevolent-without-sidebar', array( 'itemprop' => 'image' ) );
            echo ( is_single() ) ? '</div>' : '</a>' ; 
        }
    ?>
    
	<div class="entry-content post-right">
		<?php
			if( is_single() ){
                the_content( sprintf(
    				/* translators: %s: Name of current post. */
    				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'benevolent' ), array( 'span' => array( 'class' => array() ) ) ),
    				the_title( '<span class="screen-reader-text">"', '"</span>', false )
    			) );
            }else{
                if( false === get_post_format() ){
                    the_excerpt();
                }else{
                    the_content( sprintf(
        				/* translators: %s: Name of current post. */
        				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'benevolent' ), array( 'span' => array( 'class' => array() ) ) ),
        				the_title( '<span class="screen-reader-text">"', '"</span>', false )
        			) );
                }
            }
            
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'benevolent' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if( ! is_single() ){ ?>
    <footer class="entry-footer">
		<a href="<?php the_permalink(); ?>" class="readmore post-right"><?php esc_html_e( 'Read More', 'benevolent' ); ?></a>
	</footer><!-- .entry-footer -->
    <?php }?>
    
</article><!-- #post-## -->