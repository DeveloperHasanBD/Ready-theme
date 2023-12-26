<?php



add_action('vc_before_init', 'octgn_casi_sec2_backend');



function octgn_casi_sec2_backend()

{

    vc_map(

        array(

            "name" => __("Casi logos", "octagona"), // Element name

            "base" => "octgn_casi_sec2", // Element shortcode

            'icon' => get_template_directory_uri() . '/octgn-assets/images/vc-icon.png',

            'description' => 'Dedicated for Octagona',

            "class" => "octagona-cstm",

            "category" => __('OCT Casi', 'octagona'),

            'params' => array(

                array(

                    "type" => "textfield",

                    "holder" => "div",

                    "class" => "",

                    "heading" => __("Title ", "octagona"),

                    "param_name" => "octgn_casi_s2_title",

                    "value" => __("", "octagona"),

                ),

                // array(

                //     "type" => "attach_images",

                //     "holder" => "div",

                //     "class" => "",

                //     "heading" => __("Description", "octagona"),

                //     "param_name" => "octgn_casi_s2_logos",

                //     "value" => __("", "octagona"),

                // ),

            )

        )

    );

}





add_shortcode('octgn_casi_sec2', 'octgn_casi_sec2_view');



function octgn_casi_sec2_view($atts)

{

    ob_start();

    $atts = shortcode_atts(array(

        'octgn_casi_s2_title' => '',

        // 'octgn_casi_s2_logos' => '',

    ), $atts, 'octgn_casi_sec2');



    $octgn_casi_s2_title = $atts['octgn_casi_s2_title'] ?? '';

    // $octgn_casi_s2_logo_ids = $atts['octgn_casi_s2_logos'] ?? '';

    // $octgn_casi_s2_logo_ids_url = wp_get_attachment_image_url($octgn_casi_s2_logo_ids);

    // $items = vc_param_group_parse_atts($atts['octgn_hm_sec_1_sliders_items']);

    // $all_logo_ids = explode(",", $octgn_casi_s2_logo_ids);

    // $logo_id_count = count($all_logo_ids);





?>



    <!-- end r_cs_client_section  -->

    <div class="r_cs_client_section">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <h3 class="r_cs_client_title"><?php echo $octgn_casi_s2_title; ?></h3>

                    <div class="r_cs_client_logo_section">

                        <ul>



                            <?php



                            $logo_query = new WP_Query([

                                'post_type' => 'octgn-logo',

                                'order' => 'DESC',

                                'posts_per_page'=>-1

                            ]);

                            while ($logo_query->have_posts()) {

                                $logo_query->the_post();

                            ?>

                                <li><img src="<?php the_post_thumbnail_url(); ?>" alt=""></li>

                            <?php

                            }

                            wp_reset_query();

                            ?>





                            <?php

                            // for ($i = 0; $i < $logo_id_count; $i++) {

                            //     $octgn_casi_s2_logo_ids_url = wp_get_attachment_image_url($all_logo_ids[$i]);



                            // }

                            ?>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>



<?php

    $result = ob_get_clean();

    return $result;

}

