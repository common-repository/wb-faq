<?php

function wb_faq_trigger(){
?>

<script type="text/javascript">

jQuery(document).ready(function(){
  jQuery(".faq-q").click( function () {
    var container = jQuery(this).parents(".faq-c");
    var answer = container.find(".faq-a");
    var trigger = container.find(".faq-t");

    answer.slideToggle(200);

    if (trigger.hasClass("faq-o")) {
      trigger.removeClass("faq-o");
    }
    else {
      trigger.addClass("faq-o");
    }
  });
});


</script>

<?php
}
add_action('wp_footer','wb_faq_trigger');

// Add Shorwbode

function wb_faq_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'posts_num' => "-1",
			'order' => 'DESC',
			'orderby' => '',
      'faq_cat'=>'',

		), $atts )
	);
  $args = array(
      'orderby' => 'date',
       'order' => $order,
        'wb_category' =>$faq_cat,
        'showposts' => $posts_num,
        'post_type' => 'wb-faq'
 );

 $wb_view ='<div class="faq-header">Frequently Asked Questions</div>';
 $wb_loop= new WP_Query( $args );

 		if ($wb_loop->have_posts()) :

 			while ($wb_loop->have_posts()) : $wb_loop->the_post();  // wb faq start
          $wb_view.='<div class="faq-c">';
            $wb_view.='<div class="faq-q"><span class="faq-t">+</span>'.get_the_title().'? </div>';
              $wb_view.='<div class="faq-a">';
             $wb_view.='<p>'.get_the_content().'</p>';
           $wb_view.='</div>';
        $wb_view.='</div>';

 		endwhile; //
 		endif;
 	wp_reset_query();

 	return $wb_view;
}
add_shortcode('wb-faq', 'wb_faq_shortcode' );

 ?>
