<?php

namespace Nfe102\Bundle\RestoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nfe102\Bundle\RestoBundle\Entity\Panier;
use Nfe102\Bundle\RestoBundle\Form\PanierType;

/**
 * Panier controller.
 *
 */
class PanierController extends Controller
{

    /**
     * Lists all Panier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Nfe102RestoBundle:Panier')->findAll();

        return $this->render('Nfe102RestoBundle:Panier:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Panier entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Panier();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('panier_show', array('id' => $entity->getId())));
        }

        return $this->render('Nfe102RestoBundle:Panier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Panier entity.
    *
    * @param Panier $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Panier $entity)
    {
        $form = $this->createForm(new PanierType(), $entity, array(
            'action' => $this->generateUrl('panier_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Panier entity.
     *
     */
    public function newAction()
    {
        $entity = new Panier();
        $form   = $this->createCreateForm($entity);

        return $this->render('Nfe102RestoBundle:Panier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Panier entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Panier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Panier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:Panier:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Panier entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Panier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Panier entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:Panier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Panier entity.
    *
    * @param Panier $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Panier $entity)
    {
        $form = $this->createForm(new PanierType(), $entity, array(
            'action' => $this->generateUrl('panier_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Panier entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Panier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Panier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('panier_edit', array('id' => $id)));
        }

        return $this->render('Nfe102RestoBundle:Panier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Panier entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Nfe102RestoBundle:Panier')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Panier entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('panier'));
    }

    /**
     * Creates a form to delete a Panier entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('panier_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
