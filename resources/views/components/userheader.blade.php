<div class="flex justify-end">
    <div class="flex justify-evenly w-2/3">
        <p class="text-xs m-1 p-1 text-blue-400"><i class="fa fa-location-dot"></i> access</p>
        <p class="text-xs m-1 p-1 text-blue-400"><i class="fa fa-phone"></i> contact</p>
        <p class="text-xs m-1 p-1 text-blue-400"><i class="fa fa-desktop"></i> e-manage</p>
        <p class="text-xs m-1 p-1 text-blue-400"><i class="fa fa-tag"></i> ITA</p>
        <input class="text-xs m-1 p-1 rounded border" type="search" name="search" placeholder="ค้นหาจาก Google" />
        <button class="text-sm text-white m-1 py-1 px-2 rounded bg-blue-400 shadow"> <i class="fa fa-search"></i> </button>

        @if (Route::has('login'))
            @auth
                <a href="{{ url('/') }}" class="text-sm text-white m-1 py-1 px-2 rounded bg-blue-400 shadow">หน้าหลัก</a>
                @include("components/user")
            @else
                <a href="{{ url('/login') }}" class="text-sm text-white m-1 py-1 px-2 rounded bg-blue-400 shadow">เข้าใช้งาน</a>

                @if (Route::has('register'))
                    <a href="{{ url('/register') }}" class="text-sm text-white m-1 py-1 px-2 rounded bg-blue-400 shadow">ลงทะเบียน</a>
                @endif
            @endauth
        @endif

    </div>
</div>
