/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('random-component', require('./components/RandomComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

function revolveText (options = {
    target: undefined,
    span: 100,
    north: 0,
    spiral: false
    }) {
    const { 
    target,
    span,
    north,
    spiral,
    size
    } = options;
    const message = target.textContent;
    const quaterWidth = target.clientWidth / 4;
    const diameter = size || quaterWidth;
    const messageChunks = message.split(String());
    const { length } = messageChunks;
    const offsetEnd = 1;
    const l = length + offsetEnd;
    const CIRC_MAX = 360;
    const PERC_MAX = 100;
    const ofDeg = span * CIRC_MAX / PERC_MAX;
    const ofNorth = north * CIRC_MAX / PERC_MAX;
    const segDeg = ofDeg / l;
    const fontSize = 16;
    let a = 0;
    let i = 0;
    
    target.setAttribute('style', `
    padding-left: ${diameter / 2}px;
    display: inline-block;
    width: ${diameter / 2}px;
    height: ${diameter}px;
    transform: rotate3d(0, 0, 1, -${segDeg + ofNorth}deg);
    border-radius: 9e9em;
    font-size: 1rem;
    `);
    target.classList.add('fx-Revolve');
    target.textContent = '';
    while (a < ofDeg) {
    a += segDeg;
    const charWrapper = document.createElement('span');
    charWrapper.textContent = messageChunks[i];
    i ++;
    charWrapper.classList.add('fx-RevolveCharWrap');
    charWrapper.setAttribute('style', `
    display: inline-block;
    transform: 
    rotate3d(0, 0, 1, ${a}deg) 
    ${spiral ? 'translateY(' + (i) + 'px)': ''};
    ${spiral ? 'font-size:' + (fontSize - (i / 10) ) + 'px': ''};
    position: absolute;
    height: ${diameter / 2}px;
    transform-origin: bottom left;
    font-size: 1em;
    `);
    target.appendChild(charWrapper);
    }
    }
    
    
    revolveText({
    target: document.querySelector('.tar'),
    span: 100, // percent
    north: 0, // cc rotate in percent
    spiral: true,
    size:200
    });
