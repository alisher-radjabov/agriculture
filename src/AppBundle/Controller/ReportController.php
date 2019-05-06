<?php

namespace AppBundle\Controller;

use AppBundle\Form\ReportType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ReportController extends Controller
{

    /**
     * @Route("/report/list", name="app_report_list")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reports = $em->getRepository('AppBundle:Report')->findAll();

        return $this->render('report/list.html.twig', [
            'reports' => $reports
        ]);
    }

    /**
     * @Route("/report/add", name="app_report_add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(ReportType::class);

        /** Handles request only on POST */
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $report = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($report);
            $em->flush();

            $this->addFlash('success', 'New report created.');

            return $this->redirectToRoute("app_report_list");
        }

        return $this->render('report/add.html.twig',
            [
                'report_form' => $form->createView()
            ]);
    }

}