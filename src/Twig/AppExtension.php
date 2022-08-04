<?php

namespace App\Twig;

use App\Repository\CategorieRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    // public function getFilters(): array
    // {
    //     return [
    //         // If your filter generates SAFE HTML, you should add a third
    //         // parameter: ['is_safe' => ['html']]
    //         // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
    //         new TwigFilter('filter_name', [$this, 'doSomething']),
    //     ];
    // }
    private $categorierepo;
    public function __construct(CategorieRepository $categorieRepository)
    {
        $this->categorierepo = $categorieRepository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('categories', [$this, 'categorie']),
        ];
    }

    public function categorie()
    {
      return $this->categorierepo->findAll();
    }
}
