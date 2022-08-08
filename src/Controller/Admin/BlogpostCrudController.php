<?php

namespace App\Controller\Admin;

use App\Entity\Blogpost;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Bridge\Doctrine\DependencyInjection\Security\UserProvider\EntityFactory;

class BlogpostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blogpost::class;
    }
 
   public function configureCrud(Crud $crud): Crud
   {
        return $crud  
                    ->setEntityLabelInPlural('Actualités')
                    ->setEntityLabelInSingular('Actualité')
                    ->setPaginatorPageSize(5);
   }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id')->hideOnForm(),
           TextField::new('titre'),
           TextField::new('contenu'),
           TextField::new('slug')->hideOnForm(),
           SlugField::new('slug')->setTargetFieldName('titre')->hideOnIndex(),
           DateTimeField::new('datepublication')->hideOnForm(),
       
            
        ];
    }
    
}
