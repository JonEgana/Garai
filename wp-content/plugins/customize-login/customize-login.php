<?php 
/*
   Plugin Name: Customize Login Page
   Plugin URI: http://www.wpsuperplugin.com
   Description: You can easily customize login page
   Version: 1.1
   Author: Mr.Subhash Patel
   Author URI: http://www.wpsuperplugin.com
   */
$wpspandntcuslogin_options = get_option('wpspandntcuslogin');
define( 'CUSTOMIZE_LOGIN_VERSION', '1.1' );
define( 'CUSTOMIZE_LOGIN_PLUGIN_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) );

//Drop Database Table
function wpspandntcuslogin_dropplugin()
{
	global $wpdb;
	delete_option('wpspandntcuslogin');
}
register_uninstall_hook( __FILE__, 'wpspandntcuslogin_dropplugin' );

function wpspandntcuslogin_register_settings() {
	register_setting( 'cuslogin_settings_group', 'wpspandntcuslogin' , 'image_validate_setting');
}

function image_validate_setting($wpspandntcuslogin) { $keys = array_keys($_FILES); $i = 0; foreach ( $_FILES as $image ) {  
 // if a files was upload 
  if ($image['size']) {  
     // if it is an image  
	    if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) {    
		   $override = array('test_form' => false); 
		         // save the file, and store an array, containing its location in $file     
				   $file = wp_handle_upload( $image, $override );    
				      $wpspandntcuslogin[$keys[$i]] = $file['url']; 
					      } 
					  else { 
					        // Not an image.        
							$options = get_option('wpspandntcuslogin');  
							     $wpspandntcuslogin[$keys[$i]] = $options[$logo];   
								       wp_die('No image was uploaded.');     }   }  
									    else {     $options = get_option('wpspandntcuslogin');  
										
										   $wpspandntcuslogin[$keys[$i]] = $options[$keys[$i]];   }   $i++; } return $wpspandntcuslogin;}
										   
//call register settings function
add_action( 'admin_init', 'wpspandntcuslogin_register_settings' );
add_action('admin_menu', 'wpspandntcuslogin_add_page');

function wpspandntcuslogin_add_page() {
	add_options_page('Customize login', 'Customize login', 8, 'customize-login-page', 'wpspandntcusdesign_function');
}

function customiz_login_plugin_url( $path = '' ) {
	$url = untrailingslashit( CUSTOMIZE_LOGIN_PLUGIN_URL );

	if ( ! empty( $path ) && is_string( $path ) && false === strpos( $path, '..' ) )
		$url .= '/' . ltrim( $path, '/' );

	return $url;
}

function wpspandntcusdesign_function() 
{
	global $wpspandntcuslogin_options;
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style( 'wp-color-picker' );
	
	wp_enqueue_script( 'jquerylt', customiz_login_plugin_url( 'js/system_customize.js' ),array(), CUSTOMIZE_LOGIN_VERSION, $in_footer );
	wp_enqueue_style( 'system_customize', customiz_login_plugin_url( 'css/system_customize.css' ),array(), CUSTOMIZE_LOGIN_VERSION, 'all' );
?>


<h2>Customize Login Page</h2>
<form action="options.php" enctype="multipart/form-data" method="post" name="cusloginpage" id="cusloginpage">
  <?php settings_fields( 'cuslogin_settings_group' ); ?>
  <table class="form-table">
    <tr valign="top">
      <th scope="row"> <label for="changelogourl">Enable Custom Design?:</label>
      </th>
      <td><input id="wpspandntcuslogin[enable]" onClick="return autofillchecknew(this.value);" name="wpspandntcuslogin[enable]" type="checkbox" value="1" <?php checked( '1', $wpspandntcuslogin_options['enable'] ); ?>/>
       </td>
    </tr>
    </table>
     <?php
	  if($wpspandntcuslogin_options['enable']=='1'){ ?>
      <div id="divonenew" style="display:block;">
      <?php } 
	  if($wpspandntcuslogin_options['enable']=='') { ?>
      <div id="divonenew" style="display:none;">
        <?php } ?>
        <table class="form-table">
		<tr class="border-bottom"><th scope="row">Logo</th><td>&nbsp;</td></tr>
        <tr valign="top">
			<td scope="row" class="tr_width"> Logo Set:</td>
			  <td><p>
				  <?php if($wpspandntcuslogin_options['cuslog_setlogo']!='') { ?>
				  <input type="radio" id="wpspandntcuslogin_fulllogo" onClick="return changeurlandpage(this.value);" name="wpspandntcuslogin[cuslog_setlogo]" value="fulllogo" <?php checked( 'fulllogo', $wpspandntcuslogin_options['cuslog_setlogo'] ); ?>/>
				  <label class="mar_right">Logo</label>
				  <input type="radio" id="wpspandntcuslogin_iconlogo" onClick="return changeurlandpage(this.value);" name="wpspandntcuslogin[cuslog_setlogo]" value="iconlogo" <?php checked( 'iconlogo', $wpspandntcuslogin_options['cuslog_setlogo'] ); ?> />
				  <label>Thumbnail Logo</label>  
				  <br/>
				  <?php } else { ?>
				  <input type="radio" id="wpspandntcuslogin_fulllogo" onClick="return changeurlandpage(this.value);" name="wpspandntcuslogin[cuslog_setlogo]" value="fulllogo" checked="checked"/>
				  <label class="mar_right">Logo</label>
				  <input type="radio" id="wpspandntcuslogin_iconlogo" onClick="return changeurlandpage(this.value);" name="wpspandntcuslogin[cuslog_setlogo]" value="iconlogo" />
				  <label>Thumbnail Logo</label>
				  <br/>
				  <?php	} ?></p></td>
    </tr>
    </table>
    <?php if($wpspandntcuslogin_options['cuslog_setlogo']=='fulllogo' || $wpspandntcuslogin_options['cuslog_setlogo']=='') { ?>
    <div id="rdpages" style="display:block;">
    <?php } else if($wpspandntcuslogin_options['cuslog_setlogo']=='iconlogo') { ?>
    <div id="rdpages" style="display:none;">
        <?php } ?>
		<table class="form-table">
			<tr valign="top">
				<td scope="row" class="tr_width">Change Logo:</td>
				<td><p><input type="file" class="regular-text" name="cuslog_logochange" id="cuslog_logochange" value="<?php echo $wpspandntcuslogin_options['cuslog_logochange']; ?>" />Please upload image 280*85
				<?php if($wpspandntcuslogin_options['cuslog_logochange']!=""){ ?>
				<p><img src="<?php echo $wpspandntcuslogin_options['cuslog_logochange']; ?>" width="280" height="85" /></p>
				<?php } ?>
				</p></td>
			</tr>
		</table>
	</div>
        
    <?php if($wpspandntcuslogin_options['cuslog_setlogo']=='fulllogo' || $wpspandntcuslogin_options['cuslog_setlogo']=='') { ?>
    <div id="rdurl" style="display:none;">
      <?php } else if($wpspandntcuslogin_options['cuslog_setlogo']=='iconlogo') { ?>
    <div id="rdurl" style="display:block;">
        <?php } ?>
		<table class="form-table">
			<tr valign="top">
				<td scope="row" class="tr_width">Change Logo:</td>
				<td><p><input type="file" class="regular-text" name="cuslog_smalllogochange" id="cuslog_smalllogochange" value="<?php echo $wpspandntcuslogin_options['cuslog_smalllogochange']; ?>" />Please upload image 64*64
					<?php if($wpspandntcuslogin_options['cuslog_smalllogochange']!=""){ ?>
					<p>
					<img src="<?php echo $wpspandntcuslogin_options['cuslog_smalllogochange']; ?>" width="64" /></p>
					<?php } ?>
					</p>
				</td>
			</tr>
		</table>
    </div>
    
    <table class="form-table">
    <tr valign="top">
      <td scope="row" class="tr_width">Change Logo Url:
      </td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_logourl]" id="cuslog_logourl" value="<?php echo $wpspandntcuslogin_options['cuslog_logourl'];?>"  /></td>
    </tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Change Logo Title:
      </td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_logotitle]" id="cuslog_logotitle" value="<?php echo $wpspandntcuslogin_options['cuslog_logotitle'];?>"  /></td>
    </tr>
	<tr valign="top">
      <td scope="row" class="tr_width">&nbsp;
      </td><td>&nbsp;</td>
	</tr>
	<tr class="border-bottom"><th scope="row">HTML</th><td>&nbsp;</td></tr>
	<tr valign="top">
      <td scope="row" class="tr_width">Background Image:
      </td>
      <td>
      <p><input type="file" class="regular-text" name="cuslog_backgroundimage" id="cuslog_backgroundimage" value="<?php echo $wpspandntcuslogin_options['cuslog_backgroundimage']; ?>" />
              <?php if($wpspandntcuslogin_options['cuslog_backgroundimage']!=""){ ?>
              <p>
              <img src="<?php echo $wpspandntcuslogin_options['cuslog_backgroundimage']; ?>" width="200" /></p>
              <?php } ?>
              </p>
      </td>
    </tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Background Color:</td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_imagecolor]" id="cuslog_imagecolor" value="<?php if($wpspandntcuslogin_options['cuslog_imagecolor']!=""){ echo $wpspandntcuslogin_options['cuslog_imagecolor']; } else { echo "#f1f1f1"; }?>" data-default-color="#f1f1f1" /></td>
    </tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Background Set:
      </td>
      <td><p>
          <?php if($wpspandntcuslogin_options['cuslog_back']!='' ) { ?>
          <input type="radio" id="wpspandntcuslogin_backcolor" name="wpspandntcuslogin[cuslog_back]" value="backcolor" <?php checked( 'backcolor', $wpspandntcuslogin_options['cuslog_back'] ); ?>/>
          Background Color
          <input type="radio" id="wpspandntcuslogin_backimg" name="wpspandntcuslogin[cuslog_back]" value="backimg" <?php checked( 'backimg', $wpspandntcuslogin_options['cuslog_back'] ); ?> />
          Background Image
          <br/>
          <?php } else { ?>
          <input type="radio" id="wpspandntcuslogin_backcolor" name="wpspandntcuslogin[cuslog_back]" value="backcolor" checked="checked"/>
          Background Color
          <input type="radio" id="wpspandntcuslogin_backimg" name="wpspandntcuslogin[cuslog_back]" value="backimg" />
          Background Image
          <br/>
          <?php	} ?></td>
    </tr>
	<tr valign="top">
		<td scope="row" class="tr_width">Background size:</td>
		<td><select name="wpspandntcuslogin[cuslog_imagebghtmlsize]" id="cuslog_imagebghtmlsize" style="width:100px">
		<option value="none" <?php if($wpspandntcuslogin_options['cuslog_imagebghtmlsize']=='none'){ echo 'selected="selected"'; } ?>>none</option>
		<option value="cover" <?php if($wpspandntcuslogin_options['cuslog_imagebghtmlsize']=='cover' || $wpspandntcuslogin_options['cuslog_imagebghtmlsize']==''){ echo 'selected="selected"'; } ?>>cover</option>
		<option value="contain" <?php if($wpspandntcuslogin_options['cuslog_imagebghtmlsize']=='contain'){ echo 'selected="selected"'; } ?>>contain</option>
		<option value="flex" <?php if($wpspandntcuslogin_options['cuslog_imagebghtmlsize']=='flex'){ echo 'selected="selected"'; } ?>>flex</option>
		</select><td>
	</tr>
    <tr valign="top">
		<td scope="row" class="tr_width">Background Horizontal Position: </td>
		<td><select name="wpspandntcuslogin[cuslog_imagebghorpos]" id="cuslog_imagebghorpos" style="width:100px">
			<option <?php if($wpspandntcuslogin_options['cuslog_imagebghorpos']=='left top'){ echo 'selected="selected"'; } ?> value="left top">left top</option>
			<option <?php if($wpspandntcuslogin_options['cuslog_imagebghorpos']=='left center'){ echo 'selected="selected"'; } ?> value="left center">left center</option>
			<option <?php if($wpspandntcuslogin_options['cuslog_imagebghorpos']=='left bottom'){ echo 'selected="selected"'; } ?> value="left">left bottom</option>
			<option <?php if($wpspandntcuslogin_options['cuslog_imagebghorpos']=='center top'){ echo 'selected="selected"'; } ?> value="center top">center top</option>
			<option <?php if($wpspandntcuslogin_options['cuslog_imagebghorpos']=='center center' || $wpspandntcuslogin_options['cuslog_imagebghorpos']==''){ echo 'selected="selected"'; } ?> value="center center">center center</option>
			<option <?php if($wpspandntcuslogin_options['cuslog_imagebghorpos']=='center bottom'){ echo 'selected="selected"'; } ?> value="center bottom">center bottom</option>
			<option <?php if($wpspandntcuslogin_options['cuslog_imagebghorpos']=='right top'){ echo 'selected="selected"'; } ?> value="right top">right top</option>
			<option <?php if($wpspandntcuslogin_options['cuslog_imagebghorpos']=='right center'){ echo 'selected="selected"'; } ?> value="right center">right center</option>
			<option <?php if($wpspandntcuslogin_options['cuslog_imagebghorpos']=='right bottom'){ echo 'selected="selected"'; } ?> value="right bottom">right bottom</option>
			</select></td>
    </tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Background element:
      </td>
      <td><select name="wpspandntcuslogin[cuslog_imagerepeat]" id="cuslog_imagerepeat" style="width:100px">
	<option <?php if($wpspandntcuslogin_options['cuslog_imagerepeat']=='no-repeat'){ echo 'selected="selected"'; } ?> value="no-repeat">no-repeat</option>
    <option <?php if($wpspandntcuslogin_options['cuslog_imagerepeat']=='repeat-x'){ echo 'selected="selected"'; } ?> value="repeat-x">repeat-x</option>
    <option <?php if($wpspandntcuslogin_options['cuslog_imagerepeat']=='repeat-y'){ echo 'selected="selected"'; } ?> value="repeat-y">repeat-y</option>
    <option <?php if($wpspandntcuslogin_options['cuslog_imagerepeat']=='repeat' || $wpspandntcuslogin_options['cuslog_imagerepeat']==''){ echo 'selected="selected"'; } ?> value="repeat">repeat</option>
  </select></td>
    </tr>
	<tr valign="top">
      <td scope="row" class="tr_width">&nbsp;
      </td><td>&nbsp;</td>
	</tr>
	<tr class="border-bottom"><th scope="row">Login Form</th><td>&nbsp;</td></tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Background Image:
      </td>
      <td>
      <p><input type="file" class="regular-text" name="cuslog_innerimageurl" id="cuslog_innerimageurl" value="<?php echo $wpspandntcuslogin_options['cuslog_innerimageurl']; ?>" />
              <?php if($wpspandntcuslogin_options['cuslog_innerimageurl']!=""){ ?>
              <p>
              <img src="<?php echo $wpspandntcuslogin_options['cuslog_innerimageurl']; ?>" width="200" /></p>
              <?php } ?>
              </p>
      </td>
    </tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Background Color:
      </td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_innerimagecolor]" id="cuslog_innerimagecolor" value="<?php if($wpspandntcuslogin_options['cuslog_innerimagecolor']!=""){ echo $wpspandntcuslogin_options['cuslog_innerimagecolor']; } else { echo "#000000"; }?>"  data-default-color="#000000"  /></td>
    </tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Background Set:
      </td>
      <td><p>
          <?php if($wpspandntcuslogin_options['cuslog_innerback']!='' ) { ?>
			  <input type="radio" id="wpspandntcuslogin_innerbackcolor" name="wpspandntcuslogin[cuslog_innerback]" value="innerbackcolor" <?php checked( 'innerbackcolor', $wpspandntcuslogin_options['cuslog_innerback'] ); ?>/>
			  Inner Background Color
			  <input type="radio" id="wpspandntcuslogin_innerbackimg" name="wpspandntcuslogin[cuslog_innerback]" value="innerbackimg" <?php checked( 'innerbackimg', $wpspandntcuslogin_options['cuslog_innerback'] ); ?> />
			 Inner Background Image
			  <br/>
          <?php } else { ?>
			  <input type="radio" id="wpspandntcuslogin_innerbackcolor" name="wpspandntcuslogin[cuslog_innerback]" value="innerbackcolor" checked="checked"/>
			  Inner Background Color
			  <input type="radio" id="wpspandntcuslogin_innerbackimg" name="wpspandntcuslogin[cuslog_innerback]" value="innerbackimg" />
			  Inner Background Image
			  <br/>
          <?php	} ?></td>
    </tr>
	<tr valign="top">
      <td scope="row" class="tr_width">Background size:</td>
	  <td> 
		<select name="wpspandntcuslogin[cuslog_innerbackimagebgsize]" id="cuslog_innerbackimagebgsize" style="width:100px">
		<option value="none" <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebgsize']=='none'){ echo 'selected="selected"'; } ?>>none</option>
		<option value="cover" <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebgsize']=='cover' || $wpspandntcuslogin_options['cuslog_innerbackimagebgsize']==''){ echo 'selected="selected"'; } ?>>cover</option>
		<option value="contain" <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebgsize']=='contain'){ echo 'selected="selected"'; } ?>>contain</option>
		<option value="flex" <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebgsize']=='flex'){ echo 'selected="selected"'; } ?>>flex</option>
		</select>
	<td>
	</tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Background Horizontal Position:
      </td>
      <td><select name="wpspandntcuslogin[cuslog_innerbackimagebghorpos]" id="cuslog_innerbackimagebghorpos" style="width:100px">
    <option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebghorpos']=='left top'){ echo 'selected="selected"'; } ?> value="left top">left top</option>
	<option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebghorpos']=='left center'){ echo 'selected="selected"'; } ?> value="left center">left center</option>
	<option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebghorpos']=='left bottom'){ echo 'selected="selected"'; } ?> value="left">left bottom</option>
    <option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebghorpos']=='center top'){ echo 'selected="selected"'; } ?> value="center top">center top</option>
	<option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebghorpos']=='center center' || $wpspandntcuslogin_options['cuslog_innerbackimagebghorpos']==''){ echo 'selected="selected"'; } ?> value="center center">center center</option>
	<option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebghorpos']=='center bottom'){ echo 'selected="selected"'; } ?> value="center bottom">center bottom</option>
    <option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebghorpos']=='right top'){ echo 'selected="selected"'; } ?> value="right top">right top</option>
	<option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebghorpos']=='right center'){ echo 'selected="selected"'; } ?> value="right center">right center</option>
	<option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagebghorpos']=='right bottom'){ echo 'selected="selected"'; } ?> value="right bottom">right bottom</option>
  </select></td>
    </tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Background element:
      </td>
      <td><select name="wpspandntcuslogin[cuslog_innerbackimagerepeat]" id="cuslog_innerbackimagerepeat" style="width:100px">
	<option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagerepeat']=='no-repeat'){ echo 'selected="selected"'; } ?> value="no-repeat">no-repeat</option>
    <option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagerepeat']=='repeat-x'){ echo 'selected="selected"'; } ?> value="repeat-x">repeat-x</option>
    <option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagerepeat']=='repeat-y'){ echo 'selected="selected"'; } ?> value="repeat-y">repeat-y</option>
    <option <?php if($wpspandntcuslogin_options['cuslog_innerbackimagerepeat']=='repeat' || $wpspandntcuslogin_options['cuslog_innerbackimagerepeat']==''){ echo 'selected="selected"'; } ?> value="repeat">repeat</option>
  </select></td>
    </tr>
	<tr valign="top">
      <td scope="row" class="tr_width">&nbsp;
      </td><td>&nbsp;</td>
	</tr>
	<tr class="border-bottom"><th scope="row">Color Setting</th><td>&nbsp;</td></tr>
	</tr>
	<tr valign="top">
      <td scope="row" class="tr_width bg"><strong>1. Form box color</strong>
      </td><td>&nbsp;</td>
	</tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Label Color:
      </td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_bgtxtcolor]" id="cuslog_bgtxtcolor" value="<?php if($wpspandntcuslogin_options['cuslog_bgtxtcolor']!=""){ echo $wpspandntcuslogin_options['cuslog_bgtxtcolor']; } else { echo "#777777"; }?>" data-default-color="#777777"  /></td>
    </tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Shadow Color:
      </td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_bgtxtshcolor]" id="cuslog_bgtxtshcolor" value="<?php if($wpspandntcuslogin_options['cuslog_bgtxtshcolor']!=""){ echo $wpspandntcuslogin_options['cuslog_bgtxtshcolor']; } else { echo "#000000"; }?>"  data-default-color="#000000" /></td>
    </tr>
	<tr valign="top">
      <td scope="row" class="tr_width">&nbsp;
      </td><td>&nbsp;</td>
	</tr>
	<tr valign="top">
      <td scope="row" class="tr_width bg"><strong>2. Error color</strong>
      </td><td>&nbsp;</td>
	</tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Error Background Message Color:
      </td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_errormsgcolor]" id="cuslog_errormsgcolor" value="<?php if($wpspandntcuslogin_options['cuslog_errormsgcolor']!=""){ echo $wpspandntcuslogin_options['cuslog_errormsgcolor']; } else { echo "#ffffff"; }?>"  data-default-color="#ffffff" /></td>
    </tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Error Text Message Color:
      </td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_errormsgtxtcolor]" id="cuslog_errormsgtxtcolor" value="<?php if($wpspandntcuslogin_options['cuslog_errormsgtxtcolor']!=""){ echo $wpspandntcuslogin_options['cuslog_errormsgtxtcolor']; } else { echo "#444444"; }?>" data-default-color="#444444" /></td>
    </tr>
	<tr valign="top">
      <td scope="row" class="tr_width">&nbsp;
      </td><td>&nbsp;</td>
	</tr>
	<tr valign="top">
      <td scope="row" class="tr_width bg"><strong>3. Link color</strong>
      </td><td>&nbsp;</td>
	</tr>
    <tr valign="top">
      <td scope="row" class="tr_width">Text Link Color:
      </td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_bgtxtlinkcolor]" id="cuslog_bgtxtlinkcolor" value="<?php if($wpspandntcuslogin_options['cuslog_bgtxtlinkcolor']!=""){ echo $wpspandntcuslogin_options['cuslog_bgtxtlinkcolor']; } else { echo "#999999"; }?>" data-default-color="#999999" /></td>
    </tr>
	<tr valign="top">
      <td scope="row" class="tr_width">Text Link Shadow Color:
      </td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_bgtxtlinkshcolor]" id="cuslog_bgtxtlinkshcolor" value="<?php if($wpspandntcuslogin_options['cuslog_bgtxtlinkshcolor']!=""){ echo $wpspandntcuslogin_options['cuslog_bgtxtlinkshcolor']; } else { echo "#ffffff"; }?>"  data-default-color="#ffffff" /></td>
    </tr>
	<tr valign="top">
      <td scope="row" class="tr_width">Text Link Hover Color:
      </td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_bgtxtlinkhovercolor]" id="cuslog_bgtxtlinkhovercolor" value="<?php if($wpspandntcuslogin_options['cuslog_bgtxtlinkhovercolor']!=""){ echo $wpspandntcuslogin_options['cuslog_bgtxtlinkhovercolor']; } else { echo "#00a0d2"; }?>" data-default-color="#00a0d2" /></td>
    </tr>
	<tr valign="top">
      <td scope="row" class="tr_width">Text Link Shadow Hover Color:
      </td>
      <td><input type="text" class="regular-text" name="wpspandntcuslogin[cuslog_bgtxtlinkshhovercolor]" id="cuslog_bgtxtlinkshhovercolor" value="<?php if($wpspandntcuslogin_options['cuslog_bgtxtlinkshhovercolor']!=""){ echo $wpspandntcuslogin_options['cuslog_bgtxtlinkshhovercolor']; } else { echo "#ffffff"; }?>"  data-default-color="#ffffff" /></td>
    </tr>
  </table>
  </div>
  <p class="submit"><input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit"></p>
</form>
<?php
}


function cs_loginimg() { 
	global $wpdb;
	global $wpspandntcuslogin_options;
	if($wpspandntcuslogin_options['enable']=='1'){
		$customlogo ='<style type="text/css">';
		$customlogo .='@media screen and (max-width: 641px) {
			html{
				  overflow: unset !important;
			}
		}';
		
		//Logo change
		if($wpspandntcuslogin_options['cuslog_setlogo']!="")
		{
			if($wpspandntcuslogin_options['cuslog_setlogo']=="fulllogo")
			{
				if($wpspandntcuslogin_options['cuslog_logochange']!="")
				{
				$customlogo .='.login h1 a {background: url('.$wpspandntcuslogin_options['cuslog_logochange'].') no-repeat scroll  !important;  background-position:center !important; background-size: 274px 63px !important; width:320px !important; }';
				}
			}
			else
			{
				if($wpspandntcuslogin_options['cuslog_smalllogochange']!="")
				{
				$customlogo .='.login h1 a {background: url('.$wpspandntcuslogin_options['cuslog_smalllogochange'].') no-repeat scroll  !important;  background-position:center !important;  }';
				}
			}
		  
		}
		
		//Background image
		if($wpspandntcuslogin_options['cuslog_backgroundimage']!="" || $wpspandntcuslogin_options['cuslog_imagecolor']!="")
		{
			
			if($wpspandntcuslogin_options['cuslog_back']=="backimg")
			{
				$customlogo .= 'html {
					background-color: '.$wpspandntcuslogin_options['cuslog_imagecolor'].';
					background-image: url('.$wpspandntcuslogin_options['cuslog_backgroundimage'].');
					background-position: '.$wpspandntcuslogin_options['cuslog_imagebghorpos'].';
					background-repeat: '.$wpspandntcuslogin_options['cuslog_imagerepeat'].';
					background-size: '.$wpspandntcuslogin_options['cuslog_imagebghtmlsize'].';
					overflow: hidden;
				}';
			}
		
			if($wpspandntcuslogin_options['cuslog_back']=="backcolor")
			{
				$customlogo .= 'html {
					background-color: '.$wpspandntcuslogin_options['cuslog_imagecolor'].';
					overflow: hidden;
				}';
				$customlogo .= 'html, .wp-dialog {background-color: '.$wpspandntcuslogin_options['cuslog_imagecolor'].';}';
			}
		}  
		  
		
		
		if($wpspandntcuslogin_options['cuslog_bgtxtcolor']!="")
		{
			$customlogo .='.login label { color: '.$wpspandntcuslogin_options['cuslog_bgtxtcolor'].'; font-size: 14px; }';
		}


		if($wpspandntcuslogin_options['cuslog_innerimageurl']!="" || $wpspandntcuslogin_options['cuslog_innerimagecolor']!="")
		{
			if($wpspandntcuslogin_options['cuslog_innerback']=='innerbackimg')
			{ 
				$customlogo .= '.login #loginform {
					background-color: '.$wpspandntcuslogin_options['cuslog_innerimagecolor'].' !important;
					background-image: url('.$wpspandntcuslogin_options['cuslog_innerimageurl'].') !important;
					background-position: '.$wpspandntcuslogin_options['cuslog_innerbackimagebghorpos'].' !important;
					background-repeat: '.$wpspandntcuslogin_options['cuslog_innerbackimagerepeat'].' !important;
					background-size: '.$wpspandntcuslogin_options['cuslog_innerbackimagebgsize'].' !important;
					overflow: hidden;
				}';
				
				$customlogo .= '.login #lostpasswordform {
					background-color: '.$wpspandntcuslogin_options['cuslog_innerimagecolor'].' !important;
					background-image: url('.$wpspandntcuslogin_options['cuslog_innerimageurl'].') !important;
					background-position: '.$wpspandntcuslogin_options['cuslog_innerbackimagebghorpos'].' !important;
					background-repeat: '.$wpspandntcuslogin_options['cuslog_innerbackimagerepeat'].' !important;
					background-size: '.$wpspandntcuslogin_options['cuslog_innerbackimagebgsize'].' !important;
					overflow: hidden;
				}';
				//$customlogo .='.login form{ background:none !important; margin-left:0px !important; border:none !important; box-shadow:none !important;}';
			}
			if($wpspandntcuslogin_options['cuslog_innerback']=='innerbackcolor')
			{
				$customlogo .='.login #loginform { background-color: '.$wpspandntcuslogin_options['cuslog_innerimagecolor'].' !important;  }
								.login form{ background:none !important; margin-left:0px !important; border:none !important; box-shadow:none !important;}';  
		  
				$customlogo .= '.login form {
								background-color: '.$wpspandntcuslogin_options['cuslog_innerimagecolor'].' !important;
				}';
			}
		}

		if($wpspandntcuslogin_options['cuslog_bgtxtshcolor']!="")
		{	
			$customlogo .='.login #loginform { box-shadow: 0 1px 26px 0px '.$wpspandntcuslogin_options['cuslog_bgtxtshcolor'].' !important; }';
			$customlogo .= '#login { border-radius: 5px 5px 5px 5px; margin: 7em auto 0; padding: 0 0 20px; }';
		}	
		  
			
		if($wpspandntcuslogin_options['cuslog_errormsgcolor']!="")
		{
			$customlogo .= '.login .message {background-color: '.$wpspandntcuslogin_options['cuslog_errormsgcolor'].' !important; border-color: #E6DB55 !important; color:'.$wpspandntcuslogin_options['cuslog_errormsgtxtcolor'].' !important; }';
			$customlogo .= 'div.error, .login #login_error {background-color: '.$wpspandntcuslogin_options['cuslog_errormsgcolor'].' !important; border-color: #E6DB55 !important; color:'.$wpspandntcuslogin_options['cuslog_errormsgtxtcolor'].' !important; }';
			$customlogo .= 'body.login { background:no-repeat center;  } 
			#login_error, .login .message { margin: 0px !important;}';
		}
		
		if($wpspandntcuslogin_options['cuslog_bgtxtlinkcolor']!="")
		{	
			$customlogo .= '.login #nav a, .login #backtoblog a {  color: '.$wpspandntcuslogin_options['cuslog_bgtxtlinkcolor'].' !important; }';
			$customlogo .= '#login_error a{ color: '.$wpspandntcuslogin_options['cuslog_bgtxtlinkcolor'].' !important; }';
		}	
	  
		if($wpspandntcuslogin_options['cuslog_bgtxtlinkshcolor']!="")
		{	
			$customlogo .= '.login #nav, .login #backtoblog {  text-shadow: 0 1px 0 '.$wpspandntcuslogin_options['cuslog_bgtxtlinkshcolor'].' !important; }';
		}
		
		if($wpspandntcuslogin_options['cuslog_bgtxtlinkhovercolor']!="")
		{	
			$customlogo .= '.login #nav a:hover, .login #backtoblog a:hover {  color: '.$wpspandntcuslogin_options['cuslog_bgtxtlinkhovercolor'].' !important; }';
			$customlogo .= '#login_error a:hover{ color: '.$wpspandntcuslogin_options['cuslog_bgtxtlinkhovercolor'].' !important; }';
			
		}
		
		if($wpspandntcuslogin_options['cuslog_bgtxtlinkshhovercolor']!="")
		{	
			$customlogo .= '.login #nav a:hover, .login #backtoblog a:hover {  text-shadow: 0 1px 0 '.$wpspandntcuslogin_options['cuslog_bgtxtlinkshhovercolor'].' !important; }';
		}
			
		$customlogo .= '.login #nav, .login #backtoblog { float: left; margin: 0 0 0 16px; padding: 40px 2px 0;  }
		  </style>
			<!--[if IE 8]>  
			<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/customize-login/ie8.css">  
			<![endif]-->  ';
		echo $customlogo;
	}
}
add_action('login_head', 'cs_loginimg');

//Admin logo url change start
function customlogin_headerurl()
{
	global $wpspandntcuslogin_options;
	return $wpspandntcuslogin_options['cuslog_logourl'];
}

function changelogin_headertitle() 	
{
	global $wpspandntcuslogin_options;
	return $wpspandntcuslogin_options['cuslog_logotitle'];
}
add_filter('login_headerurl', 'customlogin_headerurl');
add_filter('login_headertitle', 'changelogin_headertitle');
//Admin logo url change end
?>
