<?php

namespace Inz\ReportsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ReportController extends Controller 
{
    public function generateAction(Request $request, $company_id)
    {
        $range = range(date('Y'), date('Y')-10);
        
        $form = $this->createFormBuilder()
                ->add('range', 'choice', array(
                    'choices' => array_combine($range, $range)
                ))
                ->getForm();
        
        $form->handleRequest($request);
        
        if($form->isValid()) {
            $year = $form->get('range')->getData();
            $result = $this->get('reporter_service')->getReportData($company_id, $year);

            $html = $this->renderView('InzReportsBundle:Report:pdfDocument.html.twig', compact('result'));

            return $this->render('InzReportsBundle:Report:pdfDocument.html.twig', compact('result'));
            return new Response(
                $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
                200,
                array(
                    'Content-Type'          => 'application/pdf',
                    'Content-Disposition'   => 'attachment; filename="file.pdf"'
                )
            );
        }
        
        return $this->render('InzReportsBundle:Report:generate.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
}
