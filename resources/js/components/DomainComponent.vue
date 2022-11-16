<script>

export default {
    data() {
        return {
            domains: [],
            domainsList: [],
            list: [],
            domainName: '',
            domainStatus: '',
        }
    },
    methods: {
        getDomains() {
            this.domainsList = this.domains.split(" ");

            this.domainName = 'Domain Name';
            this.domainStatus = 'Domain Status';
            axios
                .get('http://127.0.0.1:8000/api/checkDomain??domains=' + this.domains )
                .then(response => (this.list = response.data))
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
        }
    }
}
</script>


<template>
    <div>
        <div>
            <div>
                <label for="name">Domain list</label>
                <div><textarea type="text" name="domain_name" id="name"
                               v-model="domains"
                ></textarea></div>
            </div>

            <button type="submit" @click="getDomains()">Check</button>
        </div>
        <div class="domain-list">
            <table >
                <thead>
                <tr>
                    <td>{{ domainName }}</td>
                    <td>{{ domainStatus }}</td>
                </tr>
                </thead>
                <tr v-for="item in list">
                    <td>{{ item.domain }}</td>
                    <td>{{ item.status }}</td>
                </tr>
            </table>
        </div>
    </div>
</template>
