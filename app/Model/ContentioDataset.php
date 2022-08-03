<?php

namespace Strategio\Model;

use Strategio\Model\Enum\Feature;

class ContentioDataset
{
    /**
     * @return array<int, string>
     */
    public function getCorePointList(): array
    {
        return [
            'Nulová počáteční investice za realizaci webu i e-shopu.',
            'Spuštění nového projektu (bez grafických úprav) během pár minut od poptávky.',
            '<strong>Za grafické úpravy zaplatíte až tehdy, když Vám projekt začne reálně vydělávat.</strong>',
    
            'Nejlevnější a nejrychlejší způsob zakázkové realizace webu i e-shopu na celém trhu.',
    
            'Neomezené úložiště dat a jejich neomezený přenos.',
    
            'Doména na 1. rok ZDARMA.',
            'Platební brána GoPay ZDARMA.',
    
            'Žádné předplatné modulů ani dokupování nově vyvinutých.',
            'Žádné omezení ani limity administračního rozhraní.',
    
            'Neomezený počet produktů v e-shopu.',
            'Pokročilá správa článků a dalšího obsahu.',
        ];
    }
    
    /**
     * @return array<string, mixed>
     */
    public function getPointList(): array
    {
        return [
            'core' => $this->getCorePointList(),
            'more' => [
                '<span class="fw-bold">Naprostá volnost v úpravách na míru.</span>',
                '<span class="fw-bold">Revoluční konkurenční výhoda v oblasti webů a e-shopových řešení.</span>',
            ]
        ];
    }
    
    /**
     * @param string $module
     * @return array<string, mixed>
     */
    public function getFeaturesCompletion(string $module): array
    {
        $features = $this->getModules()[$module]['features'];
        
        return [
            'todo' => count(array_filter($features, fn($feature) => $feature['status'] === Feature::TODO)),
            'in_progress' => count(array_filter($features, fn($feature) => $feature['status'] === Feature::IN_PROGRESS)),
            'done' => count(array_filter($features, fn($feature) => $feature['status'] === Feature::DONE)),
        ];
    }
    
    /**
     * @return array<string, int>
     */
    public function getModulesCompletion(): array
    {
        $todo = $inProgress = $done = 0;
        
        foreach ($this->getModules() as $moduleName => $module) {
            $completion = $this->getFeaturesCompletion($moduleName);
            $todo += $completion['todo'];
            $inProgress += $completion['in_progress'];
            $done += $completion['done'];
        }
        
        return [
            'todo' => $todo,
            'in_progress' => $inProgress,
            'done' => $done
        ];
    }
    
    /**
     * @return array<string, string>
     */
    public function getTechnologies(): array
    {
        return [
            'PHP 8.1' => '/img/logo-php.png',
            'Nette Framework 3.1' => '/img/logo-nette.png',
            'Doctrine 2 ORM' => '/img/logo-doctrine.png',
            'PHPStan' => '/img/logo-phpstan.png',
            'Google Cloud Platform' => '/img/logo-gcp.png'
        ];
    }
    
    /**
     * @return array<string, mixed>
     */
    public function getPackages(): array
    {
        return [
            'in_house' => [
                'name' => 'Starter',
                'price' => 499,
                'items' => [
                    ['name' => 'Doména 1. rok ZDARMA'],
                    ['name' => '1 e-mailová adresa (1GB)'],
                    ['name' => 'Všechny moduly a funkce'],
                    ['name' => '10GB úložiště dat'],
                    ['name' => 'Neomezený přenos dat'],
                    ['name' => 'Bez možnosti grafických úprav'],
                ],
                'more_items' => [],
                'audience' => 'Nejlevnější webové řešení pro ty, kteří se spokojí s připravenou šablonou a nepotřebují se odlišit pomocí grafické úpravy na míru.'
            ],
            'web' => [
                'name' => 'Standard',
                'price' => 749,
                'items' => [],
                'more_items' => [
                    ['name' => 'Doména 1. rok ZDARMA'],
                    ['name' => '5 e-mailových adres (5GB)'],
                    ['name' => 'Všechny moduly a funkce'],
                    ['name' => 'Neomezené úložiště dat'],
                    ['name' => 'Neomezený přenos dat'],
                    ['name' => '<strong>30h grafických úprav na SEKERU*</strong>'],
                    ['name' => '<strong>Platební brána ZDARMA</strong>'],
                    ['name' => 'Tel. podpora 9:00 až 20:00'],
                    ['name' => 'Denní konzultace na Meetu'],
                ],
                'audience' => '* Na sekeru: Nejlevnější webové řešení na trhu s možností grafických úprav na míru splatných až tehdy, když Vám projekt začne reálně vydělávat!'
            ],
            'starter' => [
                'name' => 'Business plus',
                'price' => 1599,
                'items' => [],
                'more_items' => [
                    ['name' => 'Doména 1. rok ZDARMA'],
                    ['name' => '20 e-mailových adres (20GB)'],
                    ['name' => 'Všechny moduly a funkce'],
                    ['name' => 'Neomezené úložiště dat'],
                    ['name' => 'Neomezený přenos dat'],
                    ['name' => '<strong>30h grafických úprav ZDARMA</strong>'],
                    ['name' => 'Platební brána ZDARMA'],
                    ['name' => 'Tel. podpora 9:00 až 20:00'],
                    ['name' => 'Denní konzultace na Meetu'],
                    ['name' => 'Sleva 30 % na hod. sazbu'],
                ],
                'audience' => 'Nejvhodnější řešení pro zaběhnuté podnikatele, kteří nemají čas a vyžadují VIP péči o web, e-shop a správu mailů.'
            ],
            'standard' => [
                'name' => 'Enterprise',
                'price' => 0,
                'items' => [],
                'more_items' => [
                    ['name' => 'Doména 1. rok ZDARMA'],
                    ['name' => 'Neomezeně e-mailů'],
                    ['name' => 'Všechny moduly a funkce'],
                    ['name' => 'Neomezené úložiště dat'],
                    ['name' => 'Neomezený přenos dat'],
                    ['name' => '30h grafických úprav ZDARMA'],
                    ['name' => 'Platební brána ZDARMA'],
                    ['name' => 'Tel. podpora 9:00 až 20:00'],
                    ['name' => 'Denní konzultace na Meetu'],
                    ['name' => 'Sleva 30 % na hod. sazbu'],
                ],
                'audience' => 'Vhodný pro velmi náročné podnikatele, kteří potřebují vývoj modulů na míru, grafické úpravy, UX nebo marketing.'
            ]
        ];
    }
    
    /**
     * @return array<string, mixed>
     */
    public function getModules() : array
    {
        return [
            'api' => [
                'name' => 'REST API',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Přihlášení zákazníka'],
                    ['status' => Feature::DONE, 'name' => 'Profil zákazníka'],
                    ['status' => Feature::DONE, 'name' => 'Zákaznické skupiny'],
                    ['status' => Feature::DONE, 'name' => 'Ceny dle zákaznických skupin'],
                    ['status' => Feature::DONE, 'name' => 'Přehled produktů'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace produktů dle kategorií'],
                    ['status' => Feature::DONE, 'name' => 'Detail produktu'],
                    ['status' => Feature::DONE, 'name' => 'Seznam článků'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace článků dle štítků'],
                    ['status' => Feature::DONE, 'name' => 'Detail článku'],
                    ['status' => Feature::DONE, 'name' => 'Metody plateb'],
                    ['status' => Feature::DONE, 'name' => 'Metody dopravy'],
                    ['status' => Feature::DONE, 'name' => 'Vytvoření leadu'],
                    ['status' => Feature::DONE, 'name' => 'Přihlášení k newsletteru'],
                    ['status' => Feature::DONE, 'name' => 'Seznam měn a kurzů'],
                    ['status' => Feature::DONE, 'name' => 'Seznam daňových sazeb'],
                    ['status' => Feature::DONE, 'name' => 'Seznam zemí pro doručení'],
                    ['status' => Feature::DONE, 'name' => 'Seznam skladů'],
                    ['status' => Feature::DONE, 'name' => 'Informace o e-shopu'],
                    ['status' => Feature::DONE, 'name' => 'Podpora JWT a SSH'],
                    ['status' => Feature::IN_PROGRESS, 'name' => 'Přidání zboží do košíku'],
                    ['status' => Feature::IN_PROGRESS, 'name' => 'Úpravy počtu položek v košíku'],
                    ['status' => Feature::IN_PROGRESS, 'name' => 'Odstranění položek z košíku'],
                    ['status' => Feature::IN_PROGRESS, 'name' => 'Volba platby v košíku'],
                    ['status' => Feature::IN_PROGRESS, 'name' => 'Volba dopravy v košíku'],
                    ['status' => Feature::IN_PROGRESS, 'name' => 'Zadání dodacích údajů v košíku'],
                    ['status' => Feature::IN_PROGRESS, 'name' => 'Detail objednávky (děkovačka)'],
                    ['status' => Feature::IN_PROGRESS, 'name' => 'Založení platby přes GoPay'],
                    ['status' => Feature::TODO, 'name' => 'Doručení do Zásilkovny'],
                    ['status' => Feature::TODO, 'name' => 'Registrace zákazníka'],
                    ['status' => Feature::TODO, 'name' => 'Obnovení hesla zákazníka'],
                    ['status' => Feature::TODO, 'name' => 'Reset hesla zákazníka'],
                    ['status' => Feature::TODO, 'name' => 'Změna hesla zákazníka'],
                    ['status' => Feature::TODO, 'name' => 'Seznam objednávek zákazníka'],
                    ['status' => Feature::TODO, 'name' => 'Editace platebních údajů zákazníka'],
                    ['status' => Feature::TODO, 'name' => 'Editace FA údajů zákazníka'],
                    ['status' => Feature::TODO, 'name' => 'Drobečková navigace'],
                    ['status' => Feature::TODO, 'name' => 'Odhlášení z newsletteru'],
                    ['status' => Feature::TODO, 'name' => 'Související zboží v košíku'],
                    ['status' => Feature::TODO, 'name' => 'Request rate limiter'],
                    ['status' => Feature::TODO, 'name' => 'Cloud sessions / Cookies storage'],
                ]
            ],
            'app_&_setting' => [
                'name' => 'Obecné',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Nástěnka a statistiky'],
                    ['status' => Feature::DONE, 'name' => 'SEO nastavení'],
                    ['status' => Feature::DONE, 'name' => 'Nastavení pro sociální sítě'],
                    ['status' => Feature::DONE, 'name' => 'Editace kontaktních údajů e-shopu'],
                    ['status' => Feature::DONE, 'name' => 'Editace FA údajů e-shopu'],
                    ['status' => Feature::DONE, 'name' => 'Nastavení úvodní stránky'],
                    ['status' => Feature::DONE, 'name' => 'Přehled měn a kurzů'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace měn a kurzů'],
                    ['status' => Feature::DONE, 'name' => 'Správa měn a kurzů'],
                    ['status' => Feature::DONE, 'name' => 'Přehled zemí pro doručení'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace zemí pro doručení'],
                    ['status' => Feature::DONE, 'name' => 'Správa zemí pro doručení'],
                    ['status' => Feature::DONE, 'name' => 'Přehled skladů'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace skladů'],
                    ['status' => Feature::DONE, 'name' => 'Správa skladů'],
                    ['status' => Feature::DONE, 'name' => 'Datové přehledy'],
                    ['status' => Feature::DONE, 'name' => 'Hromadné operace'],
                    ['status' => Feature::DONE, 'name' => 'Kompilátor assetů'],
                    ['status' => Feature::DONE, 'name' => 'SMTP mailer'],
                    ['status' => Feature::DONE, 'name' => 'Zpracování queues'],
                    ['status' => Feature::TODO, 'name' => 'Slevové kódy'],
                ]
            ],
            'order' => [
                'name' => 'Objednávky',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Přehled stavů objednávek'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace stavů objednávek'],
                    ['status' => Feature::DONE, 'name' => 'Správa stavů objednávek'],
                    ['status' => Feature::DONE, 'name' => 'Přehled objednávek'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace objednávek'],
                    ['status' => Feature::DONE, 'name' => 'Správa objednávek'],
                    ['status' => Feature::DONE, 'name' => 'Změna stavu objednávky'],
                    ['status' => Feature::DONE, 'name' => 'Změna stavu platby'],
                    ['status' => Feature::TODO, 'name' => 'Přehled plateb'],
                    ['status' => Feature::TODO, 'name' => 'Notifikace při změně stavu'],
                    ['status' => Feature::TODO, 'name' => 'Změna položek'],
                    ['status' => Feature::TODO, 'name' => 'Změna dopravy'],
                    ['status' => Feature::TODO, 'name' => 'Změna platby'],
                    ['status' => Feature::TODO, 'name' => 'Editace adresy'],
                    ['status' => Feature::TODO, 'name' => 'Editace FA údajů'],
                    ['status' => Feature::TODO, 'name' => 'Editace dodacích údajů'],
                    ['status' => Feature::TODO, 'name' => 'Kompletace objednávky'],
                    ['status' => Feature::TODO, 'name' => 'Slevové kódy / položky'],
                    ['status' => Feature::TODO, 'name' => 'Změna ceny dle zákaznické skupiny'],
                    ['status' => Feature::TODO, 'name' => 'Exporty pro přepravní společnosti'],
                ]
            ],
            'invoices' => [
                'name' => 'Fakturace',
                'features' => [
                    ['status' => Feature::TODO, 'name' => 'Vytvoření kontaktu a načtení z Aresu'],
                    ['status' => Feature::TODO, 'name' => 'Vytvoření faktury'],
                    ['status' => Feature::TODO, 'name' => 'Vytvoření proformy'],
                    ['status' => Feature::TODO, 'name' => 'Pravidelné proformy / faktury'],
                    ['status' => Feature::TODO, 'name' => 'Automatické párování úhrad'],
                    ['status' => Feature::TODO, 'name' => 'Propojení s FIO bankou'],
                    ['status' => Feature::TODO, 'name' => 'Automatické úpomínky na splatnost'],
                    ['status' => Feature::TODO, 'name' => 'Přehled nákladů a multiupload'],
                    ['status' => Feature::TODO, 'name' => 'Automatické odesílání nákladů na e-mail účetní'],
                ]
            ],
            'product' => [
                'name' => 'Produkty',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Přehled dostupnostních stavů'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace dostupnostních stavů'],
                    ['status' => Feature::DONE, 'name' => 'Správa dostupnostních stavů'],
                    ['status' => Feature::DONE, 'name' => 'Přehled měrných jednotek'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace měrných jednotek'],
                    ['status' => Feature::DONE, 'name' => 'Správa měrných jednotek'],
                    ['status' => Feature::DONE, 'name' => 'Přehled produktů'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace produktů'],
                    ['status' => Feature::DONE, 'name' => 'Správa produktů'],
                    ['status' => Feature::DONE, 'name' => 'Nárokované položky'],
                    ['status' => Feature::DONE, 'name' => 'Výchozí cena'],
                    ['status' => Feature::DONE, 'name' => 'Akční cena'],
                    ['status' => Feature::DONE, 'name' => 'Rich-text editor'],
                    ['status' => Feature::DONE, 'name' => 'Omezení počtu v košíku'],
                    ['status' => Feature::DONE, 'name' => 'Fotografie a soubory'],
                    ['status' => Feature::DONE, 'name' => 'Ceny pro jednotlivé měny'],
                    ['status' => Feature::DONE, 'name' => 'Ceny pro zákaznické skupiny'],
                    ['status' => Feature::DONE, 'name' => 'Doprava a platba zdarma'],
                    ['status' => Feature::DONE, 'name' => 'Členění dle skladů'],
                    ['status' => Feature::DONE, 'name' => 'Chování skladů'],
                    ['status' => Feature::DONE, 'name' => 'Kódy produktů'],
                    ['status' => Feature::DONE, 'name' => 'SEO nastavení'],
                    ['status' => Feature::DONE, 'name' => 'Nastavení pro sociální sítě'],
                    ['status' => Feature::DONE, 'name' => 'Váha a rozměry'],
                    ['status' => Feature::DONE, 'name' => 'Atypické zboží'],
                    ['status' => Feature::DONE, 'name' => 'Kategorie produktů'],
                    ['status' => Feature::IN_PROGRESS, 'name' => 'Ukládání cen s DPH'],
                    ['status' => Feature::TODO, 'name' => 'Parametry produktů (kategorické)'],
                    ['status' => Feature::TODO, 'name' => 'Autocomplete input'],
                    ['status' => Feature::TODO, 'name' => 'Varianty produktů'],
                    ['status' => Feature::TODO, 'name' => 'Související zboží'],
                    ['status' => Feature::TODO, 'name' => 'Příznaky produktů'],
                    ['status' => Feature::TODO, 'name' => 'Odpočty zásob dle priorit skladů'],
                    ['status' => Feature::TODO, 'name' => 'Přehled dle skladových zásob'],
                    ['status' => Feature::TODO, 'name' => 'Inline editace zásob'],
                    ['status' => Feature::TODO, 'name' => 'Přehled dle cen, skupin a měn'],
                    ['status' => Feature::TODO, 'name' => 'Inline editace cen'],
                    ['status' => Feature::TODO, 'name' => 'Hodnocení produktů'],
                    ['status' => Feature::TODO, 'name' => 'Diskuze k produktům'],
                ]
            ],
            'categories' => [
                'name' => 'Kategorie',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Přehled kategorií'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace kategorií'],
                    ['status' => Feature::DONE, 'name' => 'Správa kategorií'],
                    ['status' => Feature::DONE, 'name' => 'Řazení kategorií'],
                    ['status' => Feature::DONE, 'name' => 'Přesuny kategorií'],
                ]
            ],
            'customer' => [
                'name' => 'Zákazníci',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Přehled zákazníků'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace zákazníků'],
                    ['status' => Feature::DONE, 'name' => 'Správa zákazníků'],
                    ['status' => Feature::DONE, 'name' => 'Přehled zákaznických skupin'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace zákaznických skupin'],
                    ['status' => Feature::DONE, 'name' => 'Správa zákaznických skupin'],
                    ['status' => Feature::DONE, 'name' => 'Reset hesla zákazníka'],
                    ['status' => Feature::DONE, 'name' => 'Změna skupiny zákazníka'],
                    ['status' => Feature::TODO, 'name' => 'Objednávky dle zákazníka'],
                    ['status' => Feature::TODO, 'name' => 'Výpočet CLV'],
                ]
            ],
            'admin' => [
                'name' => 'Administrátoři',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Přehled administrátorů'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace administrátorů'],
                    ['status' => Feature::DONE, 'name' => 'Správa administrátorů'],
                    ['status' => Feature::DONE, 'name' => 'Reset a změna hesla'],
                ]
            ],
            'article' => [
                'name' => 'Články',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Přehled článků'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace článků'],
                    ['status' => Feature::DONE, 'name' => 'Správa článků'],
                    ['status' => Feature::DONE, 'name' => 'Hromadné publikování'],
                    ['status' => Feature::DONE, 'name' => 'Rich-text editor'],
                    ['status' => Feature::DONE, 'name' => 'Responsivní odstavce'],
                    ['status' => Feature::DONE, 'name' => 'Správa štítků'],
                    ['status' => Feature::DONE, 'name' => 'SEO nastavení'],
                    ['status' => Feature::DONE, 'name' => 'Správa souborů'],
                    ['status' => Feature::DONE, 'name' => 'Správa souborů u odstavců'],
                    ['status' => Feature::DONE, 'name' => 'Doplňující informace'],
                ]
            ],
            'cart' => [
                'name' => 'Košík',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Přehled možností dopravy'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace možností dopravy'],
                    ['status' => Feature::DONE, 'name' => 'Správa možností dopravy'],
                    ['status' => Feature::DONE, 'name' => 'Přehled platebních metod'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace platebních metod'],
                    ['status' => Feature::DONE, 'name' => 'Správa platebních metod'],
                    ['status' => Feature::DONE, 'name' => 'Vyloučené platební metody'],
                    ['status' => Feature::DONE, 'name' => 'Extra konfigurace (JSON)'],
                    ['status' => Feature::TODO, 'name' => 'Související zboží'],
                ]
            ],
            'lead' => [
                'name' => 'Leady',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Přehled leadů'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace leadů'],
                    ['status' => Feature::DONE, 'name' => 'Správa leadů'],
                    ['status' => Feature::DONE, 'name' => 'Označování zpracovaných leadů'],
                    ['status' => Feature::DONE, 'name' => 'Vlastní poznámky'],
                    ['status' => Feature::DONE, 'name' => 'E-mailové notifikace'],
                ]
            ],
            'newsletter' => [
                'name' => 'Newsletter',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Přehled odběratelů'],
                    ['status' => Feature::DONE, 'name' => 'Filtrace odběratelů'],
                    ['status' => Feature::DONE, 'name' => 'Správa odběratelů'],
                    ['status' => Feature::DONE, 'name' => 'Párování se zákazníky'],
                    ['status' => Feature::DONE, 'name' => 'E-mailové notifikace'],
                ]
            ],
            'marketing' => [
                'name' => 'Marketing',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Google Tag Manager'],
                    ['status' => Feature::DONE, 'name' => 'Google Analytics'],
                    ['status' => Feature::DONE, 'name' => 'Google Ads'],
                    ['status' => Feature::DONE, 'name' => 'Facebook pixel'],
                    ['status' => Feature::DONE, 'name' => 'Sklik'],
                    ['status' => Feature::TODO, 'name' => 'Heureka ověřeno zákazníkem'],
                ]
            ],
            'connection' => [
                'name' => 'Propojení',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Mailchimp subscription'],
                    ['status' => Feature::TODO, 'name' => 'FIO Banka'],
                    ['status' => Feature::TODO, 'name' => 'Fakturoid'],
                    ['status' => Feature::TODO, 'name' => 'Pohoda'],
                    ['status' => Feature::TODO, 'name' => 'ABRA Gen'],
                ]
            ],
            'export' => [
                'name' => 'XML Exporty',
                'features' => [
                    ['status' => Feature::TODO, 'name' => 'Heureka'],
                    ['status' => Feature::TODO, 'name' => 'Zboží.cz'],
                    ['status' => Feature::TODO, 'name' => 'Google Shopping'],
                ]
            ],
            'more' => [
                'name' => 'Ostatní',
                'features' => [
                    ['status' => Feature::DONE, 'name' => 'Soubory a logy v S3 bucketu'],
                    ['status' => Feature::DONE, 'name' => 'SMTP jako ENV'],
                    ['status' => Feature::DONE, 'name' => 'API debugbar (JSON)'],
                    ['status' => Feature::DONE, 'name' => 'Zpracovávání obrázků'],
                    ['status' => Feature::TODO, 'name' => 'Nativní typy (Doctrine)'],
                    ['status' => Feature::TODO, 'name' => 'Sitemap generátor'],
                    ['status' => Feature::TODO, 'name' => 'Robots.txt generátor'],
                    ['status' => Feature::TODO, 'name' => 'Výrobci / Značky produktů'],
                    ['status' => Feature::TODO, 'name' => 'Generátor faktur'],
                    ['status' => Feature::TODO, 'name' => 'Vylepšení zpracovávání queues'],
                    ['status' => Feature::TODO, 'name' => 'Vyhledávač'],
                    ['status' => Feature::TODO, 'name' => 'Editovatelné překlady'],
                ]
            ],
        ];
    }
}