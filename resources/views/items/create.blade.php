@extends('layouts.layout')

@section('title', 'Create Item - Liberty NFT Market')

@section('content')

  <x-hero>
    <h2 class="uppercase font-bold text-[40px] leading-snug sm:text-5xl mb-4">Create Your NFT Now.</h2>
    <span class="hero-breadcrumbs text-[15px] space-x-1 mb-10">
      <a href="{{ route('home.index') }}">Home</a>
      <svg class="w-2.5 h-2.5 inline-block fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
      <a href="{{ route('items.index') }}">Items</a>
      <svg class="w-2.5 h-2.5 inline-block fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
      <a href="{{ route('items.create') }}">Create Yours</a>
    </span>
    <div class="flex flex-wrap justify-center gap-3 md:gap-5">
      <a href="{{ route('items.index') }}" class="btn flex-grow md:flex-grow-0 text-sm !py-3">Explore Our Items</a>
      <a href="{{ route('contact.index') }}" class="btn !bg-transparent border border-darkPurple flex-grow hover:!bg-darkPurple hover:text-white md:flex-grow-0 text-sm !py-3">Contact Us</a>
    </div>
  </x-hero>

  <main>
    <section id="create-item" class="bg-darkBlue py-24">
      <div class="container">
        <div class="space-y-14">
          <div class="section-header">
            <h2>Apply For <span>Your Item</span> Here.</h2>
          </div>

          <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" id="create-item-form">
            @csrf

            <x-form-wrapper>
              <x-form-group>
                <label for="item name">Item Title</label>
                <input type="text" name="name" id="item-title" value="{{ old('name') }}" placeholder="Ex. Lyon King">

                @error('name')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group class="lg:w-1/2">
                <label for="price">Price Of Item</label>
                <input type="text" name="price" id="item-price" value="{{ old('price') }}" placeholder="Price depends on quality. Ex. 0.06 ETH">

                @error('price')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group class="lg:w-1/2">
                <label for="category">Category</label>
                <select name="cat_id" id="item-category" class="pr-8 cursor-pointer focus:ring-2">

                  @foreach ($categories as $category)
                    <option value="{{ $category->cat_name }}">{{ $category->cat_name }}</option>
                  @endforeach

                </select>
              </x-form-group>

              <x-form-group>
                <label for="image">Your File</label>
                <input type="file" name="image" id="item-image">

                @error('image')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group>
                <label for="description">Description For Item</label>
                <textarea name="description" id="item-description" placeholder="Give Us Your Idea" class="!rounded-3xl h-[150px]">{{ old('description') }}</textarea>

                @error('description')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <div class="text-center w-full px-4 flex flex-wrap md:flex-nowrap mt-4 gap-x-6 gap-y-4">
                <button type="submit" class="btn w-full md:w-2/3 text-sm">Submit Item</button>
                <button type="button" class="btn w-full md:w-1/3 text-sm !bg-transparent border border-darkPurple hover:!bg-darkPurple hover:!text-white" id="update-create-form">Update Preview</button>
              </div>
            </x-form-wrapper>
          </form>
        </div>

        <div class="space-y-14 pt-32">
          <div class="section-header">
            <h2>This Is <span>Your Item</span> Preview.</h2>
          </div>
  
          <div class="grid lg:grid-cols-2 gap-x-12 gap-y-8">
            <div>
              <img src="{{ asset('images/no-image-icon-23483.png') }}" alt="" class="rounded-3xl lg:w-full" id="item-image-preview">
            </div>

            <div>
              <h2 class="font-bold text-xl mb-6" id="item-title-preview">No Title yet</h2>

              <div class="flex space-x-4 mb-8">
                <img src='{{ asset("storage/$author->thumbnail") }}' alt="" class="rounded-full">
                <div class="flex flex-col gap-y-1">
                  <span class="text-[15px]">{{ $author->name }}</span>
                  <a href="{{ route('authors.show', $author->slug) }}" class="text-[15px] text-darkPurple font-bold">{{ $author->username }}</a>
                </div>
              </div>

              <p class="text-[15px] leading-loose" id="item-description-preview">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi laudantium quia ipsum voluptas laborum quidem, dolorum voluptatem adipisci asperiores atque cupiditate. Laudantium amet deserunt, explicabo incidunt deleniti fuga sed rem quis velit iure est, beatae reprehenderit? Assumenda dolorem facilis nulla aliquid totam voluptatibus delectus doloribus sed magnam repellat consequatur magni repudiandae cum, in, accusantium enim. A illo itaque inventore accusantium mollitia minus velit ab magni quo culpa sunt quasi recusandae hic officia architecto animi maxime quas sapiente.</p>

              <div class="flex flex-wrap justify-between items-stretch text-[15px] mt-10 gap-x-4 gap-y-6">
                <div class="flex flex-col gap-y-2 justify-between">
                  <p>Current Bid</p>
                  <span class="font-bold text-xl text-darkPurple"><span id="item-price-preview" class="text-darkPurple">0</span> ETH</span>
                  <p id="item-price-dollars">($0.00)</p>
                </div>

                <div class="flex flex-col gap-y-2 justify-between">
                  <p>Owner</p>
                  <span class="font-bold text-xl text-darkPurple">{{ $author->name }}</span>
                  <p>{{ $author->username }}</p>
                </div>

                <div class="flex flex-col gap-y-2">
                  <p>Category</p>
                  <span class="font-bold text-xl text-darkPurple" id="item-category-preview">Gaming</span>
                  <a href="{{ route('categories.show', 'gaming') }}" class="underline underline-offset-2 hover:text-darkPurple" id="item-category-preview-2">Browse Gaming</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <div class="js-flash-message hidden fixed top-[100px] sm:top-[110px] lg:top-[142px] left-1/2 transform -translate-x-1/2 bg-veryDarkGrey border border-borderColor px-7 py-4 rounded-xl z-20 text-center w-[90%] sm:w-[540px]">
    <p>Item Preview Updated. Scroll down to see it</p>
  </div>

@endsection