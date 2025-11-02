<a {{$attributes}} class=" w-[12rem] md:w-[15rem] lg:w-[20rem] 2xl:w-[30rem] h-[178px] bg-white rounded-2xl text-center hover:bg-slate-300 transition duration-300 no-underline hover:no-underline">
    <div class="w-full flex justify-center mt-12">
        <img src="{{asset('/img/intl-icon.png')}}" class="h-[46px] w-[49px]">
    </div>
    <div class="text-[#1F4894] text-[16px] lg:text-[20px] 2xl:text-[28px] font-semibold mt-4">
        <p>{{ $slot }}</p>
    </div>
</a>
