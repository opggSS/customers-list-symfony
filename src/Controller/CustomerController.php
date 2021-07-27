<?php

namespace App\Controller;

use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customer", name="customer")
     */
    public function index(CustomerRepository $customerRepository): Response
    {
        $Customers = $CustomerRepository->findAll();

        $response = new Response(json_encode($Customers));
        $response->headers->set('Content-Type', 'application/json');

        return $response;

        }
    }
