<template>
  <footer class="w-full bg-surface-950 relative overflow-hidden">
    <div class="absolute inset-0 footer-gradient"></div>

    <div class="footer-container mx-auto px-4 sm:px-6 md:px-8 lg:px-[83px] py-[32px] relative">
      <div class="flex flex-col sm:flex-row justify-between gap-y-[32px] sm:gap-[22px]">
        <!-- Левая колонка с якорными ссылками -->
        <div class="flex flex-col gap-[12px] w-full sm:w-auto items-center sm:items-start">
          <button
            v-for="link in leftLinks"
            :key="link.text"
            class="nav-link text-white text-[12px] sm:text-[14px] md:text-[16px] font-normal leading-[20px] hover:text-violet-400 transition-colors w-full sm:w-auto text-center sm:text-left"
            @click="scrollToSection(link.uid)"
          >
            {{ link.text }}
          </button>
        </div>

        <!-- Правая колонка с ссылкой на телеграм-бота -->
        <div class="flex flex-col items-center">
          <a
            href="https://t.me/theAi_supportBot"
            target="_blank"
            class="footer-button black text-[12px] sm:text-[14px] md:text-[16px] font-normal leading-[20px] h-11 w-full sm:min-w-[280px] gradient-border flex items-center justify-center"
          >
            <span class="bg-gradient-to-r from-rose-300 via-violet-400 to-sky-400 text-transparent bg-clip-text font-bold">
              try TheAI
            </span>
          </a>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
  setup() {
    // Массив ссылок для левой колонки (якорные ссылки)
    const leftLinks = [
      { text: "For business", uid: "business" },
      { text: "Opportunities", uid: "opportunities" },
    ];

    // Функция плавного скролла к нужному блоку по его id
    const scrollToSection = (uid) => {
      const el = document.getElementById(uid);
      if (el) {
        el.scrollIntoView({ behavior: "smooth" });
      }
    };

    return {
      leftLinks,
      scrollToSection,
    };
  },
};
</script>

<style scoped>
.footer-container {
  max-width: 1400px;
}

.footer-gradient {
  background: linear-gradient(
    90deg,
    #f5cea6 0%,
    #ec598b 32%,
    #8d42e7 54.5%,
    #1f5cef 74%,
    #00b9f6 100%
  );
  border-radius: 25px 25px 0px 0px;
  pointer-events: none;
}

.nav-link {
  position: relative;
  padding: 12px 16px;
  background: transparent;
  cursor: pointer;
  border-radius: 25px;
  border: 1px solid #131416;
  color: #131416;
  transition: all 0.3s ease;
  width: 100%;
}

.nav-link:hover {
  transform: translateY(-2px);
}

.footer-button {
  position: relative;
  padding: 0.75rem 1.5rem;
  background: transparent;
  cursor: pointer;
  border-radius: 1.5rem;
  border: 1px solid #131416;
  color: #fff;
  transition: all 0.3s ease;
  text-decoration: none;
}

.footer-button:hover {
  border-color: rgba(139, 92, 246, 0.8);
  transform: translateY(-2px);
}

.footer-button.black {
  background: #131416;
  border-color: #131416;
}

/* Мобильные устройства (max-width: 640px) */
@media (max-width: 640px) {
  .footer-gradient {
    border-radius: 16px 16px 0px 0px;
    opacity: 0.8;
  }

  .nav-link {
    text-align: center;
  }
}
</style>
