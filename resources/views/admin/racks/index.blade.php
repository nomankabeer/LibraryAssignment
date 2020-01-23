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
                <h4>Racks</h4>
                <span><a href="{{route('admin.rack.create')}}" class="btn btn-success">Add Rack</a></span>
            </div>
            <div class="jumbotrond">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Total no. of Books</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($racks as $rack)
                    <tr>
                        <th scope="row">{{$rack->id}}</th>
                        <td>{{$rack->name}}</td>
                        <td>{{$rack->total_number_of_books}}</td>
                        <td>
                            <a href="{{route('admin.rack.delete' , $rack->id)}}" class="btn btn-danger" >Delete</a>
                            <a href="{{route('admin.rack.edit' , $rack->id)}}" class="btn btn-success" >Update</a>
                            <a href="{{route('admin.rack.detail' , $rack->id)}}" class="btn btn-info" >View Details</a>
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