<?php
/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace Strategio\Controller;

use ContentioSdk\Attribute\Template;
use Strategio\Controller\Base\BaseController;

class HomeController extends BaseController
{
    public function startup(): void
    {
        parent::startup();
        
        $this->template->clients = $this->getClients();
        $this->template->reviews = $this->getReviews();
        $this->template->members = $this->getMembers();
        $this->template->abilities = $this->getAbilities();
        $this->template->pointList = ContentioController::getCorePointList();
    }
    
    #[Template(path: __DIR__ . '/../../view/controller/home.latte')]
    public function index(): void
    {
    
    }
    
    protected function getReviews(): array
    {
        return [
            [
                'photo' => '/img/review-photo-gopay.jpg',
                'logo' => '/img/review-logo-gopay.svg',
                'company' => 'GoPay s.r.o.',
                'author' => 'Václav Novotný',
                'position' => 'CTO',
                'description' => '
                    Implementaci GoPay platební brány na platformě Shoptet od Strategia využívá již přes 3 800
                    obchodníků. Na této spolupráci oceňujeme především kvalitu řešení, progresivní přístup a rychlou
                    komunikaci. Jiří Zapletal a jeho Strategio je pro nás spolehlivým partnerem, se kterým plánujeme
                    dlouhodobě spolupracovat.
                '
            ],
            [
                'photo' => '/img/review-photo-jcu.jpg',
                'logo' => '/img/review-logo-jcu.svg',
                'company' => 'KIN PF JČU',
                'author' => 'doc. PaedDr. Jiří Vaníček, Ph.D.',
                'position' => 'Vedoucí',
                'description' => '
                    Nové interaktivní úlohy do Bobříka Informatiky, které pro nás Strategio vyvinulo, přinesly
                    rekordy v podobě 150.000 aktivních soutěžících, nárůst 66.6&nbsp;%.
                '
            ],
            [
                'photo' => '/img/review-photo-strechy.jpg',
                'logo' => '/img/review-logo-strechy.svg',
                'company' => 'Střechy Bohemia&nbsp;s.r.o.',
                'author' => 'Roman Kučera',
                'position' => 'CEO',
                'description' => '
                    Strategio pro nás bezproblémově vyvinulo servisní systém a&nbsp;webové stránky, díky kterým si
                    objednáte okamžitou opravu střechy. Oceňujeme kvalitu provedení a pohotový přístup.
                    Připravená řešení v kombinaci s vývojem na zakázku nám přináší okamžité výsledky. Ve spolupráci plánujeme pokračovat i nadále.
                '
            ],
        ];
    }
    
    protected function getClients(): array
    {
        return [
            ['img' => '/img/client-logo-gopay.svg', 'name' => 'GoPay s.r.o.'],
            ['img' => '/img/client-logo-karcher.svg', 'name' => 'Čistící stroje s.r.o.'],
            ['img' => '/img/client-logo-shoptet.svg', 'name' => 'Shoptet a.s.'],
            ['img' => '/img/client-logo-jcu.svg', 'name' => 'Jihočeská univerzita'],
            ['img' => '/img/client-logo-osamtrade.svg', 'name' => 'Osam Trade s.r.o.'],
            ['img' => '/img/client-logo-gproject.svg', 'name' => 'G-Project s.r.o.'],
        ];
    }
    
    protected function getMembers(): array
    {
        return [
            [
                'name' => 'Jiří Zapletal',
                'position' => 'Lead backend developer',
                'photo' => '/img/member-photo-jz.png'
            ],
            [
                'name' => 'David Kolář',
                'position' => 'Lead frontend developer',
                'photo' => '/img/member-photo-jz.png'
            ],
            [
                'name' => 'Anna Tůmová',
                'position' => 'Backend developer',
                'photo' => '/img/member-photo-jz.png'
            ],
            [
                'name' => '+ externisté',
                'position' => 'UX, Design, Marketing',
                'photo' => '/img/member-photo-jz.png'
            ],
        ];
    }
    
    protected function getAbilities(): array
    {
        return [
            ['name' => 'PHP', 'bg' => 'bg-primary'],
            ['name' => 'Nette', 'bg' => 'bg-primary'],
            ['name' => 'Symfony', 'bg' => 'bg-primary'],
            //['name' => 'Laravel', 'bg' => 'bg-primary'],
            ['name' => 'Doctrine ORM', 'bg' => 'bg-primary'],
            ['name' => 'PHP Stan', 'bg' => 'bg-primary'],
            //['name' => 'NodeJS', 'bg' => 'bg-primary'],
            ['name' => 'Typescript', 'bg' => 'bg-primary'],
            ['name' => 'VanillaJS', 'bg' => 'bg-primary'],
            ['name' => 'ReactJS', 'bg' => 'bg-primary'],
            ['name' => 'VueJS', 'bg' => 'bg-primary'],
            ['name' => 'Postgres', 'bg' => 'bg-primary'],
            ['name' => 'MySQL', 'bg' => 'bg-primary'],
            ['name' => 'MariaDB', 'bg' => 'bg-primary'],
            //['name' => 'Redis', 'bg' => 'bg-primary'],
            //['name' => 'Elastic', 'bg' => 'bg-primary'],
            ['name' => 'Firestore', 'bg' => 'bg-primary'],
            ['name' => 'Webpack', 'bg' => 'bg-primary'],
            //['name' => 'SCSS', 'bg' => 'bg-primary'],
            ['name' => 'Bootstrap 5', 'bg' => 'bg-primary'],
            ['name' => 'Tailwind', 'bg' => 'bg-primary'],
            ['name' => 'Google Cloud Platform', 'bg' => 'bg-primary'],
            //['name' => 'Amazon Web Services', 'bg' => 'bg-primary']
            ['name' => 'Docker', 'bg' => 'bg-primary'],
        ];
    }
}