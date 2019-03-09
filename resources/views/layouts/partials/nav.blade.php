<header role="banner" class="bg-blue mb-32 h-140p">
    <div class="flex justify-between items-center pt-6 container">
        <div class="mr-6">
            <div class="w-300p flex flex-col">
                <h1 class="text-4xl text-green">Martha Brown</h1>
                <span class="text-3xl text-blue-lightest">Fundraiser</span>
            </div>
        </div>
        <hamburger-menu :authenticated="{{ json_encode(Auth::check()) }}"></hamburger-menu>
        <nav class="hidden pl-12 lg:flex lg:flex-1 lg:w-full lg:justify-end" role="navigation">
            <ul class="list-reset">
                <li class="flex-1 text-center h-8 cursor-pointer">
                    <a href="/about" class="w-full text-white font-lato font-semibold uppercase align-middle block no-underline p-4 whitespace-no-wrap tracking-wide hover:text-green-light menu-link">
                        <span class="mr-1 inline-block">About</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="align-middle inline-block -mt-1 h-4 menu-link-icon">
                            <path class="secondary" d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20z"></path>
                            <path class="primary hover-white" d="M11 12a1 1 0 0 1 0-2h2a1 1 0 0 1 .96 1.27L12.33 17H13a1 1 0 0 1 0 2h-2a1 1 0 0 1-.96-1.27L11.67 12H11zm2-4a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                        </svg>
                    </a>
                </li>
            </ul>
            <div class="flex">
                <nav-dropdown :authenticated="{{ json_encode(Auth::check()) }}" :user="{{ json_encode(Auth::user()) }}"></nav-dropdown>
            </div>
        </nav>
    </div>
</header>