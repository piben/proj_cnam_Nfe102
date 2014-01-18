<?php

namespace Nfe102\Bundle\RestoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nfe102\Bundle\RestoBundle\Entity\Adresse;
use Nfe102\Bundle\RestoBundle\Form\AdresseType;

/**
 * Adresse controller.
 *
 */
class AdresseController extends Controller
{

    /**
     * Lists all Adresse entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Nfe102RestoBundle:Adresse')->findAll();

        return $this->render('Nfe102RestoBundle:Adresse:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Adresse entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Adresse();
        
        $date = new \DateTime("now");     
        $entity->setDatecreateadresse($date);
        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adresse_show', array('id' => $entity->getId())));
        }

        return $this->render('Nfe102RestoBundle:Adresse:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Adresse entity.
    *
    * @param Adresse $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Adresse $entity)
    {
        //$idclient  = $this->container->get('security.context')->getToken()->getUser()->getId();
        
        $form = $this->createForm(new AdresseType(), $entity, array(
            'action' => $this->generateUrl('adresse_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Adresse entity.
     *
     */
    public function newAction()
    {
        $entity = new Adresse();
        $form   = $this->createCreateForm($entity);

        return $this->render('Nfe102RestoBundle:Adresse:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Adresse entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Adresse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adresse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:Adresse:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Adresse entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Adresse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adresse entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:Adresse:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Adresse entity.
    *
    * @param Adresse $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Adresse $entity)
    {
        $form = $this->createForm(new AdresseType(), $entity, array(
            'action' => $this->generateUrl('adresse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Adresse entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Adresse')->find($id);
        
        $date = new \DateTime("now");     
        $entity->setDateupdateadresse($date);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adresse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adresse_edit', array('id' => $id)));
        }

        return $this->render('Nfe102RestoBundle:Adresse:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Adresse entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Nfe102RestoBundle:Adresse')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Adresse entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adresse'));
    }

    /**
     * Creates a form to delete a Adresse entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adresse_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
