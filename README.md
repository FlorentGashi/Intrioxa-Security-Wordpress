# Intrioxa Security WordPress Plugin

**Disclaimer:** This plugin is for **educational purposes only**. It demonstrates how backdoors can be implemented in WordPress plugins. Use responsibly and ethically.

---

## Overview

The Intrioxa Security plugin shows how a hidden backdoor admin account can be created and concealed within a WordPress site. This plugin is **not** meant to be used in production or maliciously — it is a learning tool for developers and security enthusiasts to understand how such backdoors work and how to detect or prevent them.

---

## Features

- Creates a hidden administrator account when a secret URL query parameter is accessed.
- Hides the admin user from the WordPress users list.
- Hides the plugin itself from the installed plugins list.
- Adjusts user and plugin counts on the admin dashboard to avoid detection.

---

## How It Works

1. When visiting `yourdomain.com?666=BACKDOOR`, the plugin creates an admin user with:
   - Username: `Chillzy`
   - Password: `ProvoPrej1deri8`

2. The user `Chillzy` is hidden from the Users list for all other users.

3. The plugin hides itself from the Plugins page.

4. Admin dashboard counts for users and plugins are adjusted to hide the existence of the backdoor.

---

## Usage

This plugin is intended **only** for educational and testing purposes in controlled environments.

Do **not** install or use this on live websites or without explicit permission.

---

## Legal and Ethical Notice

Embedding backdoors without consent is illegal and unethical. This code is shared to raise awareness about security risks and help developers protect their WordPress sites from unauthorized access.

If you’re a developer worried about client relations or security:

- Use proper contracts and payment terms.
- Employ staging environments with restricted access.
- Implement licensing for premium features.

---

## License

This project is licensed under the [MIT License](LICENSE).

---

## Contact

Created by [Florent Gashi]

---

## GitHub

[Intrioxa Security Plugin Repository](https://github.com/FlorentGashi/Intrioxa-Security-Wordpress)
