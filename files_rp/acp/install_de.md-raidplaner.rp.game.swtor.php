<?php

/**
 * @author  Marco Daries
 * @copyright   2025 MD-Raidplaner
 * @license MD-Raidplaner is licensed under Creative Commons Attribution-ShareAlike 4.0 International
 */

use rp\data\point\account\PointAccount;
use rp\data\point\account\PointAccountEditor;
use rp\data\raid\event\RaidEventEditor;
use wcf\data\language\item\LanguageItemAction;
use wcf\data\package\PackageCache;
use wcf\system\language\LanguageFactory;
use wcf\util\StringUtil;

$packageID = $this->installation->getPackageID();
$game = 'swtor';

/** @var PointAccount $pointAccount */
// raid events with point account 
$pointAccount = PointAccountEditor::create([
    'game' => $game,
    'title' => 'SWTOR 1.0',
]);
insertEvent(getClassic(), $pointAccount, $packageID);

$pointAccount = PointAccountEditor::create([
    'game' => $game,
    'title' => 'SWTOR 2.0',
]);
insertEvent(getEvents(), $pointAccount, $packageID);

$pointAccount = PointAccountEditor::create([
    'game' => $game,
    'title' => 'SWTOR 3.0',
]);
insertEvent(getRevan(), $pointAccount, $packageID);

$pointAccount = PointAccountEditor::create([
    'game' => $game,
    'title' => 'SWTOR 4.0',
]);
insertEvent(getFallen(), $pointAccount, $packageID);

$pointAccount = PointAccountEditor::create([
    'game' => $game,
    'title' => 'SWTOR 5.6',
]);
insertEvent(getUprising(), $pointAccount, $packageID);

$pointAccount = PointAccountEditor::create([
    'game' => $game,
    'title' => 'SWTOR 6.0',
]);
insertEvent(getOnslaught(), $pointAccount, $packageID);

$pointAccount = PointAccountEditor::create([
    'game' => $game,
    'title' => 'SWTOR 7.0',
]);
insertEvent(getLotS(), $pointAccount, $packageID);

function insertEvent(array $entries, PointAccount $pointAccount, $packageID)
{
    foreach ($entries as $entry) {
        $event = RaidEventEditor::create([
            'game' => $game,
            'pointAccountID' => $pointAccount->accountID,
            'icon' => $entry['icon'],
        ]);
        $eventEditor = new RaidEventEditor($event);
        $eventEditor->update(['title' => 'rp.raid.event.title' . $event->eventID]);

        insertLanguageItem($event->eventID, $entry['title'], $packageID);
    }
}

function insertLanguageItem(int $eventID, array $title, int $packageID)
{
    foreach (LanguageFactory::getInstance()->getLanguages() as $language) {
        if (!isset($title[$language->languageCode])) continue;

        (new LanguageItemAction([], 'create', [
            'data' => [
                'languageID' => $language->languageID,
                'languageItem' => 'rp.raid.event.title' . $eventID,
                'languageItemValue' => StringUtil::trim($title[$language->languageCode]),
                'languageCategoryID' => (LanguageFactory::getInstance()->getCategory('rp.raid.event'))->languageCategoryID,
                'packageID' => $packageID,
                'languageItemOriginIsSystem' => 1,
            ]
        ]))->executeAction();
    }
}

//Operation Swtor 1.0
function getClassic()
{
    return [
        [
            'title' => [
                'de' => 'Ewige Kammer (Story)',
                'en' => 'The Eternity Vault (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Ewige Kammer (Veteran)',
                'en' => 'The Eternity Vault (Veteran)',
            ],
            'icon' => 'veteran',
        ],
        [
            'title' => [
                'de' => 'Ewige Kammer (Meister)',
                'en' => 'The Eternity Vault (Master)',
            ],
            'icon' => 'master',
        ],
        [
            'title' => [
                'de' => 'Karaggas Palast (Story)',
                'en' => 'Karaggas Palace (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Karaggas Palast (Veteran)',
                'en' => 'Karaggas Palace (Veteran)',
            ],
            'icon' => 'veteran',
        ],
        [
            'title' => [
                'de' => 'Karaggas Palast (Meister)',
                'en' => 'Karaggas Palace (Master)',
            ],
            'icon' => 'master',
        ],
        [
            'title' => [
                'de' => 'Explosiv Konflikt (Story)',
                'en' => 'Explosiv Conflict (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Explosiv Konflikt (Veteran)',
                'en' => 'Explosiv Conflict (Veteran)',
            ],
            'icon' => 'veteran',
        ],
        [
            'title' => [
                'de' => 'Explosiv Konflikt (Meister)',
                'en' => 'Explosiv Conflict (Master)',
            ],
            'icon' => 'master',
        ],
    ];
}

//Operation Swtor 2.0
function getEvents()
{
    return [
        [
            'title' => [
                'de' => 'Abschaum und Verkommenheit (Story)',
                'en' => 'Scum and Villainy (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Abschaum und Verkommenheit (Veteran)',
                'en' => 'Scum and Villainy (Veteran)',
            ],
            'icon' => 'veteran',
        ],
        [
            'title' => [
                'de' => 'Abschaum und Verkommenheit (Meister)',
                'en' => 'Scum and Villainy (Master)',
            ],
            'icon' => 'master',
        ],
        [
            'title' => [
                'de' => 'Schrecken aus der Tiefe (Story)',
                'en' => 'Terror from Beyond (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Schrecken aus der Tiefe (Veteran)',
                'en' => 'Terror from Beyond (Veteran)',
            ],
            'icon' => 'veteran',
        ],
        [
            'title' => [
                'de' => 'Schrecken aus der Tiefe (Meister)',
                'en' => 'Terror from Beyond (Master)',
            ],
            'icon' => 'master',
        ],
        [
            'title' => [
                'de' => 'Schreckensfestung (Story)',
                'en' => 'Dread Fortress (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Schreckensfestung (Veteran)',
                'en' => 'Dread Fortress (Veteran)',
            ],
            'icon' => 'veteran',
        ],
        [
            'title' => [
                'de' => 'Schreckensfestung (Meister)',
                'en' => 'Dread Fortress (Master)',
            ],
            'icon' => 'master',
        ],
        [
            'title' => [
                'de' => 'Schreckenspalast (Story)',
                'en' => 'Dread Palace (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Schreckenspalast (Veteran)',
                'en' => 'Dread Palace (Veteran)',
            ],
            'icon' => 'veteran',
        ],
        [
            'title' => [
                'de' => 'Schreckenspalast (Meister)',
                'en' => 'Dread Palace (Master)',
            ],
            'icon' => 'master',
        ],
        [
            'title' => [
                'de' => "Toborro's Hof (Story)",
                'en' => 'Golden Fury (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => "Toborro's Hof (Veteran)",
                'en' => 'Golden Fury (Veteran)',
            ],
            'icon' => 'veteran',
        ],
    ];
}

//Operation Swtor 3.0
function getRevan()
{
    return [
        [
            'title' => [
                'de' => 'Die Wüter (Story)',
                'en' => 'The Ravagers (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Die Wüter (Veteran)',
                'en' => 'The Ravagers (Veteran)',
            ],
            'icon' => 'veteran',
        ],
        [
            'title' => [
                'de' => 'Die Wüter (Meister)',
                'en' => 'The Ravagers (Master)',
            ],
            'icon' => 'master',
        ],
        [
            'title' => [
                'de' => 'Tempel des Opfers (Story)',
                'en' => 'Tempel of Sacrifice (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Tempel des Opfers (Veteran)',
                'en' => 'Tempel of Sacrifice (Veteran)',
            ],
            'icon' => 'veteran',
        ],
        [
            'title' => [
                'de' => 'Tempel des Opfers (Meister)',
                'en' => 'Tempel of Sacrifice (Master)',
            ],
            'icon' => 'master',
        ],
    ];
}

//Operation Swtor 4.0 Fallen
function getFallen()
{
    return [
        [
            'title' => [
                'de' => 'Gewaltiger Monolith (Story)',
                'en' => 'Colossal Monolith (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Gewaltiger Monolith (Veteran)',
                'en' => 'Colossal Monolith (Veteran)',
            ],
            'icon' => 'veteran',
        ],
        [
            'title' => [
                'de' => 'Gewaltiger Monolith (Meister)',
                'en' => 'Colossal Monolith (Master)',
            ],
            'icon' => 'master',
        ],
        [
            'title' => [
                'de' => 'Götter aus der Maschiene (Story)',
                'en' => 'Gods from the Machine Tyth (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Götter aus der Maschiene (Veteran)',
                'en' => 'Gods from the Machine Tyth (Veteran)',
            ],
            'icon' => 'veteran',
        ],
    ];
}

//Operation Swtor 5.6 Uprising
function getUprising()
{
    return [
        [
            'title' => [
                'de' => 'Mutierte Genosianische Königin (Story)',
                'en' => 'Mutated Geonosian Queen (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Mutierte Genosianische Königin (Veteran)',
                'en' => 'Mutated Geonosian Queen (Veteran)',
            ],
            'icon' => 'veteran',
        ],
    ];
}

//Operation Swtor 6.0 Onslaught
function getOnslaught()
{
    return [
        [
            'title' => [
                'de' => 'Dxun (Story)',
                'en' => 'Dxun (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'Dxun (Veteran)',
                'en' => 'Dxun (Veteran)',
            ],
            'icon' => 'veteran',
        ],
    ];
}

//Operation Swtor 7.0 Legacy of the Sith
function getLotS()
{
    return [
        [
            'title' => [
                'de' => 'R-4 Anomalie (Story)',
                'en' => 'R-4 Anomaly (Story)',
            ],
            'icon' => 'story',
        ],
        [
            'title' => [
                'de' => 'R-4 Anomalie (Veteran)',
                'en' => 'R-4 Anomaly (Veteran)',
            ],
            'icon' => 'veteran',
        ],
        [
            'title' => [
                'de' => 'R-4 Anomalie (Meister)',
                'en' => 'R-4 Anomaly (Master)',
            ],
            'icon' => 'master',
        ],
    ];
}
