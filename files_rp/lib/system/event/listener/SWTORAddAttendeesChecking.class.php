<?php

namespace rp\system\event\listener;

use rp\event\raid\AddAttendeesChecking;
use rp\system\cache\runtime\CharacterRuntimeCache;

/**
 * Handles the `AddAttendeesChecking` event to process attendees data.
 * 
 * @author  Marco Daries
 * @copyright   2025 MD-Raidplaner
 * @license MD-Raidplaner is licensed under Creative Commons Attribution-ShareAlike 4.0 International
 */
final class SWTORAddAttendeesChecking
{
    public function __invoke(AddAttendeesChecking $event)
    {
        $attendeeIDs = $event->getAttendeeIDs();

        foreach ($attendeeIDs as $attendeeID) {
            [$characterID, $fightStyleID] = \explode('_', $attendeeID, 2);

            $character = CharacterRuntimeCache::getInstance()->getObject($characterID);
            if ($character === null) {
                continue;
            }

            $fightStyles = $character->fightStyles;
            if (!\array_key_exists($fightStyleID, $fightStyles)) {
                continue;
            }

            $fightStyle = $fightStyles[$fightStyleID];

            $event->setAttendee([
                'characterID' => $character->getObjectID(),
                'characterName' => $character->getTitle(),
                'classification' => $fightStyle['classification'],
                'role' => $fightStyle['role'],
            ]);
        }
    }
}
