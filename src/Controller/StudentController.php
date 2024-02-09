<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    #[Route('/add', name: 'add')]
    public function add(Request $request, ManagerRegistry $managerRegistry): Response
    { 
        $student=new Student();
        $form=$this->createForm(StudentType::class,$student);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em=$managerRegistry->getManager();
           $em->persist($student);
            $em->flush();
            $this->redirectToRoute('add');

        }
        return $this->render('student/add.html.twig',['formS'=> $form->createView()]);
    }
}
