@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">

          <h1>Create site</h1>
          <form method="POST" action="/admin/post">
            @csrf

            {{ var_dump($sections); }}
            @foreach ($sections as $i => $section)
              @foreach ($section->fields as $field)
                {{ $field['field']->getView('section[][' . $field['name'] . ']') }}
              @endforeach
            @endforeach

            <button type="submit">Save</button>
          </form>
          
        </div>
    </div>
</main>
@endsection
