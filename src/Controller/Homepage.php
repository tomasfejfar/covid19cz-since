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
                'rulings' => $this->getItems(),
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
                'description' => 'Usnesení vlády České republiky č. 194 o vyhlášení nouzového stavu pro území České republiky z důvodu ohrožení zdraví v souvislosti s prokázáním výskytu koronaviru /označovaný jako SARS CoV-2/ na území České republiky na dobu od 14.00 hodin dne 12. března 2020 na dobu 30 dnů',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-69',
            ],
            [
                'name' => 'Uzavření hranic - přechody',
                'since' => new DateTimeImmutable('2020-03-12'),
                'description' => 'Usnesení vlády České republiky č. 197 o dočasném znovuzavedení ochrany vnitřních hranic České republiky',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-70',
            ],
            [
                'name' => 'Uzavření hranic - cizinci',
                'since' => new DateTimeImmutable('2020-03-12'),
                'description' => 'Usnesení vlády České republiky č. 198 o zákazu vstupu cizinců, zastavení příjmu žádostí o víza a další povolení k pobytu ...',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-71/zneni-20200331?porov=20200312',
            ],
            [
                'name' => 'Uzavření hospod od 20h, skupiny 30lidí max.',
                'since' => new DateTimeImmutable('2020-03-12'),
                'description' => 'Usnesení vlády České republiky č. 199 o příkazu přítomnosti v provozovnách veřejného stravování, nákupních centrech a dalších facilitách',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-72/zneni-20200316?porov=20200312',
            ],
            [
                'name' => 'Zrušení přeshraniční hromadné dopravy',
                'since' => new DateTimeImmutable('2020-03-12'),
                'description' => 'Usnesení vlády České republiky č. 200 o zákazech přeshraniční přepravy a o výjimkách z tohoto zákazu',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-73',
            ],
            [
                'name' => 'Zavření škol',
                'since' => new DateTimeImmutable('2020-03-12'),
                'description' => 'Usnesení vlády České republiky č. 201 o osobní přítomnosti žáků a studentů v různých typech škol a vzdělávacích zařízení',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-74',
            ],
            [
                'name' => 'COVID-19 jako nakažlivá choroba',
                'since' => new DateTimeImmutable('2020-03-12'),
                'description' => 'Nařízení vlády, kterým se mění nařízení vlády č. 453/2009 Sb., kterým se pro účely trestního zákoníku stanoví, co se považuje za nakažlivé lidské nemoci, nakažlivé nemoci zvířat, nakažlivé nemoci rostlin a škůdce užitkových rostlin',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-75',
            ],
            [
                'name' => 'Pracovní povinnost pro mediky',
                'since' => new DateTimeImmutable('2020-03-13'),
                'description' => 'Usnesení vlády České republiky č. 207 o zajištění poskytování péče v zařízeních sociálních služeb po dobu trvání nouzového stavu',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-79',
            ],
            [
                'name' => 'Uzavření sportovišť',
                'since' => new DateTimeImmutable('2020-03-13'),
                'description' => 'Usnesení vlády České republiky č. 208 o zákazu pobytu v bazénech, v turistických informačních centrech a na tržištích',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-80/zneni-20200316?porov=20200313',
            ],
            [
                'name' => 'Povinná karanténa při návratu ze zahraničí',
                'since' => new DateTimeImmutable('2020-03-13'),
                'description' => 'Usnesení vlády České republiky č. 209 o ohlášení návratu z rizikových oblastí a o povinnosti karantény při návratu',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-81',
            ],
            [
                'name' => 'Uzavření obchodů',
                'since' => new DateTimeImmutable('2020-03-14'),
                'description' => 'Usnesení vlády České republiky č. 211 o zákazu maloobchodního prodeje a služeb a o výjimkách z těchto zákazů',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-82',
            ],
            [
                'name' => 'Zákaz prodeje nebaleného pečiva',
                'since' => new DateTimeImmutable('2020-03-15'),
                'description' => 'Usnesení vlády České republiky č. 214 o pozastavení povinných zdravotních prohlídek, o výjimkách z omezení o zákazu prodeje, o nebaleném pečivu a dalších zákazech',
                'more' => 'https://www.zakonyprolidi.cz/cs/2020-84',
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
