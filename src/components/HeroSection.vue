<template>
  <section
    ref="heroSection"
    class="hero-section w-full px-4 sm:px-6 py-8 sm:py-12 md:py-16 pt-[84px] sm:pt-[96px] md:pt-[104px] md:pb-[-150px]"
  >
    <div class="max-w-7xl mx-auto">
      <img src="@/assets/images/v1.png" alt="" class="absolute w-[50%]" />
      <!-- Адаптивные заголовки -->
      <h2
        class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-bold brand-gradient-text"
      >
        Revolutionize
      </h2>
      <h2
        class="text-3xl text-white sm:text-4xl md:text-5xl lg:text-7xl font-bold"
      >
        Your Casino
        <br class="hidden sm:block" />
        & Betting Operations with
      </h2>

      <!-- Контейнер с логотипом -->
      <div
        class="flex items-center justify-center border-container-small my-4 sm:my-[11px]"
      >
        <h2
          class="text-4xl sm:text-5xl md:text-7xl lg:text-[160px] font-bold brand-gradient-text w-full h-full"
          style="line-height: 1.2"
        >
          theAI.energy
        </h2>
      </div>

      <!-- Гибкий контейнер для особенностей и описания -->
      <div
        class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 sm:gap-8 lg:gap-12"
      >
        <!-- Сетка особенностей -->
        <div class="w-[95%]">
          <a
            class="gradient-border brand-gradient-text font-black text-lg flex items-center justify-center mt-6 !w-[340px] h-[60px]"
            href="https://t.me/theAi_supportBot"
            target="_blank"
            style="
              width: 400px;
              background: linear-gradient(
                90deg,
                #f5cea6 0%,
                #ec598b 27%,
                #8d42e7 42%,
                #0f5fce 57%,
                #1b09f6 70%,
                #00b9fb 100%
              );
              -webkit-background-clip: text;
              background-clip: text;
              -webkit-text-fill-color: transparent;
              color: transparent;
            "
          >
            Try TheAI
          </a>
        </div>

        <div
          class="text-surface-200 text-base sm:text-lg md:text-xl lg:text-4xl lg:-mb-36 lg:-pb-[20px] font-semibold translate-y-5 w-[100%]"
        >
          <span class="brand-gradient-text">We are the AI.energy</span> — a team
          of proven AI practitioners helping gaming businesses cut costs, drive
          revenue, and stay one step ahead.
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { gsap } from "gsap"
import { ScrollTrigger } from "gsap/ScrollTrigger"

gsap.registerPlugin(ScrollTrigger)

export default {
  name: "HeroSection",
  mounted() {
    const section = this.$refs.heroSection

    // Анимация появления всей секции при попадании в область видимости
    gsap.fromTo(
      section,
      { opacity: 0, y: 50 },
      {
        opacity: 1,
        y: 0,
        duration: 1,
        ease: "power2.out",
        scrollTrigger: {
          trigger: section,
          start: "top 80%",
          toggleActions: "play none none none",
        },
      }
    )

    // Эффект проявления (reveal) для текстовых элементов внутри секции
    // Анимируются все h2, span (исключая button-text, если они есть) и p
    gsap.from(section.querySelectorAll("h2, span:not(.button-text), p"), {
      opacity: 0,
      y: 20,
      duration: 1,
      delay: 0.3,
      stagger: 0.2,
      ease: "power2.out",
      scrollTrigger: {
        trigger: section,
        start: "top 80%",
        toggleActions: "play none none none",
      },
    })

    // Если на странице есть кнопки, добавляем анимацию появления и переливание цвета для текста кнопок
    const buttons = section.querySelectorAll("button")
    buttons.forEach((button) => {
      const buttonText = button.querySelector(".button-text")
      if (buttonText) {
        // Анимация появления текста кнопки
        gsap.fromTo(
          buttonText,
          { opacity: 0, y: 10 },
          { opacity: 1, y: 0, duration: 0.5, ease: "power1.out" }
        )
        // Переливание цвета текста на hover
        button.addEventListener("mouseenter", () => {
          gsap.to(buttonText, {
            color: "#ff9900",
            duration: 0.5,
            ease: "power1.out",
          })
        })
        button.addEventListener("mouseleave", () => {
          gsap.to(buttonText, {
            color: "#ffffff",
            duration: 0.5,
            ease: "power1.out",
          })
        })
      }
    })
  },
}
</script>

<style scoped>
.square {
  min-width: 8px;
  height: 8px;
  background-color: #d9d9d9;
  margin-top: 6px;
}

@media (min-width: 640px) {
  .square {
    min-width: 10px;
    height: 10px;
    margin-top: 8px;
  }
}

.hero-section {
  position: relative;
}

.hero-section > div {
  position: relative;
  z-index: 1;
}

/* Responsive background image and padding adjustments */
@media (max-width: 640px) {
}

@media (min-width: 641px) and (max-width: 1024px) {
}
</style>
