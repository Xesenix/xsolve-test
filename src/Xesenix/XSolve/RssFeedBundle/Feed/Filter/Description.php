<?php

namespace Xesenix\XSolve\RssFeedBundle\Feed\Filter;

class Description extends AbstractFilter
{
	public function filterContaining($fraze)
	{
		$result = array();
		
		if ($this->_feed !== null)
		{
			for ($i = 0; $i < $this->_feed->count(); $i++)
			{
				$feed = $this->_feed->current();
				
				if ($fraze === null || $fraze === '' || mb_strrpos($feed->getDescription(), $fraze) !== false)
				{
					$result[] = $feed;
				}
				
				$this->_feed->next();
			}
		}
		
		return $result;
	}
}