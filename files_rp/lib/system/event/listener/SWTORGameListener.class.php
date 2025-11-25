<?php

namespace rp\system\event\listener;

use rp\event\game\GameCollecting;
use rp\system\faction\Faction;
use rp\system\game\Game;
use rp\system\race\Race;
use wcf\system\WCF;

/**
 * @author  Marco Daries
 * @copyright   2025 MD-Raidplaner
 * @license MD-Raidplaner is licensed under Creative Commons Attribution-ShareAlike 4.0 International 
 */
final class SWTORGameListener
{
    public function __invoke(GameCollecting $event): void
    {
        $event->register(new Game(
            'swtor',
            factions: $this->getFactions(),
            races: $this->getRaces()
        ));
    }

    /**
     * @return array<string, Faction>
     */
    private function getFactions(): array
    {
        return \array_combine(
            $factionNames = ['imperial', 'republic'],
            \array_map(
                fn($faction) => new Faction(
                    $faction,
                    WCF::getTPL()->get(\sprintf('rp.faction.swtor.%s', $faction)),
                    \sprintf('swtor_%s', $faction)
                ),
                $factionNames
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
                    WCF::getTPL()->get(\sprintf('rp.race.swtor.%s', $race)),
                    \sprintf('swtor_%s', $race),
                    ['imperial', 'republic']
                ),
                $raceNames
            )
        );
    }
}
