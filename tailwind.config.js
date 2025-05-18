module.exports = {
  content: ["./page-information.php", "./**/*.php"],
  safelist: ["custom-heading", "animate-bg-slide"],
  theme: {
    extend: {
      animation: {
        glow: "glow 1.5s infinite",
        "ping-once": "ping 1s cubic-bezier(0, 0, 0.2, 1) infinite",
        "bg-slide": "bg-move 4s linear infinite",
      },
      keyframes: {
        "bg-move": {
          "0%": { backgroundPosition: "0% 50%" },
          "100%": { backgroundPosition: "100% 50%" },
        },
        glow: {
          "0%, 100%": { boxShadow: "0 0 10px #ff00ff" },
          "50%": { boxShadow: "0 0 20px #ff00ff" },
        },
      },
      backgroundSize: {
        200: "200% 200%",
      },
    },
  },
  plugins: [require("@tailwindcss/aspect-ratio")],
};
