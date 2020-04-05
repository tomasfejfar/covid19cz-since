<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Ruling;
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
        $items = $this->getItems();
        $active = array_filter($items, fn(Ruling $item) => $item->isActive());
        $started = array_filter($items, fn(Ruling $item) => $item->isStarted());
        $inactive = array_filter($items, fn(Ruling $item) => $item->isInactive());
        $total = count($items);
        return $this->render(
            'index.html.twig', [
                'active_rulings' => $active,
                'started_rulings' => $started,
                'inactive_rulings' => $inactive,
                'id' => 'thank_you',
                'total_rulings' => $total,
                'now' => new DateTimeImmutable(),
            ]
        );
    }

    private function getItems()
    {
        $items = [
            new Ruling(
                'Nouzový stav',
                new DateTimeImmutable('2020-03-12'),
                'Usnesení vlády České republiky č. 194 o vyhlášení nouzového stavu pro území České republiky z důvodu ohrožení zdraví v souvislosti s prokázáním výskytu koronaviru /označovaný jako SARS CoV-2/ na území České republiky na dobu od 14.00 hodin dne 12. března 2020 na dobu 30 dnů',
                'https://www.zakonyprolidi.cz/cs/2020-69'
            ),
            new Ruling(
                'Uzavření hranic - přechody',
                new DateTimeImmutable('2020-03-12'),
                'Usnesení vlády České republiky č. 197 o dočasném znovuzavedení ochrany vnitřních hranic České republiky',
                'https://www.zakonyprolidi.cz/cs/2020-70'
            ),
            new Ruling(
                'Uzavření hranic - cizinci',
                new DateTimeImmutable('2020-03-12'),
                'Usnesení vlády České republiky č. 198 o zákazu vstupu cizinců, zastavení příjmu žádostí o víza a další povolení k pobytu ...',
                'https://www.zakonyprolidi.cz/cs/2020-71/zneni-20200331?porov=20200312'
            ),
            new Ruling(
                'Uzavření hospod od 20h, skupiny 30lidí max.',
                new DateTimeImmutable('2020-03-12'),
                'Usnesení vlády České republiky č. 199 o příkazu přítomnosti v provozovnách veřejného stravování, nákupních centrech a dalších facilitách',
                'https://www.zakonyprolidi.cz/cs/2020-72/zneni-20200316?porov=20200312'
            ),
            new Ruling(
                'Zrušení přeshraniční hromadné dopravy',
                new DateTimeImmutable('2020-03-12'),
                'Usnesení vlády České republiky č. 200 o zákazech přeshraniční přepravy a o výjimkách z tohoto zákazu',
                'https://www.zakonyprolidi.cz/cs/2020-73'
            ),
            new Ruling(
                'Zavření škol',
                new DateTimeImmutable('2020-03-12'),
                'Usnesení vlády České republiky č. 201 o osobní přítomnosti žáků a studentů v různých typech škol a vzdělávacích zařízení',
                'https://www.zakonyprolidi.cz/cs/2020-74'
            ),
            new Ruling(
                'COVID-19 jako nakažlivá choroba',
                new DateTimeImmutable('2020-03-12'),
                'Nařízení vlády, kterým se mění nařízení vlády č. 453/2009 Sb., kterým se pro účely trestního zákoníku stanoví, co se považuje za nakažlivé lidské nemoci, nakažlivé nemoci zvířat, nakažlivé nemoci rostlin a škůdce užitkových rostlin',
                'https://www.zakonyprolidi.cz/cs/2020-75'
            ),
            new Ruling(
                'Pracovní povinnost pro studenty sociálních služeb',
                new DateTimeImmutable('2020-03-13'),
                'Usnesení vlády České republiky č. 207 o zajištění poskytování péče v zařízeních sociálních služeb po dobu trvání nouzového stavu',
                'https://www.zakonyprolidi.cz/cs/2020-79'
            ),
            new Ruling(
                'Uzavření sportovišť',
                new DateTimeImmutable('2020-03-13'),
                'Usnesení vlády České republiky č. 208 o zákazu pobytu v bazénech, v turistických informačních centrech a na tržištích',
                'https://www.zakonyprolidi.cz/cs/2020-80/zneni-20200316?porov=20200313'
            ),
            new Ruling(
                'Povinná karanténa při návratu ze zahraničí',
                new DateTimeImmutable('2020-03-13'),
                'Usnesení vlády České republiky č. 209 o ohlášení návratu z rizikových oblastí a o povinnosti karantény při návratu',
                'https://www.zakonyprolidi.cz/cs/2020-81'
            ),
            new Ruling(
                'Uzavření obchodů',
                new DateTimeImmutable('2020-03-14'),
                'Usnesení vlády České republiky č. 211 o zákazu maloobchodního prodeje a služeb a o výjimkách z těchto zákazů',
                'https://www.zakonyprolidi.cz/cs/2020-82'
            ),
            new Ruling(
                'Zákaz prodeje nebaleného pečiva',
                new DateTimeImmutable('2020-03-15'),
                'Usnesení vlády České republiky č. 214 o pozastavení povinných zdravotních prohlídek, o výjimkách z omezení o zákazu prodeje, o nebaleném pečivu a dalších zákazech',
                'https://www.zakonyprolidi.cz/cs/2020-84'
            ),
            new Ruling(
                'Doporučení homeoffice',
                new DateTimeImmutable('2020-03-15'),
                'Usnesení vlády České republiky č. 215 o zákazu volného pohybu osob a omezení pohybu',
                'https://www.zakonyprolidi.cz/cs/2020-85'
            ),
            new Ruling(
                'Povinné roušky',
                new DateTimeImmutable('2020-03-18'),
                'Usnesení vlády České republiky č. 247 o povinném nošení ochranných prostředků, které brání šíření kapének a nařízení pro přeshraniční pracovníky',
                'https://www.zakonyprolidi.cz/cs/2020-106'
            ),
            new Ruling(
                'Hodiny vyhrazené v obchodech pro důchodce',
                new DateTimeImmutable('2020-03-18'),
                'Usnesení vlády České republiky č. 249 o přijetí krizového opatření pro prodej v maloobchodních prodejnách pro osoby starší 65 let',
                'https://www.zakonyprolidi.cz/cs/2020-108'
            ),
            new Ruling(
                'Zákaz příjmu nových pacientů do lázní',
                new DateTimeImmutable('2020-03-25'),
                'Všem poskytovatelům zdravotních služeb poskytujících lázeňskou léčebně
rehabilitační péči se zakazuje přijímat nové pacienty za účelem poskytování lázeňské
léčebně rehabilitační péče.',
                'https://koronavirus.mzcr.cz/wp-content/uploads/2020/03/Mimo%C5%99%C3%A1dn%C3%A9-opat%C5%99en%C3%AD-l%C3%A1ze%C5%88sk%C3%A1-l%C3%A9%C4%8Debn%C4%9B-rehabilita%C4%8Dn%C3%AD-p%C3%A9%C4%8De.pdf'
            ),
            new Ruling(
                'Omezení skupin na max. 2 osoby',
                new DateTimeImmutable('2020-04-01'),
                '...pobývat na veřejně dostupných místech nejvýše v počtu dvou osob, s výjimkou členů domácnosti, výkonu povolání, nebo jiné obdobné činnosti, účasti na pohřbu, a zachovávat při kontaktu s ostatními osobami odstup nejméně 2 metry, pokud to je možné.',
                'https://koronavirus.mzcr.cz/wp-content/uploads/2020/03/Mimo%C5%99%C3%A1dn%C3%A9-opat%C5%99en%C3%AD-prodlou%C5%BEen%C3%AD-omezen%C3%AD-pohybu-osob.pdf'
            ),
        ];
        return $items;
    }
}
{

}
