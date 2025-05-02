module.exports = {
  content: ["./page-information.php", "/**/*.php"],
  theme: {
    extend: {
      animation: {
        glow: "glow 1.5s infinite",
        "ping-once": "ping 1s cubic-bezier(0, 0, 0.2, 1) infinite",
      },
      keyframes: {
        glow: {
          "0%, 100%": { boxShadow: "0 0 10px #ff00ff" },
          "50%": { boxShadow: "0 0 20px #ff00ff" },
        },
      },
    },
  },
  plugins: [require("@tailwindcss/aspect-ratio")],
};
