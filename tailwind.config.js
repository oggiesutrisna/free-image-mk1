/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#3b82f6',
                    foreground: '#ffffff',
                },
                secondary: {
                    DEFAULT: '#10b981',
                    foreground: '#ffffff',
                },
                muted: {
                    DEFAULT: '#f3f4f6',
                    foreground: '#1f2937',
                },
            }
        }
    },
  plugins: [],
}

