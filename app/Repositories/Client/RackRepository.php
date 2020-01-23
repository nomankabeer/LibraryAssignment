<?php
/**
 * Created by PhpStorm.
 * User: Noman Kabeer
 * Date: 23-Jan-2020
 * Time: 1:15 AM
 */

namespace App\Repositories\Client;
use App\Books;
use App\Racks;
use Illuminate\Support\Facades\Validator;
class RackRepository {

    public function getRacks(){
        $racks = Racks::get();
        return view('client.racks.index' , compact('racks'));
    }
    public function getRackDetail($id){
        $rackAndBooks = Racks::with('books')->where('id' , $id)->first();
        if($rackAndBooks){
            return view('client.books.index' , compact('rackAndBooks'));
        }
        else{
            session(['error' => 'Rack Not Found']);
            return redirect()->route('client.get.racks');
        }
    }
}
