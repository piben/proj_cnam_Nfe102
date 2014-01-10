<?php

namespace Nfe102\Bundle\RestoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nfe102\Bundle\RestoBundle\Entity\CathegorieProduit;
use Nfe102\Bundle\RestoBundle\Form\CathegorieProduitType;

/**
 * CathegorieProduit controller.
 *
 */
class CathegorieProduitController extends Controller
{

    /**
     * Lists all CathegorieProduit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Nfe102RestoBundle:CathegorieProduit')->findAll();

        return $this->render('Nfe102RestoBundle:CathegorieProduit:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CathegorieProduit entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CathegorieProduit();
        
        $date = new \DateTime("now");
        $entity->setDatecreatecat($date);
        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cathegorieproduit_show', array('id' => $entity->getId())));
        }

        return $this->render('Nfe102RestoBundle:CathegorieProduit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a CathegorieProduit entity.
    *
    * @param CathegorieProduit $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CathegorieProduit $entity)
    {
        $form = $this->createForm(new CathegorieProduitType(), $entity, array(
            'action' => $this->generateUrl('cathegorieproduit_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CathegorieProduit entity.
     *
     */
    public function newAction()
    {
        $entity = new CathegorieProduit();
        $form   = $this->createCreateForm($entity);

        return $this->render('Nfe102RestoBundle:CathegorieProduit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CathegorieProduit entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CathegorieProduit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CathegorieProduit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:CathegorieProduit:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing CathegorieProduit entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CathegorieProduit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CathegorieProduit entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:CathegorieProduit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CathegorieProduit entity.
    *
    * @param CathegorieProduit $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CathegorieProduit $entity)
    {
        $form = $this->createForm(new CathegorieProduitType(), $entity, array(
            'action' => $this->generateUrl('cathegorieproduit_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CathegorieProduit entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CathegorieProduit')->find($id);
        
        $date = new \DateTime("now");     
        $entity->setDatecreatecat($date);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CathegorieProduit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cathegorieproduit_edit', array('id' => $id)));
        }

        return $this->render('Nfe102RestoBundle:CathegorieProduit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CathegorieProduit entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Nfe102RestoBundle:CathegorieProduit')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CathegorieProduit entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cathegorieproduit'));
    }

    /**
     * Creates a form to delete a CathegorieProduit entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cathegorieproduit_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
