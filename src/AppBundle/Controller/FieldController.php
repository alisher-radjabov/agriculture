<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Field;
use AppBundle\Form\FieldType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class FieldController extends Controller
{
    /**
     * @Route("/field/list", name="app_field_list")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fields = $em->getRepository('AppBundle:Field')->findAll();

        return $this->render('field/list.html.twig', [
            'fields' => $fields
        ]);
    }

    /**
     * @Route("/field/add", name="app_field_add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(FieldType::class);

        /** Handles request only on POST */
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $field = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($field);
            $em->flush();

            $this->addFlash('success', 'New field created.');

            return $this->redirectToRoute("app_field_list");
        }

        return $this->render('field/add.html.twig',
            [
                'field_form' => $form->createView()
            ]);
    }

}
