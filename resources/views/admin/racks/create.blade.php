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
                <h4>Rack Create</h4>
                <span><a href="{{route('admin.get.racks')}}" class="btn btn-danger">Cancel</a></span>
            </div>
            <div class="jumbotron">
                <form action="{{route('admin.rack.store')}}" method="post" >
                    @csrf
                    <input class="form-group" name="name" placeholder="Rack Name">
                    <button class="btn btn-info" type="submit">Submit</button>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('script')

    @endsection