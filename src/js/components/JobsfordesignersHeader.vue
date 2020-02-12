<template>
    <div>
        <section class="hero is-small is-bold jfd-green">
            <div class="hero-body columns">
                <div class="container column is-8">
                    <h1 class="subtitle">
                        What could you be working on?
                    </h1>
                    <h2 class="title jfd-title jfd-margin-bottom-5">
                        <span class="has-text-white jfd-letter-spacing-md">Jobs</span> <span class="has-text-weight-light has-text-grey-lighter jfd-letter-spacing-sm">for Designers</span>
                    </h2>
                </div>
                <div class="tile is-parent is-vertical column is-3">
                    <article class="tile notification is-child is-light has-text-centered jfd-notification">
                        <p class="title is-size-5">Post a Job + Find Designers</p>
                        <p class="subtitle is-size-5">$375 for 30 days</p>
                    </article>
                    <article class="tile is-child notification has-text-centered jfd-green jfd-links">
                        <p class="subtitle"><span>Jobs RSS</span> <span>@dribbblejobs</span></p>
                    </article>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        data() {
            return  {};
        },
    }
</script>

<style media="screen">
    .jfd-green {
        background: #8ABA56;
        color: #ffffff;
    }

    .jfd-title {
        font-size: 7rem;
    }

    .jfd-letter-spacing-sm {
        letter-spacing: -0.04em;
    }

    .jfd-letter-spacing-md {
        letter-spacing: -0.06em;
    }

    .jfd-margin-bottom-5 {
        margin-bottom: 5rem;
    }

    .jfd-notification {
        height: 7rem;
        padding: 1.7rem;
    }

    .jfd-notification > div {
        height: 100%;
    }

    .jfd-links {
        padding-top: 3.8rem;
    }
</style>
