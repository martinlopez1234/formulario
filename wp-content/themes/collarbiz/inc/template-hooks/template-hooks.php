<?php
/**
 * Templated sections init
 *
 * @package collarbiz
 */

/**
 * Add template hooks defaults.
 */

// slider
require get_template_directory() . '/inc/template-hooks/slider.php';

// introduction
require get_template_directory() . '/inc/template-hooks/introduction.php';

// service
require get_template_directory() . '/inc/template-hooks/service.php';

// skills
require get_template_directory() . '/inc/template-hooks/skills.php';

// features
require get_template_directory() . '/inc/template-hooks/features.php';

// recent
require get_template_directory() . '/inc/template-hooks/recent.php';

// cta
require get_template_directory() . '/inc/template-hooks/cta.php';
