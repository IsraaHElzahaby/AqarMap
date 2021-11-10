<?php
namespace App\Tests\Controller\Api;
use DateTime;

class LoginControllerTest extends \PHPUnit_Framework_TestCase
{

	private $client;

		public function __construct() {
		    $client = new \GuzzleHttp\Client([
	            'base_url' => 'http://localhost:8000',
	            'defaults' => [
	                'exceptions' => false
	            ]
	        ]);
	}
    
    public function testOkList()
    {

        $response = $client->get('/login');
        $this->assertEquals(200, $response->getStatusCode());
    }

 

    public function testLogin(){
    	$email = 'esraaelzahaby40@gmail.com';
    	$password = 'a123456789';	
        $data = array(
            'email' => $email,
            'password' => $password,
            
        );
        
        $response = $client->post('/login', [
            'body' => json_encode($data)
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        
    }

    public function testInvalidData(){
        $email = 'esraassssselzahaby40@gmail.com';
        $password = 'a123456789';   
        $data = array(
            'email' => $email,
            'password' => $password,
            
        );
    
        $response = $client->post('/login', [
            'body' => json_encode($data)
        ]);
        $this->assertEquals(400, $response->getStatusCode());
        
    }
    
}