# Contributing to Sublime

Thank you for taking the time to contribute! Please follow the steps below to keep the project healthy and consistent.

## Getting started

1. Fork and clone the repository:
   ```bash
   git clone https://github.com/DarkSynx/Sublime.git
   cd Sublime
   ```
2. Install dependencies:
   ```bash
   composer install
   ```

## Development workflow

Run the automated checks locally before opening a pull request:

```bash
composer test    # PHPUnit
composer cs      # Coding standards (dry-run)
composer stan    # PHPStan static analysis
```

Use `composer cs-fix` to automatically fix coding standards issues when possible.

## Pull request guidelines

* Keep changes focused and include tests whenever you add or modify behavior.
* Do not introduce breaking changes to the public API (the `Sublime()` entry point and `tag_()` helpers).
* Ensure CI passes and update documentation or examples when relevant.
* Describe the motivation and approach clearly in your pull request description.

Thank you for helping make Sublime better!
