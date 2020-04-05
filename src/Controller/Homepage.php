<?php

declare(strict_types = 1);

namespace App\Controller;

use DateInterval;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Homepage extends AbstractController
{

    /**
     * @Route(path="", name="homepage")
     */
    public function __invoke(): Response
    {
        return $this->render(
            'index.html.twig', [
                'items' => $this->getItems(),
                'id' => 'thank_you',
                'commit_limit' => 5,
                'now' => new DateTimeImmutable(),
            ]
        );
    }

    private function getItems()
    {
        $items = [
            [
                'name' => 'Nouzový stav',
                'since' => new DateTimeImmutable('2020-03-12'),
                'description' => 'Vláda v souladu s čl. 5 a 6 ústavního zákona č. 110/1998 Sb., o bezpečnosti České republiky, vyhlašuje pro území České republiky z důvodu ohrožení zdraví v souvislosti s prokázáním výskytu koronaviru (označovaný jako SARS CoV-2) na území České republiky nouzový stav na dobu od 14.00 hodin dne 12. března 2020 na dobu 30 dnů.',
            ],
            [
                'name' => 'Zákaz volného pohybu',
                'since' => new DateTimeImmutable('2020-03-12'),
                'description' => 'S platností do dne 11. dubna 2020 do 6:00 se zakazuje volný pohyb osob na území celé České republiky',
            ],
            [
                'name' => 'Povinné roušky',
                'since' => new DateTimeImmutable('2020-03-18'),
                'description' => 'Zakazuje všem osobám pohyb a pobyt na všech místech mimo bydliště bez ochranných prostředků dýchacích cest (nos, ústa), jako jsou respirátor, rouška, ústenka, šátek nebo šál nebo jiné prostředky, které brání šíření kapének',
            ],

        ];
        array_walk(
            $items, function (&$item) {
            /** @var DateTimeImmutable $since */
            $since = $item['since'];
            $item['visible_from'] = $since->add(new DateInterval('P21D'));
            $item['visible_to'] = $since->add(new DateInterval('P28D'));
            $item['remaining_days_from'] = $item['visible_from']->diff(new DateTimeImmutable())->days;
            $item['remaining_days_to'] = $item['visible_to']->diff(new DateTimeImmutable())->days;
        }
        );
        return $items;
    }
}
{

}
