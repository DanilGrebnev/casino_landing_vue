<template>
  <section
    id="application"
    class="contact-section w-full bg-surface-950 px-4 sm:px-6 py-8 sm:py-16"
  >
    <div class="max-w-6xl mx-auto">
      <div
        class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 items-center"
      >
        <!-- Left column with text -->
        <div class="contact-text">
          <h2
            class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-bold mb-4"
          >
            <span class="brand-gradient-text">
              Any questions
              <br class="hidden sm:block" />
              left?
            </span>
          </h2>
          <h3
            class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl text-surface-50 font-semibold"
          >
            Submit them
            <br class="hidden sm:block" />
            to us!
          </h3>
          <div
            class="h-0.5 sm:h-1 w-full max-w-[100px] sm:max-w-64 bg-gradient-to-r from-rose-300 via-violet-400 to-sky-400 mt-4 rounded-lg"
          ></div>
        </div>

        <!-- Right column with form -->
        <div class="contact-form relative mt-6 lg:mt-0">
          <Card class="contact-card">
            <template #content>
              <form @submit.prevent="handleSubmit" class="flex flex-col gap-4">
                <span class="p-float-label">
                  <InputText
                    id="email"
                    v-model="form.email"
                    class="w-full h-11 !bg-white !text-black font-[100]"
                    placeholder="Email |"
                  />
                </span>

                <span class="p-float-label">
                  <InputText
                    id="firstname"
                    v-model="form.firstname"
                    class="w-full h-11 !bg-white !text-black font-[100]"
                    placeholder="First name |"
                  />
                </span>

                <span class="p-float-label">
                  <InputText
                    id="lastname"
                    v-model="form.lastname"
                    class="w-full h-11 !bg-white !text-black font-[100]"
                    placeholder="Last name |"
                  />
                </span>

                <Button
                  type="submit"
                  class="submit-button mt-4 h-11"
                  :loading="loading"
                  :class="{ 'p-button-outlined': true }"
                >
                  <span
                    class="bg-gradient-to-r from-rose-300 via-violet-400 to-sky-400 text-transparent bg-clip-text font-bold"
                  >
                    Submit
                  </span>
                </Button>
              </form>
            </template>
          </Card>
        </div>
      </div>
    </div>
    <Toast />
  </section>
</template>

<script>
import { ref, onMounted } from "vue";
import Card from "primevue/card";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import Toast from "primevue/toast";
import { useToast } from "primevue/usetoast";
import { gsap } from "gsap";

export default {
  name: "ContactSection",
  components: {
    Card,
    InputText,
    Button,
    Toast,
  },
  setup() {
    const form = ref({
      email: "",
      firstname: "",
      lastname: "",
    });
    const loading = ref(false);
    const toast = useToast();

    const handleSubmit = async () => {
      loading.value = true;
      toast.add({
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
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            firstName: form.value.firstname,
            lastName: form.value.lastname,
            email: form.value.email,
          }),
        });

        const result = await response.json();

        if (!response.ok || !result.success) {
          throw new Error(result.message || "Server error");
        }

        toast.add({
          severity: "success",
          summary: "Success",
          detail: "Form submitted successfully!",
          life: 3000,
          className:
            "bg-green-500/90 backdrop-blur-md text-white border border-green-300",
        });
        form.value.firstname = "";
        form.value.lastname = "";
        form.value.email = "";
      } catch (error) {
        console.error("Error submitting form:", error);
        toast.add({
          severity: "error",
          summary: "Error",
          detail: error.message || "Failed to submit the form",
          life: 3000,
          className:
            "bg-red-500/90 backdrop-blur-md text-white border border-red-300",
        });
      } finally {
        loading.value = false;
      }
    };

    onMounted(() => {
      gsap.from(".contact-text", {
        duration: 1,
        x: -50,
        opacity: 0,
        ease: "power2.out",
        delay: 0.3,
      });
      gsap.from(".contact-form", {
        duration: 1,
        x: 50,
        opacity: 0,
        ease: "power2.out",
        delay: 0.5,
      });
      gsap.from(".p-inputtext", {
        duration: 1,
        y: 20,
        opacity: 0,
        stagger: 0.15,
        ease: "power2.out",
        delay: 0.7,
      });
    });

    return {
      form,
      handleSubmit,
      loading,
    };
  },
};
</script>

<style scoped>
.contact-section {
  position: relative;
  overflow: hidden;
}

.contact-card {
  background: linear-gradient(
    90deg,
    #f5cea6 0%,
    #ec598b 32%,
    #8d42e7 54.5%,
    #1f5cef 74%,
    #00b9f6 100%
  );
  backdrop-filter: blur(8px);
  border-radius: 1.5rem;
}

:deep(.p-card) {
  background: transparent;
  box-shadow: none;
}

:deep(.p-card .p-card-content) {
  padding: 1rem;
  border-radius: 1.5rem;
  background: linear-gradient(
    90deg,
    #f5cea6 0%,
    #ec598b 32%,
    #8d42e7 54.5%,
    #1f5cef 74%,
    #00b9f6 100%
  );
}

@media (min-width: 640px) {
  :deep(.p-card .p-card-content) {
    padding: 2rem;
  }
}

@media (min-width: 1024px) {
  :deep(.p-card .p-card-content) {
    padding: 38px 54px;
  }
}

:deep(.p-inputtext) {
  border: 1px solid #fff;
  color: #fff;
  font-size: 1.5rem;
  padding: 0.75rem 2rem;
  border-radius: 1.5rem;
  background: transparent;
  box-shadow: inset 0 10px 10px -10px rgba(0, 0, 0, 0.5);
}

@media (max-width: 640px) {
  :deep(.p-inputtext) {
    font-size: 1rem;
    padding: 0.5rem 1rem;
  }
}

:deep(.p-inputtext:hover),
:deep(.p-inputtext:focus) {
  border-color: rgba(255, 255, 255, 0.8);
}

.submit-button {
  border: 1px solid #131416;
  transition: all 0.3s ease;
  padding: 0.75rem 1.5rem;
  font-size: 1.5rem;
  border-radius: 1.5rem;
  color: #fff;
  background: #131416;
}

@media (max-width: 640px) {
  .submit-button {
    font-size: 1rem;
    padding: 0.5rem 1rem;
  }
}

.submit-button:hover {
  border-color: rgba(139, 92, 246, 0.8);
  transform: translateY(-2px);
}

@media (max-width: 640px) {
  .contact-section::before {
    background-size: 200% auto;
    opacity: 0.05;
  }

  :deep(.p-float-label) {
    width: 100%;
  }
}
</style>
