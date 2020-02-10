<?php
namespace App\Http\Controllers;

use App\Episodio;
class EpisodiosController extends BaseControllerController
{
    public function __construct()
    {
        $this->class = Episodios::class;
    }
}
