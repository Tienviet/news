<template>
    <div>
        <navbar-component></navbar-component>
        <div class="container-fluid page-body-wrapper">
            <sider-bar-component></sider-bar-component>
            <div class="main-panel">
                <div class="content-wrapper">
                    <router-view/>
                </div>
                <footer-component></footer-component>
            </div>
        </div>
    </div>
</template>

<script>
    import NavbarComponent from './partials/NavbarComponent.vue';
    import SiderBarComponent from './partials/SiderBarComponent.vue';
    import FooterComponent from './partials/FooterComponent.vue';
    import widget from './pages/widget';

    export default {
        name: "BaseComponent",
        components: {
            NavbarComponent,
            SiderBarComponent,
            FooterComponent,
            widget
        }
    }
</script>

<style scoped>

</style>
