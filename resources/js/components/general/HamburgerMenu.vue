<template>
    <div class="hamburger-menu-container">
        <button @click.prevent="toggleMenuDropdown()" class="hamburger-menu-button">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
        <ul v-if="showMenuDropdown" class="dropdown-menu mobile-dropdown-menu">
            <li class="menu-item mobile-menu-item">
                <a href="/about" class="mobile-menu-link">
                    <span class="inline-block">About</span>
                </a>
            </li>
            <div v-if="loggedIn">
                <li class="menu-item mobile-menu-item">
                    <a id="sm-profile" href="/admin" class="mobile-menu-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="menu-link-icon mr-1">
                            <path class="primary" d="M11 4h3a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0V6h-2v12h2v-2a1 1 0 0 1 2 0v3a1 1 0 0 1-1 1h-3v1a1 1 0 0 1-1.27.96l-6.98-2A1 1 0 0 1 2 19V5a1 1 0 0 1 .75-.97l6.98-2A1 1 0 0 1 11 3v1z"></path>
                            <path class="primary" d="M18.59 11l-1.3-1.3c-.94-.94.47-2.35 1.42-1.4l3 3a1 1 0 0 1 0 1.4l-3 3c-.95.95-2.36-.46-1.42-1.4l1.3-1.3H14a1 1 0 0 1 0-2h4.59z"></path>
                        </svg>
                        <span class="inline-block">Admin</span>
                    </a>
                </li>
                <li class="menu-item mobile-menu-item">
                    <a id="sm-logout" href="#" @click.prevent="doLogout()" class="mobile-menu-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="menu-link-icon mr-1">
                            <path class="primary" d="M11 4h3a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0V6h-2v12h2v-2a1 1 0 0 1 2 0v3a1 1 0 0 1-1 1h-3v1a1 1 0 0 1-1.27.96l-6.98-2A1 1 0 0 1 2 19V5a1 1 0 0 1 .75-.97l6.98-2A1 1 0 0 1 11 3v1z"></path>
                            <path class="primary" d="M18.59 11l-1.3-1.3c-.94-.94.47-2.35 1.42-1.4l3 3a1 1 0 0 1 0 1.4l-3 3c-.95.95-2.36-.46-1.42-1.4l1.3-1.3H14a1 1 0 0 1 0-2h4.59z"></path>
                        </svg>
                        <span class="inline-block">Logout</span>
                    </a>
                </li>
            </div>
            <li v-else class="menu-item mobile-menu-item">
                <a href="/login" class="mobile-menu-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="menu-link-icon mr-1">
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
        props: ['loggedIn'],
        methods: {
            doLogout () {
                axios.post('/logout').then( () => {
                    this.redirectTo('/login');
                });
            },
            redirectTo (url) {
                location.href = url;
            }
        }
    }
</script>

<style scoped lang="scss">

</style>