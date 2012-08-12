<?php

namespace Xesenix\XSolve\RssFeedBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
	public function frazesProvider()
	{
		return array(
			array('Cloud Computing'),
			array('na oficjalnym blogu Symfony'),
			array('aaa'),
			array('xxx'),
			array('później'),
			array(''),
		);
	}
	
	/**
	 * @dataProvider frazesProvider
	 */
	public function testIndex($fraze)
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/?fraze=' . $fraze);
		
		if ($fraze !== '')
		{
			$containsFraze = $crawler->filter('html:contains("' . $fraze . '")')->count() > 0;
			$didnotFoundAnything = $crawler->filter('html:contains("Nie znaleziono wpisów zawierających szukaną frazę")')->count() > 0;
			
			$this->assertTrue($containsFraze || $didnotFoundAnything);
		}
		else
		{
			$didFoundSomething = $crawler->filter('html:contains("Nie znaleziono wpisów zawierających szukaną frazę")')->count() === 0;
			$this->assertTrue($didFoundSomething);
		}
	}
}
