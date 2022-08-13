<div class="flex text-blue-800">
    <div class="flex items-center">
        <img src="http://www.sci.ubu.ac.th/assets/images/sci_atomic.png" class="w-20 h-20 m-2" alt="logo" />
        <div class="flex items-baseline">
            <div class="flex flex-col text-xl">
                <p>คณะวิทยาศาสตร์</p>
                <p>Faculty of Science</p>
            </div>
        </div>
    </div>
    <div class="hidden lg:flex lg:flex-col lg:grow">
        @include("components/header")
        <div class="flex items-baseline justify-around text-sm">
            <p>เกี่ยวกับเรา</p>
            <p>หลักสูตร/ภาควิชา</p>
            <p>วิจัยและบริการวิชาการ</p>
            <p class="bg-blue-900 text-white hover:bg-blue-500 m-2 p-2 rounded">นักศึกษา</p>
            <p class="bg-blue-900 text-white hover:bg-blue-500 m-2 p-2 rounded">โครงการ วมว.</p>
        </div>
    </div>
    <div class="flex grow items-center lg:hidden text-4xl justify-end mr-5"><FontAwesomeIcon icon={faHamburger} /></div>
</div>
