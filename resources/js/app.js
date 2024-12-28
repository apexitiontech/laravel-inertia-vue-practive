import './bootstrap';
import '../css/app.css';
import { createApp, h } from 'vue'
import { ZiggyVue} from '../../vendor/tightenco/ziggy'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import Layout from './Pages/Layouts/Layout.vue';

createInertiaApp({
    title: (title) => ` My inertia ${title} `,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        const page = pages[`./Pages/${name}.vue`];

        if (!page) {
            throw new Error(`Page component "${name}" could not be found.`);
        }

        page.default.layout = page.default.layout || Layout;
        return page.default;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
        .component('Head',Head)
        .component('Link',Link)
            .use(plugin)
            .use(ZiggyVue)
            .mount(el)
    },
    progress: {

        color: 'blue',

        includeCSS: true,

        showSpinner: true,
      },
})
