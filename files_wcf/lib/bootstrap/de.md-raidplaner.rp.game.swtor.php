<?php

use rp\event\character\AvailableCharactersChecking;
use rp\event\character\CharacterAddCreateForm;
use rp\event\character\CharacterEditData;
use rp\event\classification\ClassificationCollecting;
use rp\event\event\EventCreateForm;
use rp\event\faction\FactionCollecting;
use rp\event\game\GameCollecting;
use rp\event\race\RaceCollecting;
use rp\event\raid\AddAttendeesChecking;
use rp\event\raid\character\CharacterCollecting;
use rp\event\role\RoleCollecting;
use rp\system\classification\ClassificationItem;
use rp\system\event\listener\SWTORAddAttendeesChecking;
use rp\system\event\listener\SWTORAvailableCharactersChecking;
use rp\system\event\listener\SWTORCharacterAddCreateFormListener;
use rp\system\event\listener\SWTORCharacterCollecting;
use rp\system\event\listener\SWTORCharacterEditDataListener;
use rp\system\event\listener\SWTOREventCreateFormListener;
use rp\system\faction\FactionItem;
use rp\system\game\GameItem;
use rp\system\race\RaceItem;
use rp\system\role\RoleItem;
use wcf\system\event\EventHandler;

return static function (): void {
    $eventHandler = EventHandler::getInstance();

    $eventHandler->register(GameCollecting::class, static function (GameCollecting $event) {
        $event->register(new GameItem('swtor'));
    });

    if (defined('RP_CURRENT_GAME') && \RP_CURRENT_GAME === 'swtor') {
        $eventHandler->register(FactionCollecting::class, static function (FactionCollecting $event) {
            $event->register(new FactionItem('imperial', 'swtor', 'empire'));
            $event->register(new FactionItem('republic', 'swtor', 'republic'));
        });

        $eventHandler->register(RaceCollecting::class, static function (RaceCollecting $event) {
            $event->register(new RaceItem(
                'cathar',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ]
            ));
            $event->register(new RaceItem(
                'chiss',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ]
            ));
            $event->register(new RaceItem(
                'cyborg',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ]
            ));
            $event->register(new RaceItem(
                'human',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ]
            ));
            $event->register(new RaceItem(
                'miraluka',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ]
            ));
            $event->register(new RaceItem(
                'mirialan',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ]
            ));
            $event->register(new RaceItem(
                'nautolaner',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ]
            ));
            $event->register(new RaceItem(
                'rattataki',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ]
            ));
            $event->register(new RaceItem(
                'sith',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ]
            ));
            $event->register(new RaceItem(
                'togruta',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ]
            ));
            $event->register(new RaceItem(
                'twilek',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ]
            ));
        });

        $eventHandler->register(RoleCollecting::class, static function (RoleCollecting $event) {
            $event->register(new RoleItem('damagedealer', 'swtor'));
            $event->register(new RoleItem('heal', 'swtor'));
            $event->register(new RoleItem('tank', 'swtor'));
        });

        $eventHandler->register(ClassificationCollecting::class, static function (ClassificationCollecting $event) {
            $event->register(new ClassificationItem(
                'operative',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'heal',
                ],
            ));
            $event->register(new ClassificationItem(
                'sniper',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                ],
            ));
            $event->register(new ClassificationItem(
                'sorcerer',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'heal',
                ]
            ));
            $event->register(new ClassificationItem(
                'assassin',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'tank',
                ]
            ));
            $event->register(new ClassificationItem(
                'juggernaut',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'tank',
                ]
            ));
            $event->register(new ClassificationItem(
                'commando',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'heal',
                ]
            ));
            $event->register(new ClassificationItem(
                'mercenary',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'heal',
                ]
            ));
            $event->register(new ClassificationItem(
                'vanguard',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'tank',
                ]
            ));
            $event->register(new ClassificationItem(
                'powertech',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'tank',
                ]
            ));
            $event->register(new ClassificationItem(
                'marauder',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                ]
            ));
            $event->register(new ClassificationItem(
                'sentinel',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                ]
            ));
            $event->register(new ClassificationItem(
                'guardian',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'tank',
                ]
            ));
            $event->register(new ClassificationItem(
                'scoundrel',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'heal',
                ]
            ));
            $event->register(new ClassificationItem(
                'sage',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'heal',
                ]
            ));
            $event->register(new ClassificationItem(
                'shadow',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                    'tank',
                ]
            ));
            $event->register(new ClassificationItem(
                'gunslinger',
                'swtor',
                factions: [
                    'imperial',
                    'republic',
                ],
                races: [
                    'cathar',
                    'chiss',
                    'cyborg',
                    'human',
                    'miraluka',
                    'mirialan',
                    'rattataki',
                    'sith',
                    'togruta',
                    'twilek',
                    'zabrak',
                ],
                roles: [
                    'damagedealer',
                ]
            ));
        });

        $eventHandler->register(AddAttendeesChecking::class, SWTORAddAttendeesChecking::class);
        $eventHandler->register(AvailableCharactersChecking::class, SWTORAvailableCharactersChecking::class);
        $eventHandler->register(CharacterCollecting::class, SWTORCharacterCollecting::class);
        $eventHandler->register(CharacterAddCreateForm::class, SWTORCharacterAddCreateFormListener::class);
        $eventHandler->register(CharacterEditData::class, SWTORCharacterEditDataListener::class);
        $eventHandler->register(EventCreateForm::class, SWTOREventCreateFormListener::class);
    }
};
