<?php

namespace rp\system\event\listener;

use rp\event\game\GameCollecting;
use rp\system\classification\Classification;
use rp\system\faction\Faction;
use rp\system\game\Game;
use rp\system\race\Race;
use rp\system\role\Role;
use wcf\system\WCF;

/**
 * @author  Marco Daries
 * @copyright   2025 MD-Raidplaner
 * @license MD-Raidplaner is licensed under Creative Commons Attribution-ShareAlike 4.0 International 
 */
final class SWTORGameListener
{
    private const FACTIONS = ['imperial', 'republic'];

    public function __invoke(GameCollecting $event): void
    {
        $event->register(new Game(
            'swtor',
            factions: $this->getFactions(),
            races: $this->getRaces(),
            roles: $this->getRoles(),
            classifications: $this->getClassifications()
        ));
    }

    /**
     * @return array<string, Classification>
     */
    private function getClassifications(): array
    {
        $races = ['cathar', 'chiss', 'cyborg', 'human', 'miraluka', 'mirialan', 'rattataki', 'sith', 'togruta', 'twilek', 'zabrak'];
        
        $classificationConfig = [
            'assassin' => ['damagedealer', 'tank'],
            'commando' => ['damagedealer', 'heal'],
            'guardian' => ['damagedealer', 'tank'],
            'gunslinger' => ['damagedealer'],
            'juggernaut' => ['damagedealer', 'tank'],
            'marauder' => ['damagedealer'],
            'mercenary' => ['damagedealer', 'heal'],
            'operative' => ['damagedealer', 'heal'],
            'powertech' => ['damagedealer', 'tank'],
            'sage' => ['damagedealer', 'heal'],
            'scoundrel' => ['damagedealer', 'heal'],
            'sentinel' => ['damagedealer'],
            'shadow' => ['damagedealer', 'heal'],
            'sniper' => ['damagedealer'],
            'sorcerer' => ['damagedealer', 'heal'],
            'vanguard' => ['damagedealer', 'tank'],
        ];

        return \array_combine(
            \array_keys($classificationConfig),
            \array_map(
                fn($roles, $class) => new Classification(
                    $class,
                    WCF::getLanguage()->get(\sprintf('rp.classification.swtor.%s', $class)),
                    \sprintf('swtor_%s', $class),
                    self::FACTIONS,
                    races: $races,
                    roles: $roles
                ),
                \array_values($classificationConfig),
                \array_keys($classificationConfig)
            )
        );
    }

    /**
     * @return array<string, Faction>
     */
    private function getFactions(): array
    {
        return \array_combine(
            self::FACTIONS,
            \array_map(
                fn($faction) => new Faction(
                    $faction,
                    WCF::getLanguage()->get(\sprintf('rp.faction.swtor.%s', $faction)),
                    \sprintf('swtor_%s', $faction)
                ),
                self::FACTIONS
            )
        );
    }

    /**
     * @return array<string, Race>
     */
    private function getRaces(): array
    {
        return \array_combine(
            $raceNames = ['cathar', 'chiss', 'cyborg', 'human', 'miraluka', 'mirialan', 'nautolaner', 'rattataki', 'sith', 'togruta', 'twilek'],
            \array_map(
                fn($race) => new Race(
                    $race,
                    WCF::getLanguage()->get(\sprintf('rp.race.swtor.%s', $race)),
                    \sprintf('swtor_%s', $race),
                    self::FACTIONS
                ),
                $raceNames
            )
        );
    }

    /**
     * @return array<string, Role>
     */
    private function getRoles(): array
    {
        return \array_combine(
            $roleNames = ['damagedealer', 'heal', 'tank'],
            \array_map(
                fn($role) => new Role(
                    $role,
                    WCF::getLanguage()->get(\sprintf('rp.role.swtor.%s', $role)),
                    \sprintf('swtor_%s', $role),
                    self::FACTIONS
                ),
                $roleNames
            )
        );
    }
}
