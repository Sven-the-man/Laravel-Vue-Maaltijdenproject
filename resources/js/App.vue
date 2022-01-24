<template>
    <div>
        <h1>{{ message }}</h1>
        <router-view/>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: "Als je dit kan lezen, dan doet Vue het correct!",
        };
    },
};
</script>
