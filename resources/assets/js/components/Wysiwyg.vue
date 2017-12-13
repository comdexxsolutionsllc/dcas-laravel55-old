<template>
    <div class="wysiwyg">
        <input id="trix" type="hidden" :name="name">
        <trix-editor ref="trix" input="trix" :placeholder="placeholder"></trix-editor>
    </div>
</template>

<script>
    /**
     * usage:  <wysiwyg name="body" placeholder="Have something to say?" v-model="form.body"></wysiwyg>
     */
    import Trix from 'trix';

    export default {
        props: ['name', 'placeholder', 'value'],
        mounted() {
            this.$refs.trix.addEventListener('trix-change', e => {
                this.$emit('input', e.target.innerHTML);
            });
        }
    }
</script>

<style>
</style>