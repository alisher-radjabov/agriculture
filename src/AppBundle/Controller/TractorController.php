<?php

namespace AppBundle\Controller;

use AppBundle\Form\TractorType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class TractorController extends Controller
{
    /**
     * @Route("/tractor/list", name="app_tractor_list")
     */
    public function listAction()
    {

        $em = $this->getDoctrine()->getManager();

        $tractors = $em->getRepository('AppBundle:Tractor')->findAll();

        return $this->render('tractor/list.html.twig', [
            'tractors' => $tractors
        ]);
    }

    /**
     * @Route("/tractor/add", name="app_tractor_add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(TractorType::class);

        /** Handles request only on POST */
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $field = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($field);
            $em->flush();

            $this->addFlash('success', 'New tractor created.');

            return $this->redirectToRoute("app_tractor_list");
        }

        return $this->render('tractor/add.html.twig',
            [
                'tractor_form' => $form->createView()
            ]);


    }

}
