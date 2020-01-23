<?php
/**
 * Created by PhpStorm.
 * User: Noman Kabeer
 * Date: 23-Jan-2020
 * Time: 1:10 AM
 */

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Client\RackRepository;

class RackController extends Controller{

    private $rackRepository = null;
    public function __construct(RackRepository $rackRepository){
    $this->rackRepository = $rackRepository;
    }
    public function getRacks(){
        return $this->rackRepository->getRacks();
    }
    public function detailRack($id){
        return $this->rackRepository->getRackDetail($id);
    }
}
