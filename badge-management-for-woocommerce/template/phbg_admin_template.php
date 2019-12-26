<?php
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
}
/*********************************************************************************************

 this function will used to create the form to add the badge
/********************************************************************************************/

function phbg_new_badge()
{
		
	/**********************************form to add badges**************************************************/
	echo'<div class="tab-container">
	
	<input type="hidden" value="1" id="check_post">
				<ul class="custom-post">
					<li><a id="btn-text"  style="border-left:solid 1px;border-right:solid 1px;border-top:solid 1px;" href="#tab-text">Text Badge</a></li>
					<li><a id="btn-image" style="background-color:#F0F0F0 ;" href="#tab-image">Image Badge</a></li>
				</ul>
		 </div><br />

		<div id="txt-content">

		<fieldset style=" float:left;"><legend class="bg_legend">Text Option</legend><table>
	<tr><td>Text</td><td><input type="text" id="b_text"  name="b_text"></td></tr>
	<tr><td>Text Color</td><td id="t_color"><input type="text" class="color-field-txt"  value="#FFFFFF" id="txt_color" name="txt_color"></td></tr>


	</table></fieldset>
	<div id="pre_pane" style="width:150px; height:150px; background-color:#ccc; float:right; position:relative;">
	<div id="inner_pre" style="height:50px;  text-align:center;width:50px; color:#ffffff; position: absolute;  background-color:blue;"></div>
	</div>
	<br /><br /><br /><br /><br /><br />
	<fieldset><legend class="bg_legend">Style Option</legend><table>
	<tr><td>Background Color</td><td id="bg_color"><input type="text" value="#0000FF" id="b_color" class="color-field" name="bg_color"></td></tr>
	<tr><td>Size(pixels)</td><td><input type="text" style="width:70px;" value="50" placeholder="width" id="size_w" name="size_w">*<input type="text"  placeholder="height"  id="size_h" value="50" name="size_h" style="width:70px"></td></tr>


	</table></fieldset>
	<br />

	<fieldset><legend class="bg_legend">Position</legend><table>
	<tr><td>Position</td><td><select class="update-preview" name= "badge_pos" id="badge_pos">
											<option value="top-left"  selected="selected">top-left</option>;
											<option value="top-right" >top-right</option>;
											<option value="bottom-left" >bottom-left</option>;
											<option value="bottom-right" >bottom-right</option>;
										</select></td></tr>
	</table></fieldset><br />

	';
	echo '
	</div>
	<div id="img-content" style="display:none">
		<fieldset style="float:left"><legend class="bg_legend">Select Images</legend>
			<table>';
				echo"<tr><td><img src='".PHBGPLUG_PATH."assets/images/1.png' alt='1.png'></td><td><img  src='".PHBGPLUG_PATH."assets/images/2.png' alt='2.png'></td><td><img src='".PHBGPLUG_PATH."assets/images/4.png'  alt='4.png'></td><td><img  src='".PHBGPLUG_PATH."assets/images/3.png' alt='3.png'></td><td><img  src='".PHBGPLUG_PATH."assets/images/5.png' alt='5.png'></td></tr>
			</table>
		</fieldset>
		";
	echo'<div id="pre_pane1" style="width:150px; height:150px; float:right; background-color:#ccc; position:relative;">
	<div id="inner_pre1" style="height:50px; text-align:center; width:50px; position:absolute;"><img src="'.PHBGPLUG_PATH.'assets/images/1.png" id="pre_img"></div>
	</div>
	<br /><br /><br /><br /><br /><br />
	<fieldset><legend class="bg_legend">Position</legend class="bg_legend"><table>
	<tr><td>Position</td><td><select class="update-preview" name= "badge_pos1" id="badge_pos1">
											<option value="top-left"  selected="selected">top-left</option>;
											<option value="top-right" >top-right</option>;
											<option value="bottom-left" >bottom-left</option>;
											<option value="bottom-right" >bottom-right</option>;
										</select></td></tr>
	</table></fieldset><br /><br />
	<input type="hidden" name="img_path" id="img_path" value="1.png">
	<input type="hidden" name="b_title" id="b_title" >
	<input type="hidden" name="badge_type" id="badge_type" value="1">

	</div>
	<br />
	<br />';		
	
}

/************ this function will show the form to edit the badge***********************/

function phbg_edit_badge()
{
		
	$post_id=isset($_GET['post'])?sanitize_text_field($_GET['post']):'';		
	$res=get_post_meta($post_id,'_phoe_badge');
	$row=json_decode($res[0]);
	$pos=phbg_set_pos($row->position);
		
	/**********************************form to add badges**************************************************/
	echo'<input type="hidden" name="edit_value" id="edit_value" value="1" > 
		<div class="tab-container">
				<ul class="custom-post">';
			if($row->type=='text')
			{
				 echo'<li><a id="btn-text" style="border-left:solid 1px;border-right:solid 1px;border-top:solid 1px;" href="#tab-text">Text Badge</a></li>
					<li><a id="btn-image" style="background-color:#F0F0F0 ;" href="#tab-image">Image Badge</a></li>
				</ul></div>';
			}
			else
			{
				 echo'<li><a id="btn-text"  style="background-color:#F0F0F0 ; href="#tab-text">Text Badge</a></li>
						 <li><a id="btn-image" href="#tab-image" style="border-left:solid 1px;border-right:solid 1px;border-top:solid 1px;">Image Badge</a></li>
				</ul></div>';
			}
				   
		if($row->type=='img')
		{
			echo'<div id="txt-content" style="display:none;">';
		}
		else
		{
			echo'<div id="txt-content">';
		}
		
		echo'<br /><br /><fieldset style=" float:left;"><legend class="bg_legend">Text Option</legend><table>
	<tr><td>Text</td><td><input type="text" value="';if($row->type=='text'){echo$row->text;} echo'" id="b_text" name="b_text"></td></tr>
	<tr><td>Text Color</td><td id="t_color"><input type="text" class="color-field-txt" id="txt_color" value="'; if($row->type=='text')echo $row->txt_color; else echo "#FFFFFF;";  echo'" name="txt_color"></td></tr>
	</table></fieldset>
	<div id="pre_pane" style="width:150px; height:150px; background-color:#ccc; float:right; position:relative;">
	<div id="inner_pre" style="'.$pos.' text-align:center;height:'; if($row->type=='text')echo $row->height.'px;'; else echo "50px;"; echo ' width:'; if($row->type=='text')echo $row->width.'px;'; else echo "50px;";  echo'  background-color:';  if($row->type=='text')echo $row->bg_color; else echo "blue;";  echo'; color:'; if($row->type=='text')echo $row->txt_color; else echo "#ffffff;";  echo'">'.$row->text.'
	</div></div>
	<br /><br /><br /><br /><br /><br />
	<fieldset><legend class="bg_legend">Style Option</legend><table>
	<tr><td>Background Color</td><td id="bg_color"><input type="text" value="'; if($row->type=='text')echo $row->bg_color; else echo "blue";  echo'" id="b_color" class="color-field" name="bg_color"></td></tr>
	<tr><td>Size(pixels)</td><td><input type="text" style="width:70px" value="'; if($row->type=='text')echo $row->width; else echo "50";  echo'" placeholder="width" id="size_w" name="size_w">*<input type="text"  placeholder="height"  id="size_h" value="';  if($row->type=='text')echo $row->height; else echo "50"; echo'" name="size_h" style="width:70px"></td></tr>
	</table></fieldset>
	<br /> 
	';
	echo'
	<fieldset><legend class="bg_legend">Position</legend><table>
	<tr><td>Position</td><td><select class="update-preview" name= "badge_pos" id="badge_pos">
										  <option value="top-left"'; if($row->position=='top-left'){echo "selected";} 
					  echo'>top-left</option>;<option value="top-right"'; if($row->position=='top-right'){echo "selected";}  					  echo'>top-right</option><option value="bottom-left"'; if($row->position=='bottom-left'){echo "selected";}  					  echo'>bottom-left</option><option value="bottom-right"';if($row->position=='bottom-right'){echo "selected";}
					  echo'>bottom-right</option></select></td></tr>
	</table></fieldset><br />';
	echo '</div>';
		if($row->type=='text')
		{
		 echo'<div id="img-content" style="display:none;">';
		}
		else
		{
		echo'<div id="img-content">';
		}

	echo '<fieldset style="float:left"><legend class="bg_legend">Select Images</legend>
			<table>';
	echo"<tr><td><img src='".PHBGPLUG_PATH."assets/images/1.png' alt='1.png'></td><td><img  src='".PHBGPLUG_PATH."assets/images/2.png' alt='2.png'></td><td><img src='".PHBGPLUG_PATH."assets/images/4.png' alt='4.png' ></td><td><img  src='".PHBGPLUG_PATH."assets/images/3.png' alt='3.png'></td><td><img  src='".PHBGPLUG_PATH."assets/images/5.png' alt='5.png'></td></tr>
			</table>
		</fieldset>
		";
	echo'<div id="pre_pane1" style="width:150px; height:150px; float:right; background-color:#ccc; position:relative;">
	<div id="inner_pre1" style="'.$pos.' text-align:center;"><img src="'.PHBGPLUG_PATH.'assets/images/'.$row->img.'" id="pre_img"></div>
	</div>
	<br /><br /><br /><br /><br /><br />
	<fieldset><legend class="bg_legend">Position</legend><table>
	<tr><td>Position</td><td><select class="update-preview" name= "badge_pos1" id="badge_pos1">
				<option value="top-left"'; if($row->position=='top-left'){echo "selected";}  					
				echo'>top-left</option>;<option value="top-right" '; if($row->position=='top-right'){echo "selected";}  
				echo'>top-right</option><option value="bottom-left"  '; if($row->position=='bottom-left'){echo "selected";}  
				echo'>bottom-left</option>;<option value="bottom-right" '; if($row->position=='bottom-right'){echo "selected";}  
				echo'>bottom-right</option></select></td></tr>

	</table></fieldset><br /><br />
	<input type="hidden" name="img_path" id="img_path" value="'.$row->img.'">
	<input type="hidden" name="b_title" id="b_title">
	<br />
	<br />';
	echo'</div>';
		if($row->type=='text')
		{

		echo '<input type="hidden" name="badge_type" id="badge_type" value="1">';
		}
		else
		{
		echo '<input type="hidden" name="badge_type" id="badge_type" value="2">';
		}
		
}
?>
