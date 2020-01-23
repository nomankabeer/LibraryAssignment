{{--
 * Created by PhpStorm.
 * User: Noman Kabeer
 * Date: 23-Jan-2020
 * Time: 2:09 AM
 --}}
@if(Auth::check())
<ul class="list-group">
    <li class="list-group-item text-center"></i><span>Sidebar</span></li>
    @if(Auth::user()->role_id == 1)
    <li class="list-group-item"><a href="{{route('admin.get.racks')}}"><i class="fa fa-server"></i><span>Racks</span></a></li>
    @elseif(Auth::user()->role_id == 2)
    <li class="list-group-item"><a href="{{route('client.get.racks')}}"><i class="fa fa-server"></i><span>Client Racks</span></a></li>
    <li class="list-group-item"><a href="{{route('client.search.book')}}"><i class="fa fa-server"></i><span>Client search book</span></a></li>
    @endif
</ul>
@endif

