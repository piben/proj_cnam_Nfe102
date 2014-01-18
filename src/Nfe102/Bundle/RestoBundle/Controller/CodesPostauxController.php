<?php

namespace Nfe102\Bundle\RestoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nfe102\Bundle\RestoBundle\Entity\CodesPostaux;
use Nfe102\Bundle\RestoBundle\Form\CodesPostauxType;

/**
 * CodesPostaux controller.
 *
 */
class CodesPostauxController extends Controller
{

    /**
     * Lists all CodesPostaux entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Nfe102RestoBundle:CodesPostaux')->findAll();

        return $this->render('Nfe102RestoBundle:CodesPostaux:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CodesPostaux entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CodesPostaux();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('codespostaux_show', array('id' => $entity->getId())));
        }

        return $this->render('Nfe102RestoBundle:CodesPostaux:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a CodesPostaux entity.
    *
    * @param CodesPostaux $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CodesPostaux $entity)
    {
        $form = $this->createForm(new CodesPostauxType(), $entity, array(
            'action' => $this->generateUrl('codespostaux_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CodesPostaux entity.
     *
     */
    public function newAction()
    {
        $entity = new CodesPostaux();
        $form   = $this->createCreateForm($entity);

        return $this->render('Nfe102RestoBundle:CodesPostaux:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CodesPostaux entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CodesPostaux')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CodesPostaux entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:CodesPostaux:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing CodesPostaux entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CodesPostaux')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CodesPostaux entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:CodesPostaux:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CodesPostaux entity.
    *
    * @param CodesPostaux $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CodesPostaux $entity)
    {
        $form = $this->createForm(new CodesPostauxType(), $entity, array(
            'action' => $this->generateUrl('codespostaux_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CodesPostaux entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CodesPostaux')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CodesPostaux entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('codespostaux_edit', array('id' => $id)));
        }

        return $this->render('Nfe102RestoBundle:CodesPostaux:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CodesPostaux entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Nfe102RestoBundle:CodesPostaux')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CodesPostaux entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('codespostaux'));
    }

    /**
     * Creates a form to delete a CodesPostaux entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('codespostaux_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
