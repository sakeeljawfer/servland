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

## 📧 Contact Form Configuration

The theme includes a contact form that needs to be configured with an email service to handle form submissions. By default, the project is set up to use [EmailJS](https://www.emailjs.com/), but you can modify it to work with your preferred email service provider.

### Setting up EmailJS

1. Create a free account at [EmailJS](https://www.emailjs.com/)
2. Create an email service and template in your EmailJS dashboard
3. Update your `.env` file with your EmailJS credentials:
```env
EMAILJS_SERVICE_ID=your-service-id
EMAILJS_TEMPLATE_ID=your-template-id
EMAILJS_USER_ID=your-public-key
```

### Using a Different Email Service

You can modify the contact form to work with any email service of your choice:

1. Choose your preferred email service provider (SendGrid, AWS SES, etc.)
2. Update the form submission logic in `src/components/ContactForm.astro`
3. Modify the environment variables in `.env` accordingly

### Email Configuration

The contact form supports two methods for handling email submissions:

#### Method 1: Nodemailer with SMTP

This method uses Nodemailer to send emails via SMTP. Ideal for Gmail or other email providers.

1. Copy `.env.example` to `.env`
2. Configure the following variables in your `.env` file:
```env
EMAIL_USERNAME=your-email@example.com
EMAIL_PASSWORD=your-app-specific-password
RECIPIENT_EMAIL=recipient@example.com
SECRET_KEY=your-secret-key-for-hashing
```

Note: For Gmail, you'll need to use an App-Specific Password. [Learn how to generate one](https://support.google.com/accounts/answer/185833?hl=en)

#### Method 2: EmailJS

This method uses EmailJS for handling email submissions. No server setup required.

1. Create an account at [EmailJS](https://www.emailjs.com/)
2. Create an email template with the following variables:
   - `{{name}}` - Sender's name
   - `{{email}}` - Sender's email
   - `{{tel}}` - Phone number
   - `{{message}}` - Message content

3. Configure the following variables in your `.env` file:
```env
PUBLIC_EMAILJS_SERVICE_ID=your-service-id
PUBLIC_EMAILJS_TEMPLATE_ID=your-template-id
PUBLIC_EMAILJS_USER_ID=your-public-key
```

### reCAPTCHA Integration (Optional)

To protect your form from spam:

1. Get your reCAPTCHA keys from [Google reCAPTCHA](https://www.google.com/recaptcha/admin)
2. Add them to your `.env`:
```env
PUBLIC_RECAPTCHA_SITE_KEY=your-site-key
RECAPTCHA_SECRET_KEY=your-secret-key
```

### Security Notes

- Never commit your `.env` file to version control
- Use HTTPS in production
- Regularly update your dependencies
- Consider implementing rate limiting
- Monitor your email service for any abuse

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
