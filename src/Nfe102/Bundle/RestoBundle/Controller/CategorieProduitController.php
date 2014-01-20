<?php

namespace Nfe102\Bundle\RestoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nfe102\Bundle\RestoBundle\Entity\CategorieProduit;
use Nfe102\Bundle\RestoBundle\Form\CategorieProduitType;
use Symfony\Component\HttpFoundation\Response;

/**
 * CategorieProduit controller.
 *
 */
class CategorieProduitController extends Controller
{

    /**
     * Lists all CategorieProduit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Nfe102RestoBundle:CategorieProduit')->findAll();

        return $this->render('Nfe102RestoBundle:CategorieProduit:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CategorieProduit entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CategorieProduit();
        
        $date = new \DateTime("now");     
        $entity->setDatecreatecat($date);
        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
         return new Response("Add cat ok", 200);
       //     return $this->redirect($this->generateUrl('categorieproduit_show', array('id' => $entity->getId())));
        }
          
       return new Response("Add pas ok", 500); 
//        return $this->render('Nfe102RestoBundle:CategorieProduit:new.html.twig', array(
//            'entity' => $entity,
//            'form'   => $form->createView(),
//        ));
    }

    /**
    * Creates a form to create a CategorieProduit entity.
    *
    * @param CategorieProduit $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CategorieProduit $entity)
    {
        $form = $this->createForm(new CategorieProduitType(), $entity, array(
            'action' => $this->generateUrl('categorieproduit_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CategorieProduit entity.
     *
     */
    public function newAction()
    {
        $entity = new CategorieProduit();
        $form   = $this->createCreateForm($entity);

        return $this->render('Nfe102RestoBundle:CategorieProduit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CategorieProduit entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CategorieProduit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategorieProduit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:CategorieProduit:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing CategorieProduit entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CategorieProduit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategorieProduit entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:CategorieProduit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CategorieProduit entity.
    *
    * @param CategorieProduit $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CategorieProduit $entity)
    {
        $form = $this->createForm(new CategorieProduitType(), $entity, array(
            'action' => $this->generateUrl('categorieproduit_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CategorieProduit entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:CategorieProduit')->find($id);
        
        $date = new \DateTime("now");     
        $entity->setDateupdatecat($date);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategorieProduit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('categorieproduit_edit', array('id' => $id)));
        }

        return $this->render('Nfe102RestoBundle:CategorieProduit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CategorieProduit entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Nfe102RestoBundle:CategorieProduit')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CategorieProduit entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('categorieproduit'));
    }

    /**
     * Creates a form to delete a CategorieProduit entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categorieproduit_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
