<template>

    <section class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <header class="flex items-center justify-between">
            <h2 class="text-lg leading-6 font-medium text-black">Symbols</h2>

        </header>
            <v-select label="name" :filterable="false" :options="options" @search="onSearch" v-model="symbol">
                <template slot="no-options">
                    type to search Symbols
                </template>
                <template slot="option" slot-scope="option">
                    <div class="d-center">
                        {{ option.name }}
                    </div>
                </template>
                <template slot="selected-option" slot-scope="option">
                    <div class="selected d-center">
                        {{ option.name }} / {{ option.symbol }}
                    </div>
                </template>
            </v-select>
            <button @click="checkPrice"
                    :disabled="!symbol"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Get Price
            </button>

    </section>

</template>

<script>
import axios from "../interceptor/axiosApi";
import _ from "lodash";

export default {
    data() {
        return {
            options: [],
            symbol : null
        }
    },
    methods: {
        onSearch(search, loading) {
            if (search.length) {
                loading(true);
                this.search(loading, search, this);
            }
        },
        search: _.debounce((loading, search, vm) => {
            axios.get('/api/symbols/' + search)
                .then(res => {
                    vm.options = res.data.data;
                    loading(false);

                });
        }, 350),
        checkPrice() {
            this.$store.dispatch("quote/checkPrice", this.symbol)
        }
    },

}
</script>
