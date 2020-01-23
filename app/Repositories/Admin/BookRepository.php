<?php
/**
 * Created by PhpStorm.
 * User: Noman Kabeer
 * Date: 23-Jan-2020
 * Time: 1:12 AM
 */

namespace App\Repositories\Admin;
use App\Books;
use App\Racks;
use Illuminate\Support\Facades\Validator;
class BookRepository {

    public function storeBook($data){
        Validator::make($data, [
            'rack_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'min:2' , 'max:20'],
            'author' => ['required', 'string', 'min:2' , 'max:20'],
            'published_year' => ['required' , 'digits:4' , 'integer' , 'min:1900' , 'max:'.(date('Y')+1)]
        ])->validate();
        $rack = Racks::find($data['rack_id']);
        if(!$rack){
            session(['error' => 'Rack Not Found']);
            return redirect()->route('admin.get.racks');
        }
        elseif($rack->books->count() > 9){
            session(['error' => 'You can not store more than 10 book on single rack']);
            return redirect()->route('admin.rack.detail' , $data['rack_id']);
        }
        elseif(Books::create($data)){
            session(['success' => 'Book Store Successfully']);
            return redirect()->route('admin.rack.detail' , $data['rack_id']);
        }
        else{
            session(['error' => 'Something went wrong']);
            return redirect()->route('admin.rack.detail' , $data['rack_id']);
        }
    }
    public function updateBook($data , $id){
        Validator::make($data, [
            'title' => ['required', 'string', 'min:2' , 'max:20'],
            'author' => ['required', 'string', 'min:2' , 'max:20'],
            'published_year' => ['required', 'integer', 'min:0' , 'max:2020'],
        ])->validate();
        $Book = Books::where('id' , $id)->first();
        unset($data['_token']);
       if($Book != null && $Book->update($data)){
            session(['success' => 'Book updated Successfully']);
            return redirect()->route('admin.rack.detail' , $Book->rack_id);
        }
        else{
            session(['error' => 'Something went wrong']);
            return redirect()->route('admin.rack.detail' , $Book->rack_id);
        }
    }
    public function editBook($id){
        $book = Books::find($id);
        if($book != null){
            return view('admin.Books.edit' , compact('book' , 'id'));
        }
        else{
            return redirect()->route('admin.get.Books')->with('error' , 'Book Not Found');
        }
    }
    public function deleteBook($id){
        $book = Books::where('id' , $id);
        $rack_id = $book->first()->rack_id;
        if($book->delete()){
            session(['success' => 'Book Deleted Successfully']);
            return redirect()->route('admin.rack.detail' , $rack_id);
        }
        else{
            session(['error' => 'Something went wrong']);
            return redirect()->route('admin.rack.detail' , $rack_id);
        }
    }
}
