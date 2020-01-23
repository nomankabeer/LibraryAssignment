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
                <h4>Search Book</h4>
            </div>
            <div class="bs-callout bs-callout-danger">
                <form action="{{route('client.search.book')}}" method="post" >
                    @csrf
                    <input class="form-group" name="search" value="{{old('search')}}" placeholder="Title|Author|Year">
                    <button class="btn btn-info" type="submit">Search</button>
                </form>
            </div>
            <div class="jumbotrond">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rack Name</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Book Author</th>
                        <th scope="col">Published Year</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(@$books != null)
                    @foreach($books as $book)
                    <tr>
                        <th scope="row">{{$book->id}}</th>
                        <td>{{$book->title}}</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->published_year}}</td>
                    </tr>
                     @endforeach
                     @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('script')

    @endsection