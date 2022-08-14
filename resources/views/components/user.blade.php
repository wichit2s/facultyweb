<div class="relative group w-32">
  <div class="flex items-center cursor-pointer text-sm text-blue border border-white border-b-0  group-hover:border-grey-light rounded-t-lg py-1 px-2">
    <img src="https://placekitten.com/30/30" class="rounded-full mr-2 drop-shadow-lg">
    {{ Auth::user()->name }}
    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
  </div>
  <div class="items-center absolute border border-t-0 rounded-b-lg p-1 bg-white p-2 invisible group-hover:visible group-hover:z-50 w-full">
   <a href="#" class="px-4 py-2 block text-sm text-blue-400 hover:bg-grey-lighter">ข้อมูลส่วนตัว</a>
   <a href="#" class="px-4 py-2 block text-sm text-blue-400 hover:bg-grey-lighter">แก้ไข</a>
   <hr class="border-t mx-2 border-grey-ligght">
    <form action="{{ url('/logout') }}" method="POST">
        @csrf
       <button type="submit" class="px-4 py-2 block text-sm text-red-600 hover:bg-grey-lighter"><i class="fa fa-sign-out"></i> ออก</button>
    </form>
  </div>
</div>
