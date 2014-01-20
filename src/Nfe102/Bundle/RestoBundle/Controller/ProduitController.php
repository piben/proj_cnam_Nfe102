<?php

namespace Nfe102\Bundle\RestoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nfe102\Bundle\RestoBundle\Entity\Produit;
use Nfe102\Bundle\RestoBundle\Entity\CategorieProduit;
use Nfe102\Bundle\RestoBundle\Form\ProduitType;
use Nfe102\Bundle\RestoBundle\Form\CategorieProduitType;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\HttpFoundation\Response;
/**
 * Produit controller.
 *
 */
class ProduitController extends Controller
{

    /**
     * Lists all Produit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Nfe102RestoBundle:Produit')->findAll();

        return $this->render('Nfe102RestoBundle:Produit:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    /**
     * Lists json product
     */
    public function jsonshowAction() {
        
        
    $em = $this->getDoctrine()->getManager();
    $query = $em->createQuery(
    'SELECT p.id,p.nom,p.description,p.image,p.prix
     FROM Nfe102RestoBundle:Produit p
     WHERE p.dispo LIKE :dispo
     ORDER BY p.prix ASC'
     )->setParameter('dispo', '1111111');

        $entities = $query->getResult();


        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
                    JsonEncoder()));
        $json = $serializer->serialize($entities, 'json');

        return new Response($json, 200, array('Content-Type' => 'application/json'));
  
    }


    /**
     * Creates a new Produit entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Produit();
        
        $date = new \DateTime("now");     
        $entity->setDatecreateprod($date);
        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('produit_show', array('id' => $entity->getId())));
        }

        return $this->render('Nfe102RestoBundle:Produit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Produit entity.
    *
    * @param Produit $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Produit $entity)
    {
        $form = $this->createForm(new ProduitType(), $entity, array(
            'action' => $this->generateUrl('produit_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Produit entity.
     *
     */
    public function newAction()
    {
        $entity = new Produit();
        $form   = $this->createCreateForm($entity);
        
        
        $CategorieProduitType = $this->createForm(new CategorieProduitType());
        
        return $this->render('Nfe102RestoBundle:Produit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'CategorieProduitType' => $CategorieProduitType->createView()
        ));
    }

    /**
     * Finds and displays a Produit entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Produit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:Produit:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }
    
        /**
     * Finds and displays a Produit entity (view only).
     *
     */
    public function showviewAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Produit')->find($request->get('id'));
         //   $entity2 = $em->getRepository('Nfe102RestoBundle:CategorieProduit')->findOneBytype('PIZZA');
            
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produit entity.');
        }
//        var_dump($entity);die();
//        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
//                    JsonEncoder()));
//        $json = $serializer->serialize($entity, 'json');
        //echo $entity->getIdcategorie(); //, 'idCat' =>$entity2->getId()
        
            $entie = array('id' => $entity->getId(),'nom'=>$entity->getnom()
                    ,'prix'=>$entity->getprix(),'description'=>$entity->getdescription());
      
        
        return new Response(json_encode($entie), 200, array('Content-Type' => 'application/json'));
  
       
    }

    /**
     * Displays a form to edit an existing Produit entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Produit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produit entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Nfe102RestoBundle:Produit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Produit entity.
    *
    * @param Produit $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Produit $entity)
    {
        $form = $this->createForm(new ProduitType(), $entity, array(
            'action' => $this->generateUrl('produit_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Produit entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Nfe102RestoBundle:Produit')->find($id);
        
        $date = new \DateTime("now");     
        $entity->setDatecreateprod($date);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('produit_edit', array('id' => $id)));
        }

        return $this->render('Nfe102RestoBundle:Produit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Produit entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Nfe102RestoBundle:Produit')->find($id);
            
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Produit entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('produit'));
    }

    /**
     * Creates a form to delete a Produit entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('produit_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
