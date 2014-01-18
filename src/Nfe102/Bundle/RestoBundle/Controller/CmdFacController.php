<?php

namespace Nfe102\Bundle\RestoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nfe102\Bundle\RestoBundle\Entity\CmdFac;
use Nfe102\Bundle\RestoBundle\Form\CmdFacType;

/**
 * CmdFac controller.
 *
 */
class CmdFacController extends Controller
{

    /**
     * Lists all CmdFac entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Nfe102RestoBundle:CmdFac')->findAll();

        return $this->render('Nfe102RestoBundle:CmdFac:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CmdFac entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CmdFac();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cmdfac_show', array('id' => $entity->getId())));
        }

        return $this->render('Nfe102RestoBundle:CmdFac:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a CmdFac entity.
    *
    * @param CmdFac $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CmdFac $entity)
    {
        $form = $this->createForm(new CmdFacType(), $entity, array(
            'action' => $this->generateUrl('cmdfac_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CmdFac entity.
     *
     */
    public function newAction()
    {
        $entity = new CmdFac();
        $form   = $this->createCreateForm($entity);

        return $this->render('Nfe102RestoBundle:CmdFac:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CmdFac entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CmdFac')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CmdFac entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:CmdFac:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing CmdFac entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CmdFac')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CmdFac entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:CmdFac:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CmdFac entity.
    *
    * @param CmdFac $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CmdFac $entity)
    {
        $form = $this->createForm(new CmdFacType(), $entity, array(
            'action' => $this->generateUrl('cmdfac_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CmdFac entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CmdFac')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CmdFac entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cmdfac_edit', array('id' => $id)));
        }

        return $this->render('Nfe102RestoBundle:CmdFac:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CmdFac entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Nfe102RestoBundle:CmdFac')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CmdFac entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cmdfac'));
    }

    /**
     * Creates a form to delete a CmdFac entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cmdfac_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
