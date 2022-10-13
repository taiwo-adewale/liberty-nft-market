@extends('layouts.layout')

@section('title', 'Reset Password - NFTsGo')

@section('content')
  <main>
    <section id="author-login" class="bg-darkBlue py-24 pt-[180px] sm:pt-[200px] lg:pt-[220px] min-h-[calc(100vh-70px)] flex items-center">
      <div class="container">
        <div class="space-y-10">
          <div class="section-header">
            <h2><span>Reset</span> Password</h2>
          </div>

          <form action="{{ route('authors.reset') }}" method="POST" class="mx-auto max-w-[500px]">
            @csrf

            <x-form-wrapper class="pb-14 px-2 sm:px-4">
              <div class="text-center mb-10">
                <p class="text-[#afafaf]">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
              </div>

              <x-form-group>
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Your email">

                @error('email')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group class="text-center space-y-0">
                <button type="submit" class="btn w-full text-sm">Reset Password</button>
              </x-form-group>

              
              <div class="w-full px-4 text-center">
                <a href="{{ route('authors.login') }}" class="text-darkPurple underline underline-offset-2 text-sm">Back to Log In</a>
              </div>
            </x-form-wrapper>
          </form>
        </div>
      </div>
    </section>
  </main>

@endsection