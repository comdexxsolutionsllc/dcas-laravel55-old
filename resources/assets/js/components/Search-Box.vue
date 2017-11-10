<template>
    <div class="panel panel-default">
        <div class="panel-heading">Search</div>
        <div class="panel-body">
            <input type="text" @change="find" v-model.lazy="keywords" v-debounce placeholder="Search...">
            <div v-if="(keywords && keywords.length > 0) && (results && results.length > 0)">
                <ul class="result-container">
                    <li class="result" style="background-color: #d3d3d3;">Results</li>
                    <li class="result" v-for="result in results" :key="result.id" v-html="highlight(result.name + ' (@' + result.username + ')')"></li>
                </ul>
            </div>
            <div class="error-panel" v-if="errors && errors.length">
                <div class="panel panel-default">
                    <div class="panel-heading">Error</div>
                    <div class="panel-body">
                        <ul class="error-container">
                            <li class="error" v-for="error in errors">{{error.message}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    function debounce(fn, delay = 300) {
        var timeoutID = null;

        return function () {
            clearTimeout(timeoutID);

            var args = arguments;
            var that = this;

            timeoutID = setTimeout(function () {
                fn.apply(that, args);
            }, delay);
        }
    };

    // this is where we integrate the v-debounce directive!
    Vue.directive('debounce', (el, binding) => {
        if (binding.value !== binding.oldValue) {
            el.oninput = debounce(ev => {
                el.dispatchEvent(new Event('change'));
            }, parseInt(binding.value) || 300);
        }
    });

    export default {
        data() {
            return {
                keywords: null,
                results: [],
                errors: []
            }
        },

        methods: {
            highlight(text) {
                return text.replace(new RegExp(this.keywords, 'gi'), '<span class="highlighted">$&</span>');
            },
            find() {
                axios.get('/find?q=' + this.keywords)
                    .then(response => {
                        this.results = response.data
                    })
                    .catch(e => {
                        this.errors.push(e)
                    });
            }
        }
    }
</script>

<style>
    .highlighted {
        color: red;
    }

    .result-container {
        border: 2px double;
        padding: 0;
        margin: 0;
    }

    .result {
        list-style: none;
        padding: 0;
        margin: 0 0 0 15px;
    }

    .result:hover {
        background-color: yellow;
    }

    .error-panel {
        margin-top: 25px;
    }

    .error-container {
        padding: 0;
        margin: 0;
    }

    .error {
        list-style: none;
        padding: 0;
        margin: 0;
        background-color: red;
    }
</style>
