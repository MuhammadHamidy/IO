<x-layout>

    <div class="px-44 pt-12 flex flex-col gap-5">
        <x-sub-text>{{ __('Internship/Research Attachment') }}</x-sub-text>
        <p>Enhance your professional skills and gain real-world experience through our Internship programs. Collaborate with international companies, organizations, and institutions, gaining valuable insights into your field of study while building a global professional network.</p>
    </div>
    
    <div class="px-44 pt-12 gap-20 flex w-full">
        <div class="flex flex-col items-center gap-3 h-max w-[25%]">
            <img src="{{asset('/img/intl-icon.png')}}" alt="" class="rounded-full w-max h-max object-cover object-center">
            <p>PT. Multi Generasi Indonesia</p>
        </div>
        <div class="flex flex-col gap-5 w-[75%]">
            <a href="" class="self-center px-10 py-3 mt-10 bg-[#C4D25A] text-[#1F4894] font-medium rounded-xl hover:bg-[#e5f573] transition duration-500">APPLY NOW!</a>
            <p>Paid International Internship Japan with PT. Multi Generasi Indonesia</p>
            <p>PT. Multi Generasi Indonesia (MUGEN) is a company operating in the fields of education, consultancy and workforce distribution to Japan which has been established since 2018</p>
        </div>
    </div>

    <div class="px-44 pt-12 flex flex-col gap-5">
        <button class="flex flex-row h-max click-detail">
            <div class="bg-gray-600 w-20 min-h-full px-10 py-2 flex items-center justify-center text-white">
                <p> > </p>
            </div>
            <div class="bg-black text-white w-max h-max px-10 py-2">General Requirements</button>
        </button>
        <div class="px-10 hidden flex-col gap-3">
            <ul class="list-disc px-10">
                <li>UPER Logistics Engineering student min. semester 5 </li>
                <li>A copy of an active passport  </li>
            </ul>
        </div>
        <button class="flex flex-row h-max click-detail">
            <div class="bg-gray-600 w-20 min-h-full px-10 py-2 flex items-center justify-center text-white">
                <p> > </p>
            </div>
            <div class="bg-black text-white w-max h-max px-10 py-2">Program Benefits</button>
        </button>
        <div class="px-10 hidden flex-col gap-3">
            <ul class="list-disc px-10">
                <li>Proficiency in the Japanese language (Basic Level). </li>
                <li>Acquire hands-on experience working in logistics companies in Japan.</li>
                <li>Expedited preparation for a career in the field of Japanese logistics.</li>
                <li>Stay updated on the latest technology and Logistics Systems in Japan.</li>
                <li>Develop an understanding of Japanese culture and work ethics.</li>
                <li>Apply learned knowledge and Japanese language skills in a real-world work environment.</li>
                <li>Receive a salary in accordance with the applicable Minimum Wage Standards (UMR).</li>
                <li>Obtain a certificate upon successful completion of the program.</li>
            </ul>
        </div>
        <button class="flex flex-row h-max click-detail">
            <div class="bg-gray-600 w-20 min-h-full px-10 py-2 flex items-center justify-center text-white">
                <p> > </p>
            </div>
            <div class="bg-black text-white w-max h-max px-10 py-2">Program Timeline</button>
        </button>
        <div class="px-10 hidden flex-col gap-3"></div>
        <button class="flex flex-row h-max click-detail">
            <div class="bg-gray-600 w-20 min-h-full px-10 py-2 flex items-center justify-center text-white">
                <p> > </p>
            </div>
            <div class="bg-black text-white w-max h-max px-10 py-2">Estimated Cost and Wage</button>
        </button>
        <div class="px-10 hidden flex-col gap-3"></div>
    </div>

    @vite(['resources/js/see-detail.js'])
    <div class="mb-[364px]">

    </div>

</x-layout>
