import Vue from 'vue';
import VueLocalStorage from 'vue-local-storage';

Vue.Use(VueLocalStorage);

new Vue({
    el: '#app',
    mounted: function() {
        this.$localStorage.set('foo', 'boo');
        // also, you can set expire for item
        this.$localStorage.set('foo', 'boo', 60 * 60 * 1000); // set an expiry of item at 1 hour
        this.$localStorage.set('foo', 'boo', 0); // endless item
        this.$localStorage.get('foo'); // get foo value
        console.log(this.$localStorage.get('foo'));
        this.$localStorage.remove('foo');
    }
});