# ServLand - Modern Business Landing Page Theme

A sleek, responsive business landing page theme built with [Astro](https://astro.build) and [Tailwind CSS](https://tailwindcss.com). Perfect for service-based businesses, agencies, and professional portfolios.

![ServLand Preview](preview.png)

## ✨ Features

- 🚀 Built with Astro 4.x and Tailwind CSS
- 📱 Fully responsive design
- 🌙 Dark mode support
- 📧 Contact form with email integration
- 🔒 reCAPTCHA protection
- 🎨 Customizable design system
- 🎯 SEO optimized
- 📦 Zero JavaScript by default
- ⚡ Excellent performance scores

## 🚀 Getting Started

### Prerequisites

- Node.js 18 or higher
- npm or pnpm

### Installation

1. Clone the repository:
```bash
git clone https://github.com/locobean/servland.git
cd servland
```

2. Install dependencies:
```bash
npm install
# or
pnpm install
```

3. Copy the environment variables:
```bash
cp .env.example .env
```

4. Update the `.env` file with your configuration:
- SMTP settings for the contact form
- reCAPTCHA keys (optional)
- EmailJS configuration (optional)

### Development

Start the development server:
```bash
npm run dev
# or
pnpm dev
```

### Build

Create a production build:
```bash
npm run build
# or
pnpm build
```

Preview the build:
```bash
npm run preview
# or
pnpm preview
```

## 🎨 Customization

### Tailwind Configuration

Customize the theme by modifying `tailwind.config.mjs`:
- Colors
- Typography
- Spacing
- Breakpoints

### Content

Update the content in the `src/pages` and `src/components` directories.

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🤝 Contributing

Contributions are welcome! Please read our [Contributing Guidelines](CONTRIBUTING.md) for details.

## 📧 Support

For support, please [open an issue](https://github.com/locobean/servland/issues) on GitHub.
