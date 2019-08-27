<template>
    <span>
        <slot></slot>
    </span>

</template>

<script>

    export default {

        name:'new-entry-form',

        props: {
            type: String,
            getUrl: String,
            url: Array
        },


        mounted() {
            // alert(`Хола. Я кнопка добавления ${this.url} ${this.getUrl}`)
        },

        methods: {
            isVisible() {

                return this.visible
            }

        },
        computed: {


        }

    }
</script>

<style lang="scss">

</style>