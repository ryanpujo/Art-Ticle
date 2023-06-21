import { DefineComponent, createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import "../css/app.css"
// @ts-expect-error
import {ZiggyVue} from "ziggy"
import MainLayout from "@/Layouts/MainLayout.vue"
import "flowbite"

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob<DefineComponent>('./Pages/**/*.vue', { eager: true })
    const page = pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || MainLayout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue, (window as any).ziggy)
      .mount(el)
  },
})