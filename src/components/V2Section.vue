<template>

  <section
  class="payout-section w-full bg-surface-950 px-4 sm:px-6 py-8 sm:py-12 md:py-16 relative overflow-hidden"
  >
  <!-- <div class="w-screen h-full bg-[url('@/assets/images/wheel-bg-gradient.png')] left-0 bg-center absolute bg-contain bg-no-repeat"></div> -->

    <div class="max-w-6xl mx-auto">
      <div class="flex flex-col">
        <!-- Header (Fraud Prevention & Fast Payouts) -->
        <div
          class="flex items-center justify-center mb-6 sm:mb-[40px] lg:mb-[83px]"
        >
          <div
            class="bg-transparent rounded-full text-center px-4 sm:px-6 md:px-8 py-2 sm:py-3 border border-white w-full max-w-[1050px]"
          >
            <span
              class="text-surface-200 text-xs text-center sm:text-3xl md:text-4xl lg:text-5xl font-medium w-full"
            >
              Fraud Prevention & Fast Payouts (Bot v2)
            </span>
          </div>
        </div>

        <!-- Main Headline -->
        <div
          class="flex relative flex-col gap-4 sm:gap-6 md:gap-10 text-center sm:text-left"
        >
        <div
            class="flex items-center justify-center sm:justify-start border-container my-4 sm:my-6 md:mb-4"
          >
            <h2
              class="text-[36px] sm:text-[48px] md:text-[80px] lg:text-[140px] font-bold leading-tight brand-gradient-text-2 w-full"
            >
              Rapid payouts,<br class="hidden sm:block" />loyal players
            </h2>
          </div>
          <h3
            class="text-[20px] sm:text-[24px] md:text-[48px] lg:text-[81px] font-bold leading-tight text-surface-50 mb-4 sm:mb-[20px] lg:mb-[38px]"
          >
            That’s how you win in a<br class="hidden sm:block" />competitive
            market.
          </h3>
        </div>

        <!-- Benefit Cards (Vertical Staircase Layout) -->
        <div class="flex flex-col gap-4 sm:gap-6 md:gap-10 lg:gap-16 relative">

          <!-- First card (left-aligned) -->
          <Card
            class="bg-surface-900/80 border-none backdrop-blur-sm hover:shadow-lg transition-all duration-300 w-full sm:max-w-[844px] sm:ml-0 card-v2"
          >
            <template #content>
              <div
                class="flex flex-col gap-2 sm:gap-3 md:gap-5 p-4 sm:p-6 lg:p-[27px]"
              >
                <h4
                  class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold brand-gradient-text"
                >
                  Outsmart Fraud in Real Time
                </h4>
                <p
                  class="text-surface-200 text-sm sm:text-base md:text-lg lg:text-xl"
                >
                  Protect your platform and players with instant fraud
                  detection.
                </p>
              </div>
            </template>
          </Card>

          <!-- Second card (centered) -->
          <Card
            class="bg-surface-900/80 border-none backdrop-blur-sm hover:shadow-lg transition-all duration-300 w-full sm:max-w-[844px] sm:mx-auto card-v2"
          >
            <template #content>
              <div
                class="flex flex-col gap-2 sm:gap-3 md:gap-5 p-4 sm:p-6 lg:p-[27px]"
              >
                <h4
                  class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold brand-gradient-text"
                >
                  Faster Approvals, Happier Clients
                </h4>
                <p
                  class="text-surface-200 text-sm sm:text-base md:text-lg lg:text-xl"
                >
                  Quick verification = more trust and player satisfaction.
                </p>
              </div>
            </template>
          </Card>

          <!-- Third card (right-aligned) -->
          <Card
            class="bg-surface-900/80 border-none backdrop-blur-sm hover:shadow-lg transition-all duration-300 w-full sm:max-w-[844px] sm:mr-0 sm:ml-auto card-v2"
          >
            <template #content>
              <div
                class="flex flex-col gap-2 sm:gap-3 md:gap-5 p-4 sm:p-6 lg:p-[27px]"
              >
                <h4
                  class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold brand-gradient-text"
                >
                  No Overhead with Full Compliance
                </h4>
                <p
                  class="text-surface-200 text-sm sm:text-base md:text-lg lg:text-xl"
                >
                  Stay on the right side of regulations without ballooning
                  expenses.
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
  name: "V2Section",
  components: {
    Card,
  },
  mounted() {
    // Эффект проявления для всех текстовых элементов внутри секции
    const textElements = this.$el.querySelectorAll(
      "h2, h3, h4, p, span"
    );
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
.payout-section {
  position: relative;
  overflow: hidden;
}

.payout-section::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: -44%;
  background: url("@/assets/images/v2.png") no-repeat;
  background-size: 75%;
  background-position: right;
  pointer-events: none;
  z-index: -1;
}

.card-v2 {
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.8), 0 0 30px rgba(0, 0, 0, 0.5);
}

.card-v2:hover {
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.9), 0 0 40px rgba(0, 0, 0, 0.6);
}

:deep(.p-card) {
  border-radius: 12px;
  color: #fff;
}

:deep(.p-card .p-card-content) {
  padding: 0;
}

:deep(.p-card:hover) {
  transform: translateY(-4px);
  box-shadow: 0 8px 32px rgba(139, 92, 246, 0.1);
}

@media (max-width: 640px) {
  .payout-section::before {
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
  .payout-section::before {
    background-size: cover;
    opacity: 0.3;
  }
}
</style>
