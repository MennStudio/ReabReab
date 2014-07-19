<?php
/**
 * @package Reab Reab
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>

	<div class="entry-pic">
		<a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
	</div>

	<div class="entry-info">
	<header class="entry-header">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php reabreab_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
			//the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'reabreab' ) ); 
			the_excerpt();
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'reabreab' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'reabreab' ) );
				if ( $categories_list && reabreab_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'reabreab' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'reabreab' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'reabreab' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'reabreab' ), __( '1 Comment', 'reabreab' ), __( '% Comments', 'reabreab' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'reabreab' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	</div><!--entry-info-->
</article><!-- #post-## -->