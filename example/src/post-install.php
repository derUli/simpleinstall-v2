<?php
if (! getconfig ( "blog2twitter_consumer_key" ))
	setconfig ( "blog2twitter_consumer_key", "XXXXXXXXXXXXXXXXXXX" );

if (! getconfig ( "blog2twitter_consumer_secret" ))
	setconfig ( "blog2twitter_consumer_secret", "XXXXXXXXXXXXXXXXXXX" );

if (! getconfig ( "blog2twitter_access_token" ))
	setconfig ( "blog2twitter_access_token", "XXXXXXXXXXXXXXXXXXX" );

if (! getconfig ( "blog2twitter_access_token_secret" ))
	setconfig ( "blog2twitter_access_token_secret", "XXXXXXXXXXXXXXXXXXX" );

db_query ( "ALTER TABLE " . tbname ( "blog" ) . " ADD posted2twitter BOOLEAN not null default 0" );

db_query ( "UPDATE " . tbname ( "blog" ) . " set posted2twitter = 1 where posted2twitter = 0" );
?>