<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/manager/account")
 */
abstract class AppController extends AbstractController
{

    protected function handleErrors(FormInterface $form): array
    {
        if (!$form->isSubmitted()) {
            $errors = array();
        } else {
            $errors = [];

            foreach ($form->getErrors() as $key => $error) {
                if ($form->isRoot()) {
                    $errors['#'][] = $error->getMessage();
                } else {
                    $errors[] = $error->getMessage();
                }
            }

            foreach ($form->all() as $child) {
                if (!$child->isValid()) {
                    $errors[$child->getName()] = $this->handleErrors($child);
                }
            }
        }

        return $errors;
    }
}
