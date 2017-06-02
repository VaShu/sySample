<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MenuItemController extends Controller
{
	/**
	 * @Route("/item", name="items")
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function blockAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$menuItems = $em->getRepository('AppBundle:MenuItem')->findAll();

		return $this->render('AppBundle:MenuItem:block.html.twig', ['menuItems' => $menuItems]);
	}
}