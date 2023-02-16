import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
// import NProgress from 'nprogress'
// import { router } from '@inertiajs/vue3'
import '@picocss/pico'

createInertiaApp({

  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
});

// NProgress.init({ color: '#4B5563' });

