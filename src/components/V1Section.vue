<template>
  <section
  id="opportunities"
    class="ai-section w-full px-4 sm:px-6 py-8 sm:py-12 md:py-16 relative overflow-hidden sm:mt-[100px] md:mt-[160px]"
  >
    <div class="max-w-6xl mx-auto">
      <div class="flex flex-col">
        <!-- Header (AI-Powered Support) -->
        <div
          class="flex items-center justify-center mb-6 sm:mb-[40px] lg:mb-[63px]"
        >
          <div
            class="bg-transparent rounded-full text-center px-4 sm:px-6 md:px-8 py-2 sm:py-3 border border-white"
          >
            <span
              class="text-surface-200 text-xs text-center sm:text-3xl md:text-4xl lg:text-5xl font-medium"
            >
              AI-Powered Support (Bot v1)
            </span>
          </div>
        </div>

        <!-- Main Headline -->
        <h2
          class="text-[36px] sm:text-[48px] md:text-[64px] lg:text-[81px] font-bold leading-tight text-center sm:text-left mb-6 sm:mb-[40px] lg:mb-[63px]"
        >
          <span class="brand-gradient-text"> Let AI handle </span>
          <br class="hidden sm:block" />
          <span class="text-surface-50">the heavy lifting.</span>
        </h2>

        <!-- Benefit Cards -->
        <div
          class="flex flex-col gap-4 sm:gap-[20px] md:gap-[30px] lg:gap-[41px]"
        >
          <!-- 24/7 Availability -->
          <Card
            class="bg-surface-900/50 border-none backdrop-blur-sm hover:shadow-lg transition-all duration-300 px-4 py-4 sm:px-[10px] sm:py-[10px] md:px-[20px] md:py-[15px] lg:px-[35px] lg:py-[27px] card-v1"
          >
            <template #content>
              <div class="flex flex-col gap-2 sm:gap-3 lg:gap-4">
                <h3
                  class="text-[20px] sm:text-[24px] md:text-[36px] lg:text-[41px] font-bold brand-gradient-text"
                >
                  24/7 Availability, No Downtime
                </h3>
                <p
                  class="text-surface-50 text-[14px] sm:text-[16px] md:text-[18px] lg:text-[20px]"
                >
                  Your players get instant answers at any time.
                </p>
              </div>
            </template>
          </Card>

          <!-- Zero Friction -->
          <Card
            class="bg-surface-900/50 border-none backdrop-blur-sm hover:shadow-lg transition-all duration-300 px-4 py-4 sm:px-[10px] sm:py-[10px] md:px-[20px] md:py-[15px] lg:px-[35px] lg:py-[27px] card-v1"
          >
            <template #content>
              <div class="flex flex-col gap-2 sm:gap-3 lg:gap-4">
                <h3
                  class="text-[20px] sm:text-[24px] md:text-[36px] lg:text-[41px] font-bold brand-gradient-text"
                >
                  Zero Friction & Maximum Conversion
                </h3>
                <p
                  class="text-surface-0 text-[14px] sm:text-[16px] md:text-[18px] lg:text-[20px]"
                >
                  Engage and convert more users with seamless interactions.
                </p>
              </div>
            </template>
          </Card>

          <!-- Cut Costs -->
          <Card
            class="bg-surface-900/50 border-none backdrop-blur-sm hover:shadow-lg transition-all duration-300 px-4 py-4 sm:px-[10px] sm:py-[10px] md:px-[20px] md:py-[15px] lg:px-[35px] lg:py-[27px] card-v1"
          >
            <template #content>
              <div class="flex flex-col gap-2 sm:gap-3 lg:gap-4">
                <h3
                  class="text-[20px] sm:text-[24px] md:text-[36px] lg:text-[41px] font-bold brand-gradient-text"
                >
                  Cut Costs & Fuel Profits
                </h3>
                <p
                  class="text-surface-200 text-[14px] sm:text-[16px] md:text-[18px] lg:text-[20px]"
                >
                  Free up staff from routine tasks to focus on high-value
                  activities.
                </p>
              </div>
            </template>
          </Card>
        </div>
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
  name: "V1Section",
  components: {
    Card,
  },
  mounted() {
    // Эффект проявления (reveal) для текстовых элементов внутри секции
    const textElements = this.$el.querySelectorAll(
      "h2, h3, p, span:not(.brand-gradient-text)"
    );
    gsap.from(textElements, {
      opacity: 0,
      y: 20,
      duration: 1,
      ease: "power2.out",
      stagger: 0.2,
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
.ai-section {
  background: radial-gradient(
    circle at center,
    rgba(139, 92, 246, 0.05) 0%,
    transparent 70%
  );
  position: relative;
  overflow: hidden;
}

.ai-section::before {
  content: "";
  position: absolute;
  inset: 0;
  background: url("@/assets/images/v1.png") no-repeat;
  background-size: 65%;
  background-position: right;
  mix-blend-mode: screen;
  pointer-events: none;
  z-index: 0;
}

.card-v1 {
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.8), 0 0 30px rgba(0, 0, 0, 0.5);
}

.card-v1:hover {
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.9), 0 0 40px rgba(0, 0, 0, 0.6);
}

:deep(.p-card) {
  border-radius: 12px;
  color: #fff;
}

:deep(.p-card .p-card-content) {
  padding: 0;
}

:deep(.p-card .p-card-body) {
  padding: 0;
}

/* Responsive Background Image */
@media (max-width: 640px) {
  .ai-section::before {
    background-size: 150% auto;
    opacity: 0.2;
  }
}

@media (min-width: 641px) and (max-width: 1024px) {
  .ai-section::before {
    background-size: cover;
    opacity: 0.3;
  }
}
</style>
