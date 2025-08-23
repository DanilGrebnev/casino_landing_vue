<template>
  <div class="app">
    <div class="landing-background"></div>
    <div class="landing-overlay"></div>

    <div class="relative z-10">
      <RouterView />
      <!-- <Footer /> -->
    </div>
  </div>
</template>

<script>
import { RouterView } from 'vue-router';
import Footer from '@/components/Footer.vue';

export default {
  name: 'App',
  components: {
    RouterView,
    Footer
  }
};
</script>

<style scoped>
.global-fog {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none; /* не блокирует интерактивность */
  z-index: 9999; /* выше основного контента */
  /* Два слоя radial-gradient для имитации неоднородного тумана */
  background: 
    radial-gradient(ellipse at 20% 30%, rgba(0, 0, 0, 0.1) 0%, transparent 60%),
    radial-gradient(ellipse at 80% 70%, rgba(0, 0, 0, 0.1) 0%, transparent 60%);
  filter: blur(10px); /* смягчает края градиентов */
  animation: fogAnimation 10s linear infinite;
}

@keyframes fogAnimation {
  0% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(-20px, 20px);
  }
  100% {
    transform: translate(0, 0);
  }
}
.landing-overlay {
  @apply fixed inset-0 pointer-events-none z-[1];
  background: radial-gradient(
      circle at center,
      rgba(31, 92, 239, 0.05) 0%,
      rgba(141, 66, 231, 0.05) 50%,
      rgba(236, 89, 139, 0.05) 100%
  );
}
</style>