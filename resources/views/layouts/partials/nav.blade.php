<template>
    <header role="banner" class="top-banner">
        <div class="top-banner-container container">
            <div class="mr-6">
                <div class="w-48">
                    <h1 class="text-4xl text-grey-darkest">Fundraiser</h1>
                </div>
            </div>
            <hamburger-menu :logged-in="{{ Auth::check() }}"></hamburger-menu>
            <nav class="nav-menu-container" role="navigation">
                <ul class="nav-menu">
                    <div class="flex justify-between">
                        <li class="flex-1 menu-item">
                            <a href="/about" class="menu-link">
                                <span class="mr-1 inline-block">About</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="menu-link-icon">
                                    <path class="secondary" d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20z"></path>
                                    <path class="primary hover-white" d="M11 12a1 1 0 0 1 0-2h2a1 1 0 0 1 .96 1.27L12.33 17H13a1 1 0 0 1 0 2h-2a1 1 0 0 1-.96-1.27L11.67 12H11zm2-4a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                                </svg>
                            </a>
                        </li>
                    </div>
                    <div class="flex ml-auto">
                        <nav-dropdown :logged-in="{{ Auth::check() }}" :user="{{ json_decode(Auth::user()) }}"></nav-dropdown>
                    </div>
                </ul>
            </nav>
        </div>
    </header>
</template>