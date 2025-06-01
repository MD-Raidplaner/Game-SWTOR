<?php

use rp\event\character\AvailableCharactersChecking;
use rp\event\character\CharacterAddCreateForm;
use rp\event\character\CharacterEditData;
use rp\event\event\EventCreateForm;
use rp\event\faction\FactionCollecting;
use rp\event\game\GameCollecting;
use rp\event\raid\AddAttendeesChecking;
use rp\event\raid\character\CharacterCollecting;
use rp\system\cache\eager\GameCache;
use rp\system\event\listener\SWTORAddAttendeesChecking;
use rp\system\event\listener\SWTORAvailableCharactersChecking;
use rp\system\event\listener\SWTORCharacterAddCreateFormListener;
use rp\system\event\listener\SWTORCharacterCollecting;
use rp\system\event\listener\SWTORCharacterEditDataListener;
use rp\system\event\listener\SWTOREventCreateFormListener;
use rp\system\faction\FactionItem;
use rp\system\game\GameItem;
use wcf\system\event\EventHandler;

return static function (): void {
    if ((new GameCache())->getCache()->getCurrentGame()->identifier !== 'swtor') return;

    $eventHandler = EventHandler::getInstance();

    $eventHandler->register(AddAttendeesChecking::class, SWTORAddAttendeesChecking::class);
    $eventHandler->register(AvailableCharactersChecking::class, SWTORAvailableCharactersChecking::class);
    $eventHandler->register(CharacterCollecting::class, SWTORCharacterCollecting::class);
    $eventHandler->register(CharacterAddCreateForm::class, SWTORCharacterAddCreateFormListener::class);
    $eventHandler->register(CharacterEditData::class, SWTORCharacterEditDataListener::class);
    $eventHandler->register(EventCreateForm::class, SWTOREventCreateFormListener::class);

    $eventHandler->register(GameCollecting::class, static function (GameCollecting $event) {
        $event->register(
            new GameItem(
                'swtor'
            )
        );
    });

    $eventHandler->register(FactionCollecting::class, static function (FactionCollecting $event) {
        $event->register(new FactionItem('imperial', 'swtor', 'empire'));
        $event->register(new FactionItem('republic', 'swtor', 'republic'));
    });
};
