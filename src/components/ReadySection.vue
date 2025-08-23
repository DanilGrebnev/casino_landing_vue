<template>
  <section id="business"
    class="level-up-section w-full bg-surface-950 px-4 sm:px-6 py-8 sm:py-12 md:py-16"
  >
    <div class="max-w-6xl mx-auto">
      <div class="flex flex-col gap-4 sm:gap-6 md:gap-8 lg:gap-12">
        <!-- Заголовок -->
        <div id="level-up" class="relative inline-block px-2 sm:px-3">
          <div
            class="flex items-center justify-center sm:justify-start border-container"
          >
            <h2
              class="text-[36px] sm:text-[48px] md:text-[80px] lg:text-[140px] font-bold leading-tight w-full h-full"
            >
              Ready to<br class="hidden sm:block" /><span
                class="brand-gradient-text-2"
                >Level Up?</span
              >
            </h2>
          </div>
        </div>

        <h3
          class="text-[20px] sm:text-[32px] md:text-[48px] lg:text-[76px] font-semibold leading-tight text-center sm:text-left"
        >
          Faster approvals, happier
          <br class="hidden sm:block" />
          clients — a winning
          <br class="hidden sm:block" />
          combination for any operator.
        </h3>

        <!-- Преимущества -->
        <div class="flex flex-col space-y-2 sm:-space-y-4">
          <!-- Первый блок (левый) -->
          <Card
            class="self-start w-full mb-0 max-w-full sm:max-w-[80%] md:max-w-[60%] bg-surface-900 hover:shadow-lg transition-all duration-300 px-4 py-4 sm:px-6 sm:py-6 md:px-[35px] md:py-[27px] card-ready"
          >
            <template #content>
              <h4
                class="text-lg sm:text-xl md:text-2xl font-bold mb-2 sm:mb-3 md:mb-5 brand-gradient-text"
              >
                Automate & Analyze Profit
                <div
                  class="h-0.5 sm:h-1 w-12 sm:w-16 md:w-48 lg:w-54 bg-gradient-to-r from-rose-300 via-violet-400 to-sky-400 mt-1 sm:mt-2 rounded-lg"
                ></div>
              </h4>
              <p class="text-surface-200 text-sm sm:text-base md:text-lg">
                Leave manual tasks behind and unleash
                <br class="hidden sm:block" />
                your team's potential.
              </p>
            </template>
          </Card>

          <!-- Второй блок (правый) -->
          <Card
            class="self-end w-full max-w-full sm:max-w-[80%] md:max-w-[60%] bg-surface-900 hover:shadow-lg transition-all duration-300 px-4 py-4 sm:px-6 sm:py-6 md:px-[35px] md:py-[27px] card-ready"
          >
            <template #content>
              <h4
                class="text-lg sm:text-xl md:text-2xl font-bold mb-2 sm:mb-3 md:mb-5 brand-gradient-text"
              >
                No Downtime at Full Speed
                <div
                  class="h-0.5 sm:h-1 w-12 sm:w-16 md:w-48 lg:w-54 bg-gradient-to-r from-rose-300 via-violet-400 to-sky-400 mt-1 sm:mt-2 rounded-lg"
                ></div>
              </h4>
              <p class="text-surface-200 text-sm sm:text-base md:text-lg">
                Keep your platform running
                <br class="hidden sm:block" />
                flawlessly, 24/7.
              </p>
            </template>
          </Card>

          <!-- Третий блок (левый) -->
          <Card
            class="self-start w-full max-w-full sm:max-w-[80%] md:max-w-[60%] bg-surface-900 hover:shadow-lg transition-all duration-300 px-4 py-4 sm:px-6 sm:py-6 md:px-[35px] md:py-[27px] card-ready"
          >
            <template #content>
              <h4
                class="text-lg sm:text-xl md:text-2xl font-bold mb-2 sm:mb-3 md:mb-5 brand-gradient-text"
              >
                Stay Ahead with Real-Time AI
                <div
                  class="h-0.5 sm:h-1 w-12 sm:w-16 md:w-48 lg:w-54 bg-gradient-to-r from-rose-300 via-violet-400 to-sky-400 mt-1 sm:mt-2 rounded-lg"
                ></div>
              </h4>
              <p class="text-surface-200 text-sm sm:text-base md:text-lg">
                React instantly to market changes
                <br class="hidden sm:block" />
                and player behavior.
              </p>
            </template>
          </Card>

          <!-- Четвертый блок (правый) -->
          <Card
            class="self-end w-full max-w-full sm:max-w-[80%] md:max-w-[60%] bg-surface-900 hover:shadow-lg transition-all duration-300 px-4 py-4 sm:px-6 sm:py-6 md:px-[35px] md:py-[27px] card-ready"
          >
            <template #content>
              <h4
                class="text-lg sm:text-xl md:text-2xl font-bold mb-2 sm:mb-3 md:mb-5 brand-gradient-text"
              >
                Expand Horizons, Limit Losses
                <div
                  class="h-0.5 sm:h-1 w-12 sm:w-16 md:w-48 lg:w-54 bg-gradient-to-r from-rose-300 via-violet-400 to-sky-400 mt-1 sm:mt-2 rounded-lg"
                ></div>
              </h4>
              <p class="text-surface-200 text-sm sm:text-base md:text-lg">
                Grow internationally and protect
                <br class="hidden sm:block" />
                your bottom line.
              </p>
            </template>
          </Card>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Card from "primevue/card";
export default {
  name: "ReadySection",
  components: {
    Card,
  },
};
</script>

<style scoped>
.level-up-section {
  position: relative;
  overflow: hidden;
}

/* Волнистый фон */
.level-up-section::before {
  content: "";
  position: absolute;
  inset: 0;
  background-size: cover;
  pointer-events: none;
}

/* Декоративные линии */
.level-up-section::after {
  content: "";
  position: absolute;
  right: 0;
  top: 0;
  bottom: 0;
  width: 50%;
  background-size: contain;
  pointer-events: none;
}

.card-ready {
  position: relative;
  overflow: hidden;
  box-shadow: 
    0 4px 10px rgba(0, 0, 0, 0.8),
    0 0 30px rgba(0, 0, 0, 0.5);
}

.card-ready:hover {
  box-shadow: 
    0 4px 15px rgba(0, 0, 0, 0.9),
    0 0 40px rgba(0, 0, 0, 0.6);
}

.card-ready::before {
  content: "";
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 100px;
  height: 100%;
  background-image: url("@/assets/images/1 (1).png");
  background-size: contain;
  background-position: right center;
  background-repeat: no-repeat;
  opacity: 0.5;
  pointer-events: none;
}

.card-ready:nth-child(2)::before {
  width: 176px;
  background-image: url("@/assets/images/2 (1).png");
}

.card-ready:nth-child(3)::before {
  width: 176px;
  background-image: url("@/assets/images/3 (1).png");
}

.card-ready:nth-child(4)::before {
  width: 176px;
  background-image: url("@/assets/images/4 (1).png");
}

:deep(.p-card) {
  border-radius: 16px;
  color: #fff;
}

@media (max-width: 640px) {
  .level-up-section::before {
    background-size: 200% auto;
    opacity: 0.05;
  }

  .level-up-section::after {
    width: 100%;
    background-position: center;
    opacity: 0.05;
  }

  h2,
  h3 {
    text-align: center;
  }

  .card-ready {
    /* margin-bottom: 1rem; */
  }
  
  .card-ready::before {
    width: 80px;
    opacity: 0.3;
  }
  
  .card-ready:nth-child(2)::before,
  .card-ready:nth-child(3)::before,
  .card-ready:nth-child(4)::before {
    width: 120px;
  }
}

@media (min-width: 641px) and (max-width: 1024px) {
  .level-up-section::before {
    opacity: 0.07;
  }

  .level-up-section::after {
    opacity: 0.07;
  }

  .card-ready::before {
    width: 120px;
    opacity: 0.4;
  }
  
  .card-ready:nth-child(2)::before,
  .card-ready:nth-child(3)::before,
  .card-ready:nth-child(4)::before {
    width: 150px;
  }
}
</style>
