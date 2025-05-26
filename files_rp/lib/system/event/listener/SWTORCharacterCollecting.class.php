<?php

namespace rp\system\event\listener;

use rp\data\character\CharacterList;
use rp\event\raid\character\CharacterCollecting;
use rp\system\cache\eager\ClassificationCache;
use rp\system\cache\eager\RoleCache;

/**
 * Set data for editing characters.
 * 
 * @author  Marco Daries
 * @copyright   2025 MD-Raidplaner
 * @license MD-Raidplaner is licensed under Creative Commons Attribution-ShareAlike 4.0 International
 */
final class SWTORCharacterCollecting
{
    public function __invoke(CharacterCollecting $collecting)
    {
        $characterList = new CharacterList();
        $characterList->getConditionBuilder()->add('member.gameID = ?', [RP_CURRENT_GAME_ID]);
        $characterList->getConditionBuilder()->add('member.isDisabled = ?', [0]);
        $characterList->readObjects();

        foreach ($characterList as $character) {
            $fightStyles = $character->fightStyles;
            foreach ($fightStyles as $fightStyleID => $fightStyle) {
                if (!$fightStyle['fightStyleEnable']) continue;

                $id = $character->getObjectID() . '_' . $fightStyleID;

                $label = '';
                $classification = (new ClassificationCache())->getCache()->getClassification($fightStyle['classificationID']);
                if ($classification) {
                    $label = $classification->getTitle();
                }

                $role = (new RoleCache())->getCache()->getRole($fightStyle['roleID']);
                if ($role) {
                    if (!empty($label)) $label .= ', ';
                    $label .= $role->getTitle();
                }

                $collecting->register([
                    'id' => $id,
                    'label' => $character->getTitle() . ' (' . $label . ')',
                    'userID' => $character->userID,
                ]);
            }
        }
    }
}
