<?php

namespace Nfe102\Bundle\RestoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nfe102\Bundle\RestoBundle\Entity\Transporteur;
use Nfe102\Bundle\RestoBundle\Form\TransporteurType;

/**
 * Transporteur controller.
 *
 */
class TransporteurController extends Controller
{

    /**
     * Lists all Transporteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Nfe102RestoBundle:Transporteur')->findAll();

        return $this->render('Nfe102RestoBundle:Transporteur:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Transporteur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Transporteur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('transporteur_show', array('id' => $entity->getId())));
        }

        return $this->render('Nfe102RestoBundle:Transporteur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Transporteur entity.
    *
    * @param Transporteur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Transporteur $entity)
    {
        $form = $this->createForm(new TransporteurType(), $entity, array(
            'action' => $this->generateUrl('transporteur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Transporteur entity.
     *
     */
    public function newAction()
    {
        $entity = new Transporteur();
        $form   = $this->createCreateForm($entity);

        return $this->render('Nfe102RestoBundle:Transporteur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Transporteur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Transporteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transporteur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:Transporteur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Transporteur entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Transporteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transporteur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:Transporteur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Transporteur entity.
    *
    * @param Transporteur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Transporteur $entity)
    {
        $form = $this->createForm(new TransporteurType(), $entity, array(
            'action' => $this->generateUrl('transporteur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Transporteur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Transporteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transporteur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('transporteur_edit', array('id' => $id)));
        }

        return $this->render('Nfe102RestoBundle:Transporteur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Transporteur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Nfe102RestoBundle:Transporteur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Transporteur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('transporteur'));
    }

    /**
     * Creates a form to delete a Transporteur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('transporteur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
