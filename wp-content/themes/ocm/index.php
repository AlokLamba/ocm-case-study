<?php
get_header();
?>
    <section class="hero-area">
        <div class="oc-home-banner">
            <div class="ocBanner-js">
                <?php
                $home_banner_args = array( 'category' => 4, 'post_type' => 'post','post_status' => 'publish' );
                $home_banner_list = get_posts( $home_banner_args );
                $counter=1;

                if(count($home_banner_list) > 0):
                    foreach ($home_banner_list as $post) :  setup_postdata($post);
                        $slider_image = get_template_directory_uri().'/assets/images/grey-banner.jpg';
                        if (has_post_thumbnail( $post->ID ) ):
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
                            $slider_image = $image[0];
                        endif;
                        ?>

                        <div class="bannerimage" style="background-image: url('<?php echo $slider_image; ?>');">
                            <div class="bannerCaption">
                                <div class="container">
                                    <div class="bannerContent">
                                        <div class="oc-featured-banner">
                                            <?php
                                            if($counter <=9):
                                                echo '<span>0'.$counter.'</span>';
                                            else:
                                                echo '<span>'.$counter.'</span>';
                                            endif;
                                            ?>
                                            <p>- Featured</p>
                                        </div>
                                        <div class="banner-lower-content">
                                            <p class="">Featured</p>
                                            <h2 class="heading30"><a href="<?php the_permalink(); ?>" style="color: white; text-decoration: none;"><?php the_title(); ?></a></h2>
                                            <ul class="banner-list-item">
                                                <li><span>By</span><p><?php echo get_the_author(); ?></p></li>
                                                <li><span><?php echo get_the_date('F d, Y', get_the_ID()); ?></span></li>
                                                <li>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/high-signal.svg" alt="Post view" style="width: 16px;">
                                                    <span>
                                                        <?php
                                                        if ( get_post_meta( get_the_ID() , '_post_views_count', true) == '' ):
                                                            echo '0 View';
                                                        else:
                                                            echo get_post_meta( get_the_ID() , '_post_views_count', true).' Views';
                                                        endif;
                                                        ?>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $counter++;
                    endforeach;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <?php
            $args = array( 'category' => 3, 'post_type' => 'post','post_status' => 'publish' );
            $postslist = get_posts( $args );
            if( !empty($postslist) && count($postslist)>0 ): ?>
                <div class="what-hot-wrap">
                    <h3>What's hot!</h3>
                    <ul class="thumbnail-list">
                        <?php
                        foreach ($postslist as $post) :  setup_postdata($post); ?>
                            <li>
                                <div class="d-flex">
                                    <div class="image">
                                        <?php
                                        if (has_post_thumbnail( $post->ID ) ):
                                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
                                            <img src="<?php echo $image[0]; ?>" height="66" width="66" />
                                        <?php else: ?>
                                            <img src="<?php echo get_template_directory_uri().'/assets/images/post-default-thumnail.png'; ?>" height="66" width="66" />
                                        <?php
                                        endif;
                                        ?>
                                    </div>

                                    <div class="text">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <br>
                                        <span class="date"><?php echo get_the_date('F d, Y', get_the_ID()); ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            <?php
            endif;
            ?>
        </div>
    </section>
<?php
get_footer();
