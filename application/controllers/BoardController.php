<?php

class BoardController extends \Phalcon\Mvc\Controller
{
	public function initialize()
	{
		Phalcon\Tag::setTitle('board');
	}

	public function indexAction()
	{
		$this->listAction();
	}

	public function listAction()
	{
		echo "list";
	}
}

