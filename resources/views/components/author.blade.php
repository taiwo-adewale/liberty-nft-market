@props(['author'])

<div class="flex sm:justify-center lg:justify-between flex-wrap lg:flex-nowrap gap-y-8">
  <div class="flex items-center gap-x-3 sm:gap-x-8 w-full lg:w-[45%]">
    <div class="overflow-hidden rounded-full flex-shrink-0">
      <img src='{{ asset("storage/$author->image") }}' alt="" class="author-image">
    </div>
    <div>
      <h3 class="text-xl font-bold break-all">{{ $author->name }}</h3>
      <a href="{{ route('authors.show', $author->slug) }}" class="text-darkPurple font-bold break-all">{{ $author->username }}</a>
    </div>
  </div>

  <x-card class="w-full lg:w-[45%] lg:basis-[45%] px-8 py-6 space-y-6">
    <div class="flex justify-between flex-wrap gap-x-6 gap-y-4">
      <div class="flex flex-col gap-y-1">
        <svg class="fill-darkPurple w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"/></svg>
        <h4 class="text-darkPurple text-xl font-bold">{{ $author->likes }}</h4>
        <span>Likes</span>
      </div>

      <div class="flex flex-col gap-y-1">
        <svg class="fill-darkPurple w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M480 128v208c0 97.05-78.95 176-176 176h-37.72c-53.42 0-103.7-20.8-141.4-58.58l-113.1-113.1C3.906 332.5 0 322.2 0 312C0 290.7 17.15 272 40 272c10.23 0 20.47 3.906 28.28 11.72L128 343.4V64c0-17.67 14.33-32 32-32s32 14.33 32 32l.0729 176C192.1 248.8 199.2 256 208 256s16.07-7.164 16.07-16L224 32c0-17.67 14.33-32 32-32s32 14.33 32 32l.0484 208c0 8.836 7.111 16 15.95 16S320 248.8 320 240L320 64c0-17.67 14.33-32 32-32s32 14.33 32 32l.0729 176c0 8.836 7.091 16 15.93 16S416 248.8 416 240V128c0-17.67 14.33-32 32-32S480 110.3 480 128z"/></svg>
        <h4 class="text-darkPurple text-xl font-bold">{{ $author->waves }}</h4>
        <span>Waves</span>
      </div>

      <div class="flex flex-col gap-y-1">
        <svg class="fill-darkPurple w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M160 0C177.7 0 192 14.33 192 32V67.68C193.6 67.89 195.1 68.12 196.7 68.35C207.3 69.93 238.9 75.02 251.9 78.31C268.1 82.65 279.4 100.1 275 117.2C270.7 134.3 253.3 144.7 236.1 140.4C226.8 137.1 198.5 133.3 187.3 131.7C155.2 126.9 127.7 129.3 108.8 136.5C90.52 143.5 82.93 153.4 80.92 164.5C78.98 175.2 80.45 181.3 82.21 185.1C84.1 189.1 87.79 193.6 95.14 198.5C111.4 209.2 136.2 216.4 168.4 225.1L171.2 225.9C199.6 233.6 234.4 243.1 260.2 260.2C274.3 269.6 287.6 282.3 295.8 299.9C304.1 317.7 305.9 337.7 302.1 358.1C295.1 397 268.1 422.4 236.4 435.6C222.8 441.2 207.8 444.8 192 446.6V480C192 497.7 177.7 512 160 512C142.3 512 128 497.7 128 480V445.1C127.6 445.1 127.1 444.1 126.7 444.9L126.5 444.9C102.2 441.1 62.07 430.6 35 418.6C18.85 411.4 11.58 392.5 18.76 376.3C25.94 360.2 44.85 352.9 60.1 360.1C81.9 369.4 116.3 378.5 136.2 381.6C168.2 386.4 194.5 383.6 212.3 376.4C229.2 369.5 236.9 359.5 239.1 347.5C241 336.8 239.6 330.7 237.8 326.9C235.9 322.9 232.2 318.4 224.9 313.5C208.6 302.8 183.8 295.6 151.6 286.9L148.8 286.1C120.4 278.4 85.58 268.9 59.76 251.8C45.65 242.4 32.43 229.7 24.22 212.1C15.89 194.3 14.08 174.3 17.95 153C25.03 114.1 53.05 89.29 85.96 76.73C98.98 71.76 113.1 68.49 128 66.73V32C128 14.33 142.3 0 160 0V0z"/></svg>
        <h4 class="text-darkPurple text-xl font-bold">{{ $author->sales }} ETH</h4>
        <span>
          @php
            echo '($' . number_format($author->sales * 1656.15, 2) . ')';
          @endphp
        </span>
      </div>
    </div>

    <div class="flex flex-wrap md:flex-nowrap items-center gap-y-4 gap-x-6 justify-between">
      <span class="text-xl text-[#afafaf] font-bold text-center sm:text-left flex-grow lg:flex-grow-0">{{ $author->followers }} Followers</span>
      <button type="submit" class="btn text-sm !py-3 flex-grow break-all w-full sm:w-auto">Follow {{ $author->username }}</button>
    </div>
  </x-card>
</div>