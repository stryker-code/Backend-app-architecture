<?php

// CONNECTION SETTING
define('URL_TARGET', "https://api.github.com/search/repositories?q=tetris+language:assembly&sort=stars&order=desc");
// Version 53
define('AGENT_MOZILLA', "Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0");
// Version 57
define('AGENT_CHROME', "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36");
// Current Browser
define('CURRENT_AGENT', $_SERVER['HTTP_USER_AGENT']);
define('NEW_LINE', '<br>'); // PHP_EOL

/**
 *  Test before fetch data
 */
class GitHubApiFacade
{

    private static $userAgent = CURRENT_AGENT;

    public static function setAgent($userAgent)
    {
        self::$userAgent = $userAgent;
    }

    public static function getAgent()
    {

        if (empty(self::$userAgent)) {
            self::setAgent(AGENT_MOZILLA);
        }
        return self::$userAgent;

    }

    private static function checkBasicFunctions()
    {

        if (!function_exists("curl_init") &&
            !function_exists("curl_setopt") &&
            !function_exists("curl_exec") &&
            !function_exists("curl_close")) {
            echo 'Somthing wrong' . NEW_LINE;
            exit();
        } else {
            echo 'Basic functions exists' . NEW_LINE;
        }

    }

    private static function isDomainAvailible($url)
    {

        $options = array(
            CURLOPT_NOBODY => true,                   // Exclude the body of the answer
            CURLOPT_FOLLOWLOCATION => true,                 // Follow redirects
            CURLOPT_USERAGENT => self::getAgent(),  // Set browser
            CURLOPT_AUTOREFERER => true,               // Set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 5,                     // Waiting for connection attempt (in seconds)
            CURLOPT_TIMEOUT => 10,                   // The maximum number of seconds allowed to execute cURL functions.
            CURLOPT_MAXREDIRS => 2,                     // Stop after 2 redirects
            CURLOPT_SSL_VERIFYPEER => false,                 // SSL verification not required
            CURLOPT_SSL_VERIFYHOST => false,                 // SSL host verification not required
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        $curlInfo = curl_getinfo($ch);
        curl_close($ch);
        $domain = NEW_LINE . 'Domain ' . "[{$curlInfo['primary_ip']}]:{$curlInfo['primary_port']} " . $url . '  Header-SIZE:' . $curlInfo['header_size'];
        if ($curlInfo['http_code'] == 200 && $curlInfo['header_size'] > 0) {
            echo $domain . ' - is Availible' . NEW_LINE;
        } else {
            echo $domain . '- is not Availible' . NEW_LINE;
            exit();
        }

    }

    function __construct($url = null)
    {

        self::checkBasicFunctions();

        if (!empty($url)) {
            self::isDomainAvailible($url);
        }
    }

}

class CurlGitAPI
{

    private $output;

    public function getContent()
    {
        return $this->output;
    }

    //Basic Authorization
    private function basicAuth($user, $password, $ch)
    {

        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $user . ":" . $password);

    }

    function __construct($url)
    {

        echo NEW_LINE;
        $userAgent = TestCurl::getAgent();
        $options = array(
            CURLOPT_RETURNTRANSFER => true,         // Return the transfer as a string
            CURLOPT_HEADER => true,         // Return headers
            CURLOPT_NOBODY => false,         // Exclude the body of the answer
            CURLOPT_FOLLOWLOCATION => true,         // Follow redirects
            CURLOPT_USERAGENT => $userAgent,     // Set browser
            CURLOPT_AUTOREFERER => true,         // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 5,             // Waiting for connection attempt (in seconds)
            CURLOPT_TIMEOUT => 10,             // The maximum number of seconds allowed to execute cURL functions.
            CURLOPT_MAXREDIRS => 2,             // Stop after 2 redirects
            CURLOPT_SSL_VERIFYPEER => false,         // SSL verification not required
            CURLOPT_SSL_VERIFYHOST => false,         // SSL verification not required
        );

        $ch = curl_init($url);
        //$this->basicAuth($user,$password,$ch);
        curl_setopt_array($ch, $options);
        $this->output = curl_exec($ch);
        curl_close($ch);
        var_dump(getContent());
        //var_dump(json_decode($output));
    }

}

new TestCurl(URL_TARGET);
new CurlGitAPI(URL_TARGET);