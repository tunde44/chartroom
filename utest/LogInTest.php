<?php
require_once('../unittest/autorun.php');
require_once('../unittest/web_tester.php');
require_once('../unittest/cookies.php');

class LogInTest extends WebTestCase {
    
	function testSessionCookieSameAfterLogIn() {
        $this->get('http://localhost/chatforum/utest/login.php');
        $session = $this->getCookie('SID');
        $this->setField('u', 'Me');
        $this->setField('p', 'Secret');
        $this->click('Log in');
		$this->ageCookies(3600);
		$this->authenticate('Me', 'Secret');
       
		
		//$this->assertCookie('SID');
		//$this->assertText('Welcome Me');
       // $this->assertCookie('SID', $session);
    }
	
	
	
	
}
?>