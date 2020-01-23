{{--
 * Created by PhpStorm.
 * User: Noman Kabeer
 * Date: 23-Jan-2020
 * Time: 1:36 AM
 --}}
@extends('layouts.app')
@section('content')


    <!-- Content -->
    <div class="main">
        @include('includes.flash_message')
        <div class="">
            <div class="bs-callout bs-callout-danger">
                <h4>Rack Name: {{$rackAndBooks->name}} </h4>
                <span><a href="{{route('admin.get.racks')}}" class="btn btn-success">View All Racks</a></span>
                &nbsp &nbsp
                <span><a href="{{route('admin.book.create' , $rackAndBooks->id)}}" class="btn btn-success">Add Book</a></span>
            </div>
            <div class="bs-callout bs-callout-danger">
                <h4>Total Books: {{$rackAndBooks->total_number_of_books}} </h4>
            </div>
            <div class="jumbotrond">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Book Author</th>
                        <th scope="col">Published Year</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rackAndBooks->books as $book)
                    <tr>
                        <th scope="row">{{$book->id}}</th>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->published_year}}</td>
                        <td>
                            <a href="{{route('admin.book.delete' , $book->id)}}" class="btn btn-danger" >Delete</a>
                            <a href="{{route('admin.book.edit' , $book->id)}}" class="btn btn-success" >Update</a>
                        </td>
                    </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('script')

    @endsection