<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\HomeData;
use AppBundle\Form\HomeDataType;

/**
 * HomeData controller.
 *
 * @Route("/homedata")
 */
class HomeDataController extends Controller
{

    /**
     * Lists all HomeData entities.
     *
     * @Route("/", name="homedata")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:HomeData')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new HomeData entity.
     *
     * @Route("/", name="homedata_create")
     * @Method("POST")
     * @Template("AppBundle:HomeData:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new HomeData();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('homedata_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a HomeData entity.
     *
     * @param HomeData $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(HomeData $entity)
    {
        $form = $this->createForm(new HomeDataType(), $entity, array(
            'action' => $this->generateUrl('homedata_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new HomeData entity.
     *
     * @Route("/new", name="homedata_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new HomeData();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a HomeData entity.
     *
     * @Route("/{id}", name="homedata_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:HomeData')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HomeData entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing HomeData entity.
     *
     * @Route("/{id}/edit", name="homedata_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:HomeData')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HomeData entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a HomeData entity.
    *
    * @param HomeData $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(HomeData $entity)
    {
        $form = $this->createForm(new HomeDataType(), $entity, array(
            'action' => $this->generateUrl('homedata_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing HomeData entity.
     *
     * @Route("/{id}", name="homedata_update")
     * @Method("PUT")
     * @Template("AppBundle:HomeData:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:HomeData')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HomeData entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('homedata_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a HomeData entity.
     *
     * @Route("/{id}", name="homedata_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:HomeData')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find HomeData entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('homedata'));
    }

    /**
     * Creates a form to delete a HomeData entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('homedata_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
