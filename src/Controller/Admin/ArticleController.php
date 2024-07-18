<?php

namespace App\Controller\Admin;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Requirement\Requirement;
use App\Entity\Candy;
use App\Repository\CandyRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/admin/article', 'admin_article_')]
class ArticleController extends AbstractController
{
    #[Route('/', 'index')]
    public function index(): Response
    {
        return $this->render('Admin/article/index.html.twig');
    }
    #[Route('/create', 'create')]
    public function create(EntityManagerInterface $em): Response
    {
        $object = new Candy;
        $object->setName('chamalow')
            ->setDescription('bonbon mou')
            ->setCreateAt(new DateTimeImmutable())
            ->setSlug('chamalow');


        $em->persist($object);
        $em->flush();
        return $this->render('Admin/article/create.html.twig');
    }
    #[Route('/update/{id}', name: 'update', requirements: ['id' => Requirement::DIGITS])]
    public function update($id, CandyRepository $repository, EntityManagerInterface $em): Response
    {
        // Find() permet de récupérer un enregistrement de la base de donnée grâce à son id
        // $candy= $repository->find(1);

        // FindAll() permet de récuperer tous les enregistrements de la base données.
        // $candy=$repository->findAll();

        // FindBy() permet de récupérer tous les enregistrements de la base de données correspondent à des conditions sur les champs
        // $candy=$repository->findBy(['name'=>'chamalow']);

        // FindOneBy() permet de récuperer un enregistrement de la base de données correspondant à des conditions sur les champs
        // $candy=$repository->findOneBy([
        //     "slug"=>'chamalow',
        //     "name"=>'chamalow'
        // ]);

        // Récupérer l'objet qui contient ce qui est tapé dans l'url et ensuite comment mettre à jour la base de donnée
        $candy = $repository->find($id);
        $candy->setName('Tagada');

        $em->flush();
        dd($candy);

        return $this->render('Admin/article/update.html.twig');
    }


    #[Route('/delete/{id}', name: 'delete', requirements: ['id' => Requirement::DIGITS])]
    public function delete($id, CandyRepository $repository, EntityManagerInterface $em, Candy $candy): Response
    {
        // Supprimer l'enregistrement  de la base de donnée qui à l'id passé en parametre 
        // $candy = $repository->find($id);
        $em->remove($candy);
        $em->flush();

        return $this->render('Admin/article/delete.html.twig');
    }
}
