import { createApp } from "vue";
import { createPinia } from "pinia";
import "@fontsource/montserrat";

// PrimeVue
import PrimeVue from "primevue/config";
import { PresetCasino } from "./theme/preset.js";
import ToastService from "primevue/toastservice";
import "primeicons/primeicons.css";

// Стили
import "./assets/main.css";

import App from "./App.vue";
import router from "./router";

const app = createApp(App);

app.use(createPinia());
app.use(router);
app.use(PrimeVue, {
  theme: {
    preset: PresetCasino,
  },
});
app.use(ToastService);
app.mount("#app");