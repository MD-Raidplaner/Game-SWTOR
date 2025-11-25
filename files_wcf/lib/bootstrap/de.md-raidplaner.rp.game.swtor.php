<?php

/**
 * @author  Marco Daries
 * @copyright   2025 MD-Raidplaner
 * @license MD-Raidplaner is licensed under Creative Commons Attribution-ShareAlike 4.0 International 
 */

use wcf\system\event\EventHandler;

return new class {
    public function __invoke(): void
    {
        $this->initGame();
    }

    private function initGame(): void
    {
        EventHandler::getInstance()->register(
            \rp\event\game\GameCollecting::class,
            \rp\system\event\listener\SWTORGameListener::class
        );
    }
};
