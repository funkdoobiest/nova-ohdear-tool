<template>
    <check-card :init-check="check" :url="`/oh-dear/broken-links/${siteId}`">
        <div slot="body" slot-scope="check">
            <div v-if="check.enabled">
                <div v-if="check.latestRunEndedAt">
                    <p v-if="check.latestRunResult === 'succeeded'">
                        No broken links found. We last checked
                        <relative-time :datetime="check.latestRunEndedAt"></relative-time>.
                    </p>
                    <p v-else>
                        Broken links found. We last checked
                        <relative-time :datetime="check.latestRunEndedAt"></relative-time>.
                    </p>
                </div>
                <p v-else>We will run this check for the first time soon.</p>
            </div>
            <p v-else>We is not monitoring broken links.</p>
        </div>
    </check-card>
</template>

<script>
import CheckCard from './CheckCard';
import RelativeTime from './RelativeTime';

export default {
    props: ['check', 'siteId'],

    components: {
        CheckCard,
        RelativeTime
    }
};
</script>
