import './bootstrap';

import { createApp } from 'vue';
import router from "./router";
import DomainComponent from "./components/DomainComponent";

createApp({
    components: {
        DomainComponent
    }
}).use( router ).mount('#app');



