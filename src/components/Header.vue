<template>
  <header
    :class="[
      'fixed top-0 left-0 right-0 mx-auto px-4 sm:px-6 py-4 flex justify-between items-center transition-all duration-300 z-50 ',
      isScrolled || isMenuOpen
        ? 'bg-surface-900/80 backdrop-blur-md translate-y-0'
        : 'bg-surface-900/20 backdrop-blur-sm',
      isHidden ? '-translate-y-full' : 'translate-y-0',
    ]"
  >
    <div class="max-w-7xl mx-auto w-full flex justify-between items-center">
      <!-- Logo -->
      <div class="logo">
        <a
          href="/"
          class="text-lg sm:text-xl md:text-2xl font-bold brand-gradient-text"
        >
          theAI.energy
        </a>
      </div>

      <!-- Desktop Navigation -->
      <nav class="hidden lg:flex items-center gap-4">
        <Button
          v-for="item in menuItems"
          :key="item.label"
          :label="item.label"
          class="nav-button border-white"
          variant="text"
          @click="scrollToSection(item.uid)"
        />
        <a
  class="nav-button gradient-border brand-gradient-text !pt-[10px]"
  href="https://t.me/theAi_supportBot"
  target="_blank"
  style="
    background: linear-gradient(
      90deg,
      #F5CEA6 0%,
      #EC598B 27%,
      #8D42E7 42%,
      #0F5FCE 57%,
      #1B09F6 70%,
      #00B9FB 100%
    );
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    color: transparent;
  "
>
  Try TheAI
</a>


      </nav>


      <!-- Mobile Menu Button -->
      <div class="block lg:hidden">
        <Button
          class="nav-button border-white !p-2"
          variant="text"
          @click="isMenuOpen = !isMenuOpen"
        >
          <i :class="['pi', isMenuOpen ? 'pi-times' : 'pi-bars']"></i>
        </Button>
      </div>

     <!-- Mobile Navigation -->

      <div
        v-if="isMenuOpen"
        class="mobile-nav fixed inset-0 top-[60px] sm:top-[72px]  lg:hidden"
      >
        <nav class="flex flex-col items-center gap-4 p-4 sm:p-6 bg-surface-900/80 backdrop-blur-md">
          <Button
            v-for="item in menuItems"
            :key="item.label"
            :label="item.label"
            class="nav-button border-white w-full"
            variant="text"
            @click="scrollToSection(item.uid)"
          />
          <a
  class="nav-button gradient-border brand-gradient-text !pt-[10px]"
  href="https://t.me/theAi_supportBot"
  target="_blank"
  style="
    background: linear-gradient(
      90deg,
      #F5CEA6 0%,
      #EC598B 27%,
      #8D42E7 42%,
      #0F5FCE 57%,
      #1B09F6 70%,
      #00B9FB 100%
    );
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    color: transparent;
  "
>
  Try TheAI
</a>

        </nav>
      </div>


    </div>
  </header>
</template>

<script>
import Button from "primevue/button";
import { gsap } from "gsap";

export default {
  name: "Header",
  components: {
    Button,
  },
  data() {
    return {
      isScrolled: false,
      isHidden: false,
      isMenuOpen: false,
      lastScrollY: 0,
      menuItems: [
        { label: "Opportunities", uid: "opportunities" },
        { label: "For business", uid: "business" },
        { label: "Submit an application", uid: "application" },
      ],
    };
  },
  mounted() {
    window.addEventListener("scroll", this.handleScrollDebounced);
    // Анимация появления header при загрузке
    gsap.from(this.$el, {
      duration: 1,
      y: -50,
      opacity: 0,
      ease: "power2.out",
    });
  },
  unmounted() {
    window.removeEventListener("scroll", this.handleScrollDebounced);
  },
  methods: {
    handleScroll() {
      const currentScrollY = window.scrollY;
      this.isScrolled = currentScrollY > 50;
      
      if (currentScrollY > this.lastScrollY && currentScrollY > 100) {
        this.isHidden = true;
      } else if (currentScrollY < this.lastScrollY) {
        this.isHidden = false;
      }
      
      this.lastScrollY = currentScrollY;
    },
    handleScrollDebounced() {
      clearTimeout(this.scrollTimeout);
      this.scrollTimeout = setTimeout(() => {
        this.handleScroll();
      }, 100);
    },
    scrollToSection(uid) {
      const el = document.getElementById(uid);
      if (el) {
        el.scrollIntoView({ behavior: "smooth" });
      }
      // Закрываем мобильное меню, если оно было открыто
      this.isMenuOpen = false;
    },
  },
  watch: {
    isMenuOpen(newValue) {
      document.body.style.overflow = newValue ? "hidden" : "";
      if (newValue) {
        this.$nextTick(() => {
          gsap.from(".mobile-nav", {
            duration: 0.5,
            opacity: 0,
            scale: 0.95,
            ease: "power2.out",
          });
        });
        this.isHidden = false;
      }
    },
  },
};
</script>


<style scoped>
.nav-button {
  position: relative;
  padding: 0.75rem 1.5rem;
  background: transparent;
  cursor: pointer;
  border-radius: 1.5rem;
  border: 1px solid #131416;
  color: #fff;
  transition: all 0.3s ease;
  height: 2.75rem; /* h-11 = 44px */
  font-size: 0.75rem; /* text-[12px] */
}

.nav-button:hover {
  border-color: rgba(139, 92, 246, 0.8);
  transform: translateY(-2px);
}

.nav-button.border-white {
  border: 1px solid #fff;
}

/* Адаптивные стили для кнопок */
@media (min-width: 640px) {
  .nav-button {
    font-size: 0.875rem; /* sm:text-[14px] */
  }
}

@media (min-width: 768px) {
  .nav-button {
    font-size: 1rem; /* md:text-[16px] */
  }
}

@media (max-width: 640px) {
  .nav-button {
    padding: 0.5rem 1rem;
  }
}

@media (min-width: 641px) and (max-width: 1024px) {
  .nav-button {
    padding: 0.5rem 1.25rem;
  }
}

/* Стили для мобильного меню */
@media (max-width: 1024px) {
  .nav-button {
    width: 100%;
    text-align: center;
    background: rgba(17, 17, 17, 0.7);
  }
  
  nav {
    background: linear-gradient(
      180deg,
      rgba(17, 17, 17, 0.95) 0%,
      rgba(17, 17, 17, 0.98) 100%
    );
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  }
}

/* Остальные стили */
.gradient-border {
  position: relative;
  background: transparent;
  z-index: 0;
  padding: 0.75rem 1.5rem;
}

.gradient-border::before {
  content: "";
  position: absolute;
  inset: -1px;
  border-radius: 9999px;
  padding: 3px;
  background: linear-gradient(
    90deg,
    #f5cea6 0%,
    #ec598b 21.67%,
    #8d42e7 46.67%,
    #1f5cef 72.67%,
    #00b9f6 100%
  );
  -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
  mask-composite: exclude;
  z-index: -1;
}

.gradient-border:hover::before {
  opacity: 0.8;
}

.slide-fade-enter-active,
.slide-fade-leave-active {
  transition: all 0.3s ease;
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  opacity: 0;
  transform: translateY(-20px);
}

.logo a {
  font-size: 1rem;
}

@media (min-width: 640px) {
  .logo a {
    font-size: 1.25rem;
  }
}

@media (min-width: 768px) {
  .logo a {
    font-size: 1.5rem;
  }
}
</style>
