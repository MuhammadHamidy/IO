<x-layout>
  <div class="px-44 pt-12 flex flex-col gap-10">
    <a href="{{route('uper-sa-outbound')}}" class="flex gap-3 items-center">
      <span class="bg-[#424352] w-[39px] h-[39px] text-2xl flex items-center justify-center text-white font-bold rounded-md"><</span>
      Back
    </a>
      <x-sub-text>{{ __('FORM PENDAFTARAN UPER-SA') }}</x-sub-text>
      <div class="border-[#BFBFBF] border-[1px] bg-[#FOEFEF] rounded-md w-full py-[12.5px] px-[24px]">
        <p class="text-xl font-medium">Please fill out this form</p>
      </div>
      <div>
        <input type="radio" id="siup-data" name="siup_data">
        <label for="siup-data">
          Fill with my SIUP data
        </label>
      </div>
      <form action="" class="gap-[20px] flex flex-col pb-10">
        <div class="grid grid-cols-2 grid-rows-10 gap-10">
          <div class="col-start-1 col-end-2 row-start-1 row-end-2 flex flex-col gap-3 w-full h-full">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-2 col-end-3 row-start-1 row-end-2 flex flex-col gap-3 w-full h-full">
            <label for="student_id">Student ID</label>
            <input type="text" name="student_id" id="student_id" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-1 col-end-2 row-start-2 row-end-3 flex flex-col gap-3 w-full h-full">
            <label for="date-of-birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date-of-birth" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-2 col-end-3 row-start-2 row-end-3 flex flex-col gap-3 w-full h-full">
            <label for="place-of-birth">Place of Birth</label>
            <input type="text" name="place_of_birth" id="place-of-birth" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-1 col-end-2 row-start-3 row-end-4 flex flex-col gap-3 w-full h-full">
            <label for="gpa">GPA</label>
            <div class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] flex rounded-md">
              <input type="number" name="gpa" id="gpa" min="0" max="4.0" step="0.01" class="w-max text-end">
              <span>/ 4.0</span>
            </div>
          </div>
          <div class="col-start-2 col-end-3 row-start-3 row-end-4 flex flex-col gap-3 w-full h-full">
            <label for="year">Year/Semester</label>
            <div class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] flex rounded-md">
              <input type="number" name="year" id="year" class="w-16 text-end">
              <span>/ 0</span>
              <input type="number" name="semester" id="semester" class="w-16 text-start">
            </div>
          </div>
          <div class="col-start-1 col-end-2 row-start-4 row-end-5 flex flex-col gap-3 w-full h-full">
            <label for="department">Department</label>
            <input type="text" name="department" id="department" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-2 col-end-3 row-start-4 row-end-5 flex flex-col gap-3 w-full h-full">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" id="nationality" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-1 col-end-2 row-start-5 row-end-6 flex flex-col gap-3 w-full h-full">
            <label for="religion">Religion</label>
            <input type="text" name="religion" id="religion" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-2 col-end-3 row-start-5 row-end-6 flex flex-col gap-3 w-full h-full">
            <label for="passport-number">Passport Number</label>
            <input type="text" name="passport_number" id="passport-number" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-1 col-end-2 row-start-6 row-end-7 flex flex-col gap-3 w-full h-full">
            <label for="passport-expiration-date">Passport Expiration Date</label>
            <input type="date" name="passport_expiration_date" id="passport-expiration-date" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-2 col-end-3 row-start-6 row-end-7 flex flex-col gap-3 w-full h-full">
            <label for="mailing-address">Mailing Address</label>
            <input type="email" name="mailing_address" id="mailing-address" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-1 col-end-2 row-start-7 row-end-8 flex flex-col gap-3 w-full h-full">
            <label for="toefl-ielts-score">TOEFL/IELTS SCORE</label>
            <input type="number" name="toefl_ielts_score" id="toefl-ielts-score" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-2 col-end-3 row-start-7 row-end-8 flex flex-col gap-3 w-full h-full">
            <label for="test-date">Test Date</label>
            <input type="date" name="test_date" id="test-date" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-1 col-end-2 row-start-8 row-end-9 flex flex-col gap-3 w-full h-full">
            <label for="parents-name">Parent's Name</label>
            <input type="text" name="parents_name" id="parents-name" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-2 col-end-3 row-start-8 row-end-9 flex flex-col gap-3 w-full h-full">
            <label for="parental-relationship">Parental Relationship</label>
            <input type="text" name="parental_relationship" id="parental-relationship" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-1 col-end-2 row-start-9 row-end-10 flex flex-col gap-3 w-full h-full">
            <label for="parents-address">Parent's Address</label>
            <input type="text" name="parents_address" id="parents-address" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-2 col-end-3 row-start-9 row-end-10 flex flex-col gap-3 w-full h-full">
            <label for="parents-telephone-number">Parent's Telephone Number</label>
            <input type="telp" name="parents_telephone_number" id="parents-telephone-number" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-1 col-end-2 row-start-10 row-end-11 flex flex-col gap-3 w-full h-full">
            <label for="parents-mobile-number">Parent's Mobile Number</label>
            <input type="telp" name="parents_mobile_number" id="parents-mobile-number" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
          <div class="col-start-2 col-end-3 row-start-10 row-end-11 flex flex-col gap-3 w-full h-full">
            <label for="parents-email-address">Parent's Email Address</label>
            <input type="email" name="parents_email_address" id="parents-email-address" class="border-[0.66px] border-[#BFBFBF] bg-[#FDFDFD] p-[5px] rounded-md">
          </div>
        </div>
        <div class="flex flex-col gap-3 border-[1px] border-[#BFBEBE] bg-[#FFF8F8] p-5 rounded-md">
          <p>Note : </p>
          <ol class="list-decimal px-10">
            <li>
              <div class="flex gap-1">
                Your GPA must at least 3.0
              </div>
            </li>
            <li>
              <div class="flex gap-1">
                You need to be in at least the 
                <span class="flex items-start justify-start"><p class="">3</p><p class="text-xs">rd</p></span> 
                (Third) Semester of the Academic Year.
              </div>
            </li>
          </ol>
        </div>
        <button type="submit" class="bg-[#1F4894] rounded-md px-16 py-2 text-md font-bold text-white self-end">Submit</button>
      </form>
  </div>
</x-layout>
