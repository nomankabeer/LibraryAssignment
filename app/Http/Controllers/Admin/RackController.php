<?php
/**
 * Created by PhpStorm.
 * User: Noman Kabeer
 * Date: 23-Jan-2020
 * Time: 1:10 AM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\RackRepository;

class RackController extends Controller{

    private $rackRepository = null;
    public function __construct(RackRepository $rackRepository){
    $this->rackRepository = $rackRepository;
    }
    public function getRacks(){
        return $this->rackRepository->getRacks();
    }
    public function createRack(){
        return view('admin.racks.create');
    }
    public function storeRack(Request $request){
        return $this->rackRepository->storeRack($request->all());
    }
    public function editRack($id){
        return $this->rackRepository->editRack($id);
    }
    public function updateRack($id , Request $request){
        return $this->rackRepository->updateRack($request->all() , $id);
    }
    public function detailRack($id){
        return $this->rackRepository->getRackDetail($id);
    }
    public function deleteRack($id){
        return $this->rackRepository->deleteRack($id);
    }
}
