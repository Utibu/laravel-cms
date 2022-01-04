@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">

          <h1>Create site</h1>
          <form action="/admin/site" method="POST" class="mt-12">
            @csrf
            <label class="block mt-2">Title: <br /><input type="text" name="title" value="{{ old('title') }}"/></label>
            <label class="block mt-2">Slug: <br /><input type="text" name="slug" value="{{ old('slug') }}"/></label>
            <label class="block mt-2">Description: <br /><textarea name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea></label>
            <button type="submit" class="block mt-6">Save</button>
          </form>

          @if ($errors->any())
            @foreach ($errors->all() as $error)
              {{ $error }}<br /><br />
            @endforeach
          @endif
        </div>
    </div>
</main>
@endsection
