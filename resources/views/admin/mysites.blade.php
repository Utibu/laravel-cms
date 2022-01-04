@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">

          <h1>My sites</h1>
          <table class="table-fixed w-full text-left">
            <thead>
              <th>ID</th>
              <th>Title</th>
              <th>Slug</th>
            </thead>
            @forelse ($sites as $site)
              <tr>
                <td>{{ $site->id }}</td>
                <td>{{ $site->title }}</td>
                <td>{{ $site->slug }}</td>
              </tr>
            @empty
              <p>No sites yet.</p>
            @endforelse
            
          </table>

        </div>
    </div>
</main>
@endsection
