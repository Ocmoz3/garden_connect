<?php

namespace App\Service\CategoriesProduits\Oeufs;


class DataOeufs
{
    public function getOeufsData()
    {
        $oeufs = [
            [
                'cat' => 'Œufs',
                'title' => 'Autre',
            ],
            [
                'cat' => 'Œufs',
                'title' => 'Œuf d’oie',
            ],
            [
                'cat' => 'Œufs',
                'title' => 'Œuf de caille',
            ],
            [
                'cat' => 'Œufs',
                'title' => 'Œuf de poule',
            ],
        ];
        return $oeufs;
    }
}