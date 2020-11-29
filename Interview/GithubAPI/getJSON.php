<?php 

// CONNECTION SETTING
define('URL_TARGET',"https://api.github.com/search/repositories?q="); 
// Version 53
define('AGENT_MOZILLA',"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0");
// Current Browser
define('CURRENT_AGENT',$_SERVER['HTTP_USER_AGENT']);

class GitApiFacade
{
    private $output;

    private static $userAgent = CURRENT_AGENT;

    private static function setAgent($userAgent)
    {
        self::$userAgent = $userAgent;
    }

    private static function getAgent()
    {
        if (empty(self::$userAgent)) {
            self::setAgent(AGENT_MOZILLA);
        }
        return self::$userAgent;
    }

    public function getContent()
    {
        return $this->output;
    }

    public function __construct($url)  {

      $options = array(
         CURLOPT_RETURNTRANSFER => true,               // Return the transfer as a string
         //CURLOPT_HEADER         => true,             // Return headers
         //CURLOPT_NOBODY         => false,            // Exclude the body of the answer
         CURLOPT_FOLLOWLOCATION => true,               // Follow redirects
         CURLOPT_USERAGENT      => self::getAgent(),   // Set browser
         CURLOPT_AUTOREFERER    => true,               // set referer on redirect
         CURLOPT_CONNECTTIMEOUT => 5,                  // Waiting for connection attempt (in seconds)
         CURLOPT_TIMEOUT        => 10,                 // The maximum number of seconds allowed to execute cURL functions.
         CURLOPT_MAXREDIRS      => 2,                  // Stop after 2 redirects
         CURLOPT_SSL_VERIFYPEER => false,              // SSL verification not required
         CURLOPT_SSL_VERIFYHOST => false,              // SSL verification not required
      );

      $ch = curl_init($url);
      curl_setopt_array($ch, $options);
      $this->output = curl_exec($ch); 
      curl_close($ch);
    }

}

if (isset($_GET['query'])) {    
    $query = ltrim($_GET['query'], '/');
    $query = str_replace('/', '+', $query);   
    $query = URL_TARGET.$query;
    //var_dump($query);
    $obj = new GitApiFacade($query);
    echo $obj->getContent();
}