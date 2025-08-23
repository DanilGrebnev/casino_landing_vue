/** @type {import('tailwindcss').Config} */
export default {
  content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Montserrat", "sans-serif"],
      },
      colors: {
        brand: {
          peach: "#f5cea6",
          pink: "#ec598b",
          purple: "#8d42e7",
          blue: "#1f5cef",
          cyan: "#00b9f6",
        },
        surface: {
          900: "#131416",
          800: "#1E1F25",
          700: "#282A32",
        },
      },
      backgroundImage: {
        "brand-gradient":
          "linear-gradient(to right, #f5cea6 0%, #ec598b 22%, #8d42e7 47%, #1f5cef 63%, #00B9F6 100%)",
        "brand-gradient-2":
          "linear-gradient(90deg, #00B9F6 0%, #1F5CEF 27.33%, #8D42E7 53.33%, #EC598B 78.33%, #F5CEA6 100%)",
        "radial-dark":
          "radial-gradient(circle at center, #1E1F25 0%, #131416 100%)",
      },
      screens: {
        xs: "475px",
      },
    },
  },
  plugins: [],
};
