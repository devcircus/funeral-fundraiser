<template>
    <div class="flex flex-col absolute lg:hidden t-1-r-1">
        <button @click.prevent="toggleMenuDropdown()" class="flex items-center px-3 py-2 border-2 rounded text-green-lighter border-green-light hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
        <ul v-if="showMenuDropdown" class="flex flex-col absolute list-reset text-left w-48 border border-grey bg-grey-lightest shadow-md z-50 t-32-r-60">
            <li class="text-center h-8 cursor-pointer text-left h-16 leading-loose border-b border-grey-light hover:bg-green-light mobile-menu-item">
                <a href="/about" class="w-full text-green-light font-lato font-normal uppercase align-middle block no-underline p-4 mobile-menu-link">
                    <span class="inline-block">About</span>
                </a>
            </li>
            <div v-if="authenticated">
                <li class="text-center h-8 cursor-pointer text-left h-16 leading-loose border-b border-grey-light hover:bg-green-light mobile-menu-item">
                    <a id="sm-profile" href="/admin" class="w-full text-green-light font-lato font-normal uppercase align-middle block no-underline p-4 mobile-menu-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="align-middle inline-block -mt-1 h-4 mr-1">
                            <path class="primary" d="M11 4h3a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0V6h-2v12h2v-2a1 1 0 0 1 2 0v3a1 1 0 0 1-1 1h-3v1a1 1 0 0 1-1.27.96l-6.98-2A1 1 0 0 1 2 19V5a1 1 0 0 1 .75-.97l6.98-2A1 1 0 0 1 11 3v1z"></path>
                            <path class="primary" d="M18.59 11l-1.3-1.3c-.94-.94.47-2.35 1.42-1.4l3 3a1 1 0 0 1 0 1.4l-3 3c-.95.95-2.36-.46-1.42-1.4l1.3-1.3H14a1 1 0 0 1 0-2h4.59z"></path>
                        </svg>
                        <span class="inline-block">Admin</span>
                    </a>
                </li>
                <li class="text-center h-8 cursor-pointer text-left h-16 leading-loose border-b border-grey-light hover:bg-green-light mobile-menu-item">
                    <a id="sm-logout" href="#" @click.prevent="doLogout()" class="w-full text-green-light font-lato font-normal uppercase align-middle block no-underline p-4 mobile-menu-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="align-middle inline-block -mt-1 h-4 mr-1">
                            <path class="primary" d="M11 4h3a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0V6h-2v12h2v-2a1 1 0 0 1 2 0v3a1 1 0 0 1-1 1h-3v1a1 1 0 0 1-1.27.96l-6.98-2A1 1 0 0 1 2 19V5a1 1 0 0 1 .75-.97l6.98-2A1 1 0 0 1 11 3v1z"></path>
                            <path class="primary" d="M18.59 11l-1.3-1.3c-.94-.94.47-2.35 1.42-1.4l3 3a1 1 0 0 1 0 1.4l-3 3c-.95.95-2.36-.46-1.42-1.4l1.3-1.3H14a1 1 0 0 1 0-2h4.59z"></path>
                        </svg>
                        <span class="inline-block">Logout</span>
                    </a>
                </li>
            </div>
            <li v-else class="text-center h-8 cursor-pointer text-left h-16 leading-loose border-b border-grey-ligh hover:bg-green-light mobile-menu-item">
                <a href="/login" class="w-full text-green-light font-lato font-normal uppercase align-middle block no-underline p-4 mobile-menu-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="align-middle inline-block -mt-1 h-4 mr-1">
                        <path class="primary" d="M11 4h3a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0V6h-2v12h2v-2a1 1 0 0 1 2 0v3a1 1 0 0 1-1 1h-3v1a1 1 0 0 1-1.27.96l-6.98-2A1 1 0 0 1 2 19V5a1 1 0 0 1 .75-.97l6.98-2A1 1 0 0 1 11 3v1z"></path>
                        <path class="primary" d="M18.59 11l-1.3-1.3c-.94-.94.47-2.35 1.42-1.4l3 3a1 1 0 0 1 0 1.4l-3 3c-.95.95-2.36-.46-1.42-1.4l1.3-1.3H14a1 1 0 0 1 0-2h4.59z"></path>
                    </svg>
                    <span class="inline-block">Login</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['authenticated'],
        data () {
            return {
                showMenuDropdown: false,
            }
        },
        methods: {
            doLogout () {
                axios.post('/logout').then( () => {
                    this.redirectTo('/login');
                });
            },
            redirectTo (url) {
                location.href = url;
            },
            toggleMenuDropdown () {
                this.showMenuDropdown = ! this.showMenuDropdown;
            },
        }
    }
</script>

<style scoped lang="scss">
    .t-1-r-1 {
        top: 1em;
        right: 1em;
    }
    .t-32-r-60 {
        top: 32px;
        right: 60px;
    }
    .mobile-menu-item {
        &:hover {
            .mobile-menu-link {
                @apply .text-white;
            }
            .mobile-menu-link .menu-link-icon path {
                fill: #F8FAFC;
            }
        }
    }
</style>