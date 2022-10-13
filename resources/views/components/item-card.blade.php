@props(['items'])

<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

  @foreach($items as $item)
  <div class="flex flex-col relative">
    <x-card class="space-y-5 px-6 py-14">
      <div class="relative">
        <img src='{{ asset("storage/$item->image") }}'  alt="" class="item-image">

        <div class="absolute -top-[25px] left-[calc(50%-27px)] rounded-full border-2 border-veryDarkGrey">
          <img src='{{ asset("storage/$item->author_thumbnail") }}' alt="" class="w-[50px] h-[50px] rounded-full">
        </div>
      </div>

      <h3 class="text-xl font-bold tracking-wide">{{ $item->name }}</h3>
      <div class="h-[1px] w-full bg-[rgba(255,255,255,0.2)]"></div>
      <div class="flex justify-between items-end">
        <div class="flex flex-col w-[40%]">
          <h4 class="text-[15px]">Current Bid:</h4>
          <p class="text-xl font-bold tracking-wide">{{ $item->price }} ETH</p>
        </div>

        <div class="flex flex-col w-[50%] items-end">
          <h4 class="text-[15px]">Category:</h4>
          <p class="text-xl font-bold tracking-wide text-right break-all">{{ $item->cat_name }}</p>
        </div>
      </div>
    </x-card>

    <a href="{{ route('items.show', $item->slug) }}" class="btn absolute left-[10%] bottom-[26px] w-4/5 !py-3 text-sm tracking-wide">View Details</a>
  </div>
  @endforeach
  
</div>