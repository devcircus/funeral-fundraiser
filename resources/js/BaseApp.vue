<template>
    <div class="min-h-screen flex flex-col">
        <vue-snotify class="w-full"></vue-snotify>
        <slot></slot>
        <app-modal></app-modal>
    </div>
</template>

<script>
    import AppModal from 'GeneralComponents/AppModal.vue';

    export default {
        components: { AppModal },
        created () {
            this.setupListeners();
        },
        methods: {
            setupListeners () {
                this.setupNotificationListeners();
            },
            setupNotificationListeners () {
                this.$listen('notification', message => {
                    this.$snotify.success(message, 'Success!');
                });
                this.$listen('error', message => {
                    this.$snotify.error(message, 'Oops!');
                });
            }
        }
    }
</script>