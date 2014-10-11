<?php
add_action('media_buttons','add_sc_select',11);
function add_sc_select(){
     /* ------------------------------------- */
     /* enter names of shortcode to exclude bellow */
     /* ------------------------------------- */
    ?>

    <!-- <a href="#" id="insert-ux-shortcode" class="button " title="Add Shortcode"><span class="dashicons dashicons-visibility" style="padding-top:2px;"></span> UX Shortcodes</a> -->
	&nbsp;<select id="sc_select" style="width:140px">
    <option value="none">UX Shortcodes</option>
    <option value="" disabled>--- Layout ---</option>
    <option value='[background bg="http://imageurl" padding="30px" parallax="0" parallax_text="0" dark="false"]<br>Insert content here<br> [/background]'>Background Section</option>
    <option value='[background bg="http://imageurl" padding="30px" parallax="4" parallax_text="0" dark="false"]<br>Insert content here<br> [/background]'>Background Section (Parallax)</option>
    <option value='[row] <br> [col span="12"] Content [/col] [/row]'>Row - Full width</option>
	<option value='[row] <br> [col span="1/4"] Col 1 [/col]  <br>[col span="1/4"] Col 2 [/col] <br> [col span="1/4"] Col 3 [/col] <br> [col span="1/4"] Col 4 [/col] <br> [/row]'>Row - 4 Column</option>
    <option value='[row] <br> [col span="1/4" animate="fadeIn"] Col 1 [/col]  <br>[col span="1/4" animate="fadeInLeft" delay="0.3s"] Col 2 [/col] <br> [col span="1/4" animate="flipInX" delay="0.6s"] Col 3 [/col] <br> [col span="1/4" animate="flipInY" delay="0.9s"] Col 4 [/col] <br> [/row]'>Row - 4 column (Animated)</option>
    <option value='[row] <br> [col span="1/3"] Col 1 [/col] <br> [col span="1/3"] Col 2 [/col] <br> [col span="1/3"] Col 3 [/col] <br> [/row]'>Row - 3 Column</option>
    <option value='[row] <br> [col span="1/2"] Col 1 [/col] <br> [col span="1/2"] Col 2 [/col] <br> [/row]'>Row - 2 Column</option>
    <option value="" disabled>--- UX Sliders ---</option>
    <option value='[ux_slider timer="4500" arrow="true" bullets="true" auto_slide="true"  nav_color="dark"] <br> <br> Insert slides here (UX Banner or Background Section) <br> <br>[/ux_slider]'>UX Slider</option>
   	<option value='[ux_slider timer="4500" arrow="true" bullets="false" height="100px" auto_slide="true"  nav_color="dark"] <br> [col span="1/4"] Content [/col]<br>  [col span="1/4"] Content [/col]<br>  [col span="1/4"] Content [/col]<br>  [col span="1/4"] Content [/col]<br>  [col span="1/4"] Content [/col]<br>  [col span="1/4"] Content [/col]<br>  [col span="1/4"] Content [/col]<br>  [col span="1/4"] Content [/col]<br> [/ux_slider]'>UX Column Slider (4 Columns)</option>
    <option value="" disabled>--- UX Banners ---</option>
    <option value='[ux_banner bg="http://imageurl" height="300px" animation="fadeIn" text_align="center" text_pos="center"]<h4 class="alt-font">Alt Title</h4><h1>Large Title</h1><h3>Medium Title</h3><p>Some text</p>___ <br>[/ux_banner]'>UX Banner</option>
    <option value='[ux_banner bg="http://imageurl" height="300px" animation="fadeIn" text_align="center" text_pos="center" parallax="3" parallax_text="2"] <h1>Banner content</h1>[/ux_banner]'>UX Banner (Parallax)</option>
    <option value='[ux_banner  video_mp4="" video_ogg="" video_webm=""  bg="#000" height="300px" animation="fadeIn" text_align="center" text_pos="center"] <h1>Banner content</h1>[/ux_banner]'>UX Banner Video</option>
    <option value="" disabled>--- Elements ---</option>
    <option value='[button size="medium" style="primary"  text="Button text" link="http://"]'>Button</option>
    <option value='[tabgroup title="Tab group title"]<br>[tab title="Tab 1 Title"] Tab content [/tab]<br>[tab title="Tab 2 Title"] Tab content [/tab]<br>[tab title="Tab 3 Title"] Tab content [/tab]<br>[/tabgroup]'>Tabs Horizontal</option>
    <option value='[tabgroup_vertical title="Tab title"]<br>[tab title="Tab 1 Title"] Tab content [/tab]<br>[tab title="Tab 2 Title"] Tab content [/tab]<br>[tab title="Tab 3 Title"] Tab content [/tab]<br>[/tabgroup_vertical]'>Tabs Vertical</option>
    <option value='[accordion title="Accordian title"]<br><br>[accordion-item title="Accordion Item 1 Title"]<br>Accordion Item 1 Content Goes Here<br>[/accordion-item]<br><br>[accordion-item title="Accordion Item 1 Title"]<br>Accordion Item 1 Content Goes Here<br>[/accordion-item]<br><br>[accordion-item title="Accordion Item 1 Title"]<br> Accordion Item 1 Content Goes Here<br> [/accordion-item]<br><br>[/accordion]'>Accordian</option>
    <option value='[blog_posts posts="6" columns="3" image_height="200px" show_date="true"]'>Blog posts</option>
    <option value='[map lat="40.79028" long="-73.95972" height="500px" color="#58728a"] Map content here.. [/map]'>Map</option>
    <option value='[share title="Share:"]'>Share icons</option>
    <option value='[follow twitter="http://" facebook="http://" email="email@post.com" pinterest="http://" rss="http://" instagram="http://" googleplus="http://"]'>Follow icons</option>
    <option value='[team_member name="Name" title="Title" facebook="http://" twitter="http://" pinterest="http://"  img="http://imageurl"]<br>Team member description<br>[/team_member]'>Team Member</option>
    <option value='[featured_box title="Title text" img="http://iconurl"  pos="center"]<br>Featured box text<br>[/featured_box]'>Featured Box</option>
    <option value='[title text="This is a title" link="" link_text=""]'>Title</option>
    <option value='[title text="This is a centered title" style="center"]'>Title Center</option>
    <option value='[title text="This is a centered title" style="bold_center"]'>Title Bold Center</option>
    <option value='[divider]'>Divider</option>
    <option value='[message_box bg="#hex or http://imageurl"] Message box text [/message_box]'>Message Box</option>
    <option value='[ux_price_table title="Awesome title" featured="false" description="This is a description" button_text="Order Now" button_link="#"]<br>[bullet_item title="This is a bullet item"]<br>[bullet_item title="This is a bullet item"]<br>[bullet_item title="This is a bullet item"]<br>[/ux_price_table]'>Price Table</option>
    <option value="" disabled>--- Featured Items ---</option>
    <option value='[featured_items_slider style="1" items="8" cat="" height="250px"]'>Featured Items Slider</option>
    <option value='[featured_items_slider style="2" items="8" cat="" height="250px"]'>Featured Items Slider - Style 2</option>
    <option value='[featured_items_grid style="1" items="8" cat="" height="250px"]'>Featured Items Grid</option>
    <option value='[featured_items_grid style="2" items="8" cat="" height="250px"]'>Featured Items Grid - Style 2</option>
    <option value="" disabled>--- WooCommerce ---</option>
    <option value='[product_lookbook  cat="category-slug" products="8"]'>Product Lookbook</option>
    <option value='[products_pinterest_style products="" cat="category-slug" columns="4"]'>Pinterest Style Products</option>
    <option value='[ux_bestseller_products products="" columns="4" title="Check our bestsellers!"]'>Product Slider - Bestsellers</option>
    <option value='[ux_custom_products cat="" products="" columns="4" title="Check our bestsellers!"]'>Product Slider - Custom category</option>
    <option value='[ux_featured_products products="" columns="4" title="Check our Featured products!"]'>Product Slider - Featured Products</option>
    <option value='[ux_sale_products columns="4" title="Check our Products on Sale!"]'>Product Slider - Product on Sale</option>
    <option value='[ux_latest_products columns="4" title="Check our Latest products!"]'>Product Slider - Latest products</option>
    <option value='[ux_product_categories number="10" parent="" columns="4" title="Our categories" ]'>Product Categories</option>
    <option value='[ux_product_flip products="8" height="600" cat="women"]'>Product Flip</option>
    ?><?php
    echo '</select>';
}
add_action('admin_head', 'button_js');
function button_js() {
	 ?>
       <script type="text/javascript">
        jQuery(document).ready(function(){
           		jQuery("#sc_select").change(function() {
                          send_to_editor(jQuery("#sc_select :selected").val());
                          jQuery("#sc_select").val("none");
                          return false;
                });

				jQuery("#sc_select2").change(function() {
						  var content = jQuery("#sc_select2 :selected").val();
                          send_to_editor(content);
                          jQuery("#sc_select2").val("none");
                          return false;
                });
        });
        </script> 
        <?php
}