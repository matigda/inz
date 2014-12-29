<?php

namespace Inz\ReportsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Inz\ReportsBundle\Entity\Car;
use Inz\ReportsBundle\Form\CarType;
use Inz\ReportsBundle\Form\FuelType;
use Inz\ReportsBundle\Entity\FuelTank;

/**
 * Car controller.
 *
 */
class CarController extends Controller
{

    /**
     * Lists all Car entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InzReportsBundle:Car')->findAll();

        return $this->render('InzReportsBundle:Car:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    public function refuelAction(Request $request, $id)
    {
        $car = $this->getDoctrine()->getRepository('InzReportsBundle:Car')->find($id);
        
        $entity = new FuelTank();
        
        $form = $this->createForm(new FuelType($car), $entity, array(
                    'method' => 'POST',
                ))
                ->add('submit', 'submit', array('label' => 'Create'));
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('car_show', array('id' => $id, 'company_id' => $request->get('company_id'))));
        }
        return $this->render('InzReportsBundle:Car:refuel.html.twig', array(
            'entity' => $car,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Creates a new Car entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Car();
        $form = $this->createCreateForm($entity, $request);
        $form->add('submit', 'submit', array('label' => 'Create'));
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('car_show', array('id' => $entity->getId(), 'company_id' => $request->get('company_id'))));
        }

        return $this->render('InzReportsBundle:Car:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Car entity.
     *
     */
    public function showAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InzReportsBundle:Car')->findCarWithFuel($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Car entity.');
        }

        $deleteForm = $this->createDeleteForm($id, $request);

        return $this->render('InzReportsBundle:Car:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Edits an existing Car entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InzReportsBundle:Car')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Car entity.');
        }

        $deleteForm = $this->createDeleteForm($id, $request);
        $editForm = $this->createCreateForm($entity, $request);
        $editForm->add('submit', 'submit', array('label' => 'Update'));
        
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            
            return $this->redirect($this->generateUrl('car', array('company_id' => $request->get('company_id'))));
        }

        return $this->render('InzReportsBundle:Car:new.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Deletes a Car entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id, $request);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InzReportsBundle:Car')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Car entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('car'));
    }
    
    public function ajaxGetEngineTypeAction($fuelTypeId)
    {
        $repo = $this->getDoctrine()->getRepository('InzReportsBundle:EngineType');
        $result = $repo->getEngineTypeByFuelTypeId($fuelTypeId);
        
        $serializedEntity = $this->container->get('jms_serializer')->serialize($result, 'json');
        
        return new \Symfony\Component\HttpFoundation\Response($serializedEntity);
    }
   

    /**
     * Creates a form to delete a Car entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id, $request)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('car_delete', array('id' => $id, 'company_id' => $request->get('company_id'))))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    /**
     * Creates a form to create a Car entity.
     *
     * @param Car $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Car $entity, Request $request)
    {
        $company = $this->getDoctrine()->getRepository('InzReportsBundle:Company')->findOneById($request->get('company_id'));
        $entity->setCompany($company);
        
        $form = $this->createForm($this->get('inz_reports.form.type.car'), $entity, array(
            'method' => 'POST',
        ));

        return $form;
    }
}
