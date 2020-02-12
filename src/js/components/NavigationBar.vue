<template>
    <div>
        <nav class="navbar is-dark">
          <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
              <img src="res/img/dribbble" alt="dribbble" width="112" height="28">
            </a>
          </div>

          <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start">
              <a class="navbar-item" href="/shots">
                Shots
              </a>
              <a class="navbar-item" href="/designers">
                Designers
              </a>
              <a class="navbar-item" href="/teams">
                Teams
              </a>
              <a class="navbar-item" href="/meetups">
                Meetups
              </a>
              <a class="navbar-item" href="/jobs">
                Jobs
              </a>
            </div>

            <div class="navbar-end">
              <div class="navbar-item">
                <div class="field is-grouped">
                  <p class="control">
                  </p>
                  <p class="control margin-right-2">
                    <input class="input height-2" type="text" placeholder="Search">
                  </p>
                </div>
              </div>
            </div>
          </div>
        </nav>
    </div>
</template>

<script>
    export default {
        data() {
            return {};
        },
        methods: {
        }
}
</script>

<style media="screen">
    .height-2 {
        height:2rem;
    }

    .margin-right-2 {
        margin-right:2rem;
    }
</style>
