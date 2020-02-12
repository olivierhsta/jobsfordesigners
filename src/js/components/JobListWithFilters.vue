<template>
    <div class="columns has-background-light">
        <aside class="menu jfd-list column is-8">
            <p class="menu-label jfd-date">
                NOW HIRING
            </p>
            <ul class="menu-list">
                <li class="jfd-job" v-for="job in filteredOpenJobs"><a>
                    <div class="columns">
                        <div class="column is-8">
                            <p class="is-size-5 has-text-weight-bold">{{job.company.name}}</p>
                            <p class="is-size-5 has-text-weight-light">{{job.title}}</p>
                        </div>
                        <div class="column is-4">
                            <p class="is-size-5 has-text-weight-light">{{job.city.name}}</p>
                        </div>
                    </div>
                </a></li>
            </ul>
            <div v-for="(jobs, date) in filteredOtherJobs">
                <p class="menu-label jfd-date">
                    {{getHumanDate(date)}}
                </p>
                <ul class="menu-list">
                    <li class="jfd-job" v-for="job in jobs"><a>
                        <div class="columns">
                            <div class="column is-8">
                                <p class="is-size-5 has-text-weight-bold">{{job.company.name}}</p>
                                <p class="is-size-5 has-text-weight-light">{{job.title}}</p>
                            </div>
                            <div class="column is-4">
                                <p class="is-size-5 has-text-weight-light">{{job.city.name}}</p>
                            </div>
                        </div>
                    </a></li>
                </ul>
            </div>
        </aside>
        <div class="tile is-parent is-vertical column is-3 jfd-sidebar">
            <article class="tile notification is-child is-dark jfd-filters">
                <div class="field">
                    <label class="label has-text-white">ONLY</label>
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" v-model="teamsCheck">
                            Teams
                        </label>
                    </div>
                </div>
                <div class="field">
                    <label class="label has-text-white">LOCATION</label>
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" v-model="remoteCheck">
                            Remote / Anywhere
                        </label>
                    </div>
                    <br />
                    <div class="control">
                        <input class="input" type="text" placeholder="All" v-model="location">
                        <p class="help">Enter a city, state or country</p>
                    </div>
                    <br />
                    <button class="button is-fullwidth is-light" @click="filterJobList">Search</button>
                </div>
            </article>
            <article class="tile is-child notificationis-light">
                <p>Hiring designers? Create a team to get the most exposure for your jobs.</p>
            </article>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return  {
                openJobs: [],
                otherJobs:{},
                filteredOpenJobs:[],
                filteredOtherJobs:{},
                remoteCheck: false,
                teamsCheck:false,
                location:''
            };
        },
        methods: {
            fetchAll: function() {
                axios.post('/api/emplois')
                     .then(response => {
                         response.data.forEach((item, i) => {
                             if (Date.parse(new Date()) - Date.parse(item.date_posted) <= 7*24*60*60*1000) {
                                 this.openJobs.push(item);
                             } else {
                                 if (!this.otherJobs[Date.parse(item.date_posted)]) {
                                     this.otherJobs[Date.parse(item.date_posted)] = [];
                                 }
                                 this.otherJobs[Date.parse(item.date_posted)].push(item);
                             }
                         });
                         this.filteredOpenJobs = this.openJobs;
                         this.filteredOtherJobs = this.otherJobs;
                     });
            },
            filterJobList: function() {
                if (this.openJobs) {
                    this.filteredOpenJobs = [];
                    this.openJobs.forEach((job, i) => {
                        if (((job.teams_ind == "1" && this.teamsCheck) || !this.teamsCheck) &&
                        ((job.city.name.toUpperCase() == "REMOTE" && this.remoteCheck) || !this.remoteCheck) &&
                        ((job.city.name && job.city.name.toUpperCase().includes(this.location.toUpperCase())) || (job.city.state && job.city.state.toUpperCase().includes(this.location.toUpperCase())) || (job.city.country && job.city.country.toUpperCase().includes(this.location.toUpperCase())))) {
                            this.filteredOpenJobs.push(job);
                        }
                    });
                }
                if (this.otherJobs) {
                    this.filteredOtherJobs = {};
                    for(let date in this.otherJobs) {
                        this.filteredOtherJobs[date] = [];
                        this.otherJobs[date].forEach((job, i) => {
                            if (((job.teams_ind == "1" && this.teamsCheck) || !this.teamsCheck) &&
                            ((job.city.name.toUpperCase() == "REMOTE" && this.remoteCheck) || !this.remoteCheck) &&
                            ((job.city.name && job.city.name.toUpperCase().includes(this.location.toUpperCase())) || (job.city.state && job.city.state.toUpperCase().includes(this.location.toUpperCase())) || (job.city.country && job.city.country.toUpperCase().includes(this.location.toUpperCase())))) {
                                this.filteredOtherJobs[date].push(job);
                            }
                        });
                    }
                }
            },
            getHumanDate : function(epoch) {
                var date = new Date(0);
                date.setUTCSeconds(epoch/1000);
                switch (date.getMonth()) {
                    case 0: return 'January ' + date.getDate();
                        break;
                    case 1: return 'February ' + date.getDate();
                        break;
                    case 2: return 'March ' + date.getDate();
                        break;
                    case 3: return 'April ' + date.getDate();
                        break;
                    case 4: return 'May ' + date.getDate();
                        break;
                    case 5: return 'June ' + date.getDate();
                        break;
                    case 6: return 'July ' + date.getDate();
                        break;
                    case 7: return 'August ' + date.getDate();
                        break;
                    case 8: return 'September ' + date.getDate();
                        break;
                    case 9: return 'October ' + date.getDate();
                        break;
                    case 10: return 'November ' + date.getDate();
                        break;
                    case 11: return 'December ' + date.getDate();
                        break;
                }
            },
        },
        mounted (){
           this.fetchAll()
        },
}
</script>

<style media="screen">
    .notification {
        padding-right: 1.5rem !important;
        border-radius: 0.5rem;
    }

    .jfd-list {
        margin-left:5rem;
        margin-top: -4rem;
        padding: 1rem 3rem;
        box-shadow: 1px 1px 1px 1px #cccccc61;
        background: white;
        border-radius: 1rem;
    }

    .jfd-sidebar {
        padding:2rem !important;
        border-radius: 1rem;
    }

    .jfd-filters {
        max-height: 20rem;
    }

    .jfd-job {
        border-bottom: 1px solid #80808030;
    }

    .jfd-date {
        margin-top:1rem;
    }
</style>
