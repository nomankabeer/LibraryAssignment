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
                <h4>Book Create</h4>
                <span><a href="{{route('admin.get.racks')}}" class="btn btn-danger">Cancel</a></span>
            </div>
            <div class="jumbotron">
                <form action="{{route('admin.book.store')}}" method="post" >
                    @csrf
                    <input name="rack_id" type="hidden" value="{{$rack_id}}">
                    <input class="form-group" name="title" placeholder="Title">
                    <input class="form-group" name="author" placeholder="Author">
                    <input class="form-group" name="published_year" placeholder="Published Year">
                    <button class="btn btn-info" type="submit">Submit</button>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('script')

    @endsection