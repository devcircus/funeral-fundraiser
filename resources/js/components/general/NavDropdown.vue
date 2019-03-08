<template>
    <li v-if="loggedIn" class="flex-2 relative menu-item">
        <a href="#" class="menu-link" @click="toggleLoginDropdown()">
            <span class="mr-1 inline-block">{{ user.name }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="menu-link-icon">
                <path class="secondary" d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"></path>
                <path class="secondary" d="M21 20v-1a5 5 0 0 0-5-5H8a5 5 0 0 0-5 5v1c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2z"></path>
            </svg>
        </a>
        <ul v-if="showLoginDropdown" class="dropdown-menu login-dropdown-menu">
            <li href="#" class="dropdown-menu-item">
                <a id="lg-logout" href="#" @click.prevent="doLogout()" class="dropdown-link">
                    <span class="mr-1 inline-block">Logout</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="menu-link-icon">
                        <path class="primary" d="M11 4h3a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0V6h-2v12h2v-2a1 1 0 0 1 2 0v3a1 1 0 0 1-1 1h-3v1a1 1 0 0 1-1.27.96l-6.98-2A1 1 0 0 1 2 19V5a1 1 0 0 1 .75-.97l6.98-2A1 1 0 0 1 11 3v1z"></path>
                        <path class="primary" d="M18.59 11l-1.3-1.3c-.94-.94.47-2.35 1.42-1.4l3 3a1 1 0 0 1 0 1.4l-3 3c-.95.95-2.36-.46-1.42-1.4l1.3-1.3H14a1 1 0 0 1 0-2h4.59z"></path>
                    </svg>
                </a>
            </li>
            <li href="#" class="dropdown-menu-item">
                <a id="lg-profile" href="/admiin" class="dropdown-link">
                    <span class="mr-1 inline-block">Admin</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="menu-link-icon">
                        <path class="primary" d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"></path>
                        <path class="primary" d="M21 20v-1a5 5 0 0 0-5-5H8a5 5 0 0 0-5 5v1c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2z"></path>
                    </svg>
                </a>
            </li>
        </ul>
    </li>
    <li v-else class="flex-1 menu-item">
        <a href="/login" class="sm:w-1/3 lg-w-full menu-link">
            <span class="mr-1 inline-block">Login</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="menu-link-icon">
                <path class="secondary" d="M13 4V3a1 1 0 0 1 1.27-.96l6.98 2A1 1 0 0 1 22 5v14a1 1 0 0 1-.75.97l-6.98 2A1 1 0 0 1 13 21v-1h-3a1 1 0 0 1-1-1v-2a1 1 0 0 1 2 0v1h2V6h-2v1a1 1 0 0 1-2 0V5a1 1 0 0 1 1-1h3z"></path>
                <path class="secondary" d="M7.59 11l-1.3-1.3c-.94-.94.47-2.35 1.42-1.4l3 3a1 1 0 0 1 0 1.4l-3 3c-.95.95-2.36-.46-1.42-1.4L7.6 13H3a1 1 0 0 1 0-2h4.59z"></path>
            </svg>
        </a>
    </li>
</template>

<script>
    export default {
        props: ['loggedIn', 'user'],
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
