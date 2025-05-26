<?php

namespace App\Controller;

use App\Entity\Equipment;
use App\Form\EquipmentTypeForm;
use App\Repository\EquipmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Guesser\Name;
use PhpParser\Node\Expr\Cast\String_;

// La classe Request est essentielle dans Symfony car elle permet d'accéder aux informations de la requête HTTP, notamment :
    // - Les paramètres GET et POST ($request->query->get('nom'), $request->request->get('password'))

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(EquipmentRepository $equipmentRepository): Response
    {

        $equipments = $equipmentRepository->findAll();

        // $equipment = $equipmentRepository->find(2);
      

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'equipments' => $equipments
        ]);
    }





    #[Route('/product/addproduct', name: 'addproduct_app')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response

    {
        $equipment = new Equipment();
        $form = $this->createForm(EquipmentTypeForm::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On rajoute les dernières infos qui manquent
            // $equipment->setName(new String());
            // $recipe->setModifiedOn(new DateTime());
            // $recipe->setNumberOfLikes(0);
            // On sauvegarde quand tout est prêt
            $entityManager->persist($equipment);
            $entityManager->flush();
            return $this->redirectToRoute('app_product');
        }

        return $this->render('product/addproduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    //Route de detail
    #[Route('/equipment/{id}', name: 'equipment_show', methods: ['GET'])]
public function detail(int $id, EquipmentRepository $equipmentRepository): Response
{
    $equipment = $equipmentRepository->find($id);

    if (!$equipment) {
        throw $this->createNotFoundException('Recette introuvable.');
    }

    return $this->render('product/show.html.twig', [
        'equipment' => $equipment,
    ]);
}




    
}
