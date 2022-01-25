<?php

namespace PN\LocaleBundle\Controller\Administration;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use PN\LocaleBundle\Entity\Language;
use PN\LocaleBundle\Form\LanguageType;

/**
 * Language controller.
 *
 * @Route("/language")
 */
class LanguageController extends AbstractController
{

    /**
     * @Route("/", name="pn_locale_language_index", methods={"GET"})
     */
    public function indexAction(Request $request, EntityManagerInterface $em): Response
    {
        $languages = $em->getRepository(Language::class)->findAll();

        return $this->render('@PNLocale/Administration/Language/index.html.twig', [
            "languages" => $languages,
        ]);
    }

    /**
     * @Route("/new", name="pn_locale_language_new", methods={"GET", "POST"})
     */
    public function newAction(Request $request, EntityManagerInterface $em): Response
    {
        $language = new Language();
        $form = $this->createForm(LanguageType::class, $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($language);
            $em->flush();

            $this->addFlash('success', 'Successfully saved');

            return $this->redirectToRoute('pn_locale_language_index');
        }

        return $this->render('@PNLocale/Administration/Language/new.html.twig', array(
            'language' => $language,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Language entity.
     *
     * @Route("/{id}/edit", name="pn_locale_language_edit", methods={"GET", "POST"})
     */
    public function editAction(Request $request, Language $language, EntityManagerInterface $em): Response
    {

        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');

        $editForm = $this->createForm(LanguageType::class, $language);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Successfully updated');

            return $this->redirectToRoute('pn_locale_language_edit', array('id' => $language->getId()));
        }


        return $this->render('@PNLocale/Administration/Language/edit.html.twig', array(
            'language' => $language,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * @Route("/{id}", name="pn_locale_language_delete", methods={"DELETE"})
     */
    public function deleteAction(Request $request, Language $language, EntityManagerInterface $em): Response
    {
        $em->remove($language);
        $em->flush();

        return $this->redirectToRoute('pn_locale_language_index');
    }

}
