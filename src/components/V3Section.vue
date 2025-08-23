<template>
  <section
    class="data-section w-full bg-surface-950 px-4 sm:px-6 py-8 sm:py-12 md:py-16 relative overflow-hidden"
  >
    <div class="max-w-6xl mx-auto">
      <div class="flex flex-col">
        <!-- Header (User Behavior Analysis) -->
        <div
          class="flex items-center justify-center mb-6 sm:mb-[40px] lg:mb-[41px]"
        >
          <div
            class="bg-transparent rounded-full text-center px-4 sm:px-6 md:px-8 py-2 sm:py-3 border border-white w-full max-w-[865px]"
          >
            <span
              class="text-surface-200 text-xs text-center sm:text-3xl md:text-4xl lg:text-5xl font-medium w-full"
            >
              User Behavior Analysis (Bot v3)
            </span>
          </div>
        </div>

        <!-- Main Headline -->
        <div
          class="flex flex-col gap-4 sm:gap-6 md:gap-10 text-center sm:text-left mb-6 sm:mb-8 md:mb-12"
        >
          <div id="level-up" class="relative border-container">
            <h2
              class="text-[36px] sm:text-[48px] md:text-[80px] lg:text-[140px] font-bold leading-tight brand-gradient-text-2 w-full"
            >
              Data rules,<br class="hidden sm:block" />success follows
            </h2>
          </div>
          <h3
            class="text-[20px] sm:text-[24px] md:text-[48px] lg:text-[81px] leading-tight text-surface-50 font-semibold"
          >
            Let your metrics drive player<br class="hidden sm:block" />lifetime
            value.
          </h3>
        </div>

        <!-- Benefit Cards (Vertical Stacking Layout) -->
        <div
          class="flex flex-col items-start gap-4 sm:gap-6 md:gap-10 lg:gap-16"
        >
          <Card
            class="bg-surface-900/80 border-none backdrop-blur-sm hover:shadow-lg transition-all duration-300 w-full sm:max-w-[844px] px-4 py-4 sm:px-[10px] sm:py-[10px] md:px-[20px] md:py-[15px] lg:px-[35px] lg:py-[27px] card-v3"
          >
            <template #content>
              <div
                class="flex flex-col gap-2 sm:gap-3 md:gap-5 p-4 sm:p-6 lg:p-[27px]"
              >
                <h4
                  class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold brand-gradient-text"
                >
                  AI-Driven Insights with Zero Guesswork
                </h4>
                <p
                  class="text-surface-200 text-sm sm:text-base md:text-lg lg:text-xl"
                >
                  Understand player habits and optimize your promotions.
                </p>
              </div>
            </template>
          </Card>

          <Card
            class="bg-surface-900/80 border-none backdrop-blur-sm hover:shadow-lg transition-all duration-300 w-full sm:max-w-[844px] px-4 py-4 sm:px-[10px] sm:py-[10px] md:px-[20px] md:py-[15px] lg:px-[35px] lg:py-[27px] card-v3"
          >
            <template #content>
              <div
                class="flex flex-col gap-2 sm:gap-3 md:gap-5 p-4 sm:p-6 lg:p-[27px]"
              >
                <h4
                  class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold brand-gradient-text"
                >
                  Retention Boosted & Churn Reduced
                </h4>
                <p
                  class="text-surface-200 text-sm sm:text-base md:text-lg lg:text-xl"
                >
                  Identify early signals of dropout, keep players engaged
                  longer.
                </p>
              </div>
            </template>
          </Card>

          <Card
            class="bg-surface-900/80 border-none backdrop-blur-sm hover:shadow-lg transition-all duration-300 w-full sm:max-w-[844px] px-4 py-4 sm:px-[10px] sm:py-[10px] md:px-[20px] md:py-[15px] lg:px-[35px] lg:py-[27px] card-v3"
          >
            <template #content>
              <div
                class="flex flex-col gap-2 sm:gap-3 md:gap-5 p-4 sm:p-6 lg:p-[27px]"
              >
                <h4
                  class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold brand-gradient-text"
                >
                  Personalize Promos & Skyrocket Revenue
                </h4>
                <p
                  class="text-surface-200 text-sm sm:text-base md:text-lg lg:text-xl"
                >
                  Offer the right deal at the right time to maximize impact.
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
  name: "V3Section",
  components: {
    Card,
  },
  mounted() {
    // Эффект проявления (reveal) для текстовых элементов внутри секции
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
        toggleActions: "play none none none"
      }
    });
  }
};
</script>

<style scoped>
.data-section {
  background: radial-gradient(
    circle at center,
    rgba(139, 92, 246, 0.05) 0%,
    transparent 70%
  );
  position: relative;
  overflow: hidden;
}

.data-section::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: -17%;
  background: url("@/assets/images/v3.png") no-repeat;
  background-size: 75%;
  background-position: left;
  pointer-events: none;
  z-index: -1;
}

.card-v3 {
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.8), 0 0 30px rgba(0, 0, 0, 0.5);
}

.card-v3:hover {
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.9), 0 0 40px rgba(0, 0, 0, 0.6);
}

:deep(.p-card) {
  border-radius: 12px;
  color: #fff;
  transition: all 0.3s ease;
}

:deep(.p-card:hover) {
  transform: translateY(-4px);
  box-shadow: 0 8px 32px rgba(139, 92, 246, 0.1);
}

:deep(.p-card .p-card-content) {
  padding: 0;
}

:deep(.p-card .p-card-body) {
  padding: 0;
}

@media (max-width: 640px) {
  .data-section::before {
    background-size: 150% auto;
    opacity: 0.2;
  }

  .text-center {
    text-align: center;
  }

  :deep(.p-card:hover) {
    transform: translateY(-2px);
  }
}

@media (min-width: 641px) and (max-width: 1024px) {
  .data-section::before {
    background-size: cover;
    opacity: 0.3;
  }
}
</style>
