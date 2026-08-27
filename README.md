# Elantamall

A PHP web application for mall/administration workflows.

## Overview

This repo contains the application entry points, handlers, and admin flows for the Elantamall project. It is organized around plain PHP pages with shared utilities for authentication, wallet, recharge, promotion, and withdrawal flows.

## Prerequisites

- PHP 7.4+
- MySQL/MariaDB
- A web server with `.htaccess` support

## Configuration

Create a `.env` file or set environment variables for database access:

```
DB_HOST=localhost
DB_USER=root
DB_PASS=
DB_NAME=
```

The app reads these from `getenv()` in `connection.php`. Do not hardcode secrets in committed source.

## Usage

Serve the repo root from a PHP-enabled host. Default page is `index.php`. Use the available handlers for recharge, withdrawal, and admin actions.

## Repository

https://github.com/ethical-dilkhush/elantamall

## License

MIT
