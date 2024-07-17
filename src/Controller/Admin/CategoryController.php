<?php

namespace App\Controller\Admin;

use App\Entity\Category;

use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Candy;
use App\Repository\CategoryRepository;

#[Route('/admin/category', 'admin_category_')]
class CategoryController extends AbstractController
{
    #[Route('/', 'index')]
    public function index(): Response
    {
        return $this->render('Admin/category/index.html.twig');
    }
    #[Route('/create', 'create')]
    public function create(EntityManagerInterface $em): Response
    {
        $object = new Category;
        $object->setName('Sucettes')
            ->setDescription('bonbon à sucer avec de différentes saveurs')
            ->setCreateAt(new DateTimeImmutable())
            ->setUpdateAt(new DateTimeImmutable());

        $em->persist($object);
        $em->flush();

        return $this->render('Admin/category/create.html.twig');
    }
    #[Route('/update/{id}', 'update')]
    public function update($id, EntityManagerInterface $em, CategoryRepository $repository): Response
    {
        $object = $repository->find($id);
        $object->setName('Guimauve');

        $em->flush();
        return $this->render('Admin/category/update.html.twig');
    }
    #[Route('/delete/{id}', 'delete')]
    public function delete($id,EntityManagerInterface $em,CategoryRepository $repository, Candy $candy): Response
    {
        $em->remove($candy);
        $em->flush();
        return $this->render('Admin/category/delete.html.twig');
    }
}
