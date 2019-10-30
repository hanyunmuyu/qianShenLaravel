<template>
    <div id="footer">
        <mu-container>
            <mu-bottom-nav>
                <mu-bottom-nav-item title="Recents" icon="restore"></mu-bottom-nav-item>
                <mu-bottom-nav-item title="Favorites" icon="favorite"></mu-bottom-nav-item>
                <mu-bottom-nav-item title="Nearby" icon="location_on"></mu-bottom-nav-item>
            </mu-bottom-nav>
        </mu-container>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$api.login().then((res) => {
                console.log(res)
            });
            console.log('Component mounted.')
        }
    }
</script>
<style>
    #footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>
