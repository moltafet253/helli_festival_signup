/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import axios from 'axios';
/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import Header from './components/Helli/Header.vue';
app.component('Header', Header);

import Header2 from './components/Helli/Header2.vue';
app.component('Header2', Header2);

import Personal_Info from './components/Helli/Personal_Info.vue';
app.component('Personal_Info', Personal_Info);

import Contact_Info from './components/Helli/Contact_Info.vue';
app.component('Contact_Info', Contact_Info);

import Educational_Info from './components/Helli/Educational_Info.vue';
app.component('Educational_Info', Educational_Info);

import Teaching_Info from './components/Helli/Teaching_Info.vue';
app.component('Teaching_Info', Teaching_Info);

import Blue_Warn from './components/Helli/Blue_Warn.vue';
app.component('Blue_Warn', Blue_Warn);

import Posts from './components/Helli/Posts.vue';
app.component('Blue_Warn', Posts);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');

