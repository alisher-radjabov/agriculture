<?php

namespace AppBundle\Controller;

use AppBundle\Form\ProcessType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProcessFieldController extends Controller
{
    /**
     * @Route("/field/processed/list", name="app_field_processed_list")
     */
    public function listProcessedFieldsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $processed = $em->getRepository('AppBundle:Process')->findAll();

        return $this->render('process/list.html.twig', [
            'processed' => $processed
        ]);
    }


    /**
     * @Route("/field/processed/add", name="app_field_processed_add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function processFieldAction(Request $request)
    {
        $form = $this->createForm(ProcessType::class);

        /** Handles request only on POST */
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $field = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($field);
            $em->flush();

            $this->addFlash('success', 'Processed successfully.');

            return $this->redirectToRoute("app_field_processed_list");
        }

        return $this->render('process/add.html.twig',
            [
                'process_field_form' => $form->createView()
            ]);

    }

}