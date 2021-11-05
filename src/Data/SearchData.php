<?php

namespace App\Data;

use App\Entity\Cimetiere;
use DateTime;

class SearchData
{
    /**
     * @var string
     */
    public $prenoms= '';

    /**
     * @var string
     */
    public $nomFam= '';

    /**
     * @var string
     */
    public $nomUsa = '';

    /**
     * @var null|DateTime
     */
    public ?DateTime $birth;

    /**
     * @var Cimetiere[]
     */
    public $cimetieres = [];
}