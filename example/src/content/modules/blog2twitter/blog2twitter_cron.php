<?php
if (containsModule(null, "blog")) {  
    if (! function_exists("rootDirectory")) {

        function rootDirectory()
        {
            $pageURL = 'http';
            if ($_SERVER["HTTPS"] == "on") {
                $pageURL .= "s";
            }
            $pageURL .= "://";
            $dirname = dirname($_SERVER["REQUEST_URI"]);
            $dirname = str_replace("\\", "/", $dirname);
            $dirname = trim($dirname, "/");
            if ($dirname != "") {
                $dirname = "/" . $dirname . "/";
            } else {
                $dirname = "/";
            }
            if ($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443") {
                $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $dirname;
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"] . $dirname;
            }
            return $pageURL;
        }
    }
    
    include_once getModulePath("twitter_for_php", true) . "src/twitter.class.php";
    
    $consumerKey = getconfig("blog2twitter_consumer_key");
    $consumerSecret = getconfig("blog2twitter_consumer_secret");
    $accessToken = getconfig("blog2twitter_access_token");
    $accessTokenSecret = getconfig("blog2twitter_access_token_secret");
    
    if ($consumerKey !== false && $consumerSecret !== false && $accessToken !== false && $accessTokenSecret !== false) {
        $query = db_query("select id, title, seo_shortname from " . tbname("blog") . " where entry_enabled = 1 and posted2twitter = 0 order by datum limit 2");
        if (db_num_rows($query) > 0) {
            $twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
            
            while ($row = db_fetch_assoc($query)) {
                $id = $row["id"];
                $title = $row["title"];
                $seo_shortname = $row["seo_shortname"];
                
                $link = rootDirectory() . get_slug() . ".html?single=" . $seo_shortname;
                
                $post = $title . " " . $link;
                
                try {
                    $status = $twitter->send($post);
                    setconfig("blog2twitter_status", get_translation("blog2twitter_works"));
                    db_query("UPDATE " . tbname("blog") . " set posted2twitter = 1 where id = $id");
                } catch (TwitterException $e) {
                    setconfig("blog2twitter_status", db_escape($e->getMessage()));
                }
            }
        }
    } else {
        setconfig("blog2twitter_status", "<strong>Fehlende Zugangsdaten.</strong>\nMehr Informationen siehe liesmich.txt im Modulordner.");
    }
}
?>
