@extends('layouts.navbar')
@section('contents')

<div class="card">
    <div class="card-header position-relative">
       {{$title}}
        <a href="{{$href}}/create" class="btn btn-danger waves-effect rounded-circle position-absolute top-100 end-0 translate-middle">
            <i class="fa-sharp fa-solid fa-plus text-white"></i>
        </a>
    </div>
    <div class="card-body">
        @yield('extraContents')
        <table class="table">
            <thead>
                <tr>
                    @yield('tableHeaders')
                </tr>
            </thead>
            <tbody>
                @yield('tableBody')
            </tbody>
        </table>
    </div>
</div>

@endsection
