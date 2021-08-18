@extends('layouts.default')

@section('title')
    Index
@endsection

@section('content')

    @if ($message)
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif
    
    <a href="{{route('series.create')}}" class="btn btn-dark mb-1">
        <i class="bi bi-plus"></i>
        Adicionar
    </a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">

                <div class="d-flex justify-content-between align-items-center">
                    {{$serie->name}}
                    <div>
                        <form action="{{route('series.destroy', ['serie' => $serie->id])}}" method="post" onsubmit="return confirm('Tem Certeza que deseja remover {{ addslashes($serie->name)}}?')">
                            @csrf
                            @method('delete')
                        
                            <button class="btn btn-sm btn-danger bi bi-trash"></button>
        
                        </form>
                    </div>
                </div>

                
            </li>
        @endforeach
    </ul>   
@endsection
             
