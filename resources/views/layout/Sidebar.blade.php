<div class="w-64 bg-[#f23c2e] text-white">
    <!-- Logo -->
    <div class="flex p-6 bg-[#f23c2e] flex items-center">
        <img src="{{asset('Assets/Handbag.png')}}" alt="" class="mr-2">
        <h2 class="text-2xl">SIMS Web App</h2>
    </div>

    <!-- Menu Items -->
    <div class="flex-grow overflow-y-auto">
        <ul class="space-y-6 p-6">
            <li>
                <a href="{{ route('daftar-produk') }}" class="flex items-center space-x-3 py-3 px-4 rounded-md hover:bg-[#f23c2e] transition-all">
                    <img src="{{asset('Assets/Package.png')}}" alt="">
                    <span>Produk</span>
                </a>
            </li>
            <li>
                <a href="profil" class="flex items-center space-x-3 py-3 px-4 rounded-md hover:bg-[#f23c2e] transition-all">
                    <img src="{{asset('Assets/User.png')}}" alt="">
                    <span>Profil</span>
                </a>
            </li>
                <a href="#" class="flex items-center space-x-3 py-3 px-4 rounded-md hover:bg-[#f23c2e] transition-all">
                    <img src="{{asset('Assets/SignOut.png')}}" alt="">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>