<?php

namespace App\Services;

class GroupByOwnersService
{
    public function groupByOwners($files)
    {
        $groupedFiles = [];

        foreach ($files as $file => $owner) {
            if (!array_key_exists($owner, $groupedFiles)) {
                $groupedFiles[$owner] = [];
            }
            $groupedFiles[$owner][] = $file;
        }

        return $groupedFiles;
    }
}
