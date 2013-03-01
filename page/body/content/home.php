<div id="body-frame">

	<div style="display:inline-block;margin-right:33px;margin-left:15px;">
		<a class="box" href="" id="slide1" title="File Sharing" >
			<?php
			if ($SPdevice == 'Desktop')
				echo '<div class="boxbghover" ><img class="bottom" src="/cloud/img/home-box-hover1.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" alt="box" width="262" height="110"/></div>';
			?>
			<img src="/cloud/img/home-box.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" class="boxbg bottom" alt="box" width="262" height="110"/>
			<div id="box1-on" style="display:none;position:absolute;margin-top:-84px;margin-left:-10px;">
				<img src="/cloud/img/home-box-hover1.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" alt="box" width="262" height="110"/>
			</div>
			<div style="text-align:center;margin-left:-5px">
				<h2>File Sharing </h2>
				<span class="text_white">Share and synchronize files <br />across your team's devices</span>
			</div>
			<br /><br />
		</a>
	</div>

	<div style="margin-right:33px;display:inline-block;z-index:-1;">
		<a class="box" href="" id="slide2" title="Social Collaboration">
			<?php
			if ($SPdevice == 'Desktop')
				echo '<div class="boxbghover" ><img class="bottom" src="/cloud/img/home-box-hover1.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286"  alt="box" width="262" height="110"/></div>';
			?>
			<img src="/cloud/img/home-box.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" class="boxbg bottom"   alt="box" width="262" height="110"/>
			<div id="box2-on" style="display:none;position:absolute;margin-top:-84px;margin-left:-10px;">
				<img src="/cloud/img/home-box-hover1.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" alt="box" width="262" height="110"/>
			</div>
			<div style="text-align:center;margin-left:-5px">
				<h2>Social for Business</h2>
				<span class="text_white">Communicate with your team<br /> at social media speed</span>
			</div>
			<br /><br />
		</a>
	</div>

	<div style="display:inline-block;">
		<a class="box" href="" id="slide3" title="On the Same Page" >
			<?php
			if ($SPdevice == 'Desktop')
				echo '<div class="boxbghover"><img class="bottom" src="/cloud/img/home-box-hover1.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" alt="box" width="262" height="110"/></div>';
			?>
			<img src="/cloud/img/home-box.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" class="boxbg bottom" alt="box" width="262" height="110"/>
			<div id="box3-on" style="display:none;position:absolute;margin-top:-84px;margin-left:-10px;">
				<img src="/cloud/img/home-box-hover1.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" alt="box" width="262" height="110"/>
			</div>
			<div style="text-align:center;margin-left:-5px;">
				<h2>On The Same Page</h2>
				<span class="text_white">Create pages to keep your team<br /> and your projects in sync</span>
			</div>
			<br /><br />
		</a>
	</div>
</div>
<ul class="bxslider">  
	<li>
		<div  class="room bg1">
			<div class="background_cycle">
				<div class="headlineblock">
					<div class="headline-text1">Share files in your team's<br /> private social cloud.</div>
					<div class="subheadline brown">Access, edit, and share the most current version of any file, anytime, anywhere.
                        <a href="/cloud/file-sharing/" title="File Sharing"><div class="learnmore"><img src="/cloud/img/plus-button.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286"  alt="Learn more" width="35" height="35"/><span class="learnmoretext">Learn more</span></div></a>
					</div>
					<img src="/cloud/img/file-sharing-folder.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" width="329" height="315" style="bottom:140px;position:absolute;margin-left:-20px;border:none;" alt="File sharing icon"/>
				</div>
			</div>
		</div>
	</li>

	<li>
		<div  class="room bg1 transform">
			<div class="background_cycle">
				<div class="headlineblock">
					<div id="popover1" style="position:absolute;margin-top:70px;z-index:999; <?php if ($SPbrowser_type != 'IE') {
				echo 'margin-left:300px;';
			} else {
				echo 'margin-left:554px;';
			} ?>"></div>
					<div class="home-screenshot" <?php if ($SPbrowser_type != 'IE') echo 'style="-moz-transform: scaleX(-1);-o-transform: scaleX(-1);-webkit-transform:scaleX(-1);transform: scaleX(-1);filter:FlipH; margin-left:4px;"'; ?> > 
						<img src="/cloud/img/samepage-screenshot-sync.jpg?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" alt="File sharing screenshot" class="home-screenshot-inner" width="805" height="499"/>
					</div>
				</div>
			</div>
		</div>
	</li>

	<li>
		<div class="room bg2">

			<div class="background_cycle">
				<div class="headlineblock">
					<div class="headline-text1">Post ideas and updates<br /> at social lightspeed.</div>
					<div class="subheadline aqua">No more drafting emails, attaching files, and repeatedly selecting the same recipients.
                        <a href="/cloud/social-business/" title="Social for Business"><div class="learnmore"><img src="/cloud/img/plus-button.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286"  alt="Learn more"  width="35" height="35"/><span class="learnmoretext">Learn more</span></div></a>
					</div>
					<img src="/cloud/img/comments-icon.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286"  style="bottom:170px;position:absolute;margin-left:0px;z-index:999;border:none;" alt="Social for business icon" width="289" height="303"/>	
				</div>
			</div>
		</div>
	</li>

	<li>
		<div  class="room bg2 transform">
			<div class="background_cycle">
				<div class="headlineblock">
					<div id="popover3" style="position:absolute;margin-top:140px;z-index:999; <?php if ($SPbrowser_type != 'IE') {
				echo 'margin-left:309px;';
			} else {
				echo 'margin-left:539px;';
			} ?>"></div>
					<div class="home-screenshot" <?php if ($SPbrowser_type != 'IE') echo 'style="-moz-transform: scaleX(-1);-o-transform: scaleX(-1);-webkit-transform:scaleX(-1);transform: scaleX(-1);filter:FlipH; margin-left:4px;"'; ?> > 
						<img src="/cloud/img/samepage-screenshot-comment.jpg?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" alt="File sharing screenshot" class="home-screenshot-inner" width="805" height="499"/>
					</div>
				</div>
			</div>
		</div>
	</li>

	<li>
		<div  class="room bg3">
			<div class="background_cycle">
				<div class="headlineblock">
					<div class="headline-text1">Capture your teamwork<br />on a single evolving page.</div>
					<div class="subheadline navy">Create a new page, invite contributors, and record your progress from start to finish.
                        <a href="/cloud/same-page/" title="On The Same Page"><div class="learnmore"><img src="/cloud/img/plus-button.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" alt="Learn more"  width="35" height="35"/><span class="learnmoretext">Learn more</span></div></a>
					</div>
					<img src="/cloud/img/samepage-icon.png?v=4ed595a346c1db8057c9911e8d6c0d65617d6286"  style="bottom:150px;position:absolute;margin-left:-10px;z-index:999;border:none;" alt="Samepage icon"   width="323" height="303"/>
				</div>
			</div>
		</div>
	</li>

	<li>
		<div  class="room bg3 transform">
			<div class="background_cycle">
				<div class="headlineblock">
					<div id="popover5" style="position:absolute;margin-top:200px;z-index:999; <?php if ($SPbrowser_type != 'IE') {
				echo 'margin-left:300px;';
			} else {
				echo 'margin-left:554px;';
			} ?>"></div>
					<div class="home-screenshot" <?php if ($SPbrowser_type != 'IE') echo 'style="-moz-transform: scaleX(-1);-o-transform: scaleX(-1);-webkit-transform:scaleX(-1);transform: scaleX(-1);filter:FlipH; margin-left:4px;"'; ?> > 
						<img src="/cloud/img/samepage-screenshot-samepage.jpg?v=4ed595a346c1db8057c9911e8d6c0d65617d6286" alt="Same page screenshot" class="home-screenshot-inner"   width="805" height="499"/>
					</div>
				</div>
			</div>
		</div>
	</li>
	<li>
		<div  class="room bg4">
			<div class="background_cycle">
				<div class="headlineblock">
					<div class="headline-text-last"><h1>Welcome to Samepage</h1></div>
                    <div class="subheadline-last white">A social collaboration platform connecting <br />people with projects, conversations and files.</div>
				</div>
			</div>
		</div>
	</li>

</ul>