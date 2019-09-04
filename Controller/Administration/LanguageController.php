e<?php

namespace PN\LocaleBundle\Controller\Administration;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use PN\LocaleBundle\Entity\Language;
use PN\LocaleBundle\Form\LanguageType;

/**
 * Language controller.
 *
 * @Route("/language")
 */
class LanguageController extends Controller {

    /**
     * Lists all Language entities.
     *
     * @Route("/", name="pn_locale_language_index", methods={"GET"})
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $languages = $em->getRepository('PNLocaleBundle:Language')->findAll();
        return $this->render('PNLocaleBundle:Administration/Language:index.html.twig', [
                    "languages" => $languages,
        ]);
    }

    /**
     * Creates a new Language entity.
     *
     * @Route("/new", name="pn_locale_language_new", methods={"GET", "POST"})
     */
    public function newAction(Request $request) {
        $language = new Language();
        $form = $this->createForm(LanguageType::class, $language);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($language);
            $em->flush();

            $this->addFlash('success', 'Successfully saved');

            return $this->redirectToRoute('pn_locale_language_index');
        }

        return $this->render('PNLocaleBundle:Administration/Language:new.html.twig', array(
                    'language' => $language,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Language entity.
     *
     * @Route("/{id}/edit", name="pn_locale_language_edit", methods={"GET", "POST"})
     */
    public function editAction(Request $request, Language $language) {

        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');

        $editForm = $this->createForm(LanguageType::class, $language);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Successfully updated');

            return $this->redirectToRoute('pn_locale_language_edit', array('id' => $language->getId()));
        }


        return $this->render('PNLocaleBundle:Administration/Language:edit.html.twig', array(
                    'language' => $language,
                    'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Language entity.
     *
     * @Route("/{id}", name="pn_locale_language_delete", methods={"DELETE"})
     */
    public function deleteAction(Request $request, Language $language) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($language);
        $em->flush();

        return $this->redirectToRoute('pn_locale_language_index');
    }

}
