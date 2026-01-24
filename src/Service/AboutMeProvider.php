<?php

namespace App\Service;

class AboutMeProvider
{
    public function transformAboutData(array $infos): array
    {
        $transformedData = [];
        foreach ($infos as $info) {
            $transformedData['about'][] = [
                'id' => $info->getId(),
                'title' => $info->getTitle(),
                'content' => $info->getContent(),
                'updatedAt' => $info->getUpdatedAt() ? $info->getUpdatedAt()->format('Y-m-d H:i:s') : null,
            ];
        }

        return $transformedData;
    }
}
