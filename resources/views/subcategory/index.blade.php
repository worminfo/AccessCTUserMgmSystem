@extends('layouts.panel')

@section('content')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">Request sub-categories</h4>
    <p>Action: <a href="{{ route('subcategory.create') }}">Add</a></p>
    @if(\Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <!-- <h4 class="c-grey-900 mB-20">Simple Table</h4> -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sub-category type</th>
                            <th scope="col">Sub-category description</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($dataset as $item)
                        <tr>
                            <td><a href="{{ route('subcategory.edit', $item->id) }}">[Edit]</a></td>
                            <td><a href="{{ route('subcategory.show', $item->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $dataset->links() }}
            </div>
        </div>
    </div>
</div>
@endsection