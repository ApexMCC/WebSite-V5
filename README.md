# Apex MCC — WebSite-V5 🌐

> The official Version 5 codebase for the **Apex MCC** community website and portal.

[![Website Status](https://img.shields.io/website?url=https%3A%2F%2Fapexmcc.dev&label=website&style=flat-square)](https://apexmcc.dev)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](CONTRIBUTING.md)

---

## 📖 Overview

**WebSite-V5** represents the latest iteration of the Apex MCC community platform. Designed for speed, responsiveness, and seamless navigation, the platform provides members and visitors with real-time updates, community engagement channels, fundraising initiatives, and administrative services.

### ✨ Key Features

- 📱 **Mobile-First Responsive Design:** Clean mobile navigation toggle and flexible grid layouts.
- 🧩 **Modular PHP Architecture:** Reusable components (headers, footers, navigation) for streamlined maintenance.
- 🎯 **Community Hub:** Dedicated sections for community announcements, roadmaps, and events.
- 💖 **Fundraising & Donations:** Integrated channels for supporting ongoing community projects and infrastructure.
- 💼 **Hiring & Volunteer Opportunities:** Direct portal for community members to join the team and contribute.

---

## 🗂️ Project Structure

```text
WebSite-V5/
├── cdn/                # Static assets, logos, and media (e.g., apex_long.png)
├── includes/           # Reusable server-side components
│   └── header.php      # Global site navigation and header partial
├── index.php           # Main landing page / entry point
└── README.md           # Project documentation and developer guide
```

---

## 🚀 Getting Started

### Prerequisites

- **PHP** (8.0 or higher recommended)
- **Web Server:** Apache, Nginx, or PHP Built-in Development Server
- **Browser:** Any modern web browser

### Local Development Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/ApexMCC/WebSite-V5.git
   cd WebSite-V5
   ```

2. **Run with PHP Built-in Server:**
   Use `index.php` (or a custom router script) as the front router to ensure clean URL routes (`/community`, `/funding`, `/roadmap`, `/hiring`, `/donate`) are dispatched properly:
   ```bash
   php -S localhost:8000 index.php
   ```

3. **Open in Browser:**
   Navigate to [http://localhost:8000](http://localhost:8000) in your browser.

---

## 🧭 Site Navigation & Routes

| Route | Destination | Description |
| :--- | :--- | :--- |
| `/` | **Home** | Community landing page and highlights |
| `/community` | **Our Community** | Member hubs, discussion links, and social channels |
| `/funding` | **Fundraising** | Project goals, financial transparency, and support |
| `/roadmap` | **Roadmap** | Upcoming milestones and feature updates |
| `/hiring` | **Join the Team** | Open staff, moderator, and developer roles |
| `/donate` | **Donate** | Direct contribution and sponsorship links |

---

## 🤝 Contributing

Contributions are welcome and appreciated! To contribute:

1. **Fork** the repository
2. **Create a branch** for your feature or fix (`git checkout -b feat/my-new-feature`)
3. **Commit** your changes (`git commit -m '✨ feat: add new community showcase'`)
4. **Push** to the branch (`git push origin feat/my-new-feature`)
5. **Open a Pull Request** describing your changes

---

## 📄 License

This project is licensed under the terms specified in the repository.

---

<div align="center">
  <sub>Built with ❤️ by the <strong>Apex MCC</strong> Community & Team</sub>
</div>
