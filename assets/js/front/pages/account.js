import Vue from 'vue';

// any CSS you import will output into a single css file (account.css in this case)
import '@@css/front/pages/account.scss';

import Account from '@@js/front/components/pages/Account';
import DefaultTitle from '@@js/front/components/helpers/title/DefaultTitle';

// Generate global components Vuejs
Vue.component('account', Account);
Vue.component('h1-title', DefaultTitle);

const app = new Vue({
    el: '#app',
    // components: {App},
    //render: h => h(App), // if you want to just rand the element imported
});
  
export default app
