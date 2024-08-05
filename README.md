Tailwind Php
==================
TailwindPHP - use Tailwind CSS in your PHP projects (without npm)

Tailwind PHP allows you to compile TailwindCSS on the fly directly with PHP without dependencies (without npm or postcss).

## Installing

IMPORTANT : Alpha version required linux x64.

[PHP](https://php.net) 8.0+ and [Composer](https://getcomposer.org) are required.


```bash
composer req devgenii/tailwindphp
```
Add execution rights
```bash
chmod +x ./vendor/devgenii/tailwindphp/bin/*
```

## Configuration

1- create a ``tailwind.config.js`` config file

```javascript
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./templates/**/*.twig"],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

## Credits

- Arnaud Lemercier is based on [Wixiweb](https://wixiweb.fr).
- Marko Martinović is based on [DevGenii](https://devgenii.com).

## License

TailwindPHP is licensed under [The MIT License (MIT)](LICENSE).