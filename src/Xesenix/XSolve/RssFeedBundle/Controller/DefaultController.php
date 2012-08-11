<?php

namespace Xesenix\XSolve\RssFeedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Zend\Feed\Reader\Reader as FeedReader;

class DefaultController extends Controller
{
	/**
	 * @Route("/")
	 * @Template()
	 */
	public function indexAction()
	{
		$request = $this->getRequest();
		$fraze = $request->get('fraze');
		
		$feed = $this->get('xesenix_xsolve.feed');
		
		$filter = $this->get('xesenix_xsolve.feed_description_filter');
		
		return array('fraze' => $fraze, 'feeds' => $filter->setFeed($feed)->filterContaining($fraze));
	}
}
