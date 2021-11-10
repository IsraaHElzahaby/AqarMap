<?php
namespace App\Tests\Controller\Api;
use DateTime;

class ArticleControllerTest extends \PHPUnit_Framework_TestCase
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

        $response = $client->get('/article');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testBodyList(){
        $response = $client->get('/article');

    	$finishedData = json_decode($response->getBody(true), true);
        $this->assertArrayHasKey('title', $finishedData);
    }

    public function testAdd(){
    	$title = 'ObjectOrienter'.rand(0, 999);
    	$description = 'ObjectOrienter'.rand(0, 999);
    	$creation_date = new DateTime('NOW');
        $data = array(
            'title' => $title,
            'description' => $description,
            'creation_date' => $creation_date,
            'category_id' => 1
        );
        
        $response = $client->post('/article/add', [
            'body' => json_encode($data)
        ]);
        $this->assertEquals(200, $response->getStatusCode());

    }
    
}