<?php

namespace Inz\ReportsBundle\Controller;

use Inz\ReportsBundle\Entity\CauldronTank;
use Inz\ReportsBundle\Form\CauldronTankType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Inz\ReportsBundle\Entity\Cauldron;
use Inz\ReportsBundle\Form\CauldronType;

/**
 * Cauldron controller.
 *
 */
class CauldronController extends Controller
{

    /**
     * Lists all Cauldron entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InzReportsBundle:Cauldron')->findAll();

        return $this->render('InzReportsBundle:Cauldron:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function tankAction(Request $request, $id)
    {
        $cauldron = $this->getDoctrine()->getRepository('InzReportsBundle:Cauldron')->find($id);

        $entity = new CauldronTank();

        $form = $this->createForm(new CauldronTankType($cauldron), $entity, array(
            'method' => 'POST',
        ))
            ->add('submit', 'submit', array('label' => 'Create'));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cauldron_show', array('id' => $id, 'company_id' => $request->get('company_id'))));
        }
        return $this->render('InzReportsBundle:Car:refuel.html.twig', array(
            'entity' => $cauldron,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Cauldron entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Cauldron();

        $form = $this->createCreateForm($entity, $request);
        $form->add('submit', 'submit', array('label' => 'Create'));

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cauldron_show', array('id' => $entity->getId(), 'company_id' => $request->get('company_id'))));
        }

        return $this->render('InzReportsBundle:Cauldron:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cauldron entity.
     *
     */
    public function showAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InzReportsBundle:Cauldron')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cauldron entity.');
        }

        $deleteForm = $this->createDeleteForm($id, $request);

        return $this->render('InzReportsBundle:Cauldron:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cauldron entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InzReportsBundle:Cauldron')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cauldron entity.');
        }

        $editForm = $this->createCreateForm($entity, $request);
        $deleteForm = $this->createDeleteForm($id, $request);

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cauldron', array('company_id' => $request->get('company_id'))));
        }

        return $this->render('InzReportsBundle:Cauldron:new.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Deletes a Cauldron entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id, $request);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InzReportsBundle:Cauldron')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cauldron entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cauldron', array('company_id' => $request->get('company_id'))));
    }

    /**
     * Creates a form to create a Cauldron entity.
     *
     * @param Cauldron $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cauldron $entity, $request)
    {
        $company = $this->getDoctrine()->getRepository('InzReportsBundle:Company')->findOneById($request->get('company_id'));
        $entity->setCompany($company);

        $form = $this->createForm(new CauldronType(), $entity, array(
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Creates a form to delete a Cauldron entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id, $request)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cauldron_delete', array('id' => $id,  'company_id' => $request->get('company_id'))))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
