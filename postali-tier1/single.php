<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */

$blogDefault = get_field('default_blog_image', 'options');

$categories = get_the_category();
$category_id = $categories[0]->cat_ID;

$args = array( 
    'posts_per_page' => 5, 
    'category' => $category_id,
    'post__not_in' => array( $post->ID )
);

get_header();?>



<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <div class="article-single-featured-image">
                        <?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
                        <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                            <img src="<?php echo $featImg[0]; ?>" class="article-featured-image"  />
                            <div class="spacer-60"></div>
                        <?php } ?>
                    </div>
                    <?php the_content(); ?>
                    <div class="spacer-30"></div>
                    <a href="/blog/" class="btn">View All Blogs</a>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php get_template_part('block','sidebar'); ?>


                    <div class="spacer-15"></div>
                    <div class="sidebar-header">Related Posts</div>
                        <div class="sidebar-menu">
                            <ul class="menu" id="menu-practice-areas-menu">
                            <?php                 
                            $relatedposts = get_posts( $args );
                            foreach ( $relatedposts as $post ) : setup_postdata( $post ); 
                            foreach (get_the_category() as $cat) { $category = $cat->name; }?>
                                <li class="page_item page-item-1352"><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></li>
                            <?php endforeach; 
                            wp_reset_postdata();?>
                            </ul>
                        </div>
                        <div class="spacer-30"></div>
                        <p class="sidebar-more"><a href="/blog/" title="All Blogs">View All Blogs</a> <span class="icon-tick-down"></span></p>

                </div>
            </div>
        </div>
    </section>

    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer();?>