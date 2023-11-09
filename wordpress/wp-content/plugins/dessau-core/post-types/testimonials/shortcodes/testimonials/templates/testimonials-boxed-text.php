<div class="qodef-testimonials-holder clearfix <?php echo esc_attr($holder_classes); ?>">
    <div class="qodef-testimonials qodef-owl-slider qodef-border-around" <?php echo dessau_select_get_inline_attrs( $data_attr ) ?>>

        <?php if ( $query_results->have_posts() ):
            while ( $query_results->have_posts() ) : $query_results->the_post();
                $title    = get_post_meta( get_the_ID(), 'qodef_testimonial_title', true );
                $text     = get_post_meta( get_the_ID(), 'qodef_testimonial_text', true );
                $author   = get_post_meta( get_the_ID(), 'qodef_testimonial_author', true );
                $position = get_post_meta( get_the_ID(), 'qodef_testimonial_author_position', true );

                $current_id = get_the_ID();
                ?>

                <div class="qodef-testimonial-content qodef-testimonials<?php echo esc_attr($current_id) ?>">
                    <div class="qodef-testimonial-content-inner">
                        <div class="qodef-testimonial-text-holder">
                            <div class="qodef-testimonial-text-inner">
                                <?php if ( ! empty( $title ) ) { ?>
                                    <h4 class="qodef-testimonial-title">
                                        <?php echo esc_html( $title ); ?>
                                    </h4>
                                <?php }?>
                                <?php if ( ! empty( $text ) ) { ?>
                                    <p class="qodef-testimonial-text"><?php echo esc_html( $text ); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="qodef-testimonial-carousel-bottom">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <div class="qodef-testimonial-image">
                                    <?php echo get_the_post_thumbnail( get_the_ID(), array( 66, 66 ) ); ?>
                                </div>
                            <?php } ?>
                            <?php if ( ! empty( $author ) ) { ?>
                                <div class="qodef-testimonial-author">
                                    <h5 class="qodef-testimonials-author-name"><?php echo esc_html( $author ); ?></h5>
                                    <?php if ( ! empty( $position ) ) { ?>
                                        <h6 class="qodef-testimonials-author-job"><?php echo esc_html( $position ); ?></h6>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <?php
            endwhile;
        else:
            echo esc_html__( 'Sorry, no posts matched your criteria.', 'dessau-core' );
        endif;

        wp_reset_postdata();
        ?>

    </div>
</div>