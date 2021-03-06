<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<style type="text/css">
	.Total_Soft_Products_Main_Div
	{
		width: 99%;
		position: relative;
		height: 140px;
		background-color:#009491;
		margin-top: 10px;
		margin-left: 0;
		box-shadow: 0px 0px 30px #000;
	}
	.Total_Soft_Products_Main_Div1
	{
		width: 214px;
		height: 100px;
		position: relative;
		margin: 0 auto;
		background:url("<?php echo plugins_url('../Images/TotalSoftLogo.png',__FILE__);?>");
		background-size: 214px 100px;
		background-repeat: no-repeat;
	}
	.Total_Soft_Products_Div
	{
		width: 99%;
		position: relative;
		box-shadow: 0px 0px 30px #000;
		margin: 15px 0 30px 0;
		float: left;
	}
	.Total_Soft_Products_Table
	{
		width: 100%;
		display: table;
		text-align: center;
		color: #fff;	
		border-spacing: 1px;
	}
	.Total_Soft_Products_Table img
	{
		max-height: 150px;
		width: auto;
		margin: 0 auto;
		display: block;
	}	
	.Total_Soft_Products_Table_Span_1 a
	{
		padding: 5px 8px;
		border: 1px solid #ffffff;
		border-radius: 5px; 
		background-color: #e8d21a;
		color: #ffffff;
		text-decoration: none;
	}
	.Total_Soft_Products_Table_Span_1 a:hover
	{
		background-color: #ffffff;
		color: #e8d21a;
		cursor: pointer;
	}
	.Total_Soft_Products_Table_Span_1 a:focus
	{
		outline: none !important;
		box-shadow: none !important;
	}
	.Total_Soft_Products_Table_Span_2 a
	{
		padding: 5px 8px;
		border: 1px solid #ffffff;
		border-radius: 5px; 
		background-color: #1184bf;
		color: #ffffff;
		text-decoration: none;
	}
	.Total_Soft_Products_Table_Span_2 a:hover
	{
		background-color: #ffffff;
		color: #1184bf;
		cursor: pointer;
	}
	.Total_Soft_Products_Table_Span_2 a:focus
	{
		outline: none !important;
		box-shadow: none !important;
	}
	.Total_Soft_Products_Table_Span_3 a
	{
		padding: 5px 8px;
		border: 1px solid #ffffff;
		border-radius: 5px; 
		background-color: #ff386d;
		color: #ffffff;
		text-decoration: none;
	}
	.Total_Soft_Products_Table_Span_3 a:hover
	{
		background-color: #ffffff;
		color: #ff386d;
		cursor: pointer;
	}
	.Total_Soft_Products_Table_Span_3 a:focus
	{
		outline: none !important;
		box-shadow: none !important;
	}
	.Total_Soft_Products_Table_Span_4 a
	{
		padding: 5px 8px;
		border: 1px solid #ffffff;
		border-radius: 5px; 
		background-color: #0194af;
		color: #ffffff;
		text-decoration: none;
	}
	.Total_Soft_Products_Table_Span_4 a:hover
	{
		background-color: #ffffff;
		color: #0194af;
		cursor: pointer;
	}
	.Total_Soft_Products_Table_Span_4 a:focus
	{
		outline: none !important;
		box-shadow: none !important;
	}
</style>
<form method="POST">
	<div class="Total_Soft_Products_Main_Div">
		<div class="Total_Soft_Products_Main_Div1"></div>
	</div>
	<div class="Total_Soft_Products_Div">
		<table class="Total_Soft_Products_Table">
			<tr style="background-color: #e8d21a;">
				<td style="width: 80% !important;">
					Calendar is a flexible plugin that allows you to connect to your database and show up your event days on a view. The plugin can render a Day, Week, Month and Resource calendar view. The also provides an interface for manipulating and formatting dates and times. Each event box has a link to the original event you defined in your calendar.
					<p>
						<span class="Total_Soft_Products_Table_Span_1">
							<a href="http://total-soft.pe.hu/calendar-event/" target="_blank">
								View More ...
							</a>
						</span>
					</p>
				</td>
				<td style="width: 20% !important;">
					<img src="<?php echo plugins_url('../Images/Products/Calendar.jpg',__FILE__);?>">
				</td>
			</tr>
		<table class="Total_Soft_Products_Table">
			<tr style="background-color: #1184bf;">
				<td style="width: 20% !important;">
					<img src="<?php echo plugins_url('../Images/Products/Portfolio.png',__FILE__);?>">
				</td>
				<td style="width: 80% !important;">
					A beautiful responsive gallery portfolio. Plugin supports desktop, tablet and mobile browsers. With this plugin, your visitors can filter items by groups. Great for creating a responsive & Filterable Portfolio website. Gallery can be used to creating portfolio, but not only. You can use it to showcase your latest work and expand it to do much more. Each item of the Portfolio is able to be in multiple categories and we can link to certain filters with a url.
					<p>
						<span class="Total_Soft_Products_Table_Span_2">
							<a href="http://total-soft.pe.hu/gallery-portfolio/" target="_blank">
								View More ...
							</a>
						</span>
					</p>
				</td>			
			</tr>
		</table>
		<table class="Total_Soft_Products_Table">
			<tr style="background-color: #ff386d;">
				<td style="width: 80% !important;">
					Gallery Video plugin extension for WordPress is a simple way to add your videos to any WordPress website, and supports videos from Youtube and Vimeo. The software is responsive, user friendly and can really enhance the rating of your site when people search for related topics and videos, whether on Youtube and Vimeo or search engines in general. Getting your Youtube extension working is straightforward, with a few simple steps required to build this great video resource on your WordPress site. The benefits of the gallery plugin are already making a real difference for all kinds of sites, from business oriented to hobby or entertainment pages. The great thing about the Gallery is that it allows users to express their creative editing skills when composing a video collection, slideshow, or even workshop and information content. Being able to engage with site visitors this way, directly with gallery also helps to make your site much more rating.
					<p>
						<span class="Total_Soft_Products_Table_Span_3">
							<a href="http://total-soft.pe.hu/gallery-video/" target="_blank">
								View More ...
							</a>
						</span>
					</p>
				</td>
				<td style="width: 20% !important;">
					<img src="<?php echo plugins_url('../Images/Products/Gallery_video.png',__FILE__);?>">
				</td>
			</tr>
		</table>
		<table class="Total_Soft_Products_Table">
			<tr style="background-color: #0194af;">
				<td style="width: 20% !important;">
					<img src="<?php echo plugins_url('../Images/Products/Poll.png',__FILE__);?>">
				</td>
				<td style="width: 80% !important;">
					Poll WordPress plugin allows you to create polls on your WordPress site. It has many powerful features to put very beautiful and easy to use polls on your website. You can create / edit polls, change the color and appearance. If you are looking for a simple, easy but very professional polls on your website, this plugin is what you are looking for.
					<p>
						<span class="Total_Soft_Products_Table_Span_4">
							<a href="http://total-soft.pe.hu/poll/" target="_blank">
								View More ...
							</a>
						</span>
					</p>
				</td>
			</tr>
		</table>
	</div>		
</form>