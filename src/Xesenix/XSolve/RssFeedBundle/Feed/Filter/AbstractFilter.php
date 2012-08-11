<?php

namespace Xesenix\XSolve\RssFeedBundle\Feed\Filter;

class AbstractFilter
{
	protected $_feed = null;
	
	public function setFeed($feed)
	{
		$this->_feed = $feed;
		
		return $this;
	}
}