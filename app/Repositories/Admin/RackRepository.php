<?php
/**
 * Created by PhpStorm.
 * User: Noman Kabeer
 * Date: 23-Jan-2020
 * Time: 1:15 AM
 */

namespace App\Repositories\Admin;
use App\Books;
use App\Racks;
use Illuminate\Support\Facades\Validator;
class RackRepository {

    public function getRacks(){
        $racks = Racks::get();
        return view('admin.racks.index' , compact('racks'));
    }
    public function storeRack($data){

        Validator::make($data, [
            'name' => ['required', 'string', 'min:5' , 'max:50'],
        ])->validate();

        if(Racks::create($data)){
            session(['success' => 'Rack Store Successfully']);
            return redirect()->route('admin.get.racks');
        }
        else{
            session(['error' => 'Something went wrong']);
            return redirect()->route('admin.get.racks');
        }
    }
    public function updateRack($data , $id){

        Validator::make($data, [
            'name' => ['required', 'string', 'min:5' , 'max:50'],
        ])->validate();
        $rack = Racks::where('id' , $id);
        if(!$rack->first()){
            session(['error' => 'Rack Not Found']);
            return redirect()->route('admin.get.racks');
        }
        elseif($rack->Update(['name' => $data['name']])){
            session(['success' => 'Rack updated Successfully']);
            return redirect()->route('admin.get.racks');
        }
        else{
            session(['error' => 'Something went wrong']);
            return redirect()->route('admin.get.racks');
        }
    }
    public function editRack($id){
        $rack = Racks::find($id);
        if($rack != null){
            return view('admin.racks.edit' , compact('rack'));
        }
        else{
            session(['error' => 'Something went wrong']);
            return redirect()->route('admin.get.racks');
        }
    }
    public function getRackDetail($id){
        $rackAndBooks = Racks::with('books')->where('id' , $id)->first();
        if($rackAndBooks){
            return view('admin.books.index' , compact('rackAndBooks'));
        }
        else{
            session(['error' => 'Rack Not Found']);
            return redirect()->route('admin.get.racks');
        }
    }
    public function deleteRack($id){
        if(Racks::where('id' , $id)->delete()){
            Books::where('rack_id' , $id)->delete();
            session(['success' => 'Rack Deleted Successfully']);
            return redirect()->route('admin.get.racks');
        }
        else{
            session(['error' => 'Something went wrong']);
            return redirect()->route('admin.get.racks');
        }
    }
}
