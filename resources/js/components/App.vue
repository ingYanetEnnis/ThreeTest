<template>
    <main>
        <form-quote/>
        <card-quote-current v-if="quoteCurrent" :quote="quoteCurrent"/>
        <history-quotes/>
    </main>
</template>

<script>
import CardQuoteCurrent from "./CardQuoteCurrent";
import HistoryQuotes from "./HistoryQuotes";
import FormQuote from "./FormQuote";
import {mapState} from 'vuex'

export default {
    components: {HistoryQuotes, FormQuote, CardQuoteCurrent},
    computed: mapState({
        user: state => state.auth.user,
        quoteCurrent: state => state.quote.quoteCurrent
    }),
}
</script>
