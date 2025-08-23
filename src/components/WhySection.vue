<template>
  <section
    class="why-section w-full bg-surface-950 px-4 sm:px-6 py-8 sm:py-12 md:py-16 relative overflow-hidden"
  >
    <div class="max-w-6xl mx-auto">
      <div class="flex flex-col gap-4 sm:gap-6 md:gap-8">
        <div
          class="flex flex-col sm:flex-row items-center justify-center gap-2 sm:gap-5"
        >
          <span
            class="text-[36px] sm:text-[48px] md:text-[64px] lg:text-[110px] font-semibold text-center sm:text-left"
          >
            Why
          </span>
          <span class="flex items-center justify-start border-container-small">
            <h2
              class="text-[36px] sm:text-[48px] md:text-[64px] lg:text-[110px] font-semibold leading-tight brand-gradient-text w-full h-full"
            >
              theAI.energy?
            </h2>
          </span>
        </div>
        <Card
          class="bg-surface-900/80 border-none backdrop-blur-sm rounded-2xl w-full flex flex-col"
        >
          <template #content>
            <div
              class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 md:gap-12 lg:gap-24 p-4 sm:p-6 md:p-8 lg:p-[53px_62px]"
            >
              <div class="flex flex-col items-start">
                <img
                  src="@/assets/images/1.png"
                  alt="Number 1"
                  class="h-12 sm:h-16 md:h-20 lg:h-24 fit-contain mb-2 sm:mb-3 md:mb-4"
                />
                <h3
                  class="text-lg sm:text-xl md:text-2xl lg:text-[30px] font-bold brand-gradient-text mb-2"
                >
                  Real, Proven Projects
                </h3>
                <p class="text-sm sm:text-base md:text-lg lg:text-[20px]">
                  We're practitioners, not just theorists.
                </p>
              </div>
              <div class="flex flex-col items-start">
                <img
                  src="@/assets/images/2.png"
                  alt="Number 2"
                  class="h-12 sm:h-16 md:h-20 lg:h-24 fit-contain mb-2 sm:mb-3 md:mb-4"
                />
                <h3
                  class="text-lg sm:text-xl md:text-2xl lg:text-[30px] font-bold brand-gradient-text mb-2"
                >
                  Scale Your Platform Effortlessly
                </h3>
                <p class="text-sm sm:text-base md:text-lg lg:text-[20px]">
                  From regional to global reach, grow without expanding
                  headcount.
                </p>
              </div>
              <div class="flex flex-col items-start">
                <img
                  src="@/assets/images/3.png"
                  alt="Number 3"
                  class="h-12 sm:h-16 md:h-20 lg:h-24 fit-contain mb-2 sm:mb-3 md:mb-4"
                />
                <h3
                  class="text-lg sm:text-xl md:text-2xl lg:text-[30px] font-bold brand-gradient-text mb-2"
                >
                  One Bot with Endless Solutions
                </h3>
                <p class="text-sm sm:text-base md:text-lg lg:text-[20px]">
                  From support to payments and analysis, everything in one
                  ecosystem.
                </p>
              </div>
              <div class="flex flex-col items-start">
                <img
                  src="@/assets/images/4.png"
                  alt="Number 4"
                  class="h-12 sm:h-16 md:h-20 lg:h-24 fit-contain mb-2 sm:mb-3 md:mb-4"
                />
                <h3
                  class="text-lg sm:text-xl md:text-2xl lg:text-[30px] font-bold brand-gradient-text mb-2"
                >
                  Precision Analytics for Bigger Returns
                </h3>
                <p class="text-sm sm:text-base md:text-lg lg:text-[20px]">
                  Drive ROI with real-time data and actionable insights.
                </p>
              </div>
            </div>
            <div
              class="text-center mt-6 sm:mt-8 md:mt-12 lg:mt-[100px] pb-4 sm:pb-6 md:pb-8"
            >
              <h3
                class="text-[20px] sm:text-[24px] md:text-[32px] lg:text-[43px] font-semibold"
              >
                <span class="brand-gradient-text">
                  Elevate your brand's potential
                </span>
                <span class="text-surface-50">with</span>
                <br class="hidden sm:block" />
                <span class="text-surface-50">cutting-edge AI solutions.</span>
              </h3>
            </div>
          </template>
        </Card>
      </div>
    </div>
  </section>
</template>

<script>
import Card from "primevue/card";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

export default {
  name: "WhySection",
  components: {
    Card,
  },
  mounted() {
    // Эффект проявления для всех текстовых элементов внутри секции
    const textElements = this.$el.querySelectorAll("h2, h3, h4, p, span");
    gsap.from(textElements, {
      opacity: 0,
      y: 20,
      duration: 1,
      stagger: 0.2,
      ease: "power2.out",
      scrollTrigger: {
        trigger: this.$el,
        start: "top 80%",
        toggleActions: "play none none none",
      },
    });
  },
};
</script>

<style scoped>
.why-section {
  background: radial-gradient(
    circle at center,
    rgba(139, 92, 246, 0.05) 0%,
    transparent 70%
  );
  position: relative;
  overflow: hidden;
}

:deep(.p-card) {
  border-radius: 40px;
  background: rgba(17, 17, 17, 0.7);
  backdrop-filter: blur(8px);
  transition: all 0.3s ease;
  color: #fff;
}

:deep(.p-card:hover) {
  transform: translateY(-4px);
  box-shadow: 0 8px 32px rgba(139, 92, 246, 0.1);
}

:deep(.p-card .p-card-content) {
  padding: 0;
}

.border-container-small {
  border: 0.3px solid #fff;
  padding: 10px;
  width: min-content;
  position: relative;
}

/* Определяем все четыре угла контейнера */
.border-container-small::before,
.border-container-small::after,
.border-container-small::nth-child(1)::before,
.border-container-small::nth-child(1)::after {
  content: "";
  position: absolute;
  width: 8px;
  height: 8px;
  background-color: #ffffff;
}

/* Верхний левый */
.border-container-small::before {
  top: -4px;
  left: -4px;
}

/* Верхний правый */
.border-container-small::after {
  top: -4px;
  right: -4px;
}

/* Нижний левый */
.border-container-small::nth-child(1)::before {
  bottom: -4px;
  left: -4px;
}

/* Нижний правый */
.border-container-small::nth-child(1)::after {
  bottom: -4px;
  right: -4px;
}

/* Адаптивность */
@media (max-width: 640px) {
  .border-container-small::before,
  .border-container-small::after,
  .border-container-small::nth-child(1)::before,
  .border-container-small::nth-child(1)::after {
    width: 6px;
    height: 6px;
  }

  .border-container-small::before {
    top: -3px;
    left: -3px;
  }

  .border-container-small::after {
    top: -3px;
    right: -3px;
  }

  .border-container-small::nth-child(1)::before {
    bottom: -3px;
    left: -3px;
  }

  .border-container-small::nth-child(1)::after {
    bottom: -3px;
    right: -3px;
  }

  .why-section::before {
    background-size: 200% auto;
    opacity: 0.05;
  }

  :deep(.p-card:hover) {
    transform: translateY(-2px);
  }
}

@media (min-width: 641px) and (max-width: 1024px) {
  .border-container-small::before,
  .border-container-small::after,
  .border-container-small::nth-child(1)::before,
  .border-container-small::nth-child(1)::after {
    width: 7px;
    height: 7px;
  }

  .border-container-small::before {
    top: -3.5px;
    left: -3.5px;
  }

  .border-container-small::after {
    top: -3.5px;
    right: -3.5px;
  }

  .border-container-small::nth-child(1)::before {
    bottom: -3.5px;
    left: -3.5px;
  }

  .border-container-small::nth-child(1)::after {
    bottom: -3.5px;
    right: -3.5px;
  }

  .why-section::before {
    opacity: 0.07;
  }
}
</style>
