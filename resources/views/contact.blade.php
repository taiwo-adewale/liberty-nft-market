@extends('layouts.layout')

@section('title', 'Contact - NFTsGo')

@section('content')

  <x-hero>
    <h2 class="uppercase font-bold text-[40px] leading-snug sm:text-5xl mb-4">Contact Us Now.</h2>
    <span class="hero-breadcrumbs text-[15px] space-x-1 mb-10">
      <a href="{{ route('home.index') }}">Home</a>
      <svg class="w-2.5 h-2.5 inline-block fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
      <a href="{{ route('contact.index') }}">Contact</a>
    </span>
    <div class="flex flex-wrap justify-center gap-3 md:gap-5">
      <a href="{{ route('items.index') }}" class="btn flex-grow md:flex-grow-0 text-sm !py-3">Explore Our Items</a>
      <a href="{{ route('items.create') }}" class="btn !bg-transparent border border-darkPurple flex-grow hover:!bg-darkPurple hover:text-white md:flex-grow-0 text-sm !py-3">Create Your NFT</a>
    </div>
  </x-hero>

  <main>
    <section id="create-item" class="bg-darkBlue py-24">
      <div class="container">
        <div class="space-y-14">
          <div class="section-header">
            <h2><span>Contact</span> Us.</h2>
          </div>

          <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <x-form-wrapper>
              <x-form-group class="lg:w-1/2">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}">

                @error('name')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
                
              </x-form-group>

              <x-form-group class="lg:w-1/2">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}">

                @error('email')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group>
                <label for="subject">Subject</label>
                <input type="text" name="subject" value="{{ old('subject') }}">

                @error('subject')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group>
                <label for="message">Message</label>
                <textarea name="message" class="!rounded-3xl h-[150px]">{{ old('message') }}</textarea>

                @error('message')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group class="text-center space-y-0">
                <button type="submit" class="btn w-full lg:w-1/2 text-sm mt-3.5">Send Message</button>
              </x-form-group>
            </x-form-wrapper>
          </form>
        </div>
      </div>
    </section>

    @include('partials._create_nft')
  </main>

@endsection