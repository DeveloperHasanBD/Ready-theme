<?php
add_action('vc_before_init', 'redp_contact_sec_1_backend');
function redp_contact_sec_1_backend()
{
    vc_map(
        array(
            "name" => __("Contact info", "redapple"), // Element name
            "base" => "redp_contact_sec_1", // Element shortcode
            'icon' => get_template_directory_uri() . '/octgn-assets/images/vc-icon.png',
            'description' => 'Dedicated for redapple',
            "class" => "redapple-cstm",
            "category" => __('OCT Casi', 'redapple'),
            'params' => array(
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title ", "redapple"),
                    "param_name" => "octgn_casi_s2_title",
                    "value" => __("", "redapple"),
                ),
            )
        )
    );
}


add_shortcode('redp_contact_sec_1', 'redp_contact_sec_1_view');

function redp_contact_sec_1_view($atts)

{

    ob_start();
    $atts = shortcode_atts(array(

        'octgn_casi_s2_title' => '',

    ), $atts, 'redp_contact_sec_1');



    $octgn_casi_s2_title = $atts['octgn_casi_s2_title'] ?? '';
    // $octgn_casi_s2_logo_ids = $atts['octgn_casi_s2_logos'] ?? '';

    // $octgn_casi_s2_logo_ids_url = wp_get_attachment_image_url($octgn_casi_s2_logo_ids);

    // $items = vc_param_group_parse_atts($atts['octgn_hm_sec_1_sliders_items']);

    // $all_logo_ids = explode(",", $octgn_casi_s2_logo_ids);

    // $logo_id_count = count($all_logo_ids);





?>


<?php

    $result = ob_get_clean();

    return $result;

}

