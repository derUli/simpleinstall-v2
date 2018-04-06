<?php
$acl = new ACL ();
if ($acl->hasPermission ( "blog2twitter_show_status" )) {
	$status = getconfig ( "blog2twitter_status" );
	?>

<h2 class="accordion-header"><?php translate("blog2twitter_status");?></h2>
<div class="accordion-content">
	<p><?php
	
	echo nl2br ( $status );
	?></p>
</div>
<?php
}
?>