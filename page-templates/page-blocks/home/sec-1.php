<?php

/**
 * Block: Home — Section 1 (Hero carousel)
 *
 * Content comes from the ACF field group in
 * page-templates/acf-fields/home/sec-1.php (repeater "hero_slides").
 * Each slide is one of three types: video, event or promo.
 *
 * @package redapple
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$theme_uri   = get_template_directory_uri();
$hero_slides = get_field('hero_slides');
$hero_slides = is_array($hero_slides) ? $hero_slides : array();

// Drop the blank starter row(s) ACF's min=1 leaves behind.
$hero_slides = array_values(array_filter($hero_slides, function ($s) {
    return ! empty($s['bg_video'])
        || ! empty($s['bg_image'])
        || ! empty($s['eyebrow'])
        || ! empty($s['title'])
        || ! empty($s['booth'])
        || ! empty($s['meta'])
        || ! empty($s['heading'])
        || ! empty($s['script_line'])
        || ! empty($s['button_text']);
}));

if (empty($hero_slides)) {
    if (! empty($is_preview) || current_user_can('edit_posts')) {
        echo '<p class="cform-notice">' . esc_html__('Nothing to show yet — add a slide to this block.', 'redapple') . '</p>';
    }
    return;
}

$total = count($hero_slides);

/*
 * Editor preview.
 *
 * ACF renders this template as the block's editor preview. The full live
 * carousel (autoplaying video, absolute positioning, fixed viewport height)
 * looks messy inside the editor canvas, so show a compact summary card here
 * instead. The front-end (is_preview = false) renders the real hero below.
 */
if (! empty($is_preview)) {

    $types  = array_count_values(array_map(function ($s) {
        return ! empty($s['slide_type']) ? $s['slide_type'] : 'event';
    }, $hero_slides));
    $labels = array('video' => 'video', 'event' => 'event', 'promo' => 'promo');
    $parts  = array();
    foreach ($labels as $k => $label) {
        if (! empty($types[$k])) {
            $parts[] = $types[$k] . ' ' . $label . ($types[$k] > 1 ? 's' : '');
        }
    }
    ?>
    <div style="display:flex;align-items:center;gap:16px;padding:20px 24px;border:1px solid #e2e4e7;border-radius:10px;background:#f6f7f8;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;">
        <div style="flex:none;width:44px;height:44px;border-radius:9px;background:#1e1e1e;color:#fff;display:flex;align-items:center;justify-content:center;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 15l5-4 4 3 3-2 6 5"/><circle cx="8.5" cy="9.5" r="1.4"/></svg>
        </div>
        <div style="line-height:1.45;">
            <strong style="display:block;font-size:14px;color:#1e1e1e;">Home — Hero Carousel</strong>
            <span style="font-size:13px;color:#50575e;"><?php echo esc_html($total . ' slide' . ($total > 1 ? 's' : '')); ?><?php echo $parts ? ' · ' . esc_html(implode(', ', $parts)) : ''; ?></span>
            <span style="display:block;font-size:12px;color:#787c82;margin-top:3px;">Edit slides in the panel on the right, or “Open Expanded Editor”. The live hero shows on the page.</span>
        </div>
    </div>
    <?php
    return;
}
?>
<!-- ================= HERO SLIDER ================= -->
<section class="hero" id="home">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="8000" data-bs-pause="false">

        <div class="carousel-indicators hero-indicators">
            <?php for ($i = 0; $i < $total; $i++) : ?>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo esc_attr($i); ?>"<?php echo 0 === $i ? ' class="active" aria-current="true"' : ''; ?> aria-label="<?php echo esc_attr(sprintf(__('Slide %d', 'redapple'), $i + 1)); ?>"></button>
            <?php endfor; ?>
        </div>

        <div class="carousel-inner">
            <?php
            $index = 0;
            foreach ($hero_slides as $slide) :
                $type   = ! empty($slide['slide_type']) ? $slide['slide_type'] : 'event';
                $active = 0 === $index ? ' active' : '';

                if ('video' === $type) :
                    $video  = ! empty($slide['bg_video']) ? $slide['bg_video'] : '';
                    $poster = ! empty($slide['bg_video_poster']) ? $slide['bg_video_poster'] : '';
            ?>
                <div class="carousel-item<?php echo $active; ?> hero-video-slide">
                    <?php if ($video) : ?>
                        <video class="hero-video" autoplay muted loop playsinline preload="metadata"<?php echo $poster ? ' poster="' . esc_url($poster) . '"' : ''; ?>>
                            <source src="<?php echo esc_url($video); ?>" type="video/mp4">
                        </video>
                    <?php elseif ($poster) : ?>
                        <div class="hero-bg" style="background-image:url('<?php echo esc_url($poster); ?>')"></div>
                    <?php endif; ?>
                </div>

            <?php
                elseif ('promo' === $type) :
                    $bg      = ! empty($slide['bg_image']) ? $slide['bg_image'] : '';
                    $heading = ! empty($slide['heading']) ? $slide['heading'] : '';
                    $script  = ! empty($slide['script_line']) ? $slide['script_line'] : '';
                    $btn_txt = ! empty($slide['button_text']) ? $slide['button_text'] : '';
                    $btn_url = ! empty($slide['button_link']) ? $slide['button_link'] : '';
            ?>
                <div class="carousel-item<?php echo $active; ?>">
                    <div class="hero-bg" style="background-image:url('<?php echo esc_url($bg); ?>')"></div>
                    <div class="hero-container">
                        <div class="hero-content">
                            <?php if ($heading) : ?>
                                <h2 class="sl-h2"><?php echo wp_kses_post($heading); ?></h2>
                            <?php endif; ?>
                            <?php if ($script) : ?>
                                <h3 class="sl-script"><?php echo esc_html($script); ?></h3>
                            <?php endif; ?>
                            <?php if ($btn_txt && $btn_url) : ?>
                                <a href="<?php echo esc_url($btn_url); ?>" class="sl-btn"><?php echo esc_html($btn_txt); ?> <img src="<?php echo esc_url($theme_uri); ?>/assets/images/green-plus.png" alt="" onerror="this.onerror=null;this.src='https://lattuada-na.com/wp-content/themes/Impreza-child/images/green-plus.png'"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php
                else : // event
                    $bg       = ! empty($slide['bg_image']) ? $slide['bg_image'] : '';
                    $eyebrow  = ! empty($slide['eyebrow']) ? $slide['eyebrow'] : '';
                    $title    = ! empty($slide['title']) ? $slide['title'] : '';
                    $t_blue   = ! empty($slide['title_blue']);
                    $booth    = ! empty($slide['booth']) ? $slide['booth'] : '';
                    $b_white  = ! empty($slide['booth_white']);
                    $badge    = ! empty($slide['badge_image']) ? $slide['badge_image'] : '';
                    $location = ! empty($slide['location']) ? $slide['location'] : '';
                    $meta     = ! empty($slide['meta']) ? $slide['meta'] : '';
                    $booth_cls = 'sl-booth' . ($b_white ? ' sl-booth-white' : '');
            ?>
                <div class="carousel-item<?php echo $active; ?>">
                    <div class="hero-bg" style="background-image:url('<?php echo esc_url($bg); ?>')"></div>
                    <div class="hero-container">
                        <div class="hero-content">
                            <?php if ($eyebrow) : ?>
                                <p class="sl-eyebrow"><?php echo esc_html($eyebrow); ?></p>
                            <?php endif; ?>
                            <?php if ($title) : ?>
                                <h2 class="sl-title<?php echo $t_blue ? ' sl-title-blue' : ''; ?>"><?php echo wp_kses_post($title); ?></h2>
                            <?php endif; ?>
                            <?php if ($booth) : ?>
                                <p class="<?php echo esc_attr($booth_cls); ?>"><?php echo wp_kses_post($booth); ?></p>
                            <?php endif; ?>
                            <?php if ($badge) : ?>
                                <img class="sl-badge" src="<?php echo esc_url($badge); ?>" alt="">
                            <?php endif; ?>
                            <?php if ($location) : ?>
                                <p class="<?php echo esc_attr($booth_cls); ?>"><?php echo esc_html($location); ?></p>
                            <?php endif; ?>
                            <?php if ($meta) : ?>
                                <p class="sl-meta"><?php echo wp_kses_post($meta); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
                endif;
                $index++;
            endforeach;
            ?>
        </div>

        <?php if ($total > 1) : ?>
            <button class="carousel-control-prev hero-arrow" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <i class="bi bi-chevron-left"></i><span class="visually-hidden"><?php esc_html_e('Previous', 'redapple'); ?></span>
            </button>
            <button class="carousel-control-next hero-arrow" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <i class="bi bi-chevron-right"></i><span class="visually-hidden"><?php esc_html_e('Next', 'redapple'); ?></span>
            </button>
        <?php endif; ?>

        <!-- Slide progress bar -->
        <div class="hero-progress"><span></span></div>
    </div>

    <!-- Floating Request Info tab -->
    <a href="contacts.html" class="request-info-tab" id="request-info">
        <i class="bi bi-file-earmark-text"></i>
        <span><?php esc_html_e('Request', 'redapple'); ?><br><?php esc_html_e('Info', 'redapple'); ?></span>
    </a>
</section>
