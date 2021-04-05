.fl-node-<?php echo $id; ?> .fl-my-heading {
  text-align: <?php echo $settings->my_text_align; ?>;
  font-family: <?php echo $settings->my_font_field['family']; ?>;
  font-weight: <?php echo $settings->my_font_field['weight']; ?>;
}

.fl-node-<?php echo $id; ?> #map {
  height: 600px;
}
.fl-node-<?php echo $id; ?> .my-hr {
  margin:15px;
  border-width: 4px;
}

<?php

/**
 * Render a single rule/property for all device sizes (default, medium, responsive).
 * For this to work, your field must be defined as 'responsive' => `true`.
 */
FLBuilderCSS::responsive_rule( array(
  'settings'    => $settings,
  'setting_name'    => 'font_size',
  'selector'    => ".fl-node-$id .fl-my-heading",
  'prop'        => 'font-size',
) );