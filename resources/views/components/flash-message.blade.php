@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-[100px] sm:top-[110px] lg:top-[142px] left-1/2 transform -translate-x-1/2 bg-veryDarkGrey border border-borderColor px-7 py-4 rounded-xl z-20 text-center w-[90%] sm:w-[540px]">
  <p>
    {{ session('message') }}
  </p>
</div>
@endif