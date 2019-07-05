<?php
define("MODULE_ADMIN_HEADLINE", get_translation("BLOG2TWITTER_ADMIN_HEADLINE"));
define("MODULE_ADMIN_REQUIRED_PERMISSION", "blog2twitter_settings");

function blog2twitter_admin()
{
    if (isset($_POST["submit"])) {
        Settings::set("blog2twitter_consumer_key", $_POST["blog2twitter_consumer_key"]);
        Settings::set("blog2twitter_consumer_secret", $_POST["blog2twitter_consumer_secret"]);
        Settings::set("blog2twitter_access_token", $_POST["blog2twitter_access_token"]);
        Settings::set("blog2twitter_access_token_secret", $_POST["blog2twitter_access_token_secret"]);
    }
    
    $blog2twitter_consumer_key = Settings::get("blog2twitter_consumer_key");
    $blog2twitter_consumer_secret = Settings::get("blog2twitter_consumer_secret");
    $blog2twitter_access_token = Settings::get("blog2twitter_access_token");
    $blog2twitter_access_token_secret = Settings::get("blog2twitter_access_token_secret");
    ?>

<form id="blog2twitter_settings"
	action="<?php echo getModuleAdminSelfPath()?>" method="post">
<?php
    
    csrf_token_html();
    ?>
<div class="label"><?php translate("TWITTER_CONSUMER_KEY");?></div>
	<div class="inputWrapper">
		<input type="text" name="blog2twitter_consumer_key"
			value="<?php
    
    echo $blog2twitter_consumer_key;
    ?>">
	</div>
	<div class="label"><?php translate("TWITTER_CONSUMER_SECRET");?></div>
	<div class="inputWrapper">
		<input type="text" name="blog2twitter_consumer_secret"
			value="<?php
    
    echo $blog2twitter_consumer_secret;
    ?>">
	</div>

	<div class="seperator"></div>

	<div class="label"><?php translate("TWITTER_ACCESS_TOKEN");?></div>
	<div class="inputWrapper">
		<input type="text" name="blog2twitter_access_token"
			value="<?php
    
    echo $blog2twitter_access_token;
    ?>">
	</div>
	<div class="label"><?php translate("TWITTER_ACCESS_TOKEN_SECRET");?></div>
	<div class="inputWrapper">
		<input type="text" name="blog2twitter_access_token_secret"
			value="<?php
    
    echo $blog2twitter_access_token_secret;
    ?>">
	</div>
	<br />

	<div class="seperator"></div>
	<p>
		<button type="submit" name="submit" class="btn btn-success"><?php translate("save")?> <?php translate("settings");?></button>
	</p>
	<script type="text/javascript">
$("#blog2twitter_settings").ajaxForm({beforeSubmit: function(e){
  $("#message").html("");
  $("#loading").show();
  }, 
  success:function(e){
  $("#loading").hide();  
  $("#message").html("<span style=\"color:green;\"><?php translate("CHANGES_WAS_SAVED");?></span>");
  }
  

}); 

</script>
</form>
<?php
}

?>