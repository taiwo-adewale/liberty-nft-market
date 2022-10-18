@extends('layouts.layout')

@section('title', $category->cat_name . ' - Liberty NFT Market')

@section('content')

  <x-hero>
    <h2 class="uppercase font-bold text-[40px] leading-snug sm:text-5xl mb-4">Create Your NFT Now.</h2>
    <span class="hero-breadcrumbs text-[15px] space-x-1 mb-10">
      <a href="{{ route('home.index') }}">Home</a>
      <svg class="w-2.5 h-2.5 inline-block fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
      <a href="{{ route('categories.show', $category->cat_slug) }}">{{ $category->cat_name }}</a>
    </span>
    <div class="flex flex-wrap justify-center gap-3 md:gap-5">
      <a href="{{ route('items.index') }}" class="btn flex-grow md:flex-grow-0 text-sm !py-3">Explore Our Items</a>
      <a href="{{ route('contact.index') }}" class="btn !bg-transparent border border-darkPurple flex-grow hover:!bg-darkPurple hover:text-white md:flex-grow-0 text-sm !py-3">Contact Us</a>
    </div>
  </x-hero>

  <main>
    <section id="category-items" class="bg-darkBlue py-24">
      <div class="container">
        <div class="space-y-14">
          <div class="section-header">
            <h2>View <span>{{ $category->cat_name }}</span> Items.</h2>
          </div>
  
          <x-item-card :items="$cat_items" />
        </div>
      </div>
    </section>

    @include('partials._create_nft')
  </main>

@endsection