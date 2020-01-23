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
                <h4>Book Update</h4>
                <span><a href="{{route('admin.rack.detail' , $book->rack_id)}}" class="btn btn-danger">Cancel</a></span>
            </div>
            <div class="jumbotron">
                <form action="{{route('admin.book.update' , $book->id)}}" method="post" >
                    @csrf
                    <input class="form-group" name="title" placeholder="Title" value="{{$book->title}}">
                    <input class="form-group" name="author" placeholder="Author" value="{{$book->author}}">
                    <input class="form-group" name="published_year" placeholder="Published Year" value="{{$book->published_year}}">
                    <button class="btn btn-info" type="submit">Update</button>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('script')

    @endsection