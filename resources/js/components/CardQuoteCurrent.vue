<template>
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">{{
                        quote.symbol.symbol
                    }}</h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    {{ quote.symbol.name }}
                </p>
            </div>

            <div class="mt-10">
                <row-quote :quote="quote"/>
            </div>
        </div>
    </div>
</template>

<script>
import RowQuote from "./RowQuote";

export default {
    components: {RowQuote},
    props: {
        quote: {
            type: Object,
            defafult: null
        }
    }
}
</script>
