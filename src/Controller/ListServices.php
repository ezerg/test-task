<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\MicroServices\ServiceManager;
use App\Services\MicroServices\ConverterManager;
use App\Services\MicroServices\TypeMapper;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * App\Controller\Api
 */
class ListServices extends AbstractController
{
    /**
     * @Route("/services-list", methods={"GET","POST"})
     * @param Request $request
     * @param ServiceManager $serviceManager
     * @param ConverterManager $converterManager
     * @return Response
     * @throws Exception
     */
    public function execute(
        Request $request,
        ServiceManager $serviceManager,
        ConverterManager $converterManager
    ): Response {
        $forms = [];
        $formData = $request->get('form');
        $services = $serviceManager->loadServices();

        if ($request->isMethod(Request::METHOD_POST) && isset($formData['name'])) {
            $service = $converterManager->getServiceConverted($formData);
            $serviceManager->saveServices($service);
        }

        foreach ($services as $key => $service) {
            $form = $this->createFormBuilder($service)
                ->add('field1', TypeMapper::getType($key, 'field1'), ['required' => false])
                ->add('field2', TypeMapper::getType($key, 'field2'), ['required' => false])
                ->add('field3', TypeMapper::getType($key, 'field3'), ['required' => false])
                ->add('name', HiddenType::class)
                ->add('save', SubmitType::class, ['label' => 'Update ' . $key])
                ->getForm();

            $forms['form' . str_replace('-', '', ucwords($key, '-'))] = $form->createView();
        }

        return $this->render('services/list.html.twig', $forms);
    }
}
