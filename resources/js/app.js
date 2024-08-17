import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from 'ziggy-js';
import "vue-toastification/dist/index.css";
import "vue-select/dist/vue-select.css";
import {createPinia} from "pinia";
import piniaPluginPersistedState from "pinia-plugin-persistedstate";
import {i18nVue} from "laravel-vue-i18n";
import vSelect from "vue-select";
import {vTooltip} from "floating-vue";
import Toast from "vue-toastification";
import Tooltip from "@programic/vue3-tooltip";
import '@programic/vue3-tooltip/dist/index.css';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const pinia = createPinia();
pinia.use(piniaPluginPersistedState);

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(pinia)
            .directive("tooltip", vTooltip)
            .use(Toast, {
                maxToast: 7,
                newestOnTop: true,
            })
            .use(i18nVue, {
                lang: 'es',
                resolve: async (lang) => {
                    const langs = import.meta.glob("../../lang/*.json");
                    return await langs[`../../lang/${lang}.json`]();
                },
            })
            .use(Tooltip)
            .component("v-select", vSelect)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
