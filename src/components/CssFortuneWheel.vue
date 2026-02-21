<template>
  <div class="wheel-container overflow-visible">
    <fieldset class="ui-wheel-of-fortune wheel">
      <div class="wheel-background"></div>
      <img src="@/assets/icons/triangle.svg" alt="triangle" class="triangle" />
      <ul ref="wheel">
        <li v-for="prize in prizes" :key="prize.value">
          <span class="prize-text">{{ prize.label }}</span>
        </li>
      </ul>
      <button type="button" @click="handleSpin" :disabled="isSpinning">
        Start
      </button>
    </fieldset>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const wheel = ref(null);
const isSpinning = ref(false);

// Захардкоженные данные призов
const prizes = ref([
  {
    label: "+20% ARPU",
    value: 1,
    weight: 20,
    description:
      "Average Revenue Per User increases by more than 20% due to precise offer personalization, customer need analysis, and predictive behavior modeling.",
  },
  {
    label: "+150% lead conversion",
    value: 2,
    weight: 17,
    description:
      "Support response speed triples, leading to a 1.5x+ increase in lead conversion on the website. Customers receive instant replies with no waiting time.",
  },
  {
    label: "-95% support workload",
    value: 3,
    weight: 15,
    description:
      "The number of inquiries requiring human intervention decreases by 95% due to automated resolution of common issues.",
  },
  {
    label: "3,000+ simultaneous chats",
    value: 4,
    weight: 12,
    description:
      "The AI assistant handles over 3,000 concurrent chats, ensuring instant support without delays.",
  },
  {
    label: "Approvals in minutes",
    value: 5,
    weight: 10,
    description:
      "Transactions are processed twice as fast thanks to automated risk assessment.",
  },
  {
    label: "-30% fewer escalations",
    value: 6,
    weight: 8,
    description:
      "The number of client support escalations decreases by 30% due to standardized AI-driven decisions and minimized errors.",
  },
  {
    label: "-25% fraud loss reduction",
    value: 7,
    weight: 7,
    description:
      "AI reduces losses from fraud by 25% by automatically detecting suspicious transactions and anomalous behavior.",
  },
  {
    label: "+25% customer retention",
    value: 8,
    weight: 5,
    description:
      "Retention increases by 25% due to proactive AI interactions, personalized offers, and churn prevention.",
  },
  {
    label: "-77% personnel costs",
    value: 9,
    weight: 4,
    description:
      "Expenses for support, finance, and marketing teams are reduced by 77% through automation.",
  },
  {
    label: "+30% customer satisfaction",
    value: 10,
    weight: 2,
    description:
      "Customer satisfaction rises by 30% thanks to instant responses, personalized solutions, and reduced wait times.",
  },
]);

let previousEndDegree = 0;
let animation = null;

const emit = defineEmits(["prize-selected"]);

// Функция для выбора приза с учетом весов
const getWeightedRandomPrize = () => {
  const totalWeight = prizes.value.reduce(
    (sum, prize) => sum + prize.weight,
    0
  );
  let random = Math.random() * totalWeight;

  for (const prize of prizes.value) {
    random -= prize.weight;
    if (random <= 0) return prize;
  }
  return prizes.value[prizes.value.length - 1]; // На случай ошибки
};

const handleSpin = () => {
  if (isSpinning.value) return;
  if (animation) animation.cancel();

  isSpinning.value = true;

  // Выбираем приз локально с учетом весов
  const winningPrize = getWeightedRandomPrize();
  const prizeIndex = prizes.value.findIndex(
    (prize) => prize.value === winningPrize.value
  );

  const segmentAngle = 360 / prizes.value.length;
  const offset = 90;
  const targetAngle = offset - segmentAngle * prizeIndex;
  const fullSpins = 5;
  const randomOffset = Math.random() * 20 - 10;
  const newEndDegree =
    previousEndDegree + 360 * fullSpins + targetAngle + randomOffset;

  animation = wheel.value.animate(
    [
      { transform: `rotate(${previousEndDegree}deg)` },
      { transform: `rotate(${newEndDegree}deg)` },
    ],
    {
      duration: 4000,
      easing: "cubic-bezier(0.440, -0.205, 0.000, 1.130)",
      fill: "forwards",
    }
  );

  previousEndDegree = newEndDegree;

  animation.onfinish = () => {
    isSpinning.value = false;
    emit("prize-selected", winningPrize);
  };
};

// Удаляем onMounted, так как данные теперь захардкожены
</script>

<style scoped>
/* Стили остаются без изменений */
.wheel-container {
  width: 100%;
  max-width: min(100vh, 100vh);
  aspect-ratio: 1;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: center;
}

.wheel {
  width: 100%;
  aspect-ratio: 1;
  position: relative;
  border-radius: 50%;
  padding: min(2vw, 20px);
  background: linear-gradient(
    90deg,
    #f5cea6 0%,
    #ec598b 32%,
    #8d42e7 54.5%,
    #1f5cef 74%,
    #00b9f6 100%
  );
}

.wheel-background {
  position: absolute;

  transform: translateY(-20%);
  background: url("@/assets/images/wheel-bg-gradient.png") no-repeat top;
  background-size: 100% 100%;
  z-index: -1;
  pointer-events: none;
  opacity: 0.8;
}

.wheel::before {
  content: "";
  position: absolute;
  inset: min(2vw, 20px);
  border-radius: 50%;
  box-shadow: inset 0 0 20px 3px rgba(0, 0, 0, 0.8);
  pointer-events: none;
  z-index: 1;
}

:where(.ui-wheel-of-fortune) {
  --_items: 10;
  all: unset;
  aspect-ratio: 1;
  container-type: inline-size;
  display: grid;
  position: relative;
  width: 100%;
  z-index: 1;
}

.triangle {
  position: absolute;
  top: -3%;
  left: 50%;
  transform: translateX(-50%);
  width: min(15%, 70px);
  height: auto;
  z-index: 2;
}

.ui-wheel-of-fortune > * {
  position: absolute;
}

.ui-wheel-of-fortune button {
  aspect-ratio: 1;
  background: radial-gradient(
    circle at center,
    #d6549f 42%,
    #a949c3 59%,
    #ea7b8f 70%,
    #634cea 100%
  );
  border: 0;
  border-radius: 50%;
  cursor: pointer;
  font-size: clamp(1.2rem, 6cqi, 2.5rem);
  place-self: center;
  width: min(35%, 150px);
  font-weight: 600;
  font-size: 2rem;
  color: #fff;
  transition: all 0.3s ease;
}

.ui-wheel-of-fortune button:hover:not(:disabled) {
  transform: scale(1.05);
}

.ui-wheel-of-fortune ul {
  all: unset;
  clip-path: circle(50%);
  display: grid;
  inset: 0;
  place-content: center start;
}

.ui-wheel-of-fortune li {
  align-content: center;
  aspect-ratio: 1 / calc(2 * tan(180deg / var(--_items)));
  background: linear-gradient(
    250deg,
    #f5cea6 0%,
    #ec598b 24%,
    #8d42e7 44.5%,
    #1f5cef 71%,
    #00b9f6 92%
  );
  clip-path: polygon(0% 0%, 100% 50%, 0% 100%);
  display: grid;
  grid-area: 1 / -1;
  padding-left: 15%;
  padding-right: 25%;
  rotate: calc(360deg / var(--_items) * (var(--_idx, 1) - 1));
  transform-origin: center right;
  user-select: none;
  width: 50cqi;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

.prize-text {
  color: #fff;
  font-weight: 500;
  font-size: 1.8em;
  white-space: pre-wrap;
  word-wrap: break-word;
  word-break: break-word;
  line-height: 1.2;
  max-width: 100%;
  z-index: 1;
  letter-spacing: 0.5px;
  opacity: 0.9;
  transform: translateX(0);
  hyphens: auto;
}

.ui-wheel-of-fortune li:nth-of-type(1) {
  --_idx: 1;
}
.ui-wheel-of-fortune li:nth-of-type(2) {
  --_idx: 2;
}
.ui-wheel-of-fortune li:nth-of-type(3) {
  --_idx: 3;
}
.ui-wheel-of-fortune li:nth-of-type(4) {
  --_idx: 4;
}
.ui-wheel-of-fortune li:nth-of-type(5) {
  --_idx: 5;
}
.ui-wheel-of-fortune li:nth-of-type(6) {
  --_idx: 6;
}
.ui-wheel-of-fortune li:nth-of-type(7) {
  --_idx: 7;
}
.ui-wheel-of-fortune li:nth-of-type(8) {
  --_idx: 8;
}
.ui-wheel-of-fortune li:nth-of-type(9) {
  --_idx: 9;
}
.ui-wheel-of-fortune li:nth-of-type(10) {
  --_idx: 10;
}

button:disabled {
  opacity: 0.7;
  cursor: not-allowed;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
  .wheel-container {
    max-width: min(60vh, 400px);
  }

  .wheel {
    max-width: 98vw;
    padding: 2vw;
  }

  .wheel::before {
    inset: 1.5vw;
  }

  .wheel-background {
    inset: -8%;
    background-size: 106% 116%;
  }

  .ui-wheel-of-fortune button {
    font-size: 1rem;
  }

  .ui-wheel-of-fortune li {
    padding-left: 9%;
    padding-right: 27%;
  }

  .prize-text {
    font-size: 1em;
    line-height: 1.15;
    letter-spacing: 0;
  }

  .triangle {
    position: absolute;
    top: -3%;
    left: 50%;
    transform: translateX(-50%);
    width: min(15%, 40px);
    height: auto;
    z-index: 2;
  }
}

@media (max-width: 600px) {
  .wheel-container {
    max-width: min(60vh, 600px);
  }

  .wheel {
    max-width: 98vw;
    padding: 2vw;
  }

  .wheel::before {
    inset: 1.5vw;
  }

  .wheel-background {
    inset: -8%;
    background-size: 106% 116%;
  }

  .ui-wheel-of-fortune button {
    font-size: 1rem;
  }

  .ui-wheel-of-fortune li {
    padding-left: 15%;
    padding-right: 15%;
    justify-content: flex-start;
  }

  .prize-text {
    font-size: 0.85em;
    line-height: 1.1;
    letter-spacing: -0.2px;
    font-weight: 600;
  }
}

@media (max-width: 480px) {
  .ui-wheel-of-fortune li {
    padding-left: 9%;
    padding-right: 32%;
  }

  .prize-text {
    font-size: 0.75em;
    line-height: 1;
    letter-spacing: -0.3px;
  }
}

@media (min-width: 769px) and (max-width: 1024px) {
  .wheel-container {
    max-width: min(80vh, 800px);
  }

  .wheel {
    max-width: 98vw;
    padding: 2vw;
  }

  .wheel::before {
    inset: 1.5vw;
  }

  .wheel-background {
    inset: -9%;
    background-size: 108% 118%;
  }

  .ui-wheel-of-fortune li {
    padding-left: 12%;
    padding-right: 35%;
  }

  .prize-text {
    font-size: 1.2em;
    line-height: 1.15;
  }
}

@media (min-width: 1025px) {
  .wheel-background {
    inset: -10%;
    background-size: 110% 120%;
  }

  .prize-text {
    font-size: 1.5em;
  }
}
</style>
