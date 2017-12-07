<template>
    <div class="wysiwyg">
        <input id="trix" type="hidden" :name="name">

        <trix-editor ref="trix" input="trix"></trix-editor>
    </div>
</template>

<script>
    import Trix from 'trix';

    export default {
        props: ['name', 'value'],
        mounted() {
            // TODO
        }
    }
</script>

<style>
</style>