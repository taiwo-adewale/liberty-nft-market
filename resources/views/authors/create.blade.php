@extends('layouts.layout')

@section('title', 'Become An Author - NFTsGo')

@section('content')
  <main>
    <section id="become-author" class="bg-darkBlue py-24 pt-[180px] sm:pt-[200px] lg:pt-[220px] min-h-[calc(100vh-70px)] flex items-center">
      <div class="container">
        <div class="space-y-14">
          <div class="section-header">
            <h2>Become An <span>Author</span></h2>
          </div>

          <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form-wrapper class="pb-14 px-2 sm:px-4">
              <x-form-group class="lg:w-1/2">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}">

                @error('name')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group class="lg:w-1/2">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}">

                @error('email')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group>
                <label for="username">Username</label>
                <input type="text" name="username" value="{{ old('username') }}">

                @error('username')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group>
                <label for="password">Password</label>
                <input type="password" name="password" value="{{ old('password') }}">

                @error('password')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
              </x-form-group>

              <x-form-group>
                <label for="image">Your File</label>
                <input type="file" name="image">

                @error('image')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group class="text-center space-y-0">
                <button type="submit" class="btn w-full lg:w-1/2 text-sm mt-3.5">Become Author</button>
              </x-form-group>

              <div class="w-full px-4 text-center">
                <p class="text-[#afafaf] text-sm">
                  Already have an account?
                  <a href="{{ route('authors.login') }}" class="text-darkPurple underline underline-offset-2">Login</a>
                </p>
              </div>
            </x-form-wrapper>
          </form>
        </div>
      </div>
    </section>
  </main>

@endsection