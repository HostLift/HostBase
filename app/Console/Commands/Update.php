<?php

namespace App\Console\Commands;

use App\Notifications\UpdateNotification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableStyle;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Style\SymfonyStyle;

class Update extends Command
{
    protected $signature = 'hostbase:update';
    protected $description = 'Check for updates on HostBase';

    protected $owner = 'HostLift';
    protected $repo = 'HostBase';

    public function handle()
    {
        $currentVersion = config('hostbase.version');
        $latestRelease = $this->getLatestRelease();

        if (!$latestRelease) {
            $this->error('Failed to retrieve the latest version of HostBase.');
            return;
        }

        $latestVersion = $latestRelease['name'];

        $this->line("Current Version: <fg=yellow>{$currentVersion}</>");
        $this->line("Latest Version: <fg=cyan>{$latestVersion}</>");

        if ($this->isNewVersionAvailable($currentVersion, $latestVersion)) {
            $this->info('A new version of HostBase is available.');
        } else {
            $this->info('HostBase is up to date.');
        }
    }

    protected function getLatestRelease()
    {
        $response = Http::get("https://api.github.com/repos/{$this->owner}/{$this->repo}/releases/latest");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    protected function isNewVersionAvailable($currentVersion, $latestVersion)
    {
        return version_compare($latestVersion, $currentVersion, '>');
    }
}
