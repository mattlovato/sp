<div class="subbody-frame" style="z-index:-1;">

	<div class="parablock">

		<h1>
        <?php 
		if($SPcampaign=='GA-share-large-files'){echo 'Share Large Files'; }
		else if($SPcampaign=='GA-transfer-large-files'){echo 'Transfer Large Files';}
		else if($SPcampaign=='GA-upload-share-large'){echo 'Upload &amp; Share Files';}
		else if($SPcampaign=='GA-transfer-files-online'){echo 'Transfer Files Online';}
		else if($SPcampaign=='GA-transfer-files-securely'){echo 'Transfer Files Securely';}
		else if($SPcampaign=='GA-share-files-pc-mac'){echo 'Limitless File Sharing';}
		else {echo 'File Sharing';}
		?>
		</h1>
		
        <span style="font-size:30px;">
        <?php 
		if($SPcampaign=='GA-share-large-files'){echo 'No attachments. No limitations.'; }
		else if($SPcampaign=='GA-transfer-large-files'){echo 'No attachments. No limitations.';}
		else if($SPcampaign=='GA-upload-share-large'){echo 'Drag. Drop. Share. Done.';}
		else if($SPcampaign=='GA-transfer-files-online'){echo 'No attachments. No limitations.';}
		else if($SPcampaign=='GA-transfer-files-securely'){echo 'Share with controlled protection';}
		else if($SPcampaign=='GA-share-files-pc-mac'){echo 'PCs, Macs, and Mobile Devices';}
		else {echo 'Online access from any device';}
		?>
        </span><br />

		<div class="subpara">
        <?php 
		if($SPcampaign=='GA-share-large-files'){echo 'Easily share files of any size simply by dragging them to a page in your cloud. Share a link with your team so they can securely access your files from any browser, anytime, anywhere. '; }
		else if($SPcampaign=='GA-transfer-large-files'){echo 'Easily transfer files of any size by dragging them to a page in your cloud. Share a link with your team so they can securely access your files from any browser, anytime, anywhere. ';}
		else if($SPcampaign=='GA-upload-share-large'){echo 'Easily upload files of any size onto a page in your cloud. Share a link with your team so they can securely access your files from any browser, anywhere. ';}
		else if($SPcampaign=='GA-transfer-files-online'){echo 'Easily transfer files of any size by dragging them to a page in your cloud. Share a link with your team so they can securely access your files from any browser, anywhere. ';}
		else if($SPcampaign=='GA-transfer-files-securely'){echo 'Easily transfer files of any size by dragging them to a secure page in your cloud. Control sharing permissions to give your team safe access to your files from any browser, anywhere. ';}
		else if($SPcampaign=='GA-share-files-pc-mac'){echo 'Easily transfer files between computers and access them from mobile devices. Synchronize files so changes made on one computer are instantly updated on all others.';}
		else {echo 'It&#039;s nice to know that no matter how often your team updates your files, you can always find them safely stored in the same place from any browser, anywhere.';}
		?>	
        
		</div>
	</div>
	<img src="/cloud/img/file-sharing-folder.png?v=" alt="" width="240" style="margin-left:70px;margin-bottom:-35px;"/> 

	<div class="spacer"></div>

	<div class="createAccountTop" id="greenbar" style="overflow:hidden;background-image:url('/cloud/img/bgstripe.jpg?v=');">
      <div class="createAccountWrapTop">
        <div class="kerioForm signup_mid" >
          <div class="signup_mid bold" style="color:#ffffff;font-size:25px;padding-bottom:15px;text-align:center;width:100%">Sign up today &amp; get up to 10GB of file-sharing space free!</div>
            <div class="signup_mid_fieldrow">  
            <?php include('./cloud/forms/signup_form.php'); ?>
            </div>
          </div>
      </div>
    </div>

	<!-- PROVIDE CONTEXT -->
	<div class="spacer" id="context"></div>
	<div class="numberball">1</div>
    <div class="textblock">
		<h2>Show me some background</h2>
		<h3>Share files on a page designed to tell the whole story</h3>
        <div class="subtext">

			Dropping your files online and sharing them with the team is easy, but putting them on Samepage does more. Each page gives you the chance to surround your shared files with a clarifying context so your team knows exactly what's going on around them. 

			<br /><br />
		</div>
	</div>
    <div class="screenshot">
       	<div id="popover1" class="hidepopover" style="position:absolute;margin-left:520px;margin-top:221px;z-index:999;"></div>
		<img src="/cloud/img/filesharing-screenshot-context.jpg?v=" width="800"/>
    </div>





	<!-- SEND A LINK -->
	<div class="spacer" id="sendlink"></div>
	<div class="numberball">2</div>
    <div class="textblock">
		<h2>Send a link</h2>
		<h3>Say goodbye to email attachments</h3>
        <div class="subtext">
			Share files with anyone simply by sending them a link. <br />No matter how many changes you make to a file, the link stays the same.
			<br /><br />
		</div>
	</div>
	<div class="<?php if ($SPdevice == 'Desktop') echo 'hideme' ?> screenshot"> 
       	<div id="popover2" class="hidepopover" style="position:absolute;margin-left:420px;margin-top:393px;z-index:999;"></div>
		<img src="/cloud/img/filesharing-screenshot-link.jpg?v=" width="800"/>
    </div>





	<!-- SHARE EDITS INSTANTLY -->
	<div class="spacer" id="edit"></div>
   	<div class="numberball">3</div>
   	<div class="textblock">
		<h2>Edit files online</h2>
		<h3>Share your changes instantly</h3>
		<div class="subtext">
			Preview files in your browser, or make changes using your own applications. <br />Instantly share your changes online just by clicking "Save". 
			<br /><br />
		</div>        
	</div>
	<div class="<?php if ($SPdevice == 'Desktop') echo 'hideme' ?> screenshot"> 
       	<div id="popover3" class="hidepopover" style="position:absolute;margin-left:480px;margin-top:335px;z-index:999;"></div>
		<img src="/cloud/img/filesharing-screenshot-edit.jpg?v=" width="800"/>
	</div>


	<!-- SYNCHRONIZE -->
	<div class="spacer" id="sync"></div>
   	<div class="numberball">4</div>
	<div class="textblock">
		<h2>Sync to your desktop</h2>
		<h3>Send and receive updates automatically</h3>
		<div class="subtext">
			Get the whole team to synchronize a file library to their computers.<br /> When a change is made on one computer, it automatically updates the others. 
			<br /><br />
		</div>
	</div>


   	<div class="<?php if ($SPdevice == 'Desktop') echo 'hideme' ?> screenshot">
		<div id="popover4" class="hidepopover" style="position:absolute;margin-left:477px;margin-top:275px;z-index:999;"></div>
		<img src="/cloud/img/filesharing-screenshot-sync.jpg?v=" width="800"/>
	</div>




	<!-- HISTORY OF FILE -->
	<div class="spacer" id="history"></div>
   	<div class="numberball">5</div>
	<div class="textblock">
		<h2>Preserve file history</h2>
		<h3>Like a document time machine</h3>
		<div class="subtext">
			When you're sharing your files with the team, access to a previous version can be useful for looking at the evolution of a file. It's also a lifesaver when you need a "do over".
			<br /><br />
		</div>
	</div>
	<div class="<?php if ($SPdevice == 'Desktop') echo 'hideme' ?> screenshot">
		<div id="popover5" class="hidepopover" style="position:absolute;margin-left:480px;margin-top:340px;z-index:999;"></div>
		<img src="/cloud/img/filesharing-screenshot-history.jpg?v=" width="800"/>
	</div>

	<!-- COMMENT ON CHANGES -->
	<div class="spacer" id="comment"></div>
   	<div class="numberball">6</div>
	<div class="textblock">
		<h2>Post comments</h2>
		<h3>Keep the feedback with the files</h3>
		<div class="subtext">
			Your inbox just can't compete with a page's ability to organize and display <br />an entire conversation about a particular set of files.  
			<br /><br />
		</div>

    </div>
	<div class="<?php if ($SPdevice == 'Desktop') echo 'hideme' ?> screenshot">
       	<div id="popover6" class="hidepopover" style="position:absolute;margin-left:353px;margin-top:299px;z-index:999;"></div>
		<img src="/cloud/img/filesharing-screenshot-comment.jpg?v=" width="800"/>
	</div>

	<div class="nextpage">    
		<div style="z-index:999;background-image: url('/cloud/img/preheader-shadow.png?v=');background-repeat:repeat-x;width:850px;position:absolute;">&nbsp;</div>
		<br />
		<!-- LEARN MORE ABOUT SOCIAL FOR BUSINESS -->
        <div class="textblock">
            <h2>Now bring in the conversation</h2>
            <h3>See how social collaboration for business gets done</h3>
            <div class="subtext">
                <a href="/cloud/social-business/"><img src="/cloud/img/comments-icon.png?v=" width="150" height="157" alt="Social for business" border="none"/> </a>
                <br /><br />
            </div>

        </div>    
    </div> 
</div>