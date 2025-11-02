<x-layout>

    <div class="px-44 pt-12 flex flex-col gap-5">
        <x-sub-text>{{ __('UNIVERSITAS PERTAMINA STUDY ABROAD (UPER-SA)') }}</x-sub-text>
        <p>Immerse yourself in a different academic environment through our UPER-SA Student Exchange program. Experience life at partner universities, broaden your perspectives, and enhance your academic portfolio with diverse courses and cultural exposure. </p>
    </div>

    <div class="px-44 pt-12 flex flex-col gap-5">
        <button class="flex flex-row h-max click-detail">
            <div class="bg-gray-600 w-20 min-h-full px-10 py-2 flex items-center justify-center text-white">
                <p> > </p>
            </div>
            <div class="bg-black text-white w-max h-max px-10 py-2">Program Detail</button>
        </button>
        <div class="px-10 hidden flex-col gap-3">
            <p>Student Exchange Programme is carried out based on mutual agreement between universities/institutions (partner university / institution). Exchange students can enrol in equivalent courses at UPER in subjects that are related to their faculties and study background in their Home University with duration 1 - 2 Semester</p>
            <button class="flex flex-row h-max click-detail">
                <div class="bg-gray-600 w-20 min-h-full px-10 py-2 flex items-center justify-center text-white">
                    <p> > </p>
                </div>
                <div class="bg-black text-white w-max h-max px-10 py-2">General Requirements</button>
            </button>
            <div class="px-10 hidden flex-col gap-3">
                <ul class="list-disc px-10">
                    <li>UPER active students (min. sem 3) </li>
                    <li>English proficiency certificate  </li>
                    <li>CGPA min. 3.0  </li>
                    <li>English Academic Transcript (https://bit.ly/transkripen) </li>
                    <li>A copy of an active passport  </li>
                    <li>A recent photograph with white background </li>
                    <li>Recommendation letter  </li>
                </ul>
            </div>
        </div>
        <a href="{{route('uper-sa-register')}}" class="self-center px-10 py-3 mt-10 bg-[#C4D25A] text-[#1F4894] font-medium rounded-md hover:bg-[#e5f573] transition duration-500">APPLY NOW!</a>
    </div>

    @vite(['resources/js/see-detail.js'])
    <div class="mb-[364px]">

    </div>

</x-layout>
