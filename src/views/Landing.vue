<template>
  <div class="landing-wrapper">
    <!-- <div class="landing-background"></div> -->
    <!-- <div class="landing-overlay"></div> -->
    <div class="wave-container">  
      <!-- <img src="@/assets/images/waves.svg" alt="" class="absolute right-0  md:translate-x-[30%] md:-translate-y-[30%] translate-x-[30%] -translate-y-[10%]">
      <img src="@/assets/images/waves.svg" alt="" class="absolute left-0  md:-translate-x-[30%] md:translate-y-[60%] -translate-x-[30%] translate-y-[20%]">
      <img src="@/assets/images/waves.svg" alt="" class="absolute right-0  md:translate-x-[30%] md:translate-y-[130%] translate-x-[30%] translate-y-[65%]">
      <img src="@/assets/images/waves.svg" alt="" class="absolute left-0  md:-translate-x-[30%] md:translate-y-[230%] -translate-x-[30%] translate-y-[85%]">
      <img src="@/assets/images/waves.svg" alt="" class="absolute right-0  md:translate-x-[30%] md:translate-y-[300%] translate-x-[30%] translate-y-[100%]">
      <img src="@/assets/images/waves.svg" alt="" class="absolute left-0  md:-translate-x-[30%] md:translate-y-[330%] -translate-x-[30%] translate-y-[110%]">
      <img src="@/assets/images/waves.svg" alt="" class="absolute right-0  md:translate-x-[30%] md:translate-y-[380%] translate-x-[30%] translate-y-[120%]"> -->
      <div class="wave-background"></div>
    </div>
    <div class="landing-page flex flex-col">
      <Header />
      <HeroSection class="mb-20 sm:mb-24 md:mb-32" />
      <LuckyForm />
      <V1Section />
      <V2Section class="mb-4 sm:mb-24 md:mb-32" />
      <V3Section />
      <WhySection />
      <ReadySection class="mb-0 sm:mb-24 md:mb-32" />
      <ContactSection />
    </div>
  </div>
</template>

<script>
import Header from "@/components/Header.vue";
import HeroSection from "@/components/HeroSection.vue";
import V1Section from "@/components/V1Section.vue";
import V2Section from "@/components/V2Section.vue";
import V3Section from "@/components/V3Section.vue";
import WhySection from "@/components/WhySection.vue";
import ReadySection from "@/components/ReadySection.vue";
import ContactSection from "@/components/ContactSection.vue";
import LuckyForm from "@/components/LuckyForm.vue";

export default {
  name: "LandingView",
  components: {
    Header,
    HeroSection,
    V1Section,
    V2Section,
    V3Section,
    WhySection,
    ReadySection,
    ContactSection,
    LuckyForm,
  },
};
</script>

<style scoped>
.landing-wrapper {
  position: relative;
  background-color: #131416;
  min-height: 100vh;
  width: 100%;
  overflow-x: hidden;
  overflow: hidden;
}

.landing-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%; /* Растягиваем на всю высоту контента */
  opacity: 0.8;
  mix-blend-mode: screen;
  pointer-events: none;
  z-index: 0;

  background-size: cover; /* Сохраняем пропорции изображения */
  background-attachment: scroll; /* Скроллинг вместе с контентом */
}

.landing-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 1;
}

.landing-page {
  min-height: 100vh;
  max-width: 1400px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
  padding: 0 1rem;
  gap: 0; /* Убираем gap, так как теперь используем margin-bottom */
}

.wave-container {
  position: absolute;
  width: 100vw;
  top:0;
  left:0;
  z-index: 2;
  pointer-events: none;
  height: 100%;
}

.wave-background {
  width: 100%;
  height: 100%;
  background: url("@/assets/images/global-bg.svg") no-repeat top;
  background-size: 100% auto;
  opacity: 0.8;

}

/* Адаптивность для разных устройств */
@media (max-width: 640px) {
  .landing-background {
    background-size: auto 100%; /* Растягиваем по высоте, сохраняя ширину */
    background-position: center top;
    opacity: 0.5; /* Уменьшаем прозрачность для читаемости */
  }

  .landing-page {
    padding: 0 0.5rem; /* Меньшие отступы */
  }

  .wave-container {
    top: calc(100vh + 3200px);
  }

  .wave-background {
    height: 200px;
    background-size: cover;
    opacity: 0.5;
  }
}

@media (min-width: 641px) and (max-width: 1024px) {
  .landing-background {
    background-size: contain;
    background-position: center top;
    opacity: 0.7;
  }

  .wave-container {
    top: calc(100vh + 2800px);
  }

  .wave-background {
    height: 300px;
    opacity: 0.7;
  }
}

@media (min-width: 1025px) {
  .landing-background {
    /* background-size: auto 100%; */
  }

  .landing-page {
    padding: 0;
  }
}

@media (max-width: 768px) and (orientation: landscape) {
  .landing-background {
    background-size: cover;
    background-position: center center;
  }
}

/* Добавляем затемнение по краям */
.landing-wrapper::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 1;
  box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.8); /* Мягкое затемнение по краям */
}

.landing-page::after {
  display: none;
}
</style>
