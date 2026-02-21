<template>
  <div class="flex flex-col items-center justify-center relative">
    <div class="absolute inset-0"></div>
    <Dialog
      v-model:visible="showForm"
      modal
      :dismissableMask="true"
      :style="{ width: '90vw', maxWidth: '400px' }"
      class="prize-form-dialog"
      pt:root:class="!border-0"
    >
      <template #container>
        <div
          class="flex flex-col py-8 sm:py-[28px] px-6 sm:px-[42px] rounded-2xl"
        >
          <div class="text-center mb-5 congratulations">
            <h3 class="text-lg sm:text-xl md:text-2xl text-white flex flex-col">
             <span class="font-bold">{{ selectedPrize?.label }}!</span>
            </h3>
          </div>
          <div class="flex flex-col gap-4 px-4 sm:px-8 mb-2">
            <p class="text-sm sm:text-base text-white">
              {{ selectedPrize?.description || "Loading..." }}
            </p>
            <p class="text-xs sm:text-sm text-white">Submit to collect</p>
          </div>
          <div class="form-content">
            <form @submit.prevent="submitForm" class="flex flex-col gap-4">
              <span class="p-float-label">
                <InputText
                  id="email"
                  v-model="formData.email"
                  class="w-full h-11 !bg-white !text-black !placeholder:text-black"
                  placeholder="Your email"
                />
              </span>
              <Button
                type="submit"
                :loading="loading"
                class="submit-button w-full h-11"
                :class="{ 'p-button-outlined': true }"
              >
                <span class="font-bold text-white brand-gradient-text"
                  >Submit</span
                >
              </Button>
              
              <a
                href="https://t.me/theAi_supportBot"
                class="submit-button w-full h-11 flex items-center justify-center font-black border-2 border-red-500"
              >
                <span class="font-bold text-white brand-gradient-text"
                  >try TheAI</span
                >
              </a>
              
            </form>
          </div>
        </div>
      </template>
    </Dialog>

    <div
      v-if="!formSubmitted"
      class="wheel-container max-w-[100vh] w-full mx-auto relative z-10"
      :class="'wheel-container-height'"
    >
      <CssFortuneWheel @prize-selected="handlePrizeSelected" />
    </div>

    <Toast />
  </div>
</template>

<script>
import { useVuelidate } from "@vuelidate/core";
import { required, email } from "@vuelidate/validators";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import Toast from "primevue/toast";
import Dialog from "primevue/dialog";
import CssFortuneWheel from "./CssFortuneWheel.vue";
import { useToast } from "primevue/usetoast";

export default {
  name: "LuckyForm",
  components: {
    Button,
    InputText,
    CssFortuneWheel,
    Dialog,
    Toast,
  },
  data() {
    return {
      showForm: false,
      loading: false,
      formSubmitted: false,
      submitted: false,
      selectedPrize: null,
      formData: {
        email: "",
      },
      v$: null,
    };
  },
  created() {
    const rules = {
      formData: {
        email: { required, email },
      },
    };
    this.v$ = useVuelidate(rules, this);
  },
  setup() {
    return {
      toast: useToast(),
    };
  },
  methods: {
    handlePrizeSelected(prize) {
      this.selectedPrize = prize;
      this.showForm = true;
      // Win notification removed
    },
    async submitForm() {
      this.submitted = true;
      const isValid = await this.v$.$validate();

      if (!isValid) {
        if (this.v$.formData.email.$invalid) {
          let errorMessage = "This field is required";
          if (
            this.formData.email &&
            this.v$.formData.email.$invalid &&
            !this.v$.formData.email.required
          ) {
            errorMessage = "Invalid email address";
          }
          this.toast.add({
            severity: "error",
            summary: "Validation Error",
            detail: errorMessage,
            life: 3000,
            className:
              "bg-red-500/90 backdrop-blur-md text-white border border-red-300",
          });
        }
        return;
      }

      this.loading = true;
      this.toast.add({
        severity: "info",
        summary: "Sending",
        detail: "Sending your data...",
        life: 3000,
        className:
          "bg-blue-500/90 backdrop-blur-md text-white border border-blue-300",
      });

      try {
        const response = await fetch("/api/submit-feedback.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            email: this.formData.email,
            bonus: this.selectedPrize,
          }),
        });

        const result = await response.json();

        if (!response.ok || !result.success) {
          throw new Error(result.message || "Server error");
        }

        this.toast.add({
          severity: "success",
          summary: "Success",
          detail: `Your bonus ${this.selectedPrize.label} has been sent!`,
          life: 3000,
          className:
            "bg-green-500/90 backdrop-blur-md text-white border border-green-300",
        });
        this.formSubmitted = true;
        this.showForm = false;
        setTimeout(() => this.resetForm(), 2000);
      } catch (error) {
        this.toast.add({
          severity: "error",
          summary: "Error",
          detail: error.message || "Failed to send data",
          life: 3000,
          className:
            "bg-red-500/90 backdrop-blur-md text-white border border-red-300",
        });
      } finally {
        this.loading = false;
      }
    },
    resetForm() {
      this.showForm = false;
      this.formSubmitted = false;
      this.submitted = false;
      this.selectedPrize = null;
      this.formData.email = "";
      this.v$.$reset();
    },
  },
};
</script>

<style scoped>
.background-gradient {
  background: linear-gradient(90deg, #38b2ac 0%, #d53f8c 50%, #f6ad55 100%);
  pointer-events: none;
  z-index: 0;
  border-radius: 1rem;
}

.congratulations {
  border: 1px solid rgba(255, 255, 255);
  border-radius: 1.5rem;
  padding: 12px 16px;
}

:deep(.prize-form-dialog) {
  .p-dialog-mask {
    backdrop-filter: blur(4px);
    background: rgba(0, 0, 0, 0.4);
  }

  .p-dialog {
    margin: 0.5rem;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    border-radius: 1rem;
    position: relative;
    border: none !important;
    overflow: hidden;
    background: transparent;
  }

  .p-dialog-content {
    padding: 0;
    background: transparent;
  }
}

:deep(.p-inputtext) {
  border: 1px solid rgba(255, 255, 255, 0.2);
  transition: all 0.3s ease;
  color: white; /* Black text color */
  font-size: 1rem;
  padding: 0.75rem 2rem;
  border-radius: 1.5rem;
  box-shadow: inset 0 10px 10px -10px rgba(0, 0, 0, 0.5);
}

:deep(.p-inputtext)::placeholder {
  opacity: 1;
}

:deep(.p-inputtext:hover),
:deep(.p-inputtext:focus) {
  border-color: rgba(255, 255, 255, 0.5);
}

.submit-button {
  background: #131416 !important;
  border: none !important;
  border-radius: 1.5rem !important;
  transition: all 0.3s ease;
  color: #fff;
  font-size: 1rem;
}

.submit-button:hover {
  transform: translateY(-2px);
  background: #1a202c !important;
}

@media (max-width: 640px) {
  .congratulations {
    padding: 12px 16px;
  }

  :deep(.p-dialog) {
    margin: 0.5rem;
    border-radius: 1rem;
  }

  :deep(.p-inputtext) {
    font-size: 0.875rem;
    padding: 0.5rem 1rem;
  }

  .submit-button {
    font-size: 0.875rem;
    padding: 0.5rem 1rem;
  }
}

@media (min-width: 641px) and (max-width: 1024px) {
  .congratulations {
    padding: 16px 20px;
  }

  :deep(.p-inputtext) {
    font-size: 1rem;
    padding: 0.75rem 1.5rem;
  }

  .submit-button {
    font-size: 1rem;
    padding: 0.75rem 1.5rem;
  }
}

@media (min-width: 1025px) {
  :deep(.p-inputtext) {
    font-size: 1.25rem;
    padding: 0.75rem 2rem;
  }

  .submit-button {
    font-size: 1.25rem;
    padding: 0.75rem 2rem;
  }
}

.wheel-container-height {
  height: min(100vh, 100vh);
}

@media (max-width: 768px) {
  .wheel-container-height {
    height: min(60vh, 400px);
  }
}

@media (min-width: 769px) and (max-width: 1024px) {
  .wheel-container-height {
    height: min(80vh, 800px);
  }
}
</style>
