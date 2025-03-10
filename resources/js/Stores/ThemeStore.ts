import { defineStore } from "pinia";

export const useThemeStore = defineStore("theme", {
    state: () => ({
        isDarkMode: false,
    }),
    actions: {
        toggleDarkMode() {
            this.isDarkMode = !this.isDarkMode;
            document.documentElement.classList.toggle(
                "my-app-dark",
                this.isDarkMode
            );
        },
    },
});
