# Servland - Business Landing Page Astro Theme

![GitHub](https://img.shields.io/github/license/locobean/servland)
![GitHub package.json version](https://img.shields.io/github/package-json/v/locobean/servland)
![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/locobean/servland/ci.yml)
[![Astro](https://img.shields.io/badge/Built%20with-Astro-FF5D01.svg?logo=astro)](https://astro.build)
[![Tailwind CSS](https://img.shields.io/badge/Built%20with-Tailwind%20CSS-38B2AC.svg?logo=tailwind-css)](https://tailwindcss.com)

![Servland Theme](preview.png)

A modern, responsive, and accessible theme built with Astro and Tailwind CSS, perfect for service-based businesses and professional portfolios.

## 🚀 Features

- ⚡️ **Lightning Fast**: Built with Astro for optimal performance
- 🌙 **Dark Mode**: Elegant dark mode support with system preference detection
- 📱 **Fully Responsive**: Looks great on all devices
- 🎨 **Modern Design**: Clean and professional business landing page
- 🔍 **SEO Optimized**: Meta tags, Open Graph, Twitter Cards
- 📨 **Contact Form**: Ready-to-use PHP contact form
- 🌅 **Parallax Effects**: Smooth scrolling parallax background
- 🎯 **Analytics Ready**: Easy to add your analytics code
- ♿️ **WCAG 2.1 Accessible**: ARIA labels, keyboard navigation, screen reader friendly
- 📧 **Cookie Consent**: GDPR compliant cookie notice
- 🖼️ **Animated Background**: Gradient circles with blur effects
- 🔝 **Smooth Scroll Navigation**: Smooth scroll-to-top functionality

## 🛠️ Tech Stack

- [Astro](https://astro.build)
- [Tailwind CSS](https://tailwindcss.com)
- [TypeScript](https://www.typescriptlang.org/)
- PHP (for form handling)

## 📦 Project Structure

```text
/
├── public/
│   ├── assets/
│   │   └── images/
│   ├── favicon.ico
│   ├── favicon.svg
│   └── send-email.php
├── src/
│   ├── components/
│   │   ├── CookieConsent.astro
│   │   ├── ParallaxBackground.astro
│   │   ├── ScrollToTop.astro
│   │   └── ThemeToggle.astro
│   ├── layouts/
│   │   └── Layout.astro
│   └── pages/
│       └── index.astro
```

## 🚀 Quick Start

1. **Clone the theme**
   ```bash
   git clone https://github.com/locobean/servland.git my-website
   cd my-website
   ```

2. **Install dependencies**
   ```bash
   npm install
   ```

3. **Start development server**
   ```bash
   npm run dev
   ```

4. **Build for production**
   ```bash
   npm run build
   ```

## 🎨 Customization

### Colors
The theme uses a custom color palette defined in `tailwind.config.cjs`. Modify the colors to match your brand:

```js
colors: {
  blue: {...},
  purple: {...},
  // Add your colors here
}
```

### Components

#### 1. Layout (`src/layouts/Layout.astro`)
- Main layout component
- Handles meta tags and SEO
- Includes dark mode setup
- Font loading optimization

#### 2. ParallaxBackground (`src/components/ParallaxBackground.astro`)
- Creates animated background effect
- Gradient circles with blur effects
- Dark mode compatible
- Performance optimized

#### 3. ThemeToggle (`src/components/ThemeToggle.astro`)
- Dark/light mode switching
- Persists user preference
- System preference detection
- Accessible button implementation

#### 4. ScrollToTop (`src/components/ScrollToTop.astro`)
- Smooth scroll-to-top functionality
- Appears after scrolling down
- Animated transitions
- Mobile-friendly

#### 5. CookieConsent (`src/components/CookieConsent.astro`)
- GDPR compliant cookie notice
- User preference persistence
- Responsive design
- Customizable content

### Page Sections

The main page (`src/pages/index.astro`) includes:

1. **Header**
   - Navigation menu with enhanced mobile phone icon
   - Theme toggle
   - Responsive mobile menu

2. **Hero Section**
   - Main heading and subtext
   - Call-to-action buttons
   - Animated background

3. **Services Grid**
   - Service cards
   - Icons and descriptions
   - Hover effects

4. **Contact Form**
   - PHP backend integration
   - Form validation
   - Success/error handling
   - CSRF protection

5. **Footer**
   - Social media links
   - Copyright notice
   - Responsive layout

## 📧 Contact Form Setup

⚠️ **Important Security Note**: The included PHP script (`send-email.php`) should be thoroughly tested and reviewed for security before deployment. Consider implementing additional security measures such as:
- Rate limiting
- Input validation
- Email verification
- Server-side sanitization

1. Configure your PHP environment
2. Update `public/send-email.php` with your email
3. Set up CSRF protection
4. Test the form submission thoroughly
5. Implement additional security measures as needed

## 🌙 Dark Mode

- System preference detection
- Manual toggle option
- Persistent user preference
- Smooth transitions
- Optimized color schemes

## 📱 Responsive Design

Breakpoints:
- Mobile: 0-640px
- Tablet: 641-1024px
- Desktop: 1025px+

## ♿️ Accessibility

- ARIA labels
- Keyboard navigation
- Screen reader friendly
- Color contrast compliance
- Focus management
- Reduced motion support

## 🔧 Troubleshooting

Common issues and solutions:

1. **Contact form not working**
   - Check PHP configuration
   - Verify email settings
   - Check server logs
   - Verify security settings

2. **Dark mode not persisting**
   - Clear localStorage
   - Check browser compatibility
   - Verify JavaScript execution

## 📄 License

MIT License - feel free to use for personal or commercial projects.

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Open a pull request

## 📝 Recent Changes

- Enhanced mobile responsiveness for phone icon in navigation
- Added security notes for PHP contact form
- Updated project structure
- Optimized background animations
- Improved dark mode compatibility

## 🙏 Credits

- Icons: [Heroicons](https://heroicons.com)
- Fonts: [Google Fonts](https://fonts.google.com)
  - Lato (400, 700)
  - Poppins (400, 500, 600, 700)
