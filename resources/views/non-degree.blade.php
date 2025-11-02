<x-layout>
    <div class="px-44 pt-12">
        <x-sub-text>{{ __('Non Degree') }}</x-sub-text>
    </div>

    <div class="flex justify-center">
        <div class="my-[50px] w-[75vw]">
            <img src="{{asset('/img/program-img-1.png')}}">
            <div class="h-[5em] sm:h-[10em] lg:h-[15em] bg-[#1F4894] p-[20px] sm:p-[32px] flex flex-col justify-center">
                <p class="text-[8px] sm:text-[16px] md:text-[20px] lg:text-[25px] text-[#C4D25A]">Dual Degree</p>
                <a href="#" class="text-[8px] sm:text-[20px] md:text-[24px] lg:text-[36px] text-white font-medium hover:underline flex leading-5 sm:leading-10">Geophysics student goes to Universiti Teknologi Petronas to continue their studies</a>
            </div>
        </div>
    </div>

    <div class="flex flex-row justify-center h-max">
        <div class="w-1/2 h-full flex flex-col justify-center items-center gap-11">
            <div class="flex self-start px-10">
                <x-sub-text>{{ __('Dual Degree') }}</x-sub-text>
            </div>
            <div class="h-full w-[45vw] justify-center border-2 border-slate-300 rounded-2xl shadow-2xl flex flex-col items-center py-[20px] gap-[32px]">
                <img src="{{asset('/img/program-people.png')}}" class="h-auto w-[40vw] object-contain object-center">
                <p class="w-[40vw] h-auto min-h-[180px] text-justify text-[#4D607D] text-[12px] sm:text-[18px] lg:text-[22px]">Universitas Pertamina welcome international students who wants obtain bachelor degree. We offer undergraduate program spread into <span class="font-bold">6 Faculty and 15 study programs</span> you can choose.</p>
                <a href="#" class="text-center text-[12px] sm:text-[16px] md:text-[20px] font-bold text-white bg-[#275DCB] w-[40vw] h-[50px] sm:h-1/8 sm:py-[30px] flex items-center justify-center rounded-md hover:bg-[#2b467c] transition duration-300">
                    {{ __('APPLY NOW') }}
                </a>
            </div>
        </div>
        <div class="w-1/2 h-full flex flex-col justify-center items-center gap-11">
            <div class="flex self-start px-10">
                <x-sub-text>{{ __('Non-Degree') }}</x-sub-text>
            </div>
            <div class="h-full w-[45vw] justify-center border-2 border-slate-300 rounded-2xl shadow-2xl flex flex-col items-center py-[20px] gap-[32px]">
                <img src="{{asset('/img/program-people.png')}}" class="h-auto w-[40vw] object-contain object-center">
                <p class="w-[40vw] h-auto min-h-[180px] text-justify text-[#4D607D] text-[12px] sm:text-[18px] lg:text-[22px]">We have programs for inbound and outbound student.</p>
                <a href="#" class="text-center text-[12px] sm:text-[16px] md:text-[20px] font-bold text-white bg-[#275DCB] w-[40vw] h-[50px] sm:h-1/8 sm:py-[30px] flex items-center justify-center rounded-md hover:bg-[#2b467c] transition duration-300">
                    {{ __('CHOOSE YOUR PROGRAM') }}
                </a>
            </div>
        </div >
    </div>

    <div class="mb-[364px]">

    </div>

</x-layout>
