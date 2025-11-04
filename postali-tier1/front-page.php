<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <section id="hp-banner">
        <div class="container">
            <div class="columns">
                <div class="column-33 block">
                    <div class="blue-box">
                        <h1><?php the_field('banner_page_title_h1'); ?></h1>
                        <div class="banner-subhead"><?php the_field('banner_sub_title'); ?></div>
                        <p><?php the_field('banner_intro_copy'); ?></p>
                        <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn"><?php the_field('phone_number','options'); ?></a>
                    </div>
                    <div class="spacer-90"></div>
                    <h2 class="bordered"><?php the_field('banner_h2'); ?></h2>
                    <p><?php the_field('banner_main_copy'); ?></p>
                </div>
                <div class="column-66">
                    <div class="img-box" style="background-image:url(<?php the_field('banner_photo'); ?>);"></div>
                    <div class="defending"><span>Defending Manatee & Sarasota Counties</span></div>
                    <div class="county-boxes">
                        <div class="box">
                            <img src="/wp-content/uploads/2023/10/manatee-county.svg" alt="Manatee County" />
                            MANATEE COUNTY
                        </div>
                        <div class="box">
                            <img src="/wp-content/uploads/2023/10/sarasota-county.svg" alt="Sarasota County" />
                            SARASOTA COUNTY
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blue">
        <div class="container">
            <div class="columns">
                <div class="column-75 centered center">
                    <h3><?php the_field('panel_2_headline'); ?></h3>
                    <?php the_field('panel_2_copy'); ?>
                    <div class="callout"><?php the_field('panel_2_callout'); ?></div>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-panel-3">
        <div class="container">
            <div class="columns">
                <div class="column-full centered">
                    <h2><?php the_field('panel_3_headline'); ?></h2>
                    <div class="spacer-60"></div>

                    <?php if( have_rows('practice_area_boxes') ): ?>
                    <div class="practice-area-boxes">
                    <?php while( have_rows('practice_area_boxes') ): the_row(); ?>  
                        <div class="practice-area-box">
                            <div class="box-image" style="background-image:url(<?php the_sub_field('practice_area_image'); ?>);">
                            </div>
                            <div class="box-copy">
                                <h3><?php the_sub_field('practice_area_title'); ?></h3>
                                <?php the_sub_field('practice_area_copy'); ?>

                                <?php if( have_rows('practice_area_child_links') ): ?>
                                <ul>
                                <?php while( have_rows('practice_area_child_links') ): the_row(); ?>  
                                <?php $post_object = get_sub_field('child_page'); ?>
                                <?php if( $post_object ): ?>
                                    <?php // override $post
                                    $post = $post_object;
                                    setup_postdata( $post );
                                    ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                <?php endif; ?>
                                <?php endwhile; ?>
                                </ul>
                                <?php endif; ?> 
                            </div>
                            <div class="box-link">
                                <a href="<?php the_sub_field('practice_area_link'); ?>" class="btn"><?php the_sub_field('practice_area_button_text'); ?></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div class="review-block">
                        <?php the_field('panel_3_reviews_block'); ?>
                    </div>
                    </div>
                    <?php endif; ?> 

                </div>
            </div>
        </div>
    </section>

    <section class="blue ltblue" id="hp-results">
        <div class="container">
            <div class="columns">
            <h3><?php the_field('panel_4_headline'); ?></h3>
            <div class="spacer-60"></div>
            <?php if( have_rows('results') ): ?>
            <?php while( have_rows('results') ): the_row(); ?>
                <?php $post_object = get_sub_field('result'); ?>
                <?php if( $post_object ): ?>
                    <?php // override $post
                    $post = $post_object;
                    setup_postdata( $post );

                    $content = get_the_content();
                    ?>
                    
                    <div class="column-33 result">
                        <p class="title"><?php the_title(); ?></p>
                    </div>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            <div class="spacer-60"></div>
            <a href="/results/" class="btn">Read More Case Results</a>
            </div>
        </div>
    </section>

    <section class="blue" id="hp-about">
        <div class="container">
            <div class="columns">
                <div class="column-33 left">
                    <img src="<?php the_field('panel_5_left_column'); ?>" />
                </div>
                <div class="column-33 right">
                    <div class="about-left">
                    <?php the_field('panel_5_center_column'); ?>
                    <div class="more-box">
                        <a href="/erika-valcarcel/" title="More about Erika Valcarcel" class="btn">Learn More About Erika</a>
                    </div>
                    </div>
                    <div class="about-right">
                    <?php 
                    $image = get_field('panel_5_right_column_badge');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                        <?php the_field('panel_5_right_column'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="spacer-90"></div>

    <section id="hp-resources">
        <div class="container skinny">
            <div class="columns">
                <div class="column-66">
                    <?php the_field('panel_6_left_column'); ?>
                </div>
                <div class="column-33">
                    <p class="gold spaced"><?php the_field('panel_6_right_column_headline'); ?></p>
                    <?php if( have_rows('panel_6_resource_links') ): ?>
                    <ul>
                    <?php while( have_rows('panel_6_resource_links') ): the_row(); ?>
                        <?php if( have_rows('resource') ): ?>
                        <?php while( have_rows('resource') ): the_row(); ?>
                            <?php $post_object = get_sub_field('resource_link'); ?>
                            <?php if( $post_object ) { ?>
                                <?php // override $post
                                $post = $post_object;
                                setup_postdata( $post );
                                ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_sub_field('resource_text'); ?></a></li>
                                <?php } else { ?>
                                <li><?php the_sub_field('resource_text'); ?></li>
                                <?php } ?>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="blue" id="hp-understanding">
        <div class="container">
            <div class="columns">
                <div class="column-full centered">
                    <?php the_field('panel_7_top_content'); ?>
                </div>
                <div class="spacer-60"></div>
                <?php if( have_rows('panel_7_bottom_blocks') ): ?>
                <?php while( have_rows('panel_7_bottom_blocks') ): the_row(); ?>  
                    <div class="column-33">
                        <?php the_sub_field('block'); ?>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?> 
                <div class="spacer-30"></div>
                <p class="centered"><?php the_field('panel_7_bottom_content'); ?></p>
            </div>
        </div>
    </section>

    <section id="hp-faqs-top">
        <div class="container">
            <div class="columns">
                <div class="column-full centered">
                    <h2><?php the_field('panel_8_headline'); ?></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="blue ltblue" id="hp-faqs-bottom">
        <div class="container">
            <div class="columns">
            <?php if( have_rows('panel_8_faqs') ): ?>
            <?php while( have_rows('panel_8_faqs') ): the_row(); ?>  
                <div class="column-33 faq">
                    <h3><?php the_sub_field('faq_question'); ?></h3>
                    <?php the_sub_field('faq_answer'); ?>
                </div>
            <?php endwhile; ?>
            <?php endif; ?> 
            </div>
        </div>
    </section>

    <section class="blue" id="hp-pre-footer">
        <div class="container">
            <div class="columns">
                <div class="column-75 center centered">
                    <?php the_field('pre_footer_copy'); ?>
                    <div class="spacer-30"></div>
                    <a href="tel:<?php the_field('phone_number','options'); ?>" title="Call Erika Valcarcel today" class="btn"><?php the_field('phone_number','options'); ?></a>
                </div>
            </div>
        </div>
    </section>

</div><!-- #front-page -->

<?php get_footer();?>  